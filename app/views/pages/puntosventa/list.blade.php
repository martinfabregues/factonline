@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')

<section clas="content">
    <div class="row">
        <div class="col-sm-9"></div>
            <span class="row">
                <a href="{{ URL::to('puntosventa/create') }}" class="btn btn-primary pull-right">+ Nuevo Punto de Venta</a>
            </span>
        </div>
    
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
                            <div class="box-header">Puntos de Venta Registrados</div>

                            <div class="box box-body pad table-responsive">
                        
          <table class="table table-bordered table-hover dataTable" role="grid">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Numeración</th>
            <th>Barrio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($puntos as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->numero }}</td>
			<td>{{ $value->barrio }}</td>
            <td>
                <a class="btn btn-xs btn-default" href="{{ URL::to('puntosventa/' . $value->id . '/edit') }}">Editar</a>
                <a class="btn btn-xs btn-danger" href="{{ URL::to('puntosventa/' . $value->id . '/edit') }}">Eliminar</a>

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










