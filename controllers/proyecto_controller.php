<?php 

	include_once('../cx/cx.php');





	if ((isset($_POST['fecha_inicio']) && !empty($_POST['fecha_inicio']) ) &&
		(isset($_POST['visitor']) && !empty($_POST['visitor']) ) &&
		(isset($_POST['supervisor']) && !empty($_POST['supervisor']) ) &&
		(isset($_POST['dir_obra']) && !empty($_POST['dir_obra']) ) &&
		(isset($_POST['resi_obra']) && !empty($_POST['resi_obra']) )
	) {
		$empresa_nombre = $_POST['empresa_nombre'];
		$nit = $_POST['nit'];
		$fecha_inicio= $_POST['fecha_inicio'];
		$visitor= $_POST['visitor'];
		$supervisor= $_POST['supervisor'];
		$dir_obra= $_POST['dir_obra'];
		$resi_obra= $_POST['resi_obra'];

		
		$sql ="INSERT INTO construc_user (Proyect_nomb, Proyect_nit_empre, Proyect_time_inic, Proyect_estado, Proyect_supervi_tect, Proyect_direcc_obra, Proyect_residen_obra, Proyect_inge_redacc)

			VALUES ($empresa_nombre, nit, $fecha_inicio, 'Creado' $visitor, $supervisor, $dir_obra, $resi_obra )";
	}else{
		$msj="";
		if (empty($_POST['fecha_inicio'])) $msj.="error1=1&";
		if (empty($_POST['visitor'])) $msj.="error2=2&";
		if (empty($_POST['supervisor'])) $msj.="error3=3&";
		if (empty($_POST['dir_obra'])) $msj.="error4=4&";
		if (empty($_POST['resi_obra'])) $msj.="error5=5&";

		header('Location: ../modulos/proyectos.php?'.$msj);
	}


// empty($_POST['fecha_inicio'])
// empty($_POST['visitor'])
// empty($_POST['supervisor'])
// empty($_POST['dir_obra'])
// empty($_POST['resi_obra'])

 ?>

































