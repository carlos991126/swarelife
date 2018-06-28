<?php

session_start();
		require "../model/controlusuario.php";

                            $obj = new persona();

      $con=$obj->conectar();

			
			$correoelectronico = $_POST['correoelectronico'];
			$direccion = $_POST['direccion'];
			$telefono = $_POST['telefono'];
			$celular = $_POST['celular'];
			$documento = $_POST['documento'];

			$contrasena2 = $_POST['contrasena2'];
			$contrasena3 = $_POST['contrasena3'];

			$pw_en = password_hash($contrasena2, PASSWORD_DEFAULT,array("cost"=>12));

			


						           





			if ($contrasena2=='' or $contrasena3=='') {
				


             echo $sql = $con->query("update persona set correoelectronico='$correoelectronico',direccion='$direccion',telefono=$telefono,celular=$celular where documento=$documento");




             	
             	echo "<SCRIPT LANGUAGE='javascript'> 
         alert('Contacto Actualizado'); 
     </SCRIPT> ";


     echo $documento;



			}elseif ($contrasena2==$contrasena3){


				
				 $obj = new persona();

      $con=$obj->conectar();


					$sql = $con->query("update persona set  correoelectronico='$correoelectronico',direccion='$direccion',telefono='$telefono',celular='$celular', contrasena='$pw_en' where documento=$documento");




             	


             	echo "<SCRIPT LANGUAGE='javascript'> 
         alert('Contacto Actualizado'); 
     </SCRIPT> ";






				}else{ 

					echo "<SCRIPT LANGUAGE='javascript'> 
         alert('Contrasena incorrecta'); 
     </SCRIPT> ";

				}
				



			
				
				







			





			//if ( $_POST['contrasena'] == $_POST['contrasena2'] ) 

             //	{
             		
             	//$sql = $mysqli->query("update usuario set nombre='$nombre', apellido='$apellido',contrasena='$pw_en', idrol=$rol,estado ='$estado' where documento=$documento");


                        // } else {

                      // $sql = $mysqli->query("update usuario set nombre='$nombre', apellido='$apellido', idrol=$rol,estado ='$estado' where documento=$documento");



                     // $sql2 = $mysqli->query("update vehiculo set estado ='$estado' where documento=$documento");


                       //             		$sql = $mysqli->query("update usuario setidrol=$rol, estado ='$estado' where documento=$documento");


                      //   }
	
?>	
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">

	 


