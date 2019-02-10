<?php 
	include_once('../cx/conexion.php');

	scripts('../');

	if ( (isset($_POST['tdocumento']) && !empty($_POST['tdocumento']) ) &&
	(isset($_POST['nit']) && !empty($_POST['nit']) ) &&

	(isset($_POST['nombre']) && !empty($_POST['nombre']) ) &&
	(isset($_POST['apellido']) && !empty($_POST['apellido']) ) &&
	(isset($_POST['direccion']) && !empty($_POST['direccion']) ) &&
	(isset($_POST['tProfesion']) && !empty($_POST['tProfesion']) ) &&
	(isset($_POST['userName']) && !empty($_POST['userName']) ) )
	{


	
		$nit = $_POST['nit'];
		$dv_bd = calcularDV($nit);
		
		$tdocumento = $_POST['tdocumento'];
		$nombre= $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$tProfesion = $_POST['tProfesion'];
		$direccion = $_POST['direccion'];
		$telefono1 = (!empty($_POST['telefono1']))? $_POST['telefono1'] : '' ;
		$celular = (!empty($_POST['celular']))? $_POST['celular'] : '' ;
		$email = (!empty($_POST['email']))? $_POST['email'] : '' ;
		$id_creacion = $_SESSION['id_usuario'];

		$sql = "INSERT INTO terceros VALUES ('$nit', '$dv_bd', '$tdocumento', '$nombre', '$apellido', '$tProfesion', '$direccion', '$telefono1', '$celular', '$email', 'SI', '$id_creacion', '$fecha_registro')"
		;
		$result = $mysqli->query($sql);
		// $idObs = $mysqli->insert_id;
    if ($result) {
			$userName = $_POST['userName'];
			$tipo_usuario = $_POST['tipo_usuario'];
			$pass = sha1("DAGqazxsw21"."$nit");

			$sql2="INSERT INTO usuarios VALUES (NULL, '$nit', '$userName', '$pass', '$tipo_usuario', 1, '$id_creacion', '$fecha_registro')";
    	
			$result2 = $mysqli->query($sql2);
			// $idObs = $mysqli->insert_id;
	    if ($result2) {
				$userName = $_POST['userName'];
				$tipo_usuario = $_POST['tipo_usuario'];

	      confirmar('CREADO SATISFACTORIAMENTE EL TERCERO Y EL USUARIO', 'fa fa-thumbs-o-up', 'green', '../modulos/usuarios/usuarios.php');
	    }
	    else{
      	confirmar('ERROR AL CREAR EL USUARIO <br> CONSULTE DTO SISTEMAS', 'fa fa-window-close', 'red', 'S');
      	echo $sql2;
	    }
	  }
    else{

      confirmar('ERROR AL GUARDAR EL TERCERO <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
      echo $sql;
    }

	}
	else{
      confirmar('FALTA ALGUN DATO REQUERIDO <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/usuarios/usuarios.php');
	}

	//Esta función calula el digito de verificación para el documento nit.
	function calcularDV($nit) {
		if (! is_numeric($nit)) {
			return false;
		}

		$arr = array(1 => 3, 4 => 17, 7 => 29, 10 => 43, 13 => 59, 2 => 7, 5 => 19, 8 => 37, 11 => 47, 14 => 67, 3 => 13, 6 => 23, 9 => 41, 12 => 53, 15 => 71);
		$x = 0;
		$y = 0;
		$z = strlen($nit);
		$dv = '';

		for ($i=0; $i<$z; $i++) {
			$y = substr($nit, $i, 1);
			$x += ($y*$arr[$z-$i]);
		}

		$y = $x%11;

		if ($y > 1) {
			$dv = 11-$y;
			return $dv;
		} else {
			$dv = $y;
			return $dv;
		}

	}
