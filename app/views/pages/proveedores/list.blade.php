@extends('layouts.default')
@section('content')
 <ol class="breadcrumb">
 <li><a href="#">Proveedores</a></li>
   <li class="active"><a href="#">Listado</a></li>   
 </ol>
 
<a href="{{ URL::to('proveedores/create') }}" class="btn btn-sm btn-primary">Nuevo</a>
<p>

 <table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <td>#</td>
            <td>Nombre</td>
            <td>Dirección</td>
            <td>Numeración</td>
			<td>Barrio</td>
			<td>Cuit</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($proveedores as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->numero }}</td>
			<td>{{ $value->barrio }}</td>
			<td>{{ $value->cuit }}</td>
            <td>
                <a class="btn btn-xs btn-default" href="{{ URL::to('proveedores/' . $value->id . '/edit') }}">Editar</a>
                <a class="btn btn-xs btn-danger" href="{{ URL::to('proveedores/' . $value->id ) }}">Eliminar</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop