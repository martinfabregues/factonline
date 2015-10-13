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
            {{ Form::select('cliente_id', [null => 'Selecciona un Cliente'] + $clientes, null, array('class' => 'form-control', 'style' => '' )) }}
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
<!--      <div class="col-sm-4">  
        <div class="form-group">
            {{ Form::label('documento', 'Nro. Documento') }}
            {{ Form::text('documento', Input::old('documento'), array('class' => 'form-control', 'placeholder' => 'Nro. Documento')) }}
        </div>
      </div>-->
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
     
<table id="table-data" class="table table-hover">
    <tr>
       <td class="col-md-1">Cód. Prod</td>
       <td class="col-md-5">Producto</td>
       <td class="col-md-1">Cant.</td>
       <td class="col-md-1">Importe</td>
       <td class="col-md-1">Alicuota IVA</td>
       <td class="col-md-1">Imp. IVA.</td>
       <td class="col-md-1">Total</td>
       <td></td>
    </tr>
    <tr>
        <td>
            {{ Form::text('producto_id[]', Input::old('producto_id'), array('class' => 'form-control', 'Placeholder' => 'Cód.')) }}
        </td>
        <td>
            {{ Form::select('producto_nombre[]', $productos, null, array('id' => 'producto_nombre', 'class' => 'form-control', 'style' => '' )) }}            
        </td>
        <td>
            {{ Form::text('cantidad[]', Input::old('cantidad'), array('class' => 'form-control', 'Placeholder' => 'Cant.')) }}
        </td>
        <td>
            {{ Form::text('importe[]', Input::old('importe'), array('class' => 'form-control', 'Placeholder' => 'Importe')) }}
        </td>
        <td>
            {{ Form::select('alicuota_id[]', $alicuotas, null, array('id' => 'alicuota_id[]', 'class' => 'form-control', 'style' => '' )) }}
        </td>
        <td>
            {{ Form::text('importe_iva[]', Input::old('importe_iva'), array('class' => 'form-control', 'Placeholder' => 'Imp. IVA')) }}
        </td>
        <td>
            {{ Form::text('total_prod[]', Input::old('total_prod'), array('class' => 'form-control', 'Placeholder' => 'Total')) }}
        </td>
        <td><input type="button" class="btn btn-sm btn-success addButton" value="Nueva Fila" /></td>
    </tr>
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
$(function(){
    $("#table-data").on('click', 'input.addButton', function() {
        var $tr = $(this).closest('tr');
        var allTrs = $tr.closest('table').find('tr');
        var lastTr = allTrs[allTrs.length-1];
        var $clone = $(lastTr).clone();
        $clone.find('td').each(function(){
            var el = $(this).find(':first-child');
            var id = el.attr('alicuota_id') || null;
            if(id) {
                var i = id.substr(id.length-1);
                var prefix = id.substr(0, (id.length-1));
                el.attr('id', prefix+(+i+1));
                el.attr('name', prefix+(+i+1));
                $(this)[0].selectize.destroy();
            }
        });
        $clone.find('input:text').val('');
        $tr.closest('table').append($clone);
        
    });

//    $("#table-data").on('change', 'select', function(){
//        var val = $(this).val();
//        $(this).closest('tr').find('input:text').val(val);
//    });
});

$('#cliente_id').selectize({
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    },
    dropdownParent: 'body'
});

$('#producto_nombre').selectize({
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    },
    dropdownParent: 'body'
});

$('#producto_nombre.1').selectize({
    create: true,
    sortField: {
        field: 'text',
        direction: 'asc'
    },
    dropdownParent: 'body'
});

</script>
@endsection

@stop