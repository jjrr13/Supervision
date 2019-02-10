<?php 
require_once('../../cx/conexion.php');
require_once('../../js/globales.js');


// var_dump($_POST);
// echo '<pre>';
// print_r($_POST);
// print "</pre>";

// $id_proyecto= isset($_POST['id_proyecto']) ? $_POST['id_proyecto'] : "";
//id_proyecto
echo isset($_POST['id_proyecto']) ? $_POST['id_proyecto'] : "No llego el proyecto";
echo isset($_POST['id_informe']) ? $_POST['id_informe'] : "No llego el informe";
	$mostarBoton=false;
	if (isset($_POST['id_informe']) && !empty($_POST['id_informe']) || !empty($_SESSION['id_informe'])) {

    if (empty($_SESSION['id_informe'])) {
      $id_informe = $_POST['id_informe'];
  		$_SESSION['id_informe'] = $_POST['id_informe'];
      $_SESSION['nombre_proyecto'] = $_POST['nombre_proyecto'];
    }else{
      $id_informe = $_SESSION['id_informe'];
    }

    $sql= "SELECT * FROM informe WHERE id = '$id_informe'";
		$result = $mysqli->query ($sql);
        $valores = mysqli_fetch_assoc($result);	


    $sql1= "SELECT * FROM planos WHERE informe_id = '$id_informe'";
        $result1 = $mysqli->query ($sql1);
        
    $sql2= "SELECT * FROM especificacion WHERE informe_id = '$id_informe'";
        $result2 = $mysqli->query ($sql2);

    $sql3= "SELECT * FROM material WHERE informe_id = '$id_informe'";
        $result3 = $mysqli->query ($sql3);

    $sql4= "SELECT * FROM calidad WHERE informe_id = '$id_informe'";
        $result4 = $mysqli->query ($sql4);

    $sql6= "SELECT * FROM actividad WHERE informe_id = '$id_informe'";
        $result6 = $mysqli->query ($sql6);

    $sql7= "SELECT * FROM titulo WHERE informe_id = '$id_informe'";
        $result7 = $mysqli->query ($sql7);

    $sql8= "SELECT * FROM cuadro_obs WHERE informe_id = '$id_informe'";
        $result8 = $mysqli->query ($sql8);

    $sql9= "SELECT * FROM conclusion WHERE informe_id = '$id_informe'";
        $result9 = $mysqli->query ($sql9);

    if ($result1->num_rows > 0 && $result2->num_rows > 0 && $result3->num_rows > 0 && $result4->num_rows > 0 && ($result6->num_rows > 0 || $result7->num_rows > 0 || $result8->num_rows > 0) && $result9->num_rows > 0 )  {
      
      scripts('../../');

      $sql10= "UPDATE informe SET estado = 'COMPLETO' WHERE id = $id_informe";

      $result10 = $mysqli->query($sql10);
      if ($result10) {
        unset($_SESSION['id_informe']);
        confirmar('EL REPORTE HA FINALIZADO CON EXITO...', 'fa fa-window-close', 'green', '../proyectos/proyectos.php');
      }
      else{
        confirmar('ERROR AL FINALIZAR EL REPORTE <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../proyectos/proyectos.php');
      }
    }

	}else if (isset($_POST['id_proyecto']) && !empty($_POST['id_proyecto'])) {
    
    scripts('../../');
    $fecha_visita = date('Y-m-d');
 
		$sentencia = sprintf("INSERT INTO informe (proyecto_id, estado, fecha_visita, tipo_informe) VALUES (%s, %s, %s, %s)",
                    
       GetSQLValueString($_POST['id_proyecto'], "text"),
       GetSQLValueString('INCOMPLETO', "text"),
       GetSQLValueString($fecha_visita, "text"),
       GetSQLValueString('PARCIAL', "text"));

    $result11 = $mysqli->query($sentencia);
      
      $_SESSION['id_informe'] = $mysqli->insert_id;
      $_SESSION['nombre_proyecto'] = $_POST['nombre_proyecto'];
    if ($result11) {
      confirmar('SE CREO SU VISITA SATISFACTORIAMENTE...', 'fa fa-window-close', 'green', 'S');
      $mostarBoton=true;
    }
    else{
      confirmar('ERROR 300 <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../proyectos/proyectos.php');
    }
	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supervisión</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../../css/layout.css">
  <link rel="stylesheet" href="../../css/file-input.css">
  
  <link rel="stylesheet" href="../../css/informe.css">
  <script src="../../js/informe.js"></script>


</head>
<body>
 <!--Header-->
  <header id="header">
      <div class="container-fluid" >
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <img src="../../img/logo_blanc2.png" class="img-responsive" width="100%">
          </div>
      </div>
      <div align="right" style="color: #fff;">
        <a href="../../cx/destroy_session.php">
          Cerrar Session
           <span class="glyphicon glyphicon-off"></span>
        </a>
      </div>
  </header>


<div class="container">
	<div class="row col-md-2">
	</div>
	<div class="row col-md-9">
		<h2>Informe del proyecto:<br><br> <strong><?php echo $_SESSION['nombre_proyecto']; ?></strong></h2><hr>

    <div class="row col-md-12">
      <div class="col-md-6">
        <form action='../proyectos/proyectos.php' method='POST' >
          <button type="submit" name='id_proyecto' value='<?php if (isset($_POST['id_proyecto'])) echo $_POST['id_proyecto'] ?>' class="btn btn-primary" style="background-color: #ff3636" >
            <span class="glyphicon glyphicon-arrow-left"></span> Volver
          </button>
        </form>
      </div>
      <div class="col-md-6" style="text-align: right;">
        <form action='../generar' method='POST' >
          <button type="submit"  class="btn btn-success "  style="background-color: #ff3636">
            <span class="glyphicon glyphicon-plus"></span>Exportar PDF
          </button>
        </form>
      </div>
    </div>
    <div class="col-md-12" id="responsables">
      <div class="col-lg-5  form-group">
        <label for="dir_obra">Director de obra:</label>
        <input type="text" placeholder="Nombres y Apellidos" class="form-control" id="dir_obra" name="dir_obra" <?php if (isset($valores['director_obra']) && !empty($valores['director_obra'])) echo "disabled='' readonly value='".$valores['director_obra']."'"; ?> />
      </div>
      <div class="col-lg-5  form-group" >
        <label for="resi_obra">Residente de obra:</label>
        <input type="text" placeholder="Nombres y Apellidos" class="form-control" id="resi_obra" name="resi_obra" <?php if (isset($valores['residente_obra']) && !empty($valores['residente_obra'])) echo "disabled='' readonly value='".$valores['residente_obra']."'"; ?>/>
      </div>
      <div id="boton_responsables" class="col-md-2 form-group" <?php if (isset($valores['residente_obra']) && !empty($valores['residente_obra']) || isset($valores['residente_obra']) && !empty($valores['residente_obra'])) echo "hidden=''"; ?> >
        <!-- <label for="resi_obra"></label> -->
        <br>

        <button type="button"  class="btn btn-success " id="guarda_responsables">
          <span class="glyphicon glyphicon-ok"></span>
        </button>
      </div>
    </div>

    <div class="col-md-12"> 
    <hr><br>
    </div>
    <ul class="nav nav-tabs">
      <li class=""><a data-toggle="tab" href="#home">Control de planos</a></li>
      <li><a data-toggle="tab" href="#menu1">Control de especificaciones</a></li>
      <li><a data-toggle="tab" href="#menu2">Control de materiales</a></li>
      <li><a data-toggle="tab" href="#menu3">Ensayos de control de calidad</a></li>
      <li><a class="active" data-toggle="tab" href="#menu4">Control de la ejecución</a></li>
      <li><a data-toggle="tab" href="#menu5">Conclusiones y recomendaciones</a></li>
    </ul>

		<div class="tab-content col-md-12">
<!------------- empieza planos  -------------->
			<?php include_once ('lyt_planos.php'); ?>
<!------------- empieza especificaciones  -------------->
      <?php include_once ('lyt_especificaciones.php'); ?>
<!------------- empieza materiales  -------------->
      <?php include_once ('lyt_materiales.php'); ?>
<!------------- empieza calidad  -------------->
      <?php include_once ('lyt_calidad.php'); ?>
<!------------- empieza control de la ejecucion  -------------->
      <?php include_once ('lyt_ejecucion.php'); ?>
<!------------- empieza conclusiones y recomendaciones  -------------->
      <?php include_once ('lyt_recomendaciones.php'); ?>
		</div>
		<hr>
		<div style="text-align: center;" class="col-md-12">
      <form id="miformFinalizacion" name="miformFinalizacion" method="post" action="../../controllers/controller_informe.php">     
		  	<button  type="submit" name="finalizar" value="13" class="btn btn-primary">FINALIZAR</button>
      </form>
		</div>
	</div>
 
</div>
<br><br>

  <!-- footer ================================================== -->
   <footer class="container navbar-bottom">

      <div class="row">

         <div class="twelve columns">            

            <ul class="copyright">
               <li>Copyright 2018 &copy; Computer Services</li>
               <li>Design by <a title="By: srJJ" href="jjrrdecali90@gmail.com/">srJJ</a></li>          
            </ul>

         </div>          

      </div>

      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a></div>


   </footer> <!-- Footer End-->
<!-- funcion que hace poner el nombre de las fotos en los label correspondientes -->
<script type="text/javascript">
  function inputsImg() {
    'use strict';

    ;( function ( document, window, index )
    {
      var inputs = document.querySelectorAll( '.inputfile' );
      Array.prototype.forEach.call( inputs, function( input )
      {
        var label  = input.nextElementSibling,
          labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
          var fileName = '';
          if( this.files && this.files.length > 1 )
            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
          else
            fileName = e.target.value.split( '\\' ).pop();

          if( fileName )
            label.querySelector( 'span' ).innerHTML = fileName;
          else
            label.innerHTML = labelVal;
        });
      });
    }( document, window, 0 ) );
  }
</script>

  <link rel='stylesheet' href='../../plugins/font-awesome/css/font-awesome.min.css'>
  <link rel='stylesheet' href='../../plugins/demo/demo.css'>
  <link rel='stylesheet' type='text/css' href='../../plugins/jquery-confirm.css'>
  <!-- Este SCRIPT ejecuta todos los alerts -->
  <script src='../../plugins/demo/libs/bundled.js'></script>
  <script src='../../plugins/demo/demo.js'></script>
  <script type='text/javascript' src='../../plugins/jquery-confirm.js'></script>

</body>
</html>


