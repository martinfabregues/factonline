<?php

class ClienteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientes = Cliente::paginate(10);
		return View::make('pages.clientes.list')
		->with('clientes', $clientes);
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
		
		return View::make('pages.clientes.create')
		->with('tiposdocumento', $tiposdocumento)
		->with('condicionesiva', $condicionesiva);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'apellido' => 'required',
			'nombres' => 'required',
			'documento' => 'required|numeric',
			'direccion' => 'required',
			'numero' => 'required|numeric',
			'barrio' => 'required',			
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails()){
			return Redirect::to('clientes/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else{
			
			
			$cliente = new Cliente;
			$cliente->apellido = Input::get('apellido');
			$cliente->nombres = Input::get('nombres');
			$cliente->fecharegistro = date("Y-m-d H:i:s");
			$cliente->documento = Input::get('documento');
			$cliente->direccion = Input::get('direccion');
			$cliente->numero = Input::get('numero');
			$cliente->piso = Input::get('piso');
			$cliente->departamento = Input::get('departamento');
			$cliente->barrio = Input::get('barrio');
			$cliente->telefono = Input::get('telefono');
			$cliente->email = Input::get('email');
			$cliente->activo = Input::get('activo');
			$cliente->tipodocumento_id = Input::get('tipodocumento_id');
			$cliente->condicioniva_id = Input::get('condicioniva_id');
			
			$cliente->save();
									
			Session::flash('message', 'Los datos se registraron correctamente.');
			return Redirect::to('clientes');
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
		//obtengo los datos del cliente a editar
		$cliente = Cliente::find($id);
		
		//obtengo los tipos de documento
		$tiposdocumento = TipoDocumento::lists('tipo_documento', 'id');
		//obtengo las condiciones de iva
		$condicionesiva = CondicionIva::lists('condicion_iva', 'id');
		
		//llamo a la vista y le paso los datos
		return View::make('pages.clientes.edit')
		->with('cliente', $cliente)
		->with('tiposdocumento', $tiposdocumento)
		->with('condicionesiva', $condicionesiva);
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'apellido' => 'required',
			'nombres' => 'required',
			'documento' => 'required|numeric',
			'direccion' => 'required',
			'numero' => 'required|numeric',
			'barrio' => 'required',			
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails()){
			return Redirect::to('clientes/' . $id . '/edit')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else{
			
			
			$cliente = Cliente::find($id);
			$cliente->apellido = Input::get('apellido');
			$cliente->nombres = Input::get('nombres');
			$cliente->documento = Input::get('documento');
			$cliente->direccion = Input::get('direccion');
			$cliente->numero = Input::get('numero');
			$cliente->piso = Input::get('piso');
			$cliente->departamento = Input::get('departamento');
			$cliente->barrio = Input::get('barrio');
			$cliente->telefono = Input::get('telefono');
			$cliente->email = Input::get('email');
			$cliente->activo = Input::get('activo');
			$cliente->tipodocumento_id = Input::get('tipodocumento_id');
			$cliente->condicioniva_id = Input::get('condicioniva_id');
			
			$cliente->save();
									
			Session::flash('message', 'Los datos se registraron correctamente.');
			return Redirect::to('clientes');
		}
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

        
        public function findcliente()
        {
            $term = Input::get('q');
	
            $results = array();
	
            $queries = DB::table('clientes')
		->where('nombres', 'LIKE', '%'.$term.'%')
		->orWhere('apellido', 'LIKE', '%'.$term.'%')
		->take(5)->get();
	
            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->id, 'text' => $query->apellido.' '.$query->nombres ];
            }
            
            return Response::json($results);
        }

}
