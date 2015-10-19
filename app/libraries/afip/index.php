<?php

include 'wsaa.class.php';
include 'wsfev1.class.php';

$wsaa = new WSAA();
$wsfe = new WSFEV1();

echo '\n Tipos Conceptos';

print_r($wsfe->FindTiposTributo());

$response = $wsfe->FindUltimoCompAutorizado(3, 6);
$ult_comp = $response->FECompUltimoAutorizadoResult->CbteNro;

$Ivas = array('AlicIva' => array('Id' => 3, 'BaseImp' => 850, 'Importe' => 0));

print_r($wsfe->CAESolicitar(1, 3, 6, 1, 96, 29964073, ($ult_comp + 1), ($ult_comp + 1), date("Y-m-d"), 850, 0, 850, 0, 0, 0, '', '', '', "PES", 1, null, null, $Ivas, null ));
?>