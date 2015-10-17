@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

<section clas="content">
    <div class="row">
        <div class="col-sm-9"></div>
            <span class="row">
                <a href="{{ URL::to('clientes/create') }}" class="btn btn-primary pull-right">+ Nuevo Cliente</a>
            </span>
        </div>
    
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
                            <div class="box-header">Clientes Registrados</div>

                            <div class="box box-body pad table-responsive">
                        
                                 <table id="clientes" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="clientes_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" aria-controls="clientes" aria-sort="ascending">#</th>
                                                <th class="sorting">Fec. Registro</th>
                                                <th class="sorting">Apellido</th>
                                                <th class="sorting">Nombres</th>
                                                <th class="sorting">Documento</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clientes as $key => $value)
                                            <tr class="odd" role="row">
                                                <td class="sorting_1">{{ $value->id }}</td>
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


                            </div>
			</div>
		</div>
	</div>
</section>

@endsection















