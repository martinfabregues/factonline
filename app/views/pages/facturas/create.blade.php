@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

<section clas="content">

    
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
                            <div class="box-header">Registrar Comprobante</div>

                            <div class="box box-body pad table-responsive">
{{ Form::open(array('url' => 'facturas')) }}



<div class="row">
                                <div class="col-md-3">
                                    {{ Form::label('tipocomprobante_id', 'Tipo Comprobante') }}
                                    {{ Form::select('tipocomprobante_id', $tiposcomprobante, null, array('class' => 'form-control', 'style' => '' )) }}
                                </div>

                                <div class="col-md-3">
                                    {{ Form::label('concepto_id', 'Tipo Concepto') }}
                                    {{ Form::select('concepto_id', $conceptos, null, array('class' => 'form-control', 'style' => '' )) }}
                                </div>



                                <div class="col-md-3">
                                    {{ Form::label('puntoventa_id', 'Punto de Venta') }}
                                    {{ Form::select('puntoventa_id', $puntosventa, null, array('class' => 'form-control', 'style' => '' )) }}
                                </div>

                                
                                <div class="col-md-3">
                                    {{ Form::label('formapago_id', 'Forma de Pago') }}
                                    {{ Form::select('formapago_id', $formaspago, null, array('class' => 'form-control', 'style' => '' )) }}
                                </div>
                    </div>
                        <div class="row top-buffer">
                            <div class="col-md-4">
                                    
                                        
                                        {{ Form::label('cliente_id', 'Cliente') }}
                                        <!--{{ Form::select('cliente_id', [null => 'Selecciona un Cliente'] + $clientes, null, array('class' => 'select2', 'style' => 'width:100%;' )) }}-->
                                        <!--<select id="cliente_id" name="cliente_id" placeholder="Selecciona un Cliente" class="select2-cliente" style="width:100%;"></select>-->
                                        <input type="hidden" id="cliente_id" class="select2-cliente" style="width:100%;" name="cliente_id"/>
                                        
                                    </div>


                                <div class="col-md-3">
                                    {{ Form::label('fecha', 'Fecha Emisión') }}
                                    {{ Form::text('fecha', Input::old('fecha'), array('id' => 'datepicker', 'class' => 'form-control', 'Placeholder' => 'Fecha')) }}
                                </div>
<!--                                    <div class="form-group">
                                        {{ Form::label('tipodocumento_id', 'Tipo Documento') }}
                                        {{ Form::select('tipodocumento_id', $tiposdocumento, null, array('class' => 'form-control', 'style' => '' )) }}
                                    </div>
 
                                    <div class="form-group">
                                        {{ Form::label('documento', 'Nro. Documento') }}
                                        {{ Form::text('documento', Input::old('documento'), array('class' => 'form-control', 'placeholder' => 'Nro. Documento')) }}
                                    </div>
                         
                                    <div class="form-group">
                                        {{ Form::label('condicioniva_id', 'Cond. IVA') }}
                                        {{ Form::select('condicioniva_id', $condicionesiva, null, array('class' => 'form-control', 'style' => '' )) }}
                                    </div>-->
                                  
                                    
                        </div>

<div class="row top-buffer">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Detalle</h3>
            <div class="box-body table-responsive no-padding">
<table class="table table-hover det">
    <tbody>
        <tr>
            <th class="col-md-1">Cantidad</th>
            <th class="col-md-5">Detalle</th>
            <th>Imp. Unit.</th>
            <th>Alicuota</th>
            <th>Imp. IVA</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
        <tr>
            <td>
                {{ Form::text('cantidad[]', '1', array('id' => 'cantidad0', 'class' => 'form-control', 'placeholder' => 'Cant.', 'value' => '1')) }}
            </td>
            <td>
                <!--<select id="producto_id0" name="producto_id[]" placeholder="Selecciona un Producto" class="select2-select" style="width:100%; height:100%;"></select>-->
                <input type="hidden" id="producto_id0" name="producto_id[]" class="select2-select" style="width:100%;"/>
            </td>
            <td>
               {{ Form::text('importe_unitario[]', '0.00', array('id' => 'importe_unitario0', 'class' => 'form-control', 'placeholder' => 'Imp. Unit.')) }}
            </td>
            <td>
                {{ Form::select('alicuota_id[]', $alicuotas, null, array('id' => 'alicuota_id0', 'class' => 'select2-alicuota', 'style' => '' )) }}
            </td>
            <td>
                {{ Form::text('importe_iva[]', '0.00', array('id' => 'importe_iva0', 'class' => 'form-control', 'placeholder' => 'Imp. IVA')) }}
            </td>
            <td>
                {{ Form::text('total_producto[]', '0.00', array('id' => 'total_producto0', 'class' => 'form-control', 'placeholder' => 'Total')) }}
            </td>
            <td>
                <a class="btn btn-xs btn-danger" href="">X</a>
            </td>
        </tr>
    </tbody>
