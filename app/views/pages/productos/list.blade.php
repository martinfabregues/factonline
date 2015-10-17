@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

<section clas="content">
    <div class="row">
        <div class="col-sm-9"></div>
            <span class="row">
                <a href="{{ URL::to('productos/create') }}" class="btn btn-primary pull-right">+ Nuevo Producto</a>
            </span>
        </div>
    
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
                            <div class="box-header">Productos Registrados</div>

                            <div class="box box-body pad table-responsive">
                        
                                  <table class="table table-bordered table-hover dataTable">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Categoria</th>
                                                <th>Código</th>
                                                <th>Producto</th>
                                                <th>Importe</th>
                                                <th>Álicuota IVA</th>
                                                <th>Acciones</th>
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


                            </div>
			</div>
		</div>
	</div>
</section>

@endsection


