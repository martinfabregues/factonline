<?php 
# Author: Fabregues Martin - 03/10/2015
# Function: Obtiene Ticket de autorización (TA) de AFIP WSAA
# Input:
#        WSDL, CERT, PRIVATEKEY, PASSPHRASE, SERVICE, URL
# Output:
#        TA.xml: Ticket de autorización.
#==============================================================================

namespace Afip;
class WSAA{
	
	const WSDL = "../app/libraries/afip/wsaa.wsdl.xml";
	const CERT = "../app/libraries/afip/certificados/DesarrolloCSR.crt";
	const PRIVATEKEY = "../app/libraries/afip/certificados/ClaveDesarrollo.key";
	const PASSPHRASE = "ClaveDesarrollo";
	const PROXY_HOST = "";
	const PROXY_PORT = "";
	const URL = "https://wsaahomo.afip.gov.ar/ws/services/LoginCms";
	
	
	//contructor
    public function __construct() 
    {
		

        ini_set("soap.wsdl_cache_enabled", "0");
	ini_set("soap.wsdl_cache_ttl","0");
	if (!file_exists(self::CERT)) {exit("Failed to open ".self::CERT."\n");}
	if (!file_exists(self::PRIVATEKEY)) {exit("Failed to open ".self::PRIVATEKEY."\n");}
	if (!file_exists(self::WSDL)) {exit("Failed to open ".self::WSDL."\n");}		
		
	$SERVICE= 'wsfe';
	$this->CreateTRA($SERVICE);
	$CMS=$this->SignTRA();
	$TA=$this->CallWSAA($CMS);
	if (!file_put_contents("../app/libraries/afip/TA.xml", $TA)) {exit();}

    }


    function CreateTRA($SERVICE)
    {
		$TRA = new \SimpleXMLElement(
		'<?xml version="1.0" encoding="UTF-8"?>' .
		'<loginTicketRequest version="1.0">'.
		'</loginTicketRequest>');
		$TRA->addChild('header');
		$TRA->header->addChild('uniqueId',date('U'));
		$TRA->header->addChild('generationTime',date('c',date('U')-60));
		$TRA->header->addChild('expirationTime',date('c',date('U')+60));
		$TRA->addChild('service',$SERVICE);
		$TRA->asXML('../app/libraries/afip/TRA.xml');
	}
	
	
	public function SignTRA()
	{
        $fp = fopen('../app/libraries/afip/TRA.tmp','w');
            fwrite($fp,"");
            fclose($fp);
		$STATUS=openssl_pkcs7_sign(realpath("../app/libraries/afip/TRA.xml"), realpath("../app/libraries/afip/TRA.tmp"), "file://".realpath(self::CERT),
		array("file://".realpath(self::PRIVATEKEY), self::PASSPHRASE),
		array(),
			!PKCS7_DETACHED
		);
		if (!$STATUS) {exit("ERROR generating PKCS#7 signature\n");}
		$inf=fopen("../app/libraries/afip/TRA.tmp", "r");
		$i=0;
		$CMS="";
		while (!feof($inf)) 
		{ 
			$buffer=fgets($inf);
		if ( $i++ >= 4 ) {$CMS.=$buffer;}
		}
		fclose($inf);
		#  unlink("TRA.xml");
		unlink("../app/libraries/afip/TRA.tmp");
		return $CMS;
	}
	
	
	public function CallWSAA($CMS)
	{
		$client=new \SoapClient(self::WSDL, array(
       /*    'proxy_host'     => PROXY_HOST,
          'proxy_port'     => PROXY_PORT, */
          'soap_version'   => SOAP_1_2,
          'location'       => self::URL,
          'trace'          => 1,
          'exceptions'     => 0
          )); 
		$results=$client->loginCms(array('in0'=>$CMS));
		file_put_contents("../app/libraries/afip/request-loginCms.xml",$client->__getLastRequest());
		file_put_contents("../app/libraries/afip/response-loginCms.xml",$client->__getLastResponse());
		if (is_soap_fault($results)) 
			{exit("SOAP Fault: ".$results->faultcode."\n".$results->faultstring."\n");}
		return $results->loginCmsReturn;
	}
	
}


?>