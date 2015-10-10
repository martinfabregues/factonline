@extends('layouts.default')
@section('content')
<div class="container">
<ol class="breadcrumb">
   <li><a href="#">Facturación</a></li> 
   <li class="active"><a href="#">Listado de Facturas Emitidas</a></li>   
 </ol>



<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'facturas')) }}

<div class="panel panel-default">
 <div class="panel-heading">Datos del Cliente</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-4"> 
        <div class="form-group">
            {{ Form::label('cliente_id', 'Cliente') }}
            {{ Form::text('cliente_id', Input::old('cliente_id'), array('class' => 'form-control')) }}
        </div>
      </div>
      <div class="col-sm-4"> 
        <div class="form-group">
            {{ Form::label('apellido', 'Apellido') }}
            {{ Form::text('apellido', Input::old('apellido'), array('class' => 'form-control', 'placeholder' => 'Apellido')) }}
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
            {{ Form::label('nombres', 'Nombres') }}
            {{ Form::text('nombres', Input::old('nombres'), array('class' => 'form-control')) }}
        </div>
      </div>
    </div>

    <div class="row">
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
            {{ Form::text('fecha', Input::old('fecha'), array('id' => 'datepicker', 'class' => 'form-control')) }}
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
     
<!--    <table class="table table-bordered table-hover" id="tab_logic">
	<thead>
            <tr >
		<th class="text-center">
                    Cód. Prod.
		</th>
		<th class="text-center">
                    Producto
		</th>
                <th class="text-center">
                    Importe
                </th>
		<th class="text-center">
                    Cant.
		</th>
                <th class="text-center">
                    Alic. IVA
		</th>
                <th class="text-center">
                    Imp. IVA
		</th>
                <th class="text-center">
                    Total
		</th>
            </tr>
	</thead>
	<tbody>
            <tr id='addr0'>
		<td>
                    {{ Form::text('producto_id[]', Input::old('producto_id'), array('class' => 'form-control')) }}
		</td>
		<td>
                    {{ Form::text('producto_nombre[]', Input::old('producto_nombre[]'), array('class' => 'form-control')) }}
		</td>
		<td>
                    {{ Form::text('importe[]', Input::old('importe'), array('class' => 'form-control')) }}
		</td>
		<td>
                    {{ Form::text('cantidad[]', Input::old('cantidad'), array('class' => 'form-control')) }}
		</td>
                <td>
                    {{ Form::select('alicuota_id[]', $alicuotas, null, array('class' => 'form-control', 'style' => '' )) }}
		</td>
                <td>
                    {{ Form::text('alicuota_importe[]', Input::old('iva'), array('class' => 'form-control')) }}
		</td>
                <td>
                    {{ Form::text('total[]', Input::old('total'), array('class' => 'form-control')) }}
		</td>
            </tr>
                <tr id='addr1'></tr>
	</tbody>
    </table>
     
     <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>-->
     
    
 </div>
</div>


<div class="row">   
    <div class="form-group">
            
        <div class="col-lg-6 col-sm-6"> 
            {{ Form::label('observaciones', 'Observaciones') }}
            {{ Form::textarea('observaciones', Input::old('observaciones'), array('class' => 'form-control', 'rows' => '4')) }}
        </div>
            
        <div class="form-group">
            <label class="col-md-1 control-label" for="textinput">Subtotal</label> 
            <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-addon">$</div>
                {{ Form::text('subtotal', Input::old('subtotal'), array('class' => 'form-control', 'placeholder' => '0.00')) }}
            </div>
            </div>
           
            
            <label class="col-md-1 control-label" for="textinput">IVA</label>  
        <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-addon">$</div>
            {{ Form::text('iva', Input::old('iva'), array('class' => 'form-control', 'placeholder' => '0.00')) }}
            </div>
        </div>    
       
            <label class="col-md-1 control-label" for="textinput">Tributos</label>  
        <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-addon">$</div>
            {{ Form::text('tributos', Input::old('tributos'), array('class' => 'form-control', 'placeholder' => '0.00')) }}
            </div>
        </div>
            
            <label class="col-md-1 control-label" for="textinput">Total</label>  
        <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-addon">$</div>
            {{ Form::text('total', Input::old('total'), array('class' => 'form-control', 'placeholder' => '0.00')) }} 
            </div>
        </div> 
    </div>
    </div>
    
    </div>
  


    
   
          
 
<div class="row">
    <div class="col-sm-2">
{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
    </div>
</div>
{{ Form::close() }}

</div>



@section('scripts')
<script>
  $(document).ready(function(){
//      var i=1;
//     $("#add_row").click(function(){
//      $('#addr'+i).html("<td>\n\
//                            <input name='producto_id[]' type='text' placeholder='Cód. Prod.' class='form-control input-md'/> \n\
//                        </td>\n\
//                        <td>\n\
//                            <input name='producto_nombre[]' type='text' placeholder='Producto' class='form-control input-md'  /> \n\
//                        </td>\n\
//                        <td>\n\
//                            <input  name='importe[]' type='text' placeholder='Importe'  class='form-control input-md'>\n\
//                        </td>\n\
//                        <td>\n\
//                            <input  name='cantidad[]' type='text' placeholder='Cant.'  class='form-control input-md'>\n\
//                        </td>\n\
//                        <td>\n\
//                            <input  name='alicuota_id[]' type='text' placeholder='Alic. IVA'  class='form-control input-md'>\n\
//                        </td>\n\
//                        <td>\n\
//                            <input  name='alicuota_importe[]' type='text' placeholder='Imp. IVA'  class='form-control input-md'>\n\
//                        </td>\n\
//                        <td>\n\
//                            <input  name='total[]' type='text' placeholder='Cant.'  class='form-control input-md'>\n\
//                        </td>");
//      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
//      i++; 
//  });
//     $("#delete_row").click(function(){
//    	 if(i>1){
//		 $("#addr"+(i-1)).html('');
//		 i--;
//		 }
//	 });


</script>
@endsection

@stop