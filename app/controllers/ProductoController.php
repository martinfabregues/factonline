<?php

class ProductoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $productos = Producto::all();
            return View::make('pages.productos.list')
                    ->with('productos', $productos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $categorias = Categoria::lists('categoria', 'id');
            $alicuotas = AlicuotaIva::lists('alicuota', 'id');
            
            return View::make('pages.productos.create')
                    ->with('categorias', $categorias)
                    ->with('alicuotas', $alicuotas);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $rules = array(
                    'codigo' => 'required',
                    'categoria_id' => 'required|numeric',
                    'nombre' => 'required',
                    'importe' => 'required|numeric',
                    'alicuota_id' => 'required|numeric',			
		);
		
            $validator = Validator::make(Input::all(), $rules);

            if($validator->fails()){
                    return Redirect::to('productos/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else{
                
                $producto = new Producto;
                $producto->codigo = Input::get('codigo');
                $producto->categoria_id = Input::get('categoria_id');
                $producto->nombre = Input::get('nombre');
                $producto->importe = Input::get('importe');
                $producto->alicuota_id = Input::get('alicuota_id');
                $producto->activo = Input::get('activo');

                $producto->save();
                
                Session::flash('message', 'Los datos se registraron correctamente.');
		return Redirect::to('productos');
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
