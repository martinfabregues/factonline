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
                        <div class="row">

                                    <div class="col-md-4">
                                        {{ Form::label('cliente_id', 'Cliente') }}
                                        {{ Form::select('cliente_id', [null => 'Selecciona un Cliente'] + $clientes, null, array('class' => 'form-control select2', 'style' => '' )) }}
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

<div class="row">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Detalle</h3>
            <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Cantidad</th>
                                            <th>Detalle</th>
                                            <th>Precio Unit.</th>
                                            <th>IVA</th>
                                            <th>Imp. IVA</th>
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
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a class="btn btn-xs btn-danger" href="">Eliminar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                
                <a href="" class="btn btn-primary btn-sm">+ Agregar Item</a>
        </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tributos</h3>
            <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Tributo</th>
                                            <th>Detalle</th>
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
                                            <td></td>
                                            <td>
                                                <a class="btn btn-xs btn-danger" href="">Eliminar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                <a href="" class="btn btn-primary btn-sm">+ Agregar Tributo</a>
        </div>
        </div>
    </div>
    
</div>

                                
                                
                                
<div class="row">
     <div class="col-md-10"> 
                                    {{ Form::label('observaciones', 'Observaciones') }}
                                    {{ Form::textarea('observaciones', Input::old('observaciones'), array('class' => 'form-control', 'rows' => '4', 'Placeholder' => 'Observaciones')) }}
                                </div> 
    
    
</div>

<div class="row">
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
 
    $jQuery('.select2').select2()(jQuery);
</script>
@stop


