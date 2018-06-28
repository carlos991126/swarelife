
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
						<span class="icon-bar">Hola</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Vehiculos</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>							
            <li><a href="cerrars.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>            
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php								
						?>				      
				    </ul>			
				</div>
			</div>
		</nav>
	</header>

	<div class="container">
		<div class="row">	
		<center>


				
      <a class="btn btn-success"  href="listar.php">Listar Usuarios</a>
      <a class="btn btn-success"  href="listar2.php">Listar Administradores</a>
            <a class="btn btn-success"  href="listar3.php">Listar Vigilantes</a>

      <a class="btn btn-success"  href="listar4.php">Listar Vehiculos</a>
        <a class="btn btn-success"  href="buscar.php">Buscar documento</a>
                      <a class="btn btn-success"  href="buscar2.php">Buscar dato</a>
<a class="btn btn-success"  href="reporte/index2.php">Generar reportes</a>

						
            <br>				<br>


			<table class='table'>
        <br>
				<center><h2>Vehiculos</h2></center>

<br>

				<tr>
          
					<th>ID</th><th>Estado</th><th>Tipo de vehiculo</th><th>Placa</th><th>Color</th>
				</tr>	

<?php

require "listar.php";


					$consulta= "SELECT * FROM vehiculo ";


      $obj = new persona();

      $con=$obj->conectar();



      if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

        	if ($fila[1]==1) {

    $tipo="Activo";
  }else{

$tipo="Inactivo";

  }


  if ($fila[2]==1) {

    $tipo2="Bicicleta";
  }else{

$tipo2="Moto";

  }

          echo "<tr><td>$fila[0]</td>"; 
                    echo "<td>$tipo</td>"; 
                   echo "<td>$tipo2</td>"; 
                    echo "<td>$fila[3]</td>"; 
                    echo "<td>$fila[4]</td>"; 

                        

        }


}

?>
	        </table>
		</div> 



		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Contacto</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="../../Model/insertar.php" method="GET">              		
                       		<div class="form-group">
                       			<label for="nombre">Nombre:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Apellido:</label>
                       			<input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellido"></input>
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
                       			<input class="form-control" id="documento" name="documento" type="number" placeholder="Documento"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Correo:</label>
                       			<input class="form-control" id="correoelectronico" name="correoelectronico" type="email" placeholder="Correo"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Contraseña:</label>
                       			<input class="form-control" id="contrasena" name="contrasena" type="password" placeholder="Contraseña"></input>
                       			
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Repita la contraseña:</label>
                       			<input class="form-control" id="contrasena2" name="contrasena2" type="password" placeholder="Contraseña"></input>
                       			</div>

                       		<div class="form-group">
                       			<label for="nombre">Rol:</label>
                       			<select  id="rol"  name="rol" >

 								<option value="Estudiante">Estudiante</option>
                <option value="Docente">Docente</option>
                <option value="Vigilante">Vigilante</option>
                <option value="Administrador">Administrador</option>
 								

 								</select>
                       		</div>

                       		<div class="form-group">
                       			<label for="nombre">Estado:</label>
                       			<select name="estado" required>

 									<option value="activo">activo</option>
 									<option value="inactivo">inactivo</option>
 
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







       
	<script src="../view/js/jquery.min.js"></script>
	<script src="../view/js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('nombre')
		  var recipient1 = button.data('apellido')
		  var recipient2 = button.data('tipodocumento')
		  var recipient3 = button.data('documento')
		  var recipient4 = button.data('correoelectronico')
		  var recipient5 = button.data('contrasena')
		  var recipient6 = button.data('rol')
		  var recipient7 = button.data('estado')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #nombre').val(recipient0)
		  modal.find('.modal-body #apellido').val(recipient1)
		  modal.find('.modal-body #tipodocumento').val(recipient2)
		  modal.find('.modal-body #documento').val(recipient3)	
		  modal.find('.modal-body #correoelectronico').val(recipient4)
		  modal.find('.modal-body #contrasena').val(recipient5)
		  modal.find('.modal-body #rol').val(recipient6)
		  modal.find('.modal-body #estado').val(recipient7)	 
		});
		
	</script>
	
</body>
</html>
