@extends('layouts.default')
@section('content')
 <ol class="breadcrumb">
 <li><a href="#">Facturación</a></li>
   <li class="active"><a href="#">Listado</a></li>   
 </ol>
 
<a href="{{ URL::to('facturas/create') }}" class="btn btn-sm btn-primary">Nuevo Comprobante</a>
<p>

 <table class="table table-hover">
    <thead>
        <tr>
            <td>Fecha</td>
            <td>Nro. Comprobante</td>
            <td>Tipo Comp.</td>
            <td>Cliente</td>
            <td>Total</td>
            <td>CAE</td>
            <td>CAE Venc.</td>
            <td>Acciones</td>
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

@stop