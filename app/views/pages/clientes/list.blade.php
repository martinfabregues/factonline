@extends('layouts.theme')

@section('main-content') 

<div class="page-title">
    <div class="title_left">
        <h3>Clientes <small> Clientes Registrados</small></h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
<!--            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>-->
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2>Listado de Clientes</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                
                <div class="clearfix"></div>
                
            </div>
            <div class="x-content">
                
                <span class="row">
                    <a href="{{ URL::to('clientes/create') }}" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</a>
                </span>
                
                <div class="row">
                    
                    <table id="clientes" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr role="headings">
                                                <th class="column-title">#</th>
                                                <th class="column-title">Fec. Registro</th>
                                                <th class="column-title">Apellido</th>
                                                <th class="column-title">Nombres</th>
                                                <th class="column-title">Documento</th>
                                                <th>Acciones</th>
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
                                                    <a class="btn btn-xs btn-default" href="{{ URL::to('clientes/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                                    <a class="btn btn-xs btn-danger" href="{{ URL::to('clientes/' . $value->id) }}"><span class="glyphicon glyphicon-remove"></span></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
  
  alert('hola');
  
}); 
</script>
@endsection








