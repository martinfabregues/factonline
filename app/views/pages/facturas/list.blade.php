@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

<section clas="content">
    <div class="row">
        <div class="col-sm-9"></div>
            <div class="col-sm-2">
                <a href="{{ URL::to('facturas/create') }}" class="btn btn-primary pull-right">+ Nuevo Comprobante</a>
            </div>
        </div>
    
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
                            <div class="box-header">Comprobantes Registrados</div>

                            <div class="box box-body pad table-responsive">
                        
                                 <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="clientes_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Fecha</th>
                                            <th>Nro. Comprobante</th>
                                            <th>Tipo Comp.</th>
                                            <th>Cliente</th>
                                            <th>Total</th>
                                            <th>CAE</th>
                                            <th>CAE Venc.</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($facturas as $key => $value)
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($value->fecha)) }}</td> 
                                            <td>{{ str_pad($value->PuntoVenta->codigoafip, 4, '0', STR_PAD_LEFT) . '-'. str_pad($value->numerofactura, 8, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $value->TipoComprobante->tipo_comprobante }}</td>
                                            <td>{{ $value->Cliente->apellido . ', ' . $value->Cliente->nombres }}</td>
                                            <td>{{ $value->total }}</td>
                                            <td>{{ $value->cae }}</td>
                                            <td>{{ $value->cae_vencimiento->format('d-m-Y') }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-default" href="{{ URL::to('facturas/' . $value->id . '/edit') }}">Editar</a>
                                                <a class="btn btn-xs btn-danger" href="{{ URL::to('facturas/' . $value->id . '/edit') }}">Eliminar</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
			</div>
		</div>
	</div>
</section>


@endsection



