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
					<a href="#" class="navbar-brand">Busqueda de usuario</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>							
						<li><a href="cerrars.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php								
							echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> ".$nom."</a></li>";
						?>				      
				    </ul>			
				</div>
			</div>
		</nav>
	</header>

	<div class="container">
		<div class="row">	
	

	 <center>

				
		
      <a class="btn btn-success"  href="listarx.php">Listar Usuarios</a>
			<a class="btn btn-success"  href="listar3.php">Listar Vigilantes</a>

			<a class="btn btn-success"  href="listar2.php">Listar Administradores</a>
			<a class="btn btn-success"  href="listar4.php">Listar Vehiculos</a>
        <a class="btn btn-success"  href="buscar.php">Buscar documento</a>
<a class="btn btn-success"  href="reporte/index2.php">Generar reportes</a>

					

					<br>
	
        <br>

			<table class='table'>
				<br>

				<center><h2>Busqueda</h2></center>

				<br>

				
					
<form action="" method="POST">




                            <label for="nombre">Seleccione el criterio de busqueda:</label>
                            <select  class="form-control"  id="criterio"  name="criterio" >

                <option  value="tipodocumento">Tipo de documento</option>
                <option value="nombre">Nombre</option>
                <option value="apellido">Apellido</option>
                <option value="correoelectronico">Correo electronico</option>
                <option  value="estado">Estado</option>
                <option value="tipovehiculo">Tipo de vehiculo</option>
                <option value="placa">Placa</option>
                <option value="color">Color</option>
                

                </select>


			
                       			<label for="direccion">Dato:</label>
                       			<input class="form-control" size="40" id="busqueda" name="busqueda" type="text" placeholder="Documento" required=""></input><br>

<center>
                       			<input class="btn btn-warning"  id="Buscar" name="Buscar" type="submit" placeholder="Buscar" value="Buscar" >
                            <br>
                            <br><br>

</center>
</form>

<center>

                       			<?php  



 if(isset($_POST['Buscar']))
        {


 require "../model/controlusuario.php";


      $busqueda=$_POST['busqueda'];
            $criterio=$_POST['criterio'];


            if ($criterio=='tipodocumento') {

              if ($busqueda=='cedula') {
                $tipo='1';
              }elseif ($busqueda=='tarjeta') {
                $tipo='2';
              }else{

                                    $tipo='3';

                                         

              }

              $obj = new persona();

      $con=$obj->conectar();

        if ($tipo==3) {
          echo "<h2>No se encontraron resultados</h2>";
        }else{

            $consulta= "SELECT * FROM persona where idtipodocumento= '$tipo'";

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

          if ($fila[12]==1) {
            $estado='Activo';
          }elseif ($fila[12]==2) {
            $estado='Inactivo';
          }

          echo "
           <TABLE align='center'>
  <TR>
    <TH><label for='nombre'>Nombre:</label></TH>

    <TH> <label for='nombre'>Apellido:</label></TH>
    
    <TH><label for='nombre'>Correo electronico:</label></TH>
    <TH><label for='nombre'>Documento:</label></TH>
    <TH><label for='nombre'>Estado:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>
      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$fila[1] $fila[2]'' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3] $fila[4]'' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[7]' disabled></input></TD>

       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[6]' disabled></input></TD>
       <TD><input class='form-control' id='rol' name='rol' type='text' value='$estado' disabled></input></TD><br>
      
  </TR>
  
</TABLE> 



          ";

            }

          }

          }



              
            }elseif ($criterio=='nombre') {

              $obj = new persona();

      $con=$obj->conectar();



            $consulta= "SELECT * FROM persona where primernombre= '$busqueda' or segundonombre= '$busqueda'";

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

           if ($fila[12]==1) {
            $estado='Activo';
          }elseif ($fila[12]==2) {
            $estado='Inactivo';
          }
          

          echo "
           <TABLE align='center'>
  <TR>
    <TH><label for='nombre'>Nombre:</label></TH>

    <TH> <label for='nombre'>Apellido:</label></TH>
    
    <TH><label for='nombre'>Correo electronico:</label></TH>
    <TH><label for='nombre'>Documento:</label></TH>
    <TH><label for='nombre'>Estado:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>
      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$fila[1] $fila[2]'' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3] $fila[4]'' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[7]' disabled></input></TD>

       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[6]' disabled></input></TD>
       <TD><input class='form-control' id='rol' name='rol' type='text' value='$estado' disabled></input></TD><br>
      
  </TR>
  
