<?php
require_once('../../cx/conexion.php');
require_once '../../plugins/mpdf/vendor/autoload.php';

$getPanlos=false;
$getEspecificaciones=false;
$getMateriales=false;
$getCalidad=false;
$getEjecucion=false;
$getRecomendaciones=false;

if (isset($_POST['planos']) && !empty($_POST['planos'])) {
	include_once ('lyt_planos.php'); 
	$getPanlos = true;
}
if (isset($_POST['especificaciones']) && !empty($_POST['especificaciones'])) {
	include_once ('lyt_especificaciones.php'); 
	$getEspecificaciones= true;
}
if (isset($_POST['materiales']) && !empty($_POST['materiales'])) {
	include_once ('lyt_materiales.php'); 
	$getMateriales=true;
}
if (isset($_POST['calidad']) && !empty($_POST['calidad'])) {
	include_once ('lyt_calidad.php'); 
	$getCalidad=true;
}
if (isset($_POST['ejecucion']) && !empty($_POST['ejecucion'])) {
	include_once ('lyt_ejecucion.php'); 
	$getEjecucion=true;
}
if (isset($_POST['recomendaciones']) && !empty($_POST['recomendaciones'])) {
	include_once ('lyt_recomendaciones.php'); 
	$getRecomendaciones=true;
}

if ( isset($_POST['id_proyecto']) && !empty($_POST['id_proyecto']) &&
	isset($_POST['fechaDesde']) && !empty($_POST['fechaDesde']) &&
	isset($_POST['fechaHasta']) && !empty($_POST['fechaHasta'])
	) {
    $fechaDesde=$_POST['fechaDesde'];
    $fechaHasta=$_POST['fechaHasta'];

    $condicion="AND fecha_visita BETWEEN '".$fechaDesde."' AND '".$fechaHasta."'";

		$contenido = '
					<html lang="en">
					<head>
						<meta charset="UTF-8">
						<title>Informe</title>
						
						<script src="https://maxcdn.bo3otstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
					</head>
					<body>';
		$id_proyecto = $_POST['id_proyecto'];

		$sql0= "SELECT * FROM informe WHERE proyecto_id = '$id_proyecto' ".$condicion;
		$result0 = $mysqli->query ($sql0);

		while ( $valores0 = mysqli_fetch_array($result0)) {
			$informe_id = $valores0['id'];

			if ($getPanlos) {
				$contenido.= getPlanos($informe_id); 
			}
			if ($getEspecificaciones) {
      		$contenido.= getEspecificaciones($informe_id);
			}
			if ($getMateriales) {
      	$contenido.= getMateriales($informe_id);
			}
			if ($getCalidad) {
      	$contenido.= getCalidades($informe_id);
			}
			if ($getEjecucion) {
      	$contenido.= getEjecuciones($informe_id);
			}
			if ($getRecomendaciones) {
      	$contenido.= getRecomendaciones($informe_id);
			}
		
			$contenido.="
			<div width='100%'>
			  <div width='47%'>
			    <label for='dir_obra'>Director de la Obra:</label>
			    <input type='text' readonly value='".$valores0['director_obra']."' />
			  </div>
			  <div width='47%' >
			    <label for='resi_obra'>Residente de la Obra:</label>
			    <input type='text' readonly  value='".$valores0['residente_obra']."'/>
			  </div>
			</div><br>";

		}

  $tituloInforme =  $_SESSION['empresa_nombre'];
  // -----------------------------------------------------------------------------
  $header='
    <table border="1" cellpadding="3" align="center" width="100%" >
      
        <tr>
          <td rowspan="3" width="30%">
            <img src="../../img/logo.png" width="30%">
          </td>
          <th width="40%">'.$tituloInforme.'</th>
          <td rowspan="3" width="30%">Informacion del informe <strong>Fecha de Creacion </strong>'.$fecha_registro.'</td>
        </tr>
        <tr>
          <td><strong>Fecha Desde: '.$fechaDesde.'</strong></td>
        </tr>
        <tr>
          <td><strong>Fecha Hasta: '.$fechaHasta.'</strong></td>
        </tr>
    </table>'
  ;

  $footer='
    <div width="51%" style="text-align: right;">
      {PAGENO}
    </div>
    <div width="100%" style="font-size: 8px; text-align: right;">
      <i>Copyright © 2018 - 2028 Desing by: srJJ</i>
    </div>
  ';

  $mpdf = new  \Mpdf\Mpdf(['format' => 'letter', 'margin_left' => 30, 'margin_right' => 30, 'margin_top' => 50,
  'margin_bottom' => 30]);
  //configuracion de el encabezado y pie de pagina
  $mpdf->SetHTMLHeader($header); 
  $mpdf->SetHTMLFooter($footer); 
  //Marca de agua texto
  // $mpdf->SetWatermarkText('CU1');
  // $mpdf->showWatermarkText = true;
  //Marca de agua imagen
  // $mpdf->SetWatermarkImage('img/logo.png',0.2,'F');
  // $mpdf->showWatermarkImage = true;
  $html= $contenido."</body></html>"; 
  $mpdf->WriteHTML($html);
  $mpdf->Output();
  // ob_end_flush();
  ob_clean();
}
else{
scripts('../../');

	confirmar('FALTO ALGUN DATO <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../generar');
}
