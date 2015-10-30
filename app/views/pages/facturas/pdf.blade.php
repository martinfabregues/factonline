<html>
<head>
    <style>
        
#columnaizquierda{
    float:left;

    width: 44%;
}

#columnaderecha{
    float:right;
    width:44%;
}

body{
    font-family: "Arial";
    font-size: 14px;
    width: 98%;
}

#datoscliente{
    clear:both;
}

#detalles{
    padding-top: 20px;
    width: 100%;
}

table{
    width: 100%;
    border-width: 1px;
    border-color: #666666;
    border-collapse: collapse;
}

th{
    border-width: 1px;
    padding:8px;
    border-style: solid;
    border-color: #666666;
    background-color: #dedede;
}

td{
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #666666;
    background-color: #ffffff;
}
    </style>
</head>
<body>



<!-- DIV COL-IZQ -->
<div id="columnaizquierda">
<div>[logo]</div>
<div>Razon Social</div>
<div>Domicilio</div>
<div></div>
</div> <!-- END DIV COL-IZQ -->

<!-- DIV COL-DER -->
<div id="columnaderecha">
<div>FACTURA</div>
<div>Punto Venta: {{ $data->PuntoVenta->codigoafip }} </div>
<div>Nro. Comprobante: {{ $data->numerofactura }} </div>
<div>Fecha Emision: {{ $data->fecha }}</div>
</div> <!-- END DIV COL-DER -->




<!-- DIV DATOSCLIENTE -->
<div id="datoscliente">

<div class="cliente-der">
<div> {{ $cliente->TipoDocumento->tipo_documento }}: {{ $cliente->documento }} </div>
<div> {{ $cliente->CondicionIva->condicion_iva }}</div>
<div>Condicion Venta:</div>
</div>

<div class="cliente-der">
<div>Cliente: {{ $cliente->apellido }}, {{ $cliente->nombres }}</div>
<div>Dirección: {{ $cliente->direccion }} {{ $cliente->numero }} {{ $cliente->piso }} {{ $cliente->departamento }} {{ $cliente->barrio }}</div>
</div>


</div> <!-- END DIV DATOSCLIENTE -->

<!-- DIV DETALLES -->
<div id="detalles">
<table>
<thead>
<tr>
	<th>Código</th>
	<th>Producto / Servicio</th>
	<th>Cantidad</th>
	<th>Imp. Unitario</th>
	<th>Subtotal</th>
	<th>Alicuota IVA</th>	
	<th>Subtotal c/IVA</th>
</tr>
</thead>
<tbody>


@foreach($detalle as $key => $value)
<tr>
	<td>{{ $value->producto->codigo }}</td>
	<td>{{ $value->producto->nombre }}</td>
	<td>{{ $value->cantidad }}</td>
	<td>{{ $value->importe }}</td>
	<td>{{ $value->total }}</td>
	<td>{{ $value->alicuota->alicuota }}</td>
	<td>{{ $value->total }}</td>
</tr>
@endforeach
</tbody>
</table>
</div> <!-- END DIV DETALLEs -->

<div class="footer">
    <div>CAE N°: {{ $data->cae }}</div>
    <div>Vto. CAE: {{ $data->cae_vencimiento }}</div>
</div>



</body>
</html>