</TABLE> 



          ";

            }

          }


              
            }elseif ($criterio=='apellido') {
              
               $obj = new persona();

      $con=$obj->conectar();



            $consulta= "SELECT * FROM persona where primerapellido= '$busqueda' or segundoapellido= '$busqueda'";

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

           if ($fila[12]==1) {
            $estado='Activo';
          }elseif ($fila[12]==2) {
            $estado='Inactivo';
          }
          

          echo "
           <TABLE align='center'>
  <TR>
    <TH><label for='nombre'>Nombre:</label></TH>

    <TH> <label for='nombre'>Apellido:</label></TH>
    
    <TH><label for='nombre'>Correo electronico:</label></TH>
    <TH><label for='nombre'>Documento:</label></TH>
    <TH><label for='nombre'>Estado:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>
      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$fila[1] $fila[2]'' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3] $fila[4]'' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[7]' disabled></input></TD>

       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[6]' disabled></input></TD>
       <TD><input class='form-control' id='rol' name='rol' type='text' value='$estado' disabled></input></TD><br>
      
  </TR>
  
</TABLE> 



          ";

            }

          }




            }elseif ($criterio=='correoelectronico') {
            
              $obj = new persona();

      $con=$obj->conectar();



            $consulta= "SELECT * FROM persona where correoelectronico= '$busqueda' ";

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

           if ($fila[12]==1) {
            $estado='Activo';
          }elseif ($fila[12]==2) {
            $estado='Inactivo';
          }
          

          echo "
           <TABLE align='center'>
  <TR>
    <TH><label for='nombre'>Nombre:</label></TH>

    <TH> <label for='nombre'>Apellido:</label></TH>
    
    <TH><label for='nombre'>Correo electronico:</label></TH>
    <TH><label for='nombre'>Documento:</label></TH>
    <TH><label for='nombre'>Estado:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>
      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$fila[1] $fila[2]'' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3] $fila[4]'' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[7]' disabled></input></TD>

       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[6]' disabled></input></TD>
       <TD><input class='form-control' id='rol' name='rol' type='text' value='$estado' disabled></input></TD><br>
      
  </TR>
  
</TABLE> 



          ";

            }

          }


            }elseif ($criterio=='estado') {

            $obj = new persona();

      $con=$obj->conectar();


              if ($busqueda=='activo') {
                $tipo='1';
              }elseif ($busqueda=='inactivo') {
                $tipo='2';
              }else{

                                    $tipo='3';

                                         

              }
            

$consulta= "SELECT * FROM persona where idestado= '$tipo' ";

 

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

           if ($fila[12]==1) {
            $estado='Activo';
          }elseif ($fila[12]==2) {
            $estado='Inactivo';
          }
          

          echo "
           <TABLE align='center'>
  <TR>
    <TH><label for='nombre'>Nombre:</label></TH>

    <TH> <label for='nombre'>Apellido:</label></TH>
    
    <TH><label for='nombre'>Correo electronico:</label></TH>
    <TH><label for='nombre'>Documento:</label></TH>
    <TH><label for='nombre'>Estado:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>
      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$fila[1] $fila[2]'' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3] $fila[4]'' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[7]' disabled></input></TD>

       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[6]' disabled></input></TD>
       <TD><input class='form-control' id='rol' name='rol' type='text' value='$estado' disabled></input></TD><br>
      
  </TR>
  
</TABLE> 



          ";

            }

          }
        



            }elseif ($criterio=='tipovehiculo') {

              $obj = new persona();

      $con=$obj->conectar();


              if ($busqueda=='bicicleta') {
                $tipo='1';
              }elseif ($busqueda=='moto') {
                $tipo='2';
              }else{

                                    $tipo='3';

                                         

              }
            

$consulta= "SELECT * FROM vehiculo where idtipovehiculo= '$tipo' ";

 

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

           if ($fila[1]==1) {
            $estado='Activo';
          }elseif ($fila[1]==2) {
            $estado='Inactivo';
          }

           if ($fila[2]==1) {
            $vehiculo='Bicicleta';
          }elseif ($fila[2]==2) {
            $vehiculo='Moto';
          }
          
           $id=$fila[0];


$consulta= "SELECT * FROM persona where id= '$id' ";

 

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila2 = $resultado->fetch_row()) 
        {       


          $doc=$fila2[6];

}}          


          echo "
           <TABLE align='center'>
  <TR>
      <TH><label for='nombre'>Dueño:</label></TH>

    <TH><label for='nombre'>Estado:</label></TH>

    <TH> <label for='nombre'>Tipo de vehiculo:</label></TH>
    
    <TH><label for='nombre'>Placa:</label></TH>
    <TH><label for='nombre'>Color:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>
         <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$doc ' disabled></input></TD>

      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$estado ' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value=' $vehiculo' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3]' disabled></input></TD>

       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[4]' disabled></input></TD>
      
  </TR>
  
