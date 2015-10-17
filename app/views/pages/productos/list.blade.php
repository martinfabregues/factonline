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
        <div class="x_panel" style="height:800px;">
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
                    <a href="{{ URL::to('productos/create') }}" class="btn btn-primary pull-right">+ Nuevo Producto</a>
                </span>
                
                <div class="row">
                    
                    <table id="productos" class="table table-striped responsive-utilities jambo_table">
                       
                        <thead>
                            <tr role="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">Categoria</th>
                                <th class="column-title">Código</th>
                                <th class="column-title">Producto</th>
                                <th class="column-title">Importe</th>
                                <th class="column-title">Álicuota IVA</th>
                                <th class="column-title">Acciones</th>
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
