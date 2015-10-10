<?php


class FacturaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $facturas = Factura::all();
            
            return View::make('pages.facturas.list')
                    ->with('facturas', $facturas);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $tiposdocumento = TipoDocumento::lists('tipo_documento', 'id');
            $condicionesiva = CondicionIva::lists('condicion_iva', 'id');
            $tiposcomprobante = TipoComprobante::lists('tipo_comprobante', 'id');
            $conceptos = Concepto::lists('concepto', 'id');
            $formaspago = FormaPago::lists('forma_pago', 'id');
            $alicuotas = AlicuotaIva::lists('alicuota', 'id');
            $puntosventa = PuntoVenta::lists('nombre', 'id');
            
            return View::make('pages.facturas.create')
                    ->with('tiposdocumento', $tiposdocumento)
                    ->with('condicionesiva', $condicionesiva)
                    ->with('tiposcomprobante', $tiposcomprobante)
                    ->with('conceptos', $conceptos)
                    ->with('formaspago', $formaspago)
                    ->with('alicuotas', $alicuotas)
                    ->with('puntosventa', $puntosventa);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            
              $rules = array(
            'documento' => 'required|numeric',
            'fecha' => 'required',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'tributos' => 'required|numeric',           
            'total' => 'required|numeric'
        );
       
        $validator = Validator::make(Input::all(), $rules);
       
         $input = Input::all();
        
//         foreach($input as $key => $p)
//         {
//             
//         }
         
         print_r($input);
                            
                            
        
        if($validator->fails()){
            return Redirect::to('facturas/create')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else{
           
//            $wsaa = new Afip\WSAA();
//            $wsfe = new Afip\WSFEV1();
//                       
//            $PtoVta = PuntoVenta::findOrFail(Input::get('puntoventa_id'));
//            $CbteTipo = TipoComprobante::findOrFail(Input::get('tipocomprobante_id'));
//            $Concepto = Concepto::findOrFail(Input::get('concepto_id'));
//            $DocTipo = TipoDocumento::findOrFail(Input::get('tipodocumento_id'));
//            $DocNro = Input::get('documento');
//            $CbteFch = date('Ymd');
//            $ImpTotal = Input::get('total');
//            $ImpTotConc = 0;
//            $ImpNeto = Input::get('subtotal');
//            $ImpOpEx = 0;
//            $ImpTrib = Input::get('tributos');
//            $ImpIVA = Input::get('iva');
//            $FchServDesde = '';
//            $FchServHasta = '';
//            $FchVtoPago = '';
//            $MonId = 'PES';
//            $MonCotiz = 1;
//            $CbtesAsoc = null;
//            $Tributos = null;
//            $Iva = array('AlicIva' => array('Id' => 3, 'BaseImp' => $ImpNeto, 'Importe' => 0));
//            $Opcionales = null;
//                       
//            $ult_nro = $wsfe->FindUltimoCompAutorizado($PtoVta->codigoafip, $CbteTipo->codigoafip);
//            $prox_nro = ($ult_nro->FECompUltimoAutorizadoResult->CbteNro) + 1;
//                       
//            $response = $wsfe->CAESolicitar(1, $PtoVta->codigoafip, $CbteTipo->codigoafip, $Concepto->codigoafip,
//                        $DocTipo->codigoafip, $DocNro, $prox_nro, $prox_nro, $CbteFch,
//                        $ImpTotal, $ImpTotConc, $ImpNeto, $ImpOpEx, $ImpTrib, $ImpIVA, $FchServDesde, $FchServHasta, $FchVtoPago,
//                        $MonId, $MonCotiz, $CbtesAsoc, $Tributos, $Iva, $Opcionales);
//
//            $cae = $response->FECAESolicitarResult->FeDetResp->FECAEDetResponse->CAE;                     
//            $cae_vencimiento = $response->FECAESolicitarResult->FeDetResp->FECAEDetResponse->CAEFchVto;
//            $estado = $response->FECAESolicitarResult->FeCabResp->Resultado;              
//                       
//
//            if($estado == "A")
//            {                           
//                $factura = new Factura;
//                           
//                $fecha_input = Input::get('fecha');
//                $date = date("Y-m-d H:i:s", strtotime(str_replace('/','-', $fecha_input)));
//                $factura->fecha = $date;
//                           
//                            $factura->numerofactura = $prox_nro;
//                            $factura->tipocomprobante_id = Input::get('tipocomprobante_id');
//                            $factura->concepto_id = Input::get('concepto_id');
//                            $factura->formapago_id = Input::get('formapago_id');
//                            $factura->puntoventa_id = Input::get('puntoventa_id');
//                            $factura->cliente_id = 1;
//                            $factura->subtotal = Input::get('subtotal');
//                            $factura->iva = Input::get('iva');
//                            $factura->tributos = Input::get('tributos');
//                            $factura->total = Input::get('total');
//                            $factura->cae = $cae;                                                     
//                            $factura->estado = $estado;
//                            $factura->observaciones = Input::get('observaciones');
//                           
//                            $date2 = DateTime::createFromFormat('Ymd', $cae_vencimiento);                           
//                            $date2 = $date2->format('d/m/Y');
//                            $date2 = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$date2)));
//                           
//                            $factura->cae_vencimiento = $date2;
//                    
//                           
//                            $factura->save();
//
//                           
//                            
//                            
//                            Session::flash('message', 'Los datos se registraron correctamente.');
//                            return Redirect::to('facturas');
//                        }
            }            

               
           
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
