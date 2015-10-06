@extends('layouts.default')
@section('content')
 <ol class="breadcrumb">
 <li><a href="#">Facturación</a></li>
   <li class="active"><a href="#">Listado</a></li>   
 </ol>
 
<a href="{{ URL::to('facturas/create') }}" class="btn btn-sm btn-primary">Nuevo Comprobante</a>
<p>

 <table class="table table-condensed table-bordered">
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
            <td>{{ $value->fecha }}</td>
            <td>{{ $value->numerofactura }}</td>
            <td>{{ $value->tipocomprobante_id }}</td>
            <td>{{ $value->cliente_id }}</td>
            <td>{{ $value->total }}</td>
            <td>{{ $value->cae }}</td>
            <td>{{ $value->cae_vencimiento }}</td>
            <td>
                <a class="btn btn-xs btn-default" href="{{ URL::to('facturas/' . $value->id . '/edit') }}">Editar</a>
                <a class="btn btn-xs btn-danger" href="{{ URL::to('facturas/' . $value->id . '/edit') }}">Eliminar</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop