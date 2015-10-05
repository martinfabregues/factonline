<?php

class ProveedorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$proveedores = Proveedor::all();
		return View::make('pages.proveedores.list')
		->with('proveedores', $proveedores);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ciudades = Ciudad::lists('ciudad', 'id');
		$localidades = Localidad::lists('localidad', 'id');
		
		return View::make('pages.proveedores.create')
		->with('ciudades', $ciudades)
		->with('localidades', $localidades);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nombre' => 'required',
			'cuit' => 'required|numeric',
			'ingresosbrutos' => 'required|numeric',
			'direccion' => 'required',
			'numero' => 'required',			
			'barrio' => 'required',
			'email' => 'required'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails()){
			return Redirect::to('proveedores/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else{
			
			
			$proveedor = new Proveedor;
			$proveedor->nombre = Input::get('nombre');
			$proveedor->cuit = Input::get('cuit');
			$proveedor->ingresosbrutos = Input::get('ingresosbrutos');
			$proveedor->ciudad_id = Input::get('ciudad_id');
			$proveedor->localidad_id = Input::get('localidad_id');
			$proveedor->direccion = Input::get('direccion');
			$proveedor->numero = Input::get('numero');			
			$proveedor->departamento = Input::get('departamento');
			$proveedor->piso = Input::get('piso');
			$proveedor->barrio = Input::get('barrio');
			$proveedor->codigopostal = Input::get('codigopostal');
			$proveedor->telefono = Input::get('telefono');
			$proveedor->email = Input::get('email');
			$proveedor->activo = Input::get('activo');
			
			$proveedor->save();
									
			Session::flash('message', 'Los datos se registraron correctamente.');
			return Redirect::to('proveedores');
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