</TABLE> 



          ";

            }

          }


            }elseif ($criterio=='placa') {
              
               $obj = new persona();

      $con=$obj->conectar();


              
            

$consulta= "SELECT * FROM vehiculo where placa= '$busqueda' ";

 

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

           if ($fila[1]==1) {
            $estado='Activo';
          }elseif ($fila[1]==2) {
            $estado='Inactivo';
          }

           if ($fila[2]==1) {
            $vehiculo='Bicicleta';
          }elseif ($fila[2]==2) {
            $vehiculo='Moto';
          }

          $obj = new persona();

      $con=$obj->conectar();


              
                      $id=$fila[0];


$consulta= "SELECT * FROM persona where id= '$id' ";

 

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila2 = $resultado->fetch_row()) 
        {       


          $doc=$fila2[6];

}}          

          echo "
           <TABLE align='center'>
  <TR>

      <TH><label for='nombre'>Dueño:</label></TH>

    <TH><label for='nombre'>Estado:</label></TH>

    <TH> <label for='nombre'>Tipo de vehiculo:</label></TH>
    
    <TH><label for='nombre'>Placa:</label></TH>
    <TH><label for='nombre'>Color:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>

         <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$doc ' disabled></input></TD>

      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$estado ' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value=' $vehiculo' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3]' disabled></input></TD>

       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[4]' disabled></input></TD>
      
  </TR>
  
</TABLE> 



          ";

            }

          }


            }elseif ($criterio=='color') {
                
              $obj = new persona();

      $con=$obj->conectar();


              
            

$consulta= "SELECT * FROM vehiculo where color= '$busqueda' ";

 

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

           if ($fila[1]==1) {
            $estado='Activo';
          }elseif ($fila[1]==2) {
            $estado='Inactivo';
          }

           if ($fila[2]==1) {
            $vehiculo='Bicicleta';
          }elseif ($fila[2]==2) {
            $vehiculo='Moto';
          }

          $obj = new persona();

      $con=$obj->conectar();


              
                      $id=$fila[0];


$consulta= "SELECT * FROM persona where id= '$id' ";

 

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila2 = $resultado->fetch_row()) 
        {       


          $doc=$fila2[6];

}}          

          echo "
           <TABLE align='center'>
  <TR>

      <TH><label for='nombre'>Dueño:</label></TH>

    <TH><label for='nombre'>Estado:</label></TH>

    <TH> <label for='nombre'>Tipo de vehiculo:</label></TH>
    
    <TH><label for='nombre'>Placa:</label></TH>
    <TH><label for='nombre'>Color:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>

         <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$doc ' disabled></input></TD>

      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$estado ' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value=' $vehiculo' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3]' disabled></input></TD>

       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[4]' disabled></input></TD>
      
  </TR>
  
</TABLE> 



          ";

            }

          }


            }




                            
          

                     
      
  
}


 









?>
           </center>            			
			
	

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
                       			<select  class="form-control" id="idTipodocumento" name="idTipodocumento" placeholder="idTipodocumento">

 								<option value="2">Tarjeta de identidad</option>
 								<option value="1">Cedula de ciudadania</option>
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
                       			<label for="nombre">Nombre:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" disabled></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Apellido:</label>
                       			<input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellido" disabled></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="edad">Tipo de documento:</label>
                       			<select name="idTipodocumento" placeholder="idTipodocumento" disabled>

 								<option value="2">Tarjeta de identidad</option>
 								<option value="1">Cedula de ciudadania</option>
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
                       			<select name="rol" >

 								<option value="Estudiante">Estudiante</option>
 								<option value="Docente">Docente</option>
                
 								

 								</select>
                       		</div>

                       		<div class="form-group">
                       			<label for="nombre">Estado:</label>
                       			<select name="estado" required>

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
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('nombre')
		  var recipient1 = button.data('apellido')
		  var recipient2 = button.data('idTipodocumento')
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
		  modal.find('.modal-body #idTipodocumento').val(recipient2)
		  modal.find('.modal-body #documento').val(recipient3)	
		  modal.find('.modal-body #correoelectronico').val(recipient4)
		  modal.find('.modal-body #contrasena').val(recipient5)
		  modal.find('.modal-body #rol').val(recipient6)
		  modal.find('.modal-body #estado').val(recipient7)	 
		});
		
	</script>
	
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