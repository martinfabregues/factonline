<?php

class PuntoVentaController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$puntos = PuntoVenta::all();
        // load the view and pass the nerds
        return View::make('pages.puntosventa.list')->with('puntos', $puntos);
	}
	
	public function create()
	{
		return View::make('pages.puntosventa.create');
	}

	public function store()
	{
		$rules = array(
			'nombre' => 'required',
			'direccion' => 'required',
			'numero' => 'required|numeric',
			'barrio' => 'required',			
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails()){
			return Redirect::to('puntosventa/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else{
			
			
			$punto = new PuntoVenta;
			$punto->nombre = Input::get('nombre');
			$punto->direccion = Input::get('direccion');
			$punto->numero = Input::get('numero');			
			$punto->departamento = Input::get('departamento');
			$punto->piso = Input::get('piso');
			$punto->barrio = Input::get('barrio');
			$punto->codigoafip = Input::get('codigoafip');
			$punto->activo = Input::get('activo');
			
			$punto->save();
									
			Session::flash('message', 'Los datos se registraron correctamente.');
			return Redirect::to('puntosventa');
		}
		
	}
	
	public function edit($id)
	{
		$punto = PuntoVenta::find($id);
		
		return View::make('pages.puntosventa.edit')
		->with('puntoventa', $punto);
	}
	
	public function update($id)
	{
		$rules = array(
			'nombre' => 'required',
			'direccion' => 'required',
			'numero' => 'required|numeric',
			'barrio' => 'required',			
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails()){
			return Redirect::to('puntosventa/'. $id . '/edit')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else{
			
			
			$punto = PuntoVenta::find($id);
			$punto->nombre = Input::get('nombre');
			$punto->direccion = Input::get('direccion');
			$punto->numero = Input::get('numero');			
			$punto->departamento = Input::get('departamento');
			$punto->piso = Input::get('piso');
			$punto->barrio = Input::get('barrio');
			$punto->codigoafip = Input::get('codigoafip');
			$punto->activo = Input::get('activo');
			
			$punto->save();
									
			Session::flash('message', 'Los datos se registraron correctamente.');
			return Redirect::to('puntosventa');
		}
	}
	
}
