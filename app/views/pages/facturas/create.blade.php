@extends('layouts.default')
@section('content')
<div class="container">
<ol class="breadcrumb">
   <li><a href="#">Facturación</a></li> 
   <li class="active"><a href="#">Listado de Facturas Emitidas</a></li>   
 </ol>



<!-- if there are creation errors, they will show here -->
 @if(Session::get('errors'))
     <div class="alert alert-danger fade in" role="alert">
    @foreach($errors->all() as $error)
        {{ $error }}</br>
    @endforeach
    </div>  
@endif




{{ Form::open(array('url' => 'facturas')) }}

<div class="panel panel-default">
 <div class="panel-heading">Datos del Cliente</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-4"> 
        <div class="form-group">
            {{ Form::label('cliente_id', 'Cliente') }}
            {{ Form::select('cliente_id', [null => 'Selecciona un Cliente'] + $clientes, null, array('class' => 'select2-select', 'style' => '' )) }}
        </div>
      </div>
<!--      <div class="col-sm-4"> 
        <div class="form-group">
            {{ Form::label('apellido', 'Apellido') }}
            {{ Form::text('apellido', Input::old('apellido'), array('class' => 'form-control', 'placeholder' => 'Apellido')) }}
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
            {{ Form::label('nombres', 'Nombres') }}
            {{ Form::text('nombres', Input::old('nombres'), array('class' => 'form-control', 'Placeholder' => 'Nombres')) }}
        </div>
      </div>
    </div>-->


      <div class="col-sm-4">   
        <div class="form-group">
            {{ Form::label('tipodocumento_id', 'Tipo Documento') }}
            {{ Form::select('tipodocumento_id', $tiposdocumento, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
      </div>  
      <div class="col-sm-4">  
        <div class="form-group">
            {{ Form::label('documento', 'Nro. Documento') }}
            {{ Form::text('documento', Input::old('documento'), array('class' => 'form-control', 'placeholder' => 'Nro. Documento')) }}
        </div>
      </div>
      <div class="col-sm-4">  
        <div class="form-group">
            {{ Form::label('condicioniva_id', 'Cond. IVA') }}
            {{ Form::select('condicioniva_id', $condicionesiva, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
      </div>  
   
    
   </div>
</div>
</div>

<div class="panel panel-default">
 <div class="panel-heading">Datos del Comprobante</div>
  <div class="panel-body">
    <div class="row">    
      <div class="col-sm-2">  
        <div class="form-group">
            {{ Form::label('fecha', 'Fecha') }}
            {{ Form::text('fecha', Input::old('fecha'), array('id' => 'datepicker', 'class' => 'form-control', 'Placeholder' => 'Fecha')) }}
        </div>
      </div>
        
      <div class="col-sm-2">  
        <div class="form-group">
            {{ Form::label('puntoventa_id', 'Punto de Venta') }}
            {{ Form::select('puntoventa_id', $puntosventa, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
      </div>
        
      <div class="col-sm-2">  
        <div class="form-group">
            {{ Form::label('tipocomprobante_id', 'Tipo Comprobante') }}
            {{ Form::select('tipocomprobante_id', $tiposcomprobante, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
      </div>
    
      <div class="col-sm-2">
        <div class="form-group">
            {{ Form::label('concepto_id', 'Tipo Concepto') }}
            {{ Form::select('concepto_id', $conceptos, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
      </div>
      <div class="col-sm-2">  
        <div class="form-group">
            {{ Form::label('formapago_id', 'Forma de Pago') }}
            {{ Form::select('formapago_id', $formaspago, null, array('class' => 'form-control', 'style' => '' )) }}
        </div>
      </div>    
    </div>	
  </div>
</div>
	

<div class="panel panel-default">
 <div class="panel-heading">Detalle del Comprobante</div>
 <div class="panel-body">
     

     <table class="table table-hover">
    <tbody>
        <tr>
            <th class="col-md-5">Producto</th>
            <th>Imp. Unit.</th>
            <th>Cant.</th>
            <th class="col-md-1">Álicuota</th>
            <th>Imp. IVA</th>
            <th>Total</th>
            <th></th>
        </tr>
        <tr class="flavors">
            <td>
                {{ Form::select('producto_id[]', [null => 'Selecciona un Producto'] + $productos, null, array('class' => 'select2-select' , 'style' => '' )) }}
            </td>
            <td>
                {{ Form::text('importe[]', Input::old('importe'), array('class' => 'form-control', 'placeholder' => 'Imp. Unit.')) }}
            </td>
            <td>
               {{ Form::text('cantidad[]', Input::old('cantidad'), array('class' => 'form-control', 'placeholder' => 'Cant.')) }}
            </td>
            <td>
               {{ Form::select('alicuota_id[]', [null => '%'] + $alicuotas, null, array('class' => 'select2-select' , 'style' => '' )) }}
            </td>
            <td>
                {{ Form::text('importe_iva[]', Input::old('importe_iva'), array('class' => 'form-control', 'placeholder' => 'Imp. IVA')) }}
            </td>
            <td>
                {{ Form::text('total_prod[]', Input::old('total_prod'), array('class' => 'form-control', 'placeholder' => 'Total')) }}
            </td>
            <td>
                <button type="button" class="btn btn-xs btn-default addline">(+)</button>
                <button type="button" class="btn btn-xs btn-danger remline">(-)</button>
            </td>
        </tr>
    </tbody>
</table>


    
 </div>
</div>



<div class="row">   
    <div class="form-group ">
            
        <div class="col-lg-6 col-sm-6"> 
            {{ Form::label('observaciones', 'Observaciones') }}
            {{ Form::textarea('observaciones', Input::old('observaciones'), array('class' => 'form-control', 'rows' => '4', 'Placeholder' => 'Observaciones')) }}
        </div>
            
        
    </div>
</div>

    
    <div class="form-group">
           
            <div class="col-md-3">
                 {{ Form::label('subtotal', 'Subtotal') }}
            <div class="input-group">                
                <div class="input-group-addon">$</div>                
                {{ Form::text('subtotal', Input::old('subtotal'), array('class' => 'form-control', 'placeholder' => '0.00')) }}
            </div>
            </div>
           
            
            
        <div class="col-md-3">
             {{ Form::label('iva', 'IVA') }}
            <div class="input-group">
                <div class="input-group-addon">$</div>
            {{ Form::text('iva', Input::old('iva'), array('class' => 'form-control', 'placeholder' => '0.00')) }}
            </div>
        </div>    
       
   </div>         
        <div class="col-md-3">
            {{ Form::label('tributos', 'Tributos') }}
            <div class="input-group">
                <div class="input-group-addon">$</div>
            {{ Form::text('tributos', Input::old('tributos'), array('class' => 'form-control', 'placeholder' => '0.00')) }}
            </div>
        </div>
            
           
        <div class="col-md-3">
            {{ Form::label('total', 'Total') }}
            <div class="input-group">
                <div class="input-group-addon">$</div>
            {{ Form::text('total', Input::old('total'), array('class' => 'form-control', 'placeholder' => '0.00')) }} 
            </div>
        </div> 
    

  </div>


    
   
          
 
<div class="row">
    <div class="col-sm-2">
{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
    </div>
</div>
{{ Form::close() }}





@section('scripts')
<script>
$(document).on('click', '.addline', function () {
    var $tr = $(this).closest('tr');
    var $lastTr = $tr.closest('table').find('tr:last');

    $lastTr.find('.select2-select').select2('destroy');

    var $clone = $lastTr.clone();

    $clone.find('td').each(function() {
        var el = $(this).find(':first-child');
        var id = el.attr('id') || null;
        if (id) {
            var i = id.substr(id.length - 1);
            var prefix = id.substr(0, (id.length - 1));
            el.attr('id', prefix + (+i + 1));
            el.attr('name', prefix + (+i + 1));
        }
    });
    $tr.closest('tbody').append($clone);
        $lastTr.find('.select2-select').select2();
    $clone.find('.select2-select').select2();
});

$('.select2-select').select2({
    placeholder: "Selecciona",
    allowClear: true
});

 $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });

</script>
@endsection

@stop