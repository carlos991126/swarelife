		


	<?php


    require "../model/controlusuario.php";

			
            $obj = new persona();

      $con=$obj->conectar();



			
			
			
			$documento = $_GET['documento'];
			$idestado = 1;
			$idtipovehiculo = $_GET['tipovehiculo'];
			$placa = $_GET['placa'];
		
			$color = $_GET['color'];	

				


		if($_GET['placa'] == '')
    {
        echo "<script> alert('Debe llenar todos los campos por favor.'); </script>";
    }else{
        
             $sql = 'SELECT * FROM vehiculo';
             $rec = mysqli_query($con,$sql);
             $verificar = 0;
        
             while($resultado = mysqli_fetch_object($rec))
             {
                 if($resultado->placa == $_GET['placa'])
                 {
                     $verificar = 1;
                 } 
             }
             if($verificar == 0)
             {


                 


             	echo "<script> alert('Vehiculo registrado'); </script>";
                         
                         

            
                     $con->query("INSERT INTO vehiculo  VALUES  ($documento,'$idestado','$idtipovehiculo','$placa','$color')");

                         mysqli_query($con,$sql);


                 
                 


                        
             }else{
                  echo "<script> alert('La placa de este vehiculo ya se encuentra registrada'); </script>";
              }
        }




	?>	
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">



