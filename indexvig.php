
<?php 

require "../model/controlusuario.php";

 session_start();

    if(isset($_SESSION['vigilante'])){



                $doc=$_SESSION['vigilante'];

                


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>CRUD php Mysql + bootstrap</title>
  <link rel="stylesheet" href="../view/css/bootstrap.min.css">
  <link rel="stylesheet" href="../view/../view/css/estilos.css">  
  <script src="../view/js/metodos.js"></script>
</head>
<body background="../view/img/images2.jpg">

<body>
  <header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
            <span class="sr-only">Desplegar / Ocultar Menu</span> 
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">Vigilante</a>
        </div>
        <div class="collapse navbar-collapse" id="navegacion-fm">
          <ul class="nav navbar-nav">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>             
            <li><a href="cerrars.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>      
            <li><a href="indexvig2.php"><span class="glyphicon glyphicon-pencil"></span>Modificar datos</a></li>           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php               
              echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> ".$doc."</a></li>";
            ?>              
            </ul>     
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <div class="row"> 
  

   <center>

        
     

          <br>
  
        <br>

      <table class='table'>
        <br>

        <center><h2>Registro de ingreso y salida</h2></center>

        <br>

        
          
<form action="" method="POST">


      
                            <label for="direccion">placa:</label>
                            <input class="form-control" size="40" id="placa" name="placa" type="text" placeholder="placa" required=""></input><br>

<center>
                            <input class="btn btn-success"  id="ingreso" name="ingreso" type="submit" placeholder="Ingreso" value="ingreso" >
                            <br>  <br>
                            <input class="btn btn-danger"  id="salio" name="salio" type="submit" placeholder="Salio" value="salio" >
                            <br>
                            <br><br>

</center>
</form>

<center>

                            <?php  



 if(isset($_POST['ingreso']))
        {






                            $obj = new persona();

      $con=$obj->conectar();



$accion='Ingreso';



ini_set('date.timezone', 'America/Bogota');


$fecha = date('Y-m-d', time());
$hora = date('H:i:s', time());

$placa = $_POST['placa'];




$query = "SELECT count(*) as placa from vehiculo where placa = '$placa'";


$obj = new persona();

      $con=$obj->conectar();

if ($result = mysqli_query($con, $query)) {

    $data=mysqli_fetch_assoc($result);

    $contador= $data['placa'];

}
mysqli_close($con);



     if ($contador<1) {


      echo "<SCRIPT LANGUAGE='javascript'> 
            alert('Este vehiculo no se encuentra registrado'); 
            </SCRIPT> ";




     }else{

$query = "SELECT count(*) as placa from estacionamiento where placa = '$placa' and fechaingreso = '$fecha'";





                            $obj = new persona();

      $con=$obj->conectar();


if ($result = mysqli_query($con, $query)) {

    $data=mysqli_fetch_assoc($result);

    $contador= $data['placa'];

}
mysqli_close($con);



if ($contador>='1') {


 echo "<SCRIPT LANGUAGE='javascript'> 
            alert('Ya se ha ingresado un vehiculo'); 
            </SCRIPT> ";

}else{

 $obj = new persona();

      $con=$obj->conectar();
$asd = "";

$consulta= "SELECT * FROM vehiculo where placa='$placa'";


            if ($resultado = $con->query($consulta)) 
            {
                while ($fila = $resultado->fetch_row()) 
                {                   
                    $id=$fila[0];

                  }

                }




$sql=$con->query("INSERT INTO estacionamiento  Values ($id,'$placa','$hora','$fecha',$doc,'$asd','$asd','$asd',1) ");  


        echo "<SCRIPT LANGUAGE='javascript'> 
            alert('Ingreso correctamente'); 
            </SCRIPT> ";
          }

}



}elseif (isset($_POST['salio'])) {



$accion='Salio';



ini_set('date.timezone', 'America/Bogota');



$fecha = date('Y-m-d', time());
$hora = date('H:i:s', time());

$placa = $_POST['placa'];




 $query = "SELECT count(*) as placa from vehiculo where placa = '$placa'";

                            $obj = new persona();

      $con=$obj->conectar();


if ($result = mysqli_query($con, $query)) {

    $data=mysqli_fetch_assoc($result);

    $contador= $data['placa'];

}
mysqli_close($con);


     if ($contador<1) {


      echo "<SCRIPT LANGUAGE='javascript'> 
            alert('Este vehiculo no se encuentra registrado'); 
            </SCRIPT> ";




     }else{

       $obj = new persona();

      $con=$obj->conectar();


$query = "SELECT count(*) as placa from estacionamiento where placa = '$placa' and fechasalida = '$fecha'";

if ($result = mysqli_query($con, $query)) {

    $data=mysqli_fetch_assoc($result);

    $contador= $data['placa'];

}
mysqli_close($con);



if ($contador>='1') {


 echo "<SCRIPT LANGUAGE='javascript'> 
            alert('Este vehiculo ya no se encuentra en el estacionamiento'); 
            </SCRIPT> ";

}else{

 $obj = new persona();

      $con=$obj->conectar();

$sql = $con->query("update estacionamiento set horasalida='$hora', fechasalida ='$fecha', encargadoSalida ='$doc', idaccion = '2'  where placa='$placa' and  fechaingreso ='$fecha'");

        echo "<SCRIPT LANGUAGE='javascript'> 
            alert('Salio correctamente'); 
            </SCRIPT> ";

}}



}
           


  


?>
           </center>                  
      
  

          </table>
    </div> 



    







       



  </div>
  <script src="../view/../view/js/jquery.min.js"></script>
  <script src="../view/js/bootstrap.min.js"></script>   
  
  
</body>
</html>
<?php
    }

    else
    {
        ?>
         <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../view/loginadm.php">
         <?php
    }
?>