<?php
namespace Afip;
class WSFEV1 {
	
	
	const CUIT = 20107618725;   # CUIT del emisor de las facturas
	const TA =    "../app/libraries/afip/TA.xml";        # Archivo con el Token y Sign
	const WSDL = "../app/libraries/afip/wsfev1.wsdl.xml";    # The WSDL corresponding to WSFE	
	const PROXY_ENABLE = false;
	const LOG_XMLS = false;        # For debugging purposes
	const URL = "https://wswhomo.afip.gov.ar/wsfev1/service.asmx"; // testing

	//variables globales de la clase	
	private $ticketAcceso;
	private $cliente;
	private $error;
	
	
	//contructor
	public function __construct() 
    {
            
		// cache wsdl
		ini_set("soap.wsdl_cache_enabled", "0");    
		ini_set("soap.wsdl_cache_ttl","0");
		
		// validar archivos necesarios
		/* if (!file_exists(self::WSDL)) $this->error .= " Error al intentar abrir la definición del WSDL.".self::WSDL;
    
		if(!empty($this->error)) {
			throw new Exception('WSFE class. Faltan archivos necesarios para el funcionamiento.');
		}         */
    
		$this->ticketResponse();
	
		$this->cliente = new \SoapClient(self::WSDL, array(
       /*    'proxy_host'     => PROXY_HOST,
			'proxy_port'     => PROXY_PORT, */
			'soap_version'   => SOAP_1_2,
			'location'       => self::URL,
			'trace'          => 1,
			'exceptions'     => 0
        )); 			
    }

	public function TicketResponse()
	{
/* 		if (!file_exists(self::TA)) $this->error .= " Error al intentar abrir la definición del WSDL.".self::TA;
		 */
		 //validar si el archivo existe
		$response = simplexml_load_file(self::TA);
		$this->TA = $response;
		
		return $this->TA == false ? false : true;
	}
	
	public function FindEstadoServidores()
	{
		return $results_AutRequest = $this->cliente->FEDummy();		
	}
	
	
	public function FindTiposTributo()
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetTiposTributos($params);
	}
	
	
	public function FindTiposPaises()
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetTiposPaises($params);
	}
	
	
	public function FindTiposOpcional()
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetTiposOpcional($params);
	}
	
	public function FindTiposMoneda()
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetTiposMonedas($params);
	}
	
	public function FindTiposIva()
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetTiposIva($params);
	}
	
		
	
	public function FindTiposDocumentos()
    {
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetTiposDoc($params);
		
		//this->_checkErrors($results, 'FEParamGetTiposDoc');
    
	/* 	$X=$results->FEParamGetTiposDocResult;
		//$fh=fopen("TiposDoc.txt","w");
		foreach ($X->ResultGet->DocTipo AS $Y) {
		//fwrite($fh,sprintf("%5s %-30s\n",$Y->Id, $Y->Desc));
			echo $Y->Id .' '.$Y->Desc;
		} */
		//fclose($fh);
	}
	
	
	public function FindTiposConceptos()
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetTiposConcepto($params);
	}
	
	
	public function FindTiposComprobantes()
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetTiposCbte($params);
	}
	
	
	public function FindPuntosVenta()
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT));
								
		return $response = $this->cliente->FEParamGetPtosVenta($params);
	}
	
	public function FindCotizacionMoneda($MonId)
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT), 
								'MonId' => $MonId);
								
		return $response = $this->cliente->FEParamGetCotizacion($params);
	}
	
	public function FindUltimoCompAutorizado($PtoVta, $CbteTipo)
	{
		$params = array('Auth' => 
							array('Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT), 
								'PtoVta' => $PtoVta, 
								'CbteTipo' => $CbteTipo);
								
		return $response = $this->cliente->FECompUltimoAutorizado($params);
	}
	
	public function FindComprobante($CbteTipo, $CbteNro, $PtoVta)
	{
		$params = array('Auth' => 
							array(
								'Token' => $this->TA->credentials->token, 
								'Sign' => $this->TA->credentials->sign, 
								'Cuit' => self::CUIT
								), 
								'FeCompConsReq' => array(
									'CbteTipo' => $CbteTipo,
									'CbteNro' => $CbteNro,
									'PtoVta' => $PtoVta
									)
						);
								
		return $response = $this->cliente->FECompConsultar($params);
	}
	
	public function CAESolicitar($CantReg, $PtoVta, $CbteTipo, $Concepto, $DocTipo, $DocNro, $CbteDesde, $CbteHasta, $CbteFch, $ImpTotal,
								$ImpTotConc, $ImpNeto, $ImpOpEx, $ImpTrib, $ImpIVA, $FchServDesde, $FchServHasta, $FchVtoPago, $MonId,
								$MonCotiz, $CbtesAsoc, $Tributos, $Iva, $Opcionales)
	{
		$params = array(
             'Auth' => array
                 (
                 'Token' => $this->TA->credentials->token,
                 'Sign' => $this->TA->credentials->sign,
                 'Cuit' => self::CUIT
             ),
             'FeCAEReq' => array
                 (
                 'FeCabReq' => array
                     (
                    'CantReg' => $CantReg,
                     'PtoVta' => $PtoVta,
                     'CbteTipo' => $CbteTipo //1 factura A - 6 factura B
                 ),
                 'FeDetReq' => array
                     (
                     'FECAEDetRequest' => array
                         (
                         'Concepto' => $Concepto, // Productos y servicios
                         'DocTipo' => $DocTipo, //80 (CUIT) - 96 DNI
                         'DocNro' => $DocNro,
                         'CbteDesde' => $CbteDesde,
                         'CbteHasta' => $CbteHasta,
                         'CbteFch' => date('Ymd'),
                         'ImpTotal' => round($ImpTotal, 2),
                         'ImpTotConc' => round($ImpTotConc, 2),
                         'ImpNeto' => round($ImpNeto, 2),
                         'ImpOpEx' => round($ImpOpEx, 2),
                         'ImpTrib' => round($ImpTrib, 2),
                         'ImpIVA' => round($ImpIVA, 2),
                         'FchServDesde' => $FchServDesde,
                         'FchServHasta' => $FchServHasta,
                         'FchVtoPago' => $FchVtoPago,
                         'MonId' => $MonId,
                         'MonCotiz' => $MonCotiz,
						 'CbtesAsoc' => $CbtesAsoc,
                         'Tributos' => $Tributos,
                         'Iva' => $Iva,
						 'Opcionales' => $Opcionales
                     )
                 )
             )
         );
									
		return $response = $this->cliente->FECAESolicitar($params);
								
	}
	
}
?>