<?php

//Proceso de conexion a la base de datos
$ruta="../";
require_once("../cx/conexion.php"); 
// scripts($ruta);
	
if( (isset($_POST['nit']) && !empty($_POST['nit'])) &&
	(isset($_POST['valor']) && !empty($_POST['valor'])) ){
  
    $nit = $_POST['nit'];
    $valor= $_POST['valor'];

    $sql = "UPDATE terceros SET estado = '$valor' WHERE nit= '$nit'";

		$result = $mysqli->query($sql);

		if($result){
			echo 1;
		}
		else{
			echo 2;
		}
}
else{
	echo 0;
}


