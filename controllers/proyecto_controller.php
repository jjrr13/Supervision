<?php 
	// require_once('../../cx/conexion.php');
	include_once('../cx/conexion.php');

	scripts('../');


	if ( (isset($_POST['nombre_proyecto']) && !empty($_POST['nombre_proyecto']) ) &&
		(isset($_POST['fecha_inicio']) && !empty($_POST['fecha_inicio']) ) &&
		(isset($_POST['visitor']) && !empty($_POST['visitor']) ) &&
		(isset($_POST['supervisor']) && !empty($_POST['supervisor']) ) &&
		(isset($_POST['contenido']) && !empty($_POST['contenido']) ) 
	) {
	
		$nombre_proyecto = $_POST['nombre_proyecto'];
		$nit = $_POST['nit'];
		$fecha_inicio= $_POST['fecha_inicio'];
		$visitor= $_POST['visitor'];
		$supervisor= $_POST['supervisor'];
		$contenido= $_POST['contenido'];
		$fecha_final = (isset($_POST['fecha_final'])) ? $_POST['fecha_final'] : '';

// empresa_nit, nombre, fecha_inicio, fecha_final, visitor, visitor_viejo, supervisor, contenido, estado
		
		$sql ="INSERT INTO proyecto (empresa_nit, nombre, fecha_inicio, fecha_final, visitor,  supervisor, contenido, estado)

			VALUES ($nit, '$nombre_proyecto', '$fecha_inicio', '$fecha_final',  $visitor, $supervisor, '$contenido', 'PROCESO')";

		$result = $mysqli->query($sql);
		// $idObs = $mysqli->insert_id;
    if ($result) {
    	$_SESSION['nombre_proyecto']= $nombre_proyecto;
      confirmar('PROYECTO CREADO SATISFACTORIAMENTE...', 'fa fa-thumbs-o-up', 'green', '../modulos/proyectos.php');
    }
    else{
// // INSERT INTO proyecto (empresa_nit, nombre, fecha_inicio, fecha_final, visitor, supervisor, contenido, estado)
// VALUES (123, 'Prueba de creacion', '2018-01-01', '2018-02-02',  6, 10,  'Algo aqui deberia de describir el proyecto')
		echo $nombre_proyecto."<hr>";
		echo $nit."<hr>";
		echo $fecha_inicio."<hr>";
		echo $visitor."<hr>";
		echo $supervisor."<hr>";
		echo $contenido."<hr>";
		echo $fecha_final."<hr>";
      confirmar('ERROR AL GUARDAR PROYECTO <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
    }

	}else{

		$msj="";
		if (empty($_POST['nombre_proyecto'])) $msj.="error0=0&";
		if (empty($_POST['fecha_inicio'])) $msj.="error1=1&";
		if (empty($_POST['visitor'])) $msj.="error2=2&";
		if (empty($_POST['supervisor'])) $msj.="error3=3&";
		if (empty($_POST['dir_obra'])) $msj.="error4=4&";
		if (empty($_POST['resi_obra'])) $msj.="error5=5&";

      confirmar('FALTARON ALGUNOS DATOS IMPORTANTES<br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 's');
			header('Location: ../modulos/proyectos.php?'.$msj);
	}


// empty($_POST['fecha_inicio'])
// empty($_POST['visitor'])
// empty($_POST['supervisor'])
// empty($_POST['dir_obra'])
// empty($_POST['resi_obra'])

 ?>

































