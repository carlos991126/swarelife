<?php

session_start();

		
	
require "../model/controlusuario.php";

                            $obj = new persona();

      $con=$obj->conectar();

			
			
			$color = $_POST['color'];
$placa = $_POST['placa'];
$estado = $_POST['estado'];



           
                        $consulta="UPDATE vehiculo set color='$color', idestado='$estado' WHERE placa = '$placa'";

            
                        // $sql='UPDATE usuario SET nombre= "carlos" ,  apellido= "hernandez"   WHERE documento = "1022447420"';


                        mysqli_query($con,$consulta);





				
				







			





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

