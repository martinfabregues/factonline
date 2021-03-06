@extends('layouts.app')
@section('htmlheader_title')
    Home
@endsection


@section('main-content')

<section class="content">
<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
                            <div class="box-header">Editar Cliente</div>

                            <div class="box box-body pad table-responsive">
                       <ul>

                                
 {{ Form::model($cliente, array('route' => array('clientes.update', $cliente->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('apellido', 'Apellido') }}
        {{ Form::text('apellido', Input::old('apellido'), array('class' => 'form-control')) }}
    </div>

	<div class="form-group">
        {{ Form::label('nombres', 'Nombres') }}
        {{ Form::text('nombres', Input::old('nombres'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('tipodocumento_id', 'Tipo Documento') }}
        {{ Form::select('tipodocumento_id', $tiposdocumento, $cliente->tipodocumento_id, array('class' => 'form-control', 'style' => '' )) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('documento', 'Documento') }}
        {{ Form::text('documento', Input::old('documento'), array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group">
        {{ Form::label('condicioniva_id', 'Cond. Iva') }}
        {{ Form::select('condicioniva_id', $condicionesiva, $cliente->condicioniva_id, array('class' => 'form-control', 'style' => '' )) }}
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
		</div>
	</div>
</section>

@endsection


