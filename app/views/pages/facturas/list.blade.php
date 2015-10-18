@extends('layouts.theme')

@section('main-content') 

<div class="page-title">
    <div class="title_left">
        <h3>Comprobantes <small> Comprobantes Emitidos</small></h3>
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
        <div class="x_panel" style="height:800px;">
            <div class="x_title">
                <h2>Listado de Comprobantes</h2>
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
                    <a href="{{ URL::to('facturas/create') }}" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-plus"></span> Nuevo Comprobante</a>
                </span>
                
                <div class="row">
                    
                    <table id="comprobantes" class="table table-striped responsive-utilities jambo_table">
                       
                        <thead>
                            <tr role="headings">
                                <th class="column-title">Fecha</th>
                                <th class="column-title">Nro. Comprobante</th>
                                <th class="column-title">Tipo Comp.</th>
                                <th class="column-title">Cliente</th>
                                <th class="column-title">Total</th>
                                <th class="column-title">CAE</th>
                                <th class="column-title">CAE Venc.</th>
                                <th class="column-title">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($facturas as $key => $value)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($value->fecha)) }}</td> 
                                <td>{{ str_pad($value->PuntoVenta->codigoafip, 4, '0', STR_PAD_LEFT) . '-'. str_pad($value->numerofactura, 8, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $value->TipoComprobante->tipo_comprobante }}</td>
                                <td>{{ $value->Cliente->apellido . ', ' . $value->Cliente->nombres }}</td>
                                <td>{{ $value->total }}</td>
                                <td>{{ $value->cae }}</td>
                                <td>{{ $value->cae_vencimiento->format('d-m-Y') }}</td>
                                <td>
                                    <a class="btn btn-xs btn-default" href="{{ URL::to('facturas/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a class="btn btn-xs btn-danger" href="{{ URL::to('facturas/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-remove"></span></a>
                                    <a class="btn btn-xs btn-info" href="{{ URL::to('facturas/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-print"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    
                </div>
                <div class="row top-buffer pull-right">{{ $facturas->links() }}</div>
                
            </div>
        </div>
    </div>
</div>
@endsection




