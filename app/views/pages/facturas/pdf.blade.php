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
    font-size: 13px;
    width: 100%;
}

#datoscliente{
    clear:both;
    border-width: 1px;
    border-color: #000;
    border-style: solid;
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

#totales{
    padding-top: 500px;
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
<div>{{ $data->TipoComprobante->tipo_comprobante }}</div>
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

<div id="totales">
    <table>
<thead>
<tr>
    <th></th>
    <th></th>	

</tr>
</thead>
<tbody>
<tr>
	<td>Subtotal</td>
	<td>{{ $data->total }}</td>             
</tr>
<tr>
	<td>Iva</td>
	<td>{{ $data->iva }}</td>             
</tr>
<tr>
	<td>Tributos</td>
	<td>{{ $data->tributos }}</td>             
</tr>
<tr>
	<td>Total</td>
	<td>{{ $data->total }}</td>             
</tr>
    </tbody>
</table>
    
</div>


<div class="footer">
    <div>CAE N°: {{ $data->cae }}</div>
    <div>Vto. CAE: {{ $data->cae_vencimiento }}</div>
</div>



</body>
</html>