</table>
                <span class="row top-buffer">
                    <a href="#" class="btn btn-primary btn-sm addline" id="addline">+ Agregar Item</a>
                </span>
        </div>
        </div>
    </div>
    
</div>

<div class="row top-buffer">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tributos</h3>
            <div class="box-body table-responsive no-padding tributos">
    <table class="table table-hover tributos" id="tributos">
                                    <thead>
                                        <tr role="row">
                                            <th class="col-sm-5">Tributo</th>
                                            <th>Base Imp.</th>
                                            <th>Alicuota %</th>
                                            <th>Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                  
                                        <tr>
                                            <td></td> 
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a class="btn btn-xs btn-danger" href="">Eliminar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                <span class="row top-buffer">
                    <a href="" class="btn btn-primary btn-sm">+ Agregar Tributo</a>
                </span>
        </div>
        </div>
    </div>
    
</div>

                                
                                
                                
<div class="row top-buffer">
     <div class="col-md-10"> 
                                    {{ Form::label('observaciones', 'Observaciones') }}
                                    {{ Form::textarea('observaciones', Input::old('observaciones'), array('class' => 'form-control', 'rows' => '4', 'Placeholder' => 'Observaciones')) }}
                                </div> 
    
    
</div>

<div class="row top-buffer">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Totales</h3>
            <div class="box-body table-responsive no-padding">
    
                
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
        </div>
    </div>
    
</div>
                                

<div class="row">
    
 <div class="col-md-3">

{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
 </div>

{{ Form::close() }}

</div>




                            </div>
			</div>
		</div>
	</div>
</section>

@stop

@section('scripts')
<script>

 //CLONAR FILA DE TABLA Y BINDEAR FUNCION DE BUSQUEDA EN SELECTS   
$(document).on('click', '.addline', function () {
    var $tr = $('.det tr').last();
    var $lastTr = $tr.closest('.det').find('tr:last');

    $lastTr.find('.select2-select').select2('destroy');

    var $clone = $lastTr.clone(true);

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
//    $lastTr.find('.select2-select').select2();
//    $clone.find('.select2-select').select2();


$('.select2-select').select2({
    placeholder: "Seleccione un Producto",
    ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
        url: "../productos/findproducto",
        dataType: 'json',
        quietMillis: 250,
        data: function (term, page) {
            return {
                q: term // search term
            };
        },
        results: function (data, page) { // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to alter the remote JSON data
            return { results: data };
        }
    }

});
});


//FUNCION DE BUSQUEDA EN EL SELECT DE LA PRIMERA FILA
$('.select2-select').select2({
    placeholder: "Seleccione un Producto",
    ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
        url: "../productos/findproducto",
        dataType: 'json',
        quietMillis: 250,
        data: function (term, page) {
            return {
                q: term // search term
            };
        },
        results: function (data, page) { // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to alter the remote JSON data
            return { results: data };
        }
    }

});

//FUNCION DE BUSQUEDA DE CLIENTES
$('.select2-cliente').select2({
    placeholder: "Seleccione un Cliente",
        ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
        url: "../clientes/findcliente",
        dataType: 'json',
        quietMillis: 250,
        data: function (term, page) {
            return {
                q: term // search term
            };
        },
        results: function (data, page) { // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to alter the remote JSON data
            return { results: data };
        }
    }
    
    

});

</script>
@stop


