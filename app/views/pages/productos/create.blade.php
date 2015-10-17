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
        <div class="x_panel" style="height:100%;">
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
                
                <ul>
                @foreach($errors->all() as $error)
                <div class="alert alert-danger fade in" role="alert">{{ $error }}</div>
                @endforeach
                </ul>
                {{ Form::open(array('action' => 'ProductoController@store')) }}

                <div class="form-group">
                    {{ Form::label('codigo', 'Código') }}
                    {{ Form::text('codigo', Input::old('codigo'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('categoria_id', 'Categoria') }}
                    {{ Form::select('categoria_id', $categorias, null, array('class' => 'form-control', 'style' => '' )) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('nombre', 'Nombre de Producto') }}
                    {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('importe', 'Importe') }}
                    {{ Form::text('importe', Input::old('importe'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('alicouta_id', 'Álicuota Iva') }}
                    {{ Form::select('alicuota_id', $alicuotas, null, array('class' => 'form-control', 'style' => '' )) }}
                </div>

                <div class="form-group">
                    {{ Form::label('activo', 'Activo') }}
                    {{ Form::checkbox('activo', null, true) }}
                </div>

                {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
                
            </div>
        </div>
    </div>
</div>
@endsection


