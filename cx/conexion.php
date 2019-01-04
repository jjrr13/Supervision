<?php
	//Proceso de conexion a la base de datos
    /*$host = "db764174882.hosting-data.io";//
    $user = "dbo764174882";
    $pass = "DAGtgbnhy65";
    $db = "db764174882";
    */
	session_start();
      //If the variable does not exist, destroy the session
    if (empty($_SESSION['id_usuario'])) {
        if ((!isset($_POST['pass']) && empty($_POST['pass']))) {
            header("location: http://localhost/Super/cx/destroy_session.php");
        }
    }

    $host = "localhost";//
    $user = "issei";
    $pass = "DAGtgbnhy65";
    $db = "informes";
    $mysqli = mysqli_init();
    if (!$mysqli) {
        die('Falló mysqli_init');
    }

    if (!$mysqli->real_connect($host, $user, $pass, $db)) {
        die('Error de conexión (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    
		//Hide generated errors
	// error_reporting(E_ERROR | E_WARNING | E_PARSE);

	//We define time zone
	date_default_timezone_set('America/Bogota');
	//current date
	$fecha_registro = date('Y-m-d H:i:s');
	//We define the current date of the session
	$_SESSION['fechaactual'] = $fecha_registro;



	 //Esta funcion sirve para hacer una validación que evita la inyeccion SQL en nuestra base de datos, ademas formatea los datos según su tipo ya sea numérico, texto, doble etc.
	if (!function_exists("GetSQLValueString")){
    	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
      	{
      	  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

      	  switch ($theType) {
        		case "text":
        		case "date":
      			case "datetime":
      			case "time":
            //evaluar este terminario
        		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        		  break;    
        		case "long":
        		case "int":
        		  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        		  break;
        		case "double":
        		  $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
        		  break;
        		case "defined":
        		  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        		  break;
      	  }

      	  return $theValue;
      	}
	}
	// termina la funcion de validacion de tipo de datos //

	//////////////////////// scripts de ventanas bonitas //////////////////////

	function scripts($ruta){
		echo "
			<link rel='stylesheet' href='". $ruta."plugins/font-awesome/css/font-awesome.min.css'>
  			<link rel='stylesheet' href='". $ruta."plugins/adminlte.min.css'>
			<link rel='stylesheet' href='".$ruta."plugins/demo/demo.css'>
			<link rel='stylesheet' type='text/css' href='".$ruta."plugins/jquery-confirm.css'>
			<!-- Este SCRIPT ejecuta todos los alerts -->
			<script src='".$ruta."plugins/demo/libs/bundled.js'></script>
			<script src='".$ruta."plugins/demo/demo.js'></script>
			<script type='text/javascript' src='".$ruta."plugins/jquery-confirm.js'></script>

		";
	}
	
	function confirmar($msj, $icon, $color, $destino){
		echo "<script  type='text/javascript'>
                $.confirm({
                        title: '',
                        content: '$msj',
                        icon: '$icon',
                        animation: 'scale',
                        closeAnimation: 'scale',
                        theme: 'supervan',
                        type: '$color',
                        opacity: 0.5,
                        buttons: {
                            'ok': {
                                text: 'OK',
                                btnClass: 'btn-blue',
                                action: function () {
                                    console.log('$msj');
                                    if ('$destino'.indexOf('/') > -1) {
                                        window.location.replace('$destino');
                                    }
                                    else if ('$destino'.indexOf('funcion') > -1) {
                                     'procedimiento'();
                                    }
                                    //window.location.replace('$destino');
                                }
                            }, 
                        }
                    });
                </script>";
	}
    
    function console($value)
    {
      echo "<script>console.log('".$value."');</script>";
    }
    function show($value)
    {
      echo "<script>alert('".$value."');</script>";
    }
?>