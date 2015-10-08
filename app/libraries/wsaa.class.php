<?php 
# Author: Fabregues Martin - 03/10/2015
# Function: Obtiene Ticket de autorización (TA) de AFIP WSAA
# Input:
#        WSDL, CERT, PRIVATEKEY, PASSPHRASE, SERVICE, URL
# Output:
#        TA.xml: Ticket de autorización.
#==============================================================================

namespace libraries;

class WSAA{
	
	const WSDL = "wsaa.wsdl";
	const CERT = "DesarrolloCSR.crt";
	const PRIVATEKEY = "certificadosClaveDesarrollo.key";
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
		if (!file_put_contents("TA.xml", $TA)) {exit();}

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
		$TRA->asXML('TRA.xml');
	}
	
	
	public function SignTRA()
	{
        $fp = fopen('TRA.tmp','w');
            fwrite($fp,"");
            fclose($fp);
		$STATUS=openssl_pkcs7_sign(realpath("TRA.xml"), realpath("TRA.tmp"), "file://".realpath(self::CERT),
		array("file://".realpath(self::PRIVATEKEY), self::PASSPHRASE),
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
	
	
	public function CallWSAA($CMS)
	{
		$client= new \SoapClient(self::WSDL, array(
       /*    'proxy_host'     => PROXY_HOST,
          'proxy_port'     => PROXY_PORT, */
          'soap_version'   => SOAP_1_2,
          'location'       => self::URL,
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
	
}


?>