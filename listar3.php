<?php
    




        session_start();

    if(isset($_SESSION['administrador'])){



                $doc=$_SESSION['administrador'];

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
					<a href="#" class="navbar-brand">Usuarios</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>							
						<li><a href="cerrars.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>						
					</ul>
					<ul class="nav navbar-nav navbar-right">
									      
				    </ul>			
				</div>
			</div>
		</nav>
	</header>

	<div class="container">
		<div class="row">	
	

	<center>
				
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Usuario</a>
			<a class="btn btn-success"  href="listarx.php">Listar Usuarios</a>
			<a class="btn btn-success"  href="listar2.php">Listar Administradores</a>
			<a class="btn btn-success"  href="listar4.php">Listar Vehiculos</a>
        <a class="btn btn-success"  href="buscar.php">Buscar documento</a>
                      <a class="btn btn-success"  href="buscar2.php">Buscar dato</a>
<a class="btn btn-success"  href="reporte/index2.php">Generar reportes</a>

</center>

					

					<br>
	

			<table class='table'>
				<br>

				<center><h2>Vigilantes</h2></center>

				<br>

				<tr>
					<th>Id</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Documento</th><th>Correo</th><th>Celular</th>
				</tr>			

	        
		</div> 

    


    <?php 

require "listar.php";



  foreach ($datosvig as $fila) {
    
   ?>
   <tr>
      <td height="23"><?php echo $fila["id"] ?></td>


      <?php 

      $consulta= "SELECT * FROM persona where id= $fila[id]";


      $obj = new persona();

      $con=$obj->conectar();



      if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         
          echo "<td>$fila[1]</td>"; 
                    echo "<td>$fila[3]</td>"; 
                   echo "<td>$fila[4]</td>"; 
                    echo "<td>$fila[6]</td>"; 
                    echo "<td>$fila[7]</td>"; 
                        echo "<td>$fila[11]</td>"; 

        }


}
?>

    </tr>
<?php } ?>
 
  
</table>


		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Contacto</h4>                       
                    </div>
                    <div class="modal-body">
                      <form action="../model/capturar3.php" method="post">
 
<div class="form-group"> 
 <label>Primer nombre:  </label>   <input class="form-control" type="text" name="primernombre" onkeypress="return soloLetras(event)" required/>
</div>
<div class="form-group"> 
 <label>Segundo nombre:  </label>   <input class="form-control" type="text" name="segundonombre" onkeypress="return soloLetras(event)" required/>
</div>


 <br><br>
 <div class="form-group"> 

 <label>Primer apellido: </label>    <input class="form-control" type="text" name="primerapellido" onkeypress="return soloLetras(event)" required/>
</div>

<div class="form-group"> 

 <label>Segundo apellido: </label>    <input class="form-control" type="text" name="segundoapellido" onkeypress="return soloLetras(event)" required/>
</div>

 <br><br>
 <div class="form-group"> 
 <label>Tipo de documento: </label> <br><select class="form-control" name="idtipodocumento" required>

 <option value="1">Tarjeta de identidad</option>
 <option value="2">Cedula de ciudadania</option>
 </select>
</div>
 <br><br>
<div class="form-group"> 
 <label>Numero de documento:  </label>   <input class="form-control" type="number" name="documento" required />
</div>

 <br><br>
 <div class="form-group"> 
 <label>Correo electronico: </label> <input class="form-control" type="email" name="correoelectronico" required/>
</div>

<br><br>
<div class="form-group"> 
 <label>Direccion:  </label>   <input class="form-control" type="text" name="direccion" required />
</div>

<br><br>
<div class="form-group"> 
 <label>Telefono fijo:  </label>   <input class="form-control" type="number" name="telefono" required />
</div>

<br><br>
<div class="form-group"> 
 <label>Celular:  </label>   <input class="form-control" type="number" name="celular" required />
</div>

<br><br>
 <div class="form-group"> 
 <label>Turno: </label> <br><select class="form-control" name="turno" required>

 <option value="1">Dia</option>
 <option value="3">Tarde</option>
 <option value="1">Noche</option>
 </select>
</div>






 <br><br>
 <div class="form-group"> 

 <label>Contraseña:</label> <input class="form-control" type="password" name="contrasena" required/>
</div>

 <br><br>
 <div class="form-group"> 

<label>Repetir contraseña: </label><input class="form-control" type="password" name="repcontrasena" required/>
</div>



 <br><br>
 <div class="form-group"> 

 <label>rol: </label> <br><select class="form-control" name="idrol" >

 <option value="3">Vigilante</option>

 </select>
</div>
 <br><br>


<div class="form-group"> 
<label>Estado:</label>  <br><select class="form-control" name="idestado" required>

 <option value="1">activo</option>
 
 </select>
 <br><br>
</div>

<div class="form-group"> 

<input class="btn btn-primary" type="submit" name="registrar" value="registrarme">

</div>

</form>

<form  method='POST' action='../index.html'>
              
<input  class="btn btn-primary" type="submit" name="volver" value="volver" href="../registro usuarios/index.php"    >

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
                       <form action="../../Model/actualiza.php" method="POST">                       		
                       		        
                       		       <div class="form-group">
                       			<label for="nombre">Primer nombre:</label>
                       			<input class="form-control" id="primernombre" name="primernombre" type="text" placeholder="primer nombre" disabled=""></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">segundo nombre:</label>
                       			<input class="form-control" id="segundonombre" name="segundonombre" type="text" placeholder="segundo nombre" disabled=""></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">primer apellido:</label>
                       			<input class="form-control" id="primerapellido" name="primerapellido" type="text" placeholder="primer apellido" disabled=""></input>
                       		</div>
                       		
                       		
                       		<div class="form-group">
                       			<label for="nombre">Segundo apellido:</label>
                       			<input class="form-control" id="segundoapellido" name="segundoapellido" type="text" placeholder="segundo apellido" disabled=""></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="edad">Tipo de documento:</label>
                       			<select  class="form-control" name="tipodocumento" placeholder="tipodocumento" disabled>

 								<option value="Tarjeta de identidad">Tarjeta de identidad</option>
 								<option value="Cedula de ciudadania">Cedula de ciudadania</option>
 								</select>
                       		</div>
                       		<div class="form-group">
                       			<label for="direccion">Documento:</label>
                       			<input class="form-control" id="documento" name="documento" type="number" placeholder="Documento" readonly ></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Correo:</label>
                       			<input class="form-control" id="correoelectronico" name="correoelectronico" type="text" placeholder="Correo" disabled></input>
                       		</div>
                       		

                       		<div class="form-group">
                       			<label for="nombre" >Rol:</label>
                       			<select  class="form-control" name="rol" >

 								<option value="Estudiante">Estudiante</option>
 								<option value="Docente">Docente</option>
 								                                <option value="Operario">Operario</option>

                
 								

 								</select>
                       		</div>

                       		<div class="form-group">
                       			<label for="nombre">Estado:</label>
                       			<select  class="form-control" name="estado" required>

 									<option value="activo">activo</option>
 									<option value="inactivo">inactivo</option>
 
 									</select>
                       		</div>

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