<?php 

require "listar.php";


 ?>

<table border="1">
	<tr>
		<td>id</td>
        		<td>nombre</td>

		<td>apellido</td>
		<td>tipo documento</td>
		<td>documento</td>
		<td>correo</td>
	</tr>
	<?php 
	foreach ($datosadm as $fila ) {
		
	



	 ?>
	<tr>
    	<td height="23"><?php echo $fila["id"] ?></td>
		<td><?php echo $fila["primernombre"] ?></td>
        <td><?php echo $fila["segundonombre"] ?></td>
		<td><?php echo $fila["primerapellido"] ?></td>
		<td><?php echo $fila["segundoapellido"] ?></td>
		<td><?php echo $fila["correoelectronico"] ?></td>
		
		
	</tr>
<?php } ?>




</table>



