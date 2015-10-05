@extends('layouts.default')
@section('content')
<ol class="breadcrumb">
   <li><a href="#">Proveedores</a></li> 
   <li class="active"><a href="#">Nuevo Proveedor</a></li>   
 </ol>

 
<div class="panel panel-success">

    <div class="panel-heading">

        <h3 class="panel-title">Nuevo Proveedor</h3>

    </div>

    <div class="panel-body">
	
	<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'proveedores')) }}

    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
    </div>

	<div class="form-group">
        {{ Form::label('cuit', 'Cuit') }}
        {{ Form::text('cuit', Input::old('cuit'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('ingresosbrutos', 'Ing. Brutos') }}
        {{ Form::text('ingresosbrutos', Input::old('ingresosbrutos'), array('class' => 'form-control')) }}
    </div>
	
	
	<div class="form-group">
        {{ Form::label('ciudad_id', 'Ciudad') }}
        {{ Form::select('ciudad_id', $ciudades, null, array('class' => 'form-control', 'style' => '' )) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('localidad_id', 'Localidad') }}
        {{ Form::select('localidad_id', $localidades, null, array('class' => 'form-control', 'style' => '' )) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::text('direccion', Input::old('direccion'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('numero', 'Numeración') }}
        {{ Form::text('numero', Input::old('numero'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('piso', 'Piso') }}
        {{ Form::text('piso', Input::old('piso'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('departamento', 'Depto') }}
        {{ Form::text('departamento', Input::old('departamento'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('barrio', 'Barrio') }}
        {{ Form::text('barrio', Input::old('barrio'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('codigopostal', 'Cód. Postal') }}
        {{ Form::text('codigopostal', Input::old('codigopostal'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('telefono', 'Telefono') }}
        {{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>
	
    <div class="form-group">
        {{ Form::label('activo', 'Activo') }}
        {{ Form::checkbox('activo') }}
    </div>
  
    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
	
	</div>

</div>


@stop