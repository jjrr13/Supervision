<?php
	//Proceso de conexion a la base de datos
	$mysqli = mysqli_init();
	if (!$mysqli) {
		die('Falló mysqli_init');
	}

	if (!$mysqli->real_connect("localhost", "issei", "DAGtgbnhy65", "informes")) {
		die('Error de conexión (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
	}
	
?>