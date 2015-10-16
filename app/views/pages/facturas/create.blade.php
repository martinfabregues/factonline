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
                                        {{ Form::select('cliente_id', [null => 'Selecciona un Cliente'] + $clientes, null, array('class' => 'select2', 'style' => 'width:100%;' )) }}
                                  
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
    <table class="table table-hover detalles" id="detalles">
                                    <thead>
                                        <tr role="row">
                                            <th class="col-md-1">Cantidad</th>
                                            <th class="col-md-5">Detalle</th>
                                            <th>Precio Unit.</th>
                                            <th>IVA</th>
                                            <th>Imp. IVA</th>
                                            <th>Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                  
                                        <tr>
                                            <td>{{ Form::text('cantidad', Input::old('cantidad'), array('class' => 'form-control bfh-number', 'placeholder' => 'Cant.')) }}</td> 
                                            <td>{{ Form::select('producto_id', $productos, null, array('class' => 'select2', 'style' => 'width:100%;' )) }}</td>
                                            <td>{{ Form::text('importe_unitario', Input::old('importe_unitario'), array('class' => 'form-control', 'placeholder' => 'Imp. Unit.')) }}</td>
                                            <td>{{ Form::select('alicuota_id', $alicuotas, null, array('class' => 'select2', 'style' => 'width:100%;' )) }}</td>
                                            <td>{{ Form::text('importe_iva', Input::old('importe_iva'), array('class' => 'form-control', 'placeholder' => 'Imp. IVA')) }}</td>
                                            <td>{{ Form::text('total', Input::old('total'), array('class' => 'form-control', 'placeholder' => 'Total')) }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-danger" href="">Eliminar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                <span class="row top-buffer">
                    <a href="#" class="btn btn-primary btn-sm btnagregarfila" id="btnagregarfila">+ Agregar Item</a>
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
    $('.select2').select2();
    
    $(document).ready(function(){
        $('#detalles').DataTable({
            paging: false,
            searching: false,
            "bInfo": false
        });
        
        $('#tributos').DataTable({
            paging: false,
            searching: false,
            "bInfo": false
        });
        
        var t = $('#detalles').DataTable();
        var counter = 1;
        $('#btnagregarfila').on( 'click', function () {
            t.row.add( [
                '<td><input type="text" name="cantidad" class="form-control"/></td>',
                '<td></td>',
                '<td><input type="text" name="importe_unitario" class="form-control"/></td>',
                '<td><select name="alicuota_id" id="select2iva" class="select2" style="width=100%;"></select></td>',
                '<td><input type="text" name="importe_iva" class="form-control"/></td>',
                '<td><input type="text" name="total" class="form-control"/></td>',
                '<td><a class="btn btn-xs btn-danger" href="">Eliminar</a></td>'
            ] ).draw( false );
            
            $('#select2prod').select2();
            $('#select2iva').select2();
            
            counter++;
        });
        
       
    });
</script>
@stop


