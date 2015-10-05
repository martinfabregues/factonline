@extends('layouts.default')
@section('content')
 <ol class="breadcrumb">
   <li><a href="#">Clientes</a></li> 
   <li class="active"><a href="#">Listado</a></li>   
 </ol>
 
<a href="{{ URL::to('clientes/create') }}" class="btn btn-sm btn-primary">Nuevo</a>
<p>
 <table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <td>#</td>
			<td>Fec. Registro</td>
            <td>Apellido</td>
            <td>Nombres</td>
			<td>Documento</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
			<td>{{ $value->fecharegistro }}</td>
            <td>{{ $value->apellido }}</td>
            <td>{{ $value->nombres }}</td>
			<td>{{ $value->documento }}</td>
            <td>
                <a class="btn btn-xs btn-default" href="{{ URL::to('clientes/' . $value->id . '/edit') }}">Editar</a>
                <a class="btn btn-xs btn-danger" href="{{ URL::to('clientes/' . $value->id) }}">Eliminar</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop