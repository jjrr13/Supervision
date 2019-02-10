<?php

//Proceso de conexion a la base de datos
$ruta="../";
require_once("../cx/conexion.php"); 
scripts($ruta);
	
if( (isset($_POST['usuario']) && !empty($_POST['usuario'])) &&
	(isset($_POST['pass']) && !empty($_POST['pass'])) ){
  
    $user = $_POST['usuario'];
    $passconvert= $_POST['pass'];
    $password = sha1("DAGqazxsw21"."$passconvert");

	  // echo "<script>alert('$user -> $passconvert -> $password');</script>";
	  //echo sha1(be50abbe40fb758f18ea1658cd8b97cfc34c4c15);
	
    $sql = "SELECT u.id_usuario, u.estado, u.nit, u.usuario, u.id_tipo_usuario  FROM usuarios u
						WHERE u.usuario='$user' AND u.password='$password'";

		$result = $mysqli->query($sql);

		if($result->num_rows > 0){
			
			$fila = mysqli_fetch_assoc($result);

			if($fila['estado'] == 1){

				$_SESSION['id_usuario'] = $fila['id_usuario'];
				$_SESSION['id_tipo_usuario'] = $fila['id_tipo_usuario'];

				$_SESSION['usuario'] = $fila['usuario'];
					
				$nit = $fila['nit'];
				
		    $sql2 = "SELECT CONCAT(t.nombre,' ',t.apellido) as nombre, tp.profesion as profesion
					FROM terceros t
					INNER JOIN tipo_profesion tp ON t.id_profesion = tp.id_profesion
					WHERE t.nit = $nit";

				$resultUsuario = $mysqli->query($sql2);

				if($resultUsuario->num_rows > 0){
					
					$filaUsuario = mysqli_fetch_assoc($resultUsuario);

	        // $_SESSION['usuario'] = $filaUsuario['nombre'];
	        	$_SESSION['profesion'] = $filaUsuario['profesion'];

					if ($fila['id_tipo_usuario'] == "empresa") {
						$_SESSION['empresa_nit'] = $fila['nit'];
	        	$_SESSION['empresa_nombre'] = $filaUsuario['nombre'];
	        	
						// header("Location: ../modulos/generar/");
						confirmar('Bienvenido! <br>Esperamos que su experiencia sea buena, Consulte en Sistemas', 'fa fa-user-circle-o', 'green', '../modulos/generar/');
					}
					else if ($fila['id_tipo_usuario'] == "usuario") {
	        		
        		$_SESSION['nombre_usuario'] = $filaUsuario['nombre'];
        		// header("location: ../modulos/empresas/index.php");
						// header("Location: ../modulos/empresas/index.php");
						confirmar('Bienvenido! <br>Actitud positiva', 'fa fa-user-circle-o', 'green', '../modulos/empresas/index.php');
					}
					else{
						confirmar('Tuvimos algun problema en el proceso! <br>Por favor, Consulte en Sistemas', 'fa fa-window-close-o', 'red', '../cx/destroy_session.php');
					}
				}
				else{
					confirmar('Tuvimos problema al traer el nombre! <br>Por favor, Consulte en Sistemas', 'fa fa-window-close-o', 'red', '../cx/destroy_session.php');

				}
			}
			else{
				confirmar('El usuario se encuentra Bloqueado! <br>Por favor, Consulte a la Administración', 'fa fa-window-close-o', 'red', '../cx/destroy_session.php');
			}
		}
		else{
			confirmar('Credenciales Incorrestras! <br>Por favor, Intente de nuevo', 'fa fa-window-close-o', 'red', '../cx/destroy_session.php');
		}
}
else{
	confirmar('Todos los campos son requeridos! <br>Por favor, Intente de nuevo', 'fa fa-window-close-o', 'red', '../cx/destroy_session.php');
}


