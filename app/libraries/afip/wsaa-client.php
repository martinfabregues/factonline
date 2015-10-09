<?php
# Author: Gerardo Fisanotti - DvSHyS/DiOPIN/AFIP - 13-apr-07
# Function: Get an authorization ticket (TA) from AFIP WSAA
# Input:
#        WSDL, CERT, PRIVATEKEY, PASSPHRASE, SERVICE, URL
#        Check below for its definitions
# Output:
#        TA.xml: the authorization ticket as granted by WSAA.
#==============================================================================
define ("WSDL", "wsaa.wsdl");     # The WSDL corresponding to WSAA
define ("CERT", "http://localhost/facturacion/app/libraries/certificados/pedidoCSR.crt");       # The X.509 certificate in PEM format
define ("PRIVATEKEY", "http://localhost/facturacion/app/libraries/certificados/certificados/clave.key"); # The private key correspoding to CERT (PEM)
define ("PASSPHRASE", "clave"); # The passphrase (if any) to sign
define ("PROXY_HOST", ""); # Proxy IP, to reach the Internet
define ("PROXY_PORT", "");            # Proxy TCP port
define ("URL", "https://wsaahomo.afip.gov.ar/ws/services/LoginCms");
#define ("URL", "https://wsaa.afip.gov.ar/ws/services/LoginCms");
#------------------------------------------------------------------------------
# You shouldn't have to change anything below this line!!!
#==============================================================================
function CreateTRA($SERVICE)
{
  $TRA = new SimpleXMLElement(
    '<?xml version="1.0" encoding="UTF-8"?>' .
    '<loginTicketRequest version="1.0">'.
    '</loginTicketRequest>');
  $TRA->addChild('header');
  $TRA->header->addChild('uniqueId',date('U'));
  $TRA->header->addChild('generationTime',date('c',date('U')-60));
  $TRA->header->addChild('expirationTime',date('c',date('U')+60));
  $TRA->addChild('service',$SERVICE);
  $TRA->asXML('TRA.xml');
}
#==============================================================================
# This functions makes the PKCS#7 signature using TRA as input file, CERT and
# PRIVATEKEY to sign. Generates an intermediate file and finally trims the 
# MIME heading leaving the final CMS required by WSAA.
function SignTRA()
{
        $fp = fopen('TRA.tmp','w');
            fwrite($fp,"");
            fclose($fp);
  $STATUS=openssl_pkcs7_sign(realpath("TRA.xml"), realpath("TRA.tmp"), "file://".realpath(CERT),
    array("file://".realpath(PRIVATEKEY), PASSPHRASE),
    array(),
    !PKCS7_DETACHED
    );
  if (!$STATUS) {exit("ERROR generating PKCS#7 signature\n");}
  $inf=fopen("TRA.tmp", "r");
  $i=0;
  $CMS="";
  while (!feof($inf)) 
    { 
      $buffer=fgets($inf);
      if ( $i++ >= 4 ) {$CMS.=$buffer;}
    }
  fclose($inf);
#  unlink("TRA.xml");
  unlink("TRA.tmp");
  return $CMS;
}
#==============================================================================
function CallWSAA($CMS)
{
  $client=new SoapClient(WSDL, array(
       /*    'proxy_host'     => PROXY_HOST,
          'proxy_port'     => PROXY_PORT, */
          'soap_version'   => SOAP_1_2,
          'location'       => URL,
          'trace'          => 1,
          'exceptions'     => 0
          )); 
  $results=$client->loginCms(array('in0'=>$CMS));
  file_put_contents("request-loginCms.xml",$client->__getLastRequest());
  file_put_contents("response-loginCms.xml",$client->__getLastResponse());
  if (is_soap_fault($results)) 
    {exit("SOAP Fault: ".$results->faultcode."\n".$results->faultstring."\n");}
  return $results->loginCmsReturn;
}
#==============================================================================
function ShowUsage($MyPath)
{
  printf("Uso  : %s Arg#1 Arg#2\n", $MyPath);
  printf("donde: Arg#1 debe ser el service name del WS de negocio.\n");
  printf("  Ej.: %s wsfe\n", $MyPath);
}
#==============================================================================
ini_set("soap.wsdl_cache_enabled", "0");
ini_set("soap.wsdl_cache_ttl","0");
if (!file_exists(CERT)) {exit("Failed to open ".CERT."\n");}
if (!file_exists(PRIVATEKEY)) {exit("Failed to open ".PRIVATEKEY."\n");}
if (!file_exists(WSDL)) {exit("Failed to open ".WSDL."\n");}
/*
  if ( $argc < 2 ) 
      {
        ShowUsage($argv[0]); 
        exit();
      }
$SERVICE=$argv[1];
*/
$SERVICE= 'wsfe';
CreateTRA($SERVICE);
$CMS=SignTRA();
$TA=CallWSAA($CMS);
if (!file_put_contents("TA.xml", $TA)) {exit();}

$ta_xml = simplexml_load_string($TA);
$TOKEN = $ta_xml->credentials->token;
$SIGN = $ta_xml->credentials->sign;

echo 'TOKEN: ' .$TOKEN;
echo 'SIGN: ' .$SIGN;

?>