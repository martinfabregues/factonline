<?php


class FacturaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $facturas = Factura::paginate(10);
               
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
            $clientes = Cliente::select(DB::raw("CONCAT(apellido,' ', nombres, ' - ', documento) as nombrecompleto, id"))
                    ->lists('nombrecompleto', 'id');
            $productos = Producto::lists('nombre', 'id');
            
            $wsaa = new Afip\WSAA();
            $wsfe = new Afip\WSFEV1();
            
            $tributos = $wsfe->FindTiposTributo();
                        
            return View::make('pages.facturas.create')
                    ->with('tiposdocumento', $tiposdocumento)
                    ->with('condicionesiva', $condicionesiva)
                    ->with('tiposcomprobante', $tiposcomprobante)
                    ->with('conceptos', $conceptos)
                    ->with('formaspago', $formaspago)
                    ->with('alicuotas', $alicuotas)
                    ->with('puntosventa', $puntosventa)
                    ->with('clientes', $clientes)
                    ->with('productos', $productos);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            
            $rules = array(
            'cliente_id' => 'required|numeric',
            'documento' => 'required|numeric',    
            'fecha' => 'required',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'tributos' => 'required|numeric',           
            'total' => 'required|numeric'
        );
       
        

        $validator = Validator::make(Input::all(), $rules);
        $validator->each('producto_id', ['required|numeric']);
        $validator->each('cantidad', ['required|numeric']);
        $validator->each('importe_unitario', ['required|numeric']);
        $validator->each('alicuota_id', ['required|numeric']);
        $validator->each('importe_iva', ['required|numeric']);
        $validator->each('total_producto', ['required|numeric']);
        
        if($validator->fails()){
            return Redirect::to('facturas/create')
            ->withErrors($validator);
        } 
        else{
           echo 'no hay errores';            
            $wsaa = new Afip\WSAA();
            $wsfe = new Afip\WSFEV1();
                       
            $PtoVta = PuntoVenta::findOrFail(Input::get('puntoventa_id'));            
            $CbteTipo = TipoComprobante::findOrFail(Input::get('tipocomprobante_id'));
            $Concepto = Concepto::findOrFail(Input::get('concepto_id'));
            $Cliente = Cliente::findOrFail(Input::get('cliente_id'));

            $DocTipo = $Cliente->TipoDocumento->codigoafip;
            $DocNro = Input::get('documento');
            $CbteFch = date('Ymd');
            $ImpTotal = Input::get('total');
            $ImpTotConc = 0;
            $ImpNeto = Input::get('subtotal');
            $ImpOpEx = 0;
            $ImpTrib = Input::get('tributos');
            $ImpIVA = Input::get('iva');
            $FchServDesde = '';
            $FchServHasta = '';
            $FchVtoPago = '';
            $MonId = 'PES';
            $MonCotiz = 1;
            $CbtesAsoc = null;
            $Tributos = null;            
            $Opcionales = null;
                       
            //Obtengo el detalle de la factura
            $input = Input::all();
            
            $detalle_array = array();
            foreach($input['producto_id'] as $key => $value) {
                $detalle_array[$key]['producto_id'] = $value;
            }
            
            foreach($input['cantidad'] as $key => $value){
                $detalle_array[$key]['cantidad'] = $value;                
            }
            
            foreach($input['importe_unitario'] as $key => $value){
                $detalle_array[$key]['importe_unitario'] = $value;                
            }
            
            foreach($input['alicuota_id'] as $key => $value){
                $detalle_array[$key]['alicuota_id'] = $value;                
            }
            
            foreach($input['importe_iva'] as $key => $value){
                $detalle_array[$key]['importe_iva'] = $value;                
            }
            
            foreach($input['total_producto'] as $key => $value){
                $detalle_array[$key]['total_producto'] = $value;                
            }
            
            print_r($detalle_array);
            //Calculo las alicuotas de iva
            
            $Iva = array();
            
            //si es factura b
            if($CbteTipo->codigoafip == 1)
            {
     
                $key = 0;
                foreach ($detalle_array as $item) {
                    $key = $item['alicuota_id'];
                    if (!array_key_exists($key, $Iva)) {
                        $Iva[$key] = array(
                            'Id' => $item['alicuota_id'],
                            'BaseImp' => $item['importe_unitario'],
                            'Importe' => $item['importe_iva'],
                        );
                    } else {
                        $Iva[$key]['BaseImp'] = $Iva[$key]['BaseImp'] + $item['importe_unitario'];
                        $Iva[$key]['Importe'] = $Iva[$key]['Importe'] + $item['importe_iva'];
                    }
                    $key++;
                }
 
            }
            
            print_r($Iva);
            
//            $Iva = array('AlicIva' => array('Id' => 3, 'BaseImp' => $ImpNeto, 'Importe' => 0));
//            
//            $ult_nro = $wsfe->FindUltimoCompAutorizado($PtoVta->codigoafip, $CbteTipo->codigoafip);
//            $prox_nro = ($ult_nro->FECompUltimoAutorizadoResult->CbteNro) + 1;
//            
////            echo $prox_nro;
//                       
//            $response = $wsfe->CAESolicitar(1, $PtoVta->codigoafip, $CbteTipo->codigoafip, $Concepto->codigoafip,
//                        $DocTipo, $DocNro, $prox_nro, $prox_nro, $CbteFch,
//                        $ImpTotal, $ImpTotConc, $ImpNeto, $ImpOpEx, $ImpTrib, $ImpIVA, $FchServDesde, $FchServHasta, $FchVtoPago,
//                        $MonId, $MonCotiz, $CbtesAsoc, $Tributos, $Iva, $Opcionales);
//
//            $cae = $response->FECAESolicitarResult->FeDetResp->FECAEDetResponse->CAE;                     
//            $cae_vencimiento = $response->FECAESolicitarResult->FeDetResp->FECAEDetResponse->CAEFchVto;
//            $estado = $response->FECAESolicitarResult->FeCabResp->Resultado;              
//               
//            
//            //si la factura fue autorizada por AFIP la persisto en la base de datos  
//            if($estado == "A" && strlen($cae) != 0)
//            {                           
//                $factura = new Factura;
//               
//                $factura->fecha = Input::get('fecha');                      
//                $factura->numerofactura = $prox_nro;
//                $factura->tipocomprobante_id = Input::get('tipocomprobante_id');
//                $factura->concepto_id = Input::get('concepto_id');
//                $factura->formapago_id = Input::get('formapago_id');
//                $factura->puntoventa_id = Input::get('puntoventa_id');
//                $factura->cliente_id = 1;
//                $factura->subtotal = Input::get('subtotal');
//                $factura->iva = Input::get('iva');
//                $factura->tributos = Input::get('tributos');
//                $factura->total = Input::get('total');
//                $factura->cae = $cae;                                                     
//                $factura->estado = $estado;
//                $factura->observaciones = Input::get('observaciones');
//                           
//                $date2 = DateTime::createFromFormat('Ymd', $cae_vencimiento);                           
//                $date2 = $date2->format('d/m/Y');
//                $date2 = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$date2)));
//                           
//                $factura->cae_vencimiento = $date2;
//                    
//                //guardo la factura
//                $factura->save();
//              
//                //guardo el detalle de factura                         
//                foreach($detalle_array as $row)
//                {        
//                    $det = new FacturaDetalle;
//                    $det->producto_id = $row['producto_id'];
//                    $det->cantidad = $row['cantidad'];
//                    $det->importe = $row['importe_unitario'];
//                    $det->alicuota_id = $row['alicuota_id'];
//                    $det->importe_iva = $row['importe_iva'];
//                    $det->total = $row['total_producto'];
//                                
//                    $factura->detalle()->save($det);                                
//                }
//                            
//                Session::flash('message', 'Los datos se registraron correctamente.');
//                return Redirect::to('facturas');
//            }
//            else
//            {
////                Session::flash('message', $response->FECAESolicitarResult->Errors);
////                return Redirect::to('facturas/create');
//                return Redirect::to('facturas/create')
//                        ->with($erroresafip, $response->FECAESolicitarResult->Errors);
//                
//            }
//            
            }            
//
               
           
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
