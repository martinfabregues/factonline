@extends('layouts.default')
@section('content')
 <ol class="breadcrumb">
   <li><a href="#">Productos</a></li> 
   <li class="active"><a href="#">Listado</a></li>   
 </ol>
 
<a href="{{ URL::to('productos/create') }}" class="btn btn-sm btn-primary">Nuevo</a>
<p>
 <table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <td>#</td>
            <td>Categoria</td>
            <td>Código</td>
            <td>Producto</td>
            <td>Importe</td>
            <td>Álicuota IVA</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->Categoria->categoria }}</td>
            <td>{{ $value->codigo }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->importe }}</td>
            <td>{{ $value->Alicuota->alicuota }}</td>
            <td>
                <a class="btn btn-xs btn-default" href="{{ URL::to('clientes/' . $value->id . '/edit') }}">Editar</a>
                <a class="btn btn-xs btn-danger" href="{{ URL::to('clientes/' . $value->id) }}">Eliminar</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop