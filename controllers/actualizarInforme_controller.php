<?php

//Proceso de conexion a la base de datos
$ruta="../";
require_once("../cx/conexion.php"); 
// scripts($ruta);
	
if( (isset($_POST['id']) && !empty($_POST['id'])) &&
	(isset($_POST['valor']) && !empty($_POST['valor'])) ){
  
    $id = $_POST['id'];
    $valor= $_POST['valor'];

    $sql = "UPDATE informe SET estado = '$valor' WHERE id= '$id'";

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
