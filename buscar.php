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
              <a class="btn btn-success"  href="buscar2.php">Buscar dato</a>
<a class="btn btn-success"  href="reporte/index2.php">Generar reportes</a>

					

					<br>
	
        <br>

			<table class='table'>
				<br>

				<center><h2>Busqueda de usuario</h2></center>

				<br>

				
					
<form action="" method="POST">


			
                       			<label for="direccion">Documento:</label>
                       			<input class="form-control" size="40" id="documento" name="documento" type="number" placeholder="Documento" required=""></input><br>

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


      $doc=$_POST['documento'];


                            $obj = new persona();

      $con=$obj->conectar();



            $consulta= "SELECT * FROM persona where documento= $doc";

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         

          $id=$fila[0];


          if ($fila[5]==1) {

            $tipo="Cedula";

          }elseif ($fila[5]==2) {

                        $tipo="Tarjeta de identidad";


            }

             if ($fila[12]==1) {

            $tipo2="Activo";

          }elseif ($fila[12]==2) {

                        $tipo2="Inactivo";


            }
          

                         echo "<h2>Datos Personales</h2>";



echo "<div class='form-group'>

            <TABLE align='center'>
  <TR>
    <TH><label for='nombre'>Nombre:</label></TH>

    <TH> <label for='nombre'>Apellido:</label></TH>
    
    <TH><label for='nombre'>Correo electronico:</label></TH>
    <TH><label for='nombre'>Tipo documento:</label></TH>
    <TH><label for='nombre'>Documento:</label></TH>
    <TH><label for='nombre'>Estado:</label></TH>
  </TR>
  <TR VALIGN=top>

   <TR>
      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$fila[1] $fila[2]'' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$fila[3] $fila[4]'' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[7]' disabled></input></TD>

      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$tipo' disabled></input></TD>
       <TD><input class='form-control' id='estado' name='estado' type='text' value='$fila[6]' disabled></input></TD>
       <TD><input class='form-control' id='rol' name='rol' type='text' value='$tipo2' disabled></input></TD>
      
  </TR>
  
</TABLE> ";

 echo "<br><br><h2>Datos De contacto</h2>";



echo "<div class='form-group'>

            <TABLE align='center'>
  <TR>
    <TH><label for='nombre'>Direccion:</label></TH>

    <TH> <label for='nombre'>Telefono:</label></TH>
    
    <TH><label for='nombre'>Celular:</label></TH>
    


   
  </TR>
  <TR VALIGN=top>

   <TR>
      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$fila[9]' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$fila[10]' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila[11]' disabled></input></TD>

      </TR>

      
   ";


  $obj = new persona();

      $con=$obj->conectar();


 $consulta2= "SELECT * FROM administrador where id= $id";

            if ($resultado2 = $con->query($consulta2)) 
      {
        while ($fila2 = $resultado2->fetch_row()) 
        {         



        

          if ($fila2[1]==2) {

            $tipo3="Administrador";

          }
        }
      }

      $consulta3= "SELECT * FROM vigilante where id= $id";

            if ($resultado3 = $con->query($consulta3)) 
      {
        while ($fila3 = $resultado3->fetch_row()) 
        {         


          $turno=$fila3[2];
        

          if ($fila3[1]==3) {

            $tipo3="Vigilante";

          }
        }
      }




            $consulta= "SELECT * FROM usuario where id= $id";

            if ($resultado = $con->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         




          $curso=$fila[3];

          if ($fila[1]==1) {

            $tipo3="Usuario";

          }

         

           if ($fila[2]==1) {

            $tipo4="Unica";

          }


          

  

                        

        }



}
if ($tipo3=="Usuario") {
            

  echo "<div class='form-group'>

   
       <TR VALIGN=top><br>
       <TH><br><label for='nombre'>Rol:</label></TH>
        <TH><br><label for='nombre'>Jornada:</label></TH>
            <TH><br><label for='nombre'>Curso:</label></TH>

                     </TR>
 <TR VALIGN=top>

                     </TR>

                            <TR VALIGN=top>

            
            <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$tipo3' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$tipo4' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$curso' disabled></input></TD>

      
      
  </TR>
  
</TABLE> ";

$obj = new persona();

      $con=$obj->conectar();


 $consulta5= "SELECT * FROM vehiculo where id= $id";



                    echo "<br><br><h2>Vehiculos registrados</h2>";


            if ($resultado5 = $con->query($consulta5)) 
      {


        while ($fila5 = $resultado5->fetch_row()) 
        {        



          if ($fila5[1]==1) {

            $tipo6="Activo";

          }elseif ($fila5[1]==2) {
  
                        $tipo6="Inactivo";

            }

            if ($fila5[2]==1) {

            $tipo7="Bicicleta";

          }elseif ($fila5[2]==2) {
  
                        $tipo7="Moto";

            }

          



          echo "<div class='form-group'>



            <TABLE align='center'>
  <TR>
    <TH><label for='nombre'>Estado:</label></TH>

    <TH> <label for='nombre'>Tipo de vehiculo:</label></TH>
    
    <TH><label for='nombre'>Placa:</label></TH>
    <TH><label for='nombre'>Color:</label></TH>
    
  </TR>
  <TR VALIGN=top>

   <TR>
      <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$tipo6' disabled></input></TD>


      <TD> <input class='form-control' id='apellido' name='apellido' type='text' value='$tipo7' disabled></input></TD>

      
      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila5[3]' disabled></input></TD>

      <TD><input class='form-control' id='apellido' name='apellido' type='text' value='$fila5[4]' disabled></input></TD><br>
      
  </TR>
  
</TABLE> ";

}
}


          }else{


          if ($tipo3=='Administrador') {



             echo "<div class='form-group'>

              <TABLE align='center'>

   
       <TR VALIGN=top><br>
       <TH><br><label for='nombre'>Rol:</label></TH>
       

                     </TR>
 

                            <TR VALIGN=top>

            
            <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$tipo3' disabled></input></TD>


  

      
      
  </TR>
  
</TABLE> ";

}else{


if ($tipo3=='Vigilante') {


     if ($turno==1) {

            $turno2="Dia";

          }elseif ($turno==2) {

            $turno2="Tarde";

          }elseif ($turno==3) {
            
            $turno2="Noche";


                      }



             echo "<div class='form-group'>

              <TABLE align='center'>

   
       <TR VALIGN=top><br>
       <TH><br><label for='nombre'>Rol:</label></TH>
              <TH><br><label for='nombre'>Turno:</label></TH>

       

                     </TR>
 

                            <TR VALIGN=top>

            
            <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$tipo3' disabled></input></TD>
                        <TD><input class='form-control' id='nombre' name='nombre' type='text' value='$turno2' disabled></input></TD>



  

      
      
  </TR>
  
</TABLE> ";


}



}
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
