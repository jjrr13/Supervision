<?php
// require("../cx/cx.php");
session_start();

if($_SESSION['id_usuario']){
  //Esta funcion destruye todas las sesiones asociativas
	session_destroy();
	header("location: ../index.php");
}
else{
	header("location: ../index.php");
}
