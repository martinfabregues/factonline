@extends('layouts.theme')

@section('main-content') 

<div class="page-title">
    <div class="title_left">
        <h3>Plain Page</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2>Plain Page</h2>
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
                    <a href="{{ URL::to('proveedores/create') }}" class="btn btn-primary pull-right">+ Nuevo Proveedor</a>
                </span>
                
                <div class="row">
                    
                    <table id="proveedores" class="table table-striped responsive-utilities jambo_table">
                         
                        <thead class="headings">
                            <tr>
                                <th class="column-title">#</th>
                                <th class="column-title">Nombre</th>
                                <th class="column-title">Dirección</th>
                                <th class="column-title">Numeración</th>
                                <th class="column-title">Barrio</th>
                                <th class="column-title">Cuit</th>
                                <th class="column-title">Acciones</th>
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
                                    <a class="btn btn-xs btn-default" href="{{ URL::to('proveedores/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a class="btn btn-xs btn-danger" href="{{ URL::to('proveedores/' . $value->id ) }}"><span class="glyphicon glyphicon-remove"></span></a>

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

























