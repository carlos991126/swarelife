<?php 

require "../model/controlusuario.php";

session_start();  


$persona= new persona();


$con=$persona->conectar();


$correo=$_POST["correo"];
$contrasena=$_POST["contrasena"];


$obj = new persona();

$datosadm= $obj->consultar("select * from persona where correoelectronico = '$correo'");

foreach ($datosadm as $fila ){


$verificacion = $fila['contrasena'];

$documento=$fila['documento'];

}


if(isset($correo) && !empty($correo) &&
       isset($contrasena) && !empty($contrasena))
    {


    	$login=htmlentities(addslashes($_POST["correo"]));
    
    $password=htmlentities(addslashes($_POST["contrasena"]));



    



            
            if(password_verify($contrasena, $verificacion))
            {
                $_SESSION['username'] = $documento  ;


                if ($fila['idestado']==1) {

                	header('location: index.php');
                	
                }else{

                	echo "<SCRIPT LANGUAGE='javascript'> 
         alert('Este usuario se encuentra en un estado inactivo'); 
         window.location= '../view/loginusu.php';

     </SCRIPT> ";

                	
                }



            } else{




                    echo "<SCRIPT LANGUAGE='javascript'> 
                    window.location= '../view/loginusu.php';

         alert('Clave incorrecta'); 
     </SCRIPT> ";

                }





            

    }else{
      

      echo "<script>
alert('Debes llenar ambos campos');
window.location= '../view/loginusu.php';
</script>";
    }


 ?>