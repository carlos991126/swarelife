
<?php
    

require "../model/controlusuario.php";


        session_start();

    if(isset($_SESSION['username'])){



                $doc=$_SESSION['username'];

            $sql="SELECT * FROM administrador WHERE documento= $doc ";


    



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>CRUD php Mysql + bootstrap</title>
    <link rel="stylesheet" href="../view/css/bootstrap.min.css">
    <link rel="stylesheet" href="../view/css/estilos.css">  
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
                    <a href="#" class="navbar-brand">Usuario</a>
                </div>
                <div class="collapse navbar-collapse" id="navegacion-fm">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>                         
                        <li><a href="cerrars.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>                        
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
    

   <center><h2>Datos de usuario</h2></center>
<br><br>
            <table class='table'>
                <br>

                

                <br>

                <tr>
                    <th>Id</th><th>Nombre</th><th>Apellido</th><th>Documento</th><th>Correo</th><th>Direccion</th><th>Celular</th><th>Editar</th>
                </tr>           
<?php

                            $obj = new persona();

      $con=$obj->conectar();
            $consulta= "SELECT * FROM persona where documento=$doc";


            if ($resultado = $con->query($consulta)) 
            {
                while ($fila = $resultado->fetch_row()) 
                {                   
                    echo "<tr>";
                    echo "<td>$fila[0] </td><td>$fila[1] $fila[2]</td><td>$fila[3] $fila[4]</td><td>$fila[6]</td><td>$fila[7]</td><td>$fila[9]</td><td>$fila[10]</td>";   
                    echo"<td>";



                    


                    echo "<a data-toggle='modal' data-target='#editUsu' data-primernombre='" .$fila[0] ."' data-segundonombre='" .$fila[1] ."' data-primerapellido='" .$fila[2] ."' data-segundoapellido='" .$fila[3] ."'data-tipo='" .$fila[4] ."' data-documento='" .$fila[5] ."' data-correoelectronico='" .$fila[6] ."' data-rol='" .$fila[8] ."' data-estado='" .$fila[9] ."' data-telefono='" .$fila[10] ."' data-celular='" .$fila[11] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";            
                            
                    echo "</td>";
                    echo "</tr>";


                    $est=$fila[9];
                }
                $resultado->close();
            }
            $con->close();           
            
        
$obj = new persona();

      $con=$obj->conectar();



            $consulta= "SELECT * FROM persona where documento= $doc";

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        { 

            $id=$fila[0];



        }
    }


?><center>
            </table>
        </div> 
         <table class='table'>

                <center><h2>Vehiculos</h2></center>

                <br>
<center>
                <tr>
                    <th>ID</th><th>Tipo de vehiculo</th><th>Placa</th><th>Color</th><th>Estado</th><th>Editar</th>
                </tr>           
<?php


    
                            $obj = new persona();

      $con=$obj->conectar();

            $consulta= "SELECT * FROM vehiculo where id=$id";
            if ($resultado = $con->query($consulta)) 
            {
                while ($fila2 = $resultado->fetch_row()) 
                {                   


                    $tipo=$fila2[1];
                    if ($tipo==1) {

            $tipo2="Activo";

          }elseif ($tipo==2) {

                        $tipo2="Inactivo";


            }


            $tipo3=$fila2[2];
                    if ($tipo3==1) {

            $tipo4="Bicicleta";

          }elseif ($tipo3==2) {

                        $tipo4="Moto";


            }


                    echo "<tr>";
                    echo "<td>$fila2[0] </td><td>$tipo4 </td><td>$fila2[3]</td><td>$fila2[4]</td><td>$tipo2  </td>";   
                    echo"<td>";



                    


                    echo "<a data-toggle='modal' data-target='#editveh' data-documento='" .$fila2[0] ."' data-estado='" .$fila2[1] ."' data-tipovehiculo='" .$fila2[2] ."' data-placa='" .$fila2[3] ."'data-color='" .$fila2[4] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";            
                            
                    echo "</td>";
                    echo "</tr>";
                }
                $resultado->close();
            }
            $con->close();       


            
    

?>
            </table>
            <center>
            <?php 


            $query = "SELECT count(*) as id from vehiculo where id = $id";


$obj = new persona();

      $con=$obj->conectar();

if ($result = mysqli_query($con, $query)) {

    $data=mysqli_fetch_assoc($result);

    $contador= $data['id'];

}
mysqli_close($con);



if ($contador>='3') {
    


}else{


 echo "                       <a class='btn btn-success 'data-toggle='modal' data-target='#nuevoveh'>Nuevo vehiculo</a>

 ";


    
}


             ?>



       
<?php 

$consulta= "SELECT * FROM persona where documento= $doc";


      $obj = new persona();

      $con=$obj->conectar();



      if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         


            $id=$fila[0];

        }
    }


 ?>





