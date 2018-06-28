<?php

		include '../model/controlusuario.php';


		$persona= new persona();

$con=$persona->conectar();

		
	
			$primernombre=$_POST["primernombre"];
$segundonombre=$_POST["segundonombre"];
$primerapellido=$_POST["primerapellido"];
$segundoapellido=$_POST["segundoapellido"];
$documento=$_POST["documento"];
$correoelectronico=$_POST["correoelectronico"];
$contrasena=$_POST["contrasena"];
$repcontrasena=$_POST["repcontrasena"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$celular=$_POST["celular"];
$idestado=$_POST["estado"];

echo $documento;




$pw_en = password_hash($contrasena, PASSWORD_DEFAULT,array("cost"=>12));

			



if ($_POST['contrasena'] =='') {

                   $sql = $con->query("update persona set primernombre='$primernombre',segundonombre='$segundonombre',primerapellido='$primerapellido',segundoapellido='$segundoapellido',correoelectronico='$correoelectronico',direccion='$direccion',telefono=$telefono, celular=$celular, idestado=$idestado where documento=$documento");


                         }else{

                         

								if ( $_POST['contrasena'] == $_POST['repcontrasena'] ) 

             					{
             		
             					$sql = $con->query("update persona set primernombre='$primernombre',segundonombre='$segundonombre',primerapellido='$primerapellido',segundoapellido='$segundoapellido',correoelectronico='$correoelectronico',direccion='$direccion',telefono=$telefono, celular=$celular, idestado=$idestado, contrasena='$pw_en' where documento=$documento");

             		
                        }

                         }



			 
	
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Contacto Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar2.php">




