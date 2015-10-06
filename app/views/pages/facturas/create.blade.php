@extends('layouts.default')
@section('content')
<ol class="breadcrumb">
   <li><a href="#">Facturación</a></li> 
   <li class="active"><a href="#">Listado de Facturas Emitidas</a></li>   
 </ol>



<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'facturas')) }}

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Datos del Cliente</h3>
    </div>
    <div class="panel-body">
        
        <div class="form-group">
            {{ Form::label('cliente_id', 'Cliente') }}
            {{ Form::text('cliente_id', Input::old('cliente_id'), array('class' => 'form-control')) }}
        </div>
        
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
            {{ Form::select('tipodocumento_id', $tiposdocumento, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('documento', 'Documento Nro') }}
            {{ Form::text('documento', Input::old('documento'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('condicioniva_id', 'Cond. IVA') }}
            {{ Form::select('condicioniva_id', $condicionesiva, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
        
    </div>
</div>
    
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Datos del Comprobante</h3>
    </div>
    <div class="panel-body">
        
        <div class="form-group">
            {{ Form::label('fecha', 'Fecha') }}
            {{ Form::text('fecha', Input::old('fecha'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('tipocomprobante_id', 'Tipo Comprobante') }}
            {{ Form::select('tipocomprobante_id', $tiposcomprobante, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('concepto_id', 'Tipo Concepto') }}
            {{ Form::select('concepto_id', $conceptos, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('formapago_id', 'Forma de Pago') }}
            {{ Form::select('formapago_id', $formaspago, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
        
    </div>
</div>
	
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Detalle de Factura</h3>
    </div>
    <div class="panel-body">
        
    </div>
</div>
	
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Totales</h3>
    </div>
    <div class="panel-body">
        
        <div class="form-group">
            {{ Form::label('subtotal', 'Subtotal') }}
            {{ Form::text('subtotal', Input::old('subtotal'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('iva', 'IVA') }}
            {{ Form::text('iva', Input::old('iva'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('subtotal', 'Subtotal') }}
            {{ Form::text('subtotal', Input::old('subtotal'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('tributos', 'Tributos') }}
            {{ Form::text('tributos', Input::old('tributos'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('total', 'Total') }}
            {{ Form::text('total', Input::old('total'), array('class' => 'form-control')) }}
        </div>
        
    </div>	
</div>
	
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Observaciones</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('observaciones', 'Observaciones') }}
            {{ Form::textarea('observaciones', Input::old('observaciones'), array('class' => 'form-control')) }}
        </div>
    </div>
</div>    
	

{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
{{ Form::submit('Imprimir', array('class' => 'btn btn-default')) }}
{{ Form::close() }}

	
@stop