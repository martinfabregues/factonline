@extends('layouts.default')
@section('content')
<ol class="breadcrumb">
   <li><a href="#">Productos</a></li> 
   <li class="active"><a href="#">Nuevo Producto</a></li>   
 </ol>

 
<div class="panel panel-default">

    <div class="panel-heading">

        <h3 class="panel-title">Nuevo Producto</h3>

    </div>

    <div class="panel-body">
	
	<!-- if there are creation errors, they will show here -->
<!--{{ HTML::ul($errors->all()) }}-->
    <ul>
   @foreach($errors->all() as $error)
   <div class="alert alert-danger fade in" role="alert">{{ $error }}</div>
   @endforeach
    </ul>
{{ Form::open(array('url' => 'productos')) }}

    <div class="form-group">
        {{ Form::label('codigo', 'Código') }}
        {{ Form::text('codigo', Input::old('codigo'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('categoria_id', 'Categoria') }}
        {{ Form::select('categoria_id', $categorias, null, array('class' => 'form-control', 'style' => '' )) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('nombre', 'Nombre de Producto') }}
        {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('importe', 'Importe') }}
        {{ Form::text('importe', Input::old('importe'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('alicouta_id', 'Álicuota Iva') }}
        {{ Form::select('alicuota_id', $alicuotas, null, array('class' => 'form-control', 'style' => '' )) }}
    </div>
	
    <div class="form-group">
        {{ Form::label('activo', 'Activo') }}
        {{ Form::checkbox('activo', null, true) }}
    </div>
  
    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
	
	</div>

</div>


@stop

