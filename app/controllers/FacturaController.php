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
            
            return View::make('pages.facturas.create')
                    ->with('tiposdocumento', $tiposdocumento)
                    ->with('condicionesiva', $condicionesiva)
                    ->with('tiposcomprobante', $tiposcomprobante)
                    ->with('conceptos', $conceptos)
                    ->with('formaspago', $formaspago)
                    ->with('alicuotas', $alicuotas);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            
            
		
                
                
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