<div class="modal" id="nuevoveh" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo vehiculo</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="insertar2.php" method="GET">                    
                            <div class="form-group">
                                <label for="nombre">ID:</label>
                                <input class="form-control" id="documento" name="documento" type="text" value="<?php echo " $id";?>" placeholder= <?php echo " $id";?> readonly></input>
                            </div>
                            
                           
                            
                            <div class="form-group">
                                <label for="edad">Tipo de vehiculo:</label>
                                <select  class="form-control" id="tipovehiculo" name="tipovehiculo" placeholder="tipovehiculo">

                                 <option value="1">Bicicleta</option>
                                    <option value="2">Moto</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="direccion">placa:</label>
                                <input class="form-control" id="placa" name="placa" type="text" placeholder="placa"></input>
                            </div>
                            

                            <div class="form-group">
                                <label for="nombre">color:</label>
                                <select  class="form-control"  id="color"  name="color" >

                                
                        <option value="Amarillo">Amarillo</option>
 <option value="Azul">Azul</option>
 <option value="Rojo">Rojo</option>
 <option value="Verde">Verde</option>
 <option value="Morado">Morado</option>
 <option value="Naranja">Naranja</option>
 <option value="Plateado">Plateado</option>
 <option value="Negro">Negro</option>
 <option value="Blanco">Blanco</option>
 <option value="Cafe">Cafe</option>

              
                                

                                </select>
                            </div>

                            


                            <input type="submit" class="btn btn-success" value="Salvar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 







        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Contacto</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza4.php" method="POST">                              
                                    
                              <div class="form-group">
                                <label for="nombre">Documento:</label>
                                <input class="form-control" id="documento" name="documento" type="text"  value=<?php echo $doc ?> readonly=""   ></input>
                            </div>    
                            <div class="form-group">
                                <label for="nombre">Correo:</label>
                                <input class="form-control" id="correoelectronico" name="correoelectronico" type="email" placeholder="Correo" ></input>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Direccion:</label>
                                <input class="form-control" id="direccion" name="direccion" type="text" placeholder="direccion" ></input>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Celular:</label>
                                <input class="form-control" id="celular" name="celular" type="text" placeholder="celular" ></input>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Telefono:</label>
                                <input class="form-control" id="telefono" name="telefono" type="text" placeholder="telefono" ></input>
                            </div>

                            
                
                                

                                </select>
                            </div>

                            <center>


                                                                <input type="submit" class="btn btn-success">                           

                            <br>                                                        <br>

                            <center>

                            <h3>Actualizar contraseña</h3>

                            </center>
                                                        <br>


                            <div class="form-group">
                                <label for="nombre">Nueva contraseña:</label>
                                <input class="form-control" id="contrasena2" name="contrasena2" type="password" placeholder="nueva contrasena" ></input>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Repita la contraseña:</label>
                                <input class="form-control" id="contrasena3" name="contrasena3" type="password" placeholder="nueva contrasena" ></input>
                            </div>
                            



<center>

                                    <input type="submit" class="btn btn-success">                           
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 




        <div class="modal" id="editveh" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar vehiculo</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza5.php" method="POST">                              
                                    
                                   <div class="form-group">
                                <label for="nombre">Documento :</label>
                                <input class="form-control" id="documento" name="documento" type="text" placeholder="primer nombre" readonly></input>
                            </div>
                             
                             <div class="form-group">
                                <label for="nombre">Tipo de vehiculo :</label>
                                <input class="form-control" id="tipovehiculo" name="tipovehiculo" type="text" placeholder="Tipo de vehiculo " readonly></input>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="nombre">Placa:</label>
                                <input class="form-control" id="placa" name="placa" type="text" placeholder="segundo apellido" readonly></input>
                            </div>
                             <div class="form-group">
                                <label for="nombre">Color:</label>
                                <input class="form-control" id="color" name="color" type="text" placeholder="color" ></input>
                            </div>

                            <div class="form-group">
                                <label for="edad">Estado:</label>
                                <select  class="form-control"  name="estado" placeholder="estado" >

                               <option value="1">Activo</option>
 <option value="2">Inactivo</option>
 
                                </select>
                            </div>
                            
                            



<center>

                                    <input type="submit" class="btn btn-success">                           
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 







    </div>
    <script src="../view/js/jquery.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>     
   

    <script>             
          $('#editveh').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient0 = button.data('documento')
          var recipient1 = button.data('estado')
          var recipient2 = button.data('tipovehiculo')
          var recipient3 = button.data('placa')
          var recipient4 = button.data('color')
        

           // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
         
          var modal = $(this)        
          modal.find('.modal-body #documento').val(recipient0)
          modal.find('.modal-body #estado').val(recipient1)

          modal.find('.modal-body #tipovehiculo').val(recipient2)
          modal.find('.modal-body #placa').val(recipient3)

          modal.find('.modal-body #color').val(recipient4)
          
        });
        
    </script>
    
</body>
</html>

<?php
    }

    else
    {
        ?>
         <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../view/loginusu.php">
         <?php
    }
?>