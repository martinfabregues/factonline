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
               <div class="alert alert-danger alert-dismissible" role="alert">{{ $error }}
                   <button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
               </div>
               @endforeach
               </ul>
               {{ Form::open(array('action' => 'ClienteController@store')) }}

                <div class="form-group">
                    {{ Form::label('apellido', 'Apellido') }}
                    {{ Form::text('apellido', Input::old('apellido'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('nombres', 'Nombres') }}
                    {{ Form::text('nombres', Input::old('nombres'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('tipodocumento_id', 'Tipo Documento') }}
                    {{ Form::select('tipodocumento_id', $tiposdocumento, null, array('class' => 'form-control', 'style' => '' )) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('documento', 'Documento') }}
                    {{ Form::text('documento', Input::old('documento'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('condicioniva_id', 'Cond. Iva') }}
                    {{ Form::select('condicioniva_id', $condicionesiva, null, array('class' => 'form-control', 'style' => '' )) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('direccion', 'Dirección') }}
                    {{ Form::text('direccion', Input::old('direccion'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('numero', 'Numeración') }}
                    {{ Form::text('numero', Input::old('numero'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('piso', 'Piso') }}
                    {{ Form::text('piso', Input::old('piso'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('departamento', 'Depto') }}
                    {{ Form::text('departamento', Input::old('departamento'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('barrio', 'Barrio') }}
                    {{ Form::text('barrio', Input::old('barrio'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('telefono', 'Telefono') }}
                    {{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control')) }}
                </div>

                    <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
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
