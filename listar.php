<?php 


require "../model/controlusuario.php";

$obj = new persona();



$datosper= $obj->consultar("select * from persona ");
$datosusu= $obj->consultar("select * from usuario ");
$datosadm= $obj->consultar("select * from administrador ");
$datosvig= $obj->consultar("select * from vigilante ");












 ?>