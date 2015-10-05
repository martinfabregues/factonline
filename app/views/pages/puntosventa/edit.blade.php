@extends('layouts.default')
@section('content')
<ol class="breadcrumb">
   <li><a href="#">Puntos de Venta</a></li> 
   <li class="active"><a href="#">Editar Punto de Venta</a></li>   
 </ol>


<div class="panel panel-success">

    <div class="panel-heading">

        <h3 class="panel-title">Editar Punto de Venta</h3>

    </div>

    <div class="panel-body">
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($puntoventa, array('route' => array('puntosventa.update', $puntoventa->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
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
        {{ Form::label('departamento', 'Departamento') }}
        {{ Form::text('departamento', Input::old('departamento'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('barrio', 'Barrio') }}
        {{ Form::text('barrio', Input::old('barrio'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('codigoafip', 'Cód. Afip') }}
        {{ Form::text('codigoafip', Input::old('codigoafip'), array('class' => 'form-control')) }}
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