<?php 

require "../model/controlusuario.php";

session_start();  

$persona= new persona();


$con=$persona->conectar();


$correo=$_POST["correo"];
$contrasena=$_POST["contrasena"];

$rol=$_POST["idrol"];



$obj = new persona();

$datosadm= $obj->consultar("select * from persona where correoelectronico = '$correo'");

foreach ($datosadm as $fila ){


$verificacion = $fila['contrasena'];

$documento=$fila['documento'];

$id=$fila['id'];

$idestado=$fila['idestado'];


}


if(isset($correo) && !empty($correo) &&
       isset($contrasena) && !empty($contrasena))
    {


               $login=htmlentities(addslashes($_POST["correo"]));
    
                $password=htmlentities(addslashes($_POST["contrasena"]));

if ($rol==3) {

$obj = new persona();

$datosadm= $obj->consultar("select * from vigilante where id = $id");

foreach ($datosadm as $fila ){


$idrol = $fila['idrol'];

}

if ($idrol==3) {



if(password_verify($contrasena,$verificacion) )
            {
                $_SESSION['vigilante'] = $documento  ;


                if ($idestado==1) {

                    header('location: indexvig.php');
                    
                }else{

                   $obj = new persona();



echo $obj -> validar();
        
                }

                echo "     <META HTTP-EQUIV='Refresh' CONTENT='0; URL=../view/loginadm.php'>
";

            } else{



$obj = new persona();



echo $obj -> notificarerror();
echo "     <META HTTP-EQUIV='Refresh' CONTENT='0; URL=../view/loginadm.php'>
";


                }

            }else{

                $obj = new administrador();



echo $obj -> buscar();

            }


}elseif ($rol==2) {

   
   $obj = new persona();

$datosadm= $obj->consultar("select * from administrador where id = $id");

foreach ($datosadm as $fila ){


$idrol = $fila['idrol'];


}

if ($idrol==2) {


if(password_verify($contrasena,$verificacion))
            {
                $_SESSION['administrador'] = $documento  ;


                if ($idestado==1) {

                    header('location: listarx.php');
                    
                }else{

                    $obj = new persona();


echo $obj -> validar();
echo "     <META HTTP-EQUIV='Refresh' CONTENT='0; URL=../view/loginadm.php'>
";

                    
                }



            } else{


$obj = new persona();



echo $obj -> notificarerror();
echo "     <META HTTP-EQUIV='Refresh' CONTENT='0; URL=../view/loginadm.php'>
";


                }

                }else{
$obj = new administrador();


echo $obj -> buscar();

            }
    
}

    }else{
      

      echo "<script>
alert('Debes llenar ambos campos');
window.location= '../view/loginadm.php';
</script>";
    }


 ?>