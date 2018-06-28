<?php

require "../model/controlusuario.php";

$persona= new persona();

$con=$persona->conectar();


$primernombre=$_POST["primernombre"];
$segundonombre=$_POST["segundonombre"];
$primerapellido=$_POST["primerapellido"];
$segundoapellido=$_POST["segundoapellido"];
$idtipodocumento=$_POST["idtipodocumento"];
$documento=$_POST["documento"];
$correoelectronico=$_POST["correoelectronico"];
$contrasena=$_POST["contrasena"];
$repcontrasena=$_POST["repcontrasena"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$celular=$_POST["celular"];



$pw_en = password_hash($contrasena, PASSWORD_DEFAULT,array("cost"=>12));

$idrol=$_POST["idrol"];
$idestado=$_POST["idestado"];
$idturno=$_POST["turno"];



if ($contrasena==$repcontrasena) {




$sql="INSERT INTO persona (primernombre,segundonombre,primerapellido,segundoapellido,idtipodocumento,documento,correoelectronico,contrasena,direccion,telefono,celular,idestado) 

values 

('$primernombre','$segundonombre','$primerapellido','$segundoapellido',$idtipodocumento,$documento,'$correoelectronico','$pw_en','$direccion',$telefono,$celular,$idestado)";



$obj = new persona();

$obj -> actualizar2($sql);


$obj = new persona();


$datosadm= $obj->consultar("select * from persona where documento = $documento ");

foreach ($datosadm as $fila ){

$id=$fila["id"];


}



$sql="INSERT INTO vigilante (id,idrol,idturno) 

values 

($id,$idrol,$idturno)";


$obj = new persona();

$obj -> actualizar($sql);





}else{

	
$obj = new persona();



echo $obj -> notificarerror();


}








?>