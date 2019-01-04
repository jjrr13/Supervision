<?php
require_once('../cx/conexion.php');
// && !empty($_POST['formConclusion'])
$empresa_nombre = $_SESSION['empresa_nombre'] ;
$id_informe = $_SESSION['id_informe'];
$nombre_proyecto = $_SESSION['nombre_proyecto'];




if (isset($_POST['formPlanos']) && $_POST['formPlanos']==1 ) {
  scripts('../');

  if (isset($_POST['no_plano_']) && !empty($_POST['no_plano_'][0]) &&
      isset($_POST['fecha_pl_']) && !empty($_POST['fecha_pl_'][0])
  ){
    $sql1= "INSERT INTO planos (informe_id, no_plano, version_pl, fecha_pl, descripcion_pl, observacion_pl ) VALUES ";

    $cant=count($_POST['no_plano_'])-1;;
    foreach ($_POST['no_plano_'] as $key => $value) {
      $no_plano = $_POST['no_plano_'][$key];
      $version_pl = $_POST['version_pl_'][$key];
      $fecha_pl = $_POST['fecha_pl_'][$key];
      $descripcion_pl = $_POST['descripcion_pl_'][$key];
      $observacion_pl = $_POST['observacion_pl_'][$key];


      // echo "$descripcion";
      if ($cant != $key) {
        $sql1.="($id_informe, '$no_plano', '$version_pl', '$fecha_pl', '$descripcion_pl', '$observacion_pl' ),";
      }
      else{
        $sql1.="($id_informe, '$no_plano', '$version_pl', '$fecha_pl', '$descripcion_pl', '$observacion_pl' )";
      }
    }
    echo $sql1;
    $result1 = $mysqli->query($sql1);
    if ($result1) {
      confirmar('PLANOS GUARDADOS...', 'fa fa-thumbs-o-up', 'green', '../modulos/informes/informe.php');
    }
    else{
      confirmar('ERROR AL GUARDAR PLANOS <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
    }
  }
}
else if (isset($_POST['formEspecificaciones']) && $_POST['formEspecificaciones']=2  ) {
  scripts('../');
  if (isset($_POST['documento_anx_']) && !empty($_POST['documento_anx_'][0]) &&
      isset($_POST['fecha_es_']) && !empty($_POST['fecha_es_'][0])
  ){
    $sql2= "INSERT INTO especificacion (informe_id, documento_anx , version_es  , fecha_es, contenido_es, observacion_es ) VALUES ";

    $cant=count($_POST['documento_anx_'])-1;;
    foreach ($_POST['documento_anx_'] as $key => $value) {
      $documento_anx = $_POST['documento_anx_'][$key];
      $version_es = $_POST['version_es_'][$key];
      $fecha_es = $_POST['fecha_es_'][$key];
      $contenido_es = $_POST['contenido_es_'][$key];
      $observacion_es = $_POST['observacion_es_'][$key];

      if ($cant != $key) {
        $sql2.="($id_informe, '$documento_anx', '$version_es', '$fecha_es', '$contenido_es', '$observacion_es' ),";
      }
      else{
        $sql2.="($id_informe, '$documento_anx', '$version_es', '$fecha_es', '$contenido_es', '$observacion_es' )";
      }
    }
    $result2 = $mysqli->query($sql2);
    if ($result2) {
      confirmar('ESPECIFICACIONES GUARDADAS...', 'fa fa-check', 'green', '../modulos/informes/informe.php');
    }
    else{
      confirmar('ERROR AL GUARDAR ESPECIFICACIONES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
    }
  }
  else{
    confirmar('NO LLEGARON ESPECIFICACIONES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
  }
}
else if (isset($_POST['formMateriales']) && $_POST['formMateriales']=3 ) {
  scripts('../');

  if (isset($_POST['fecha_ma_']) && !empty($_POST['fecha_ma_'][0]) &&
      isset($_POST['descripcion_ma_']) && !empty($_POST['descripcion_ma_'][0])
  ){
    $sql3= "INSERT INTO material (informe_id, fecha_ma, tipo_ensayo_ma, descripcion_ma, observacion_ma ) VALUES ";

    $cant=count($_POST['fecha_ma_'])-1;;
    foreach ($_POST['fecha_ma_'] as $key => $value) {
      $fecha_ma = $_POST['fecha_ma_'][$key];
      $tipo_ensayo_ma = $_POST['tipo_ensayo_ma_'][$key];
      $descripcion_ma = $_POST['descripcion_ma_'][$key];
      $observacion_ma = $_POST['observacion_ma_'][$key];

      if ($cant != $key) {
        $sql3.="($id_informe, '$fecha_ma', '$tipo_ensayo_ma', '$descripcion_ma', '$observacion_ma' ),";
      }
      else{
        $sql3.="($id_informe, '$fecha_ma', '$tipo_ensayo_ma', '$descripcion_ma', '$observacion_ma' )";
      }
    }
    $result3 = $mysqli->query($sql3);
    if ($result3) {
      confirmar('MATERIALES GUARDADOS...', 'fa fa-thumbs-o-up', 'green', '../modulos/informes/informe.php');
    }
    else{
      confirmar('ERROR AL GUARDAR MATERIALES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
    }
  }
  else{
    confirmar('NO LLEGARON MATERIALES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
  }
}
else if (isset($_POST['formCalidad']) && $_POST['formCalidad']=4  ) {
  scripts('../');

  if (isset($_POST['fecha_ca_']) && !empty($_POST['fecha_ca_'][0]) &&
      isset($_POST['descripcion_ca_']) && !empty($_POST['descripcion_ca_'][0])
  ){
    $sql4= "INSERT INTO calidad (informe_id, fecha_ca, tipo_ensayo_ca, descripcion_ca, observacion_ca ) VALUES ";

    $cant=count($_POST['fecha_ca_'])-1;;
    foreach ($_POST['fecha_ca_'] as $key => $value) {
      $fecha_ca = $_POST['fecha_ca_'][$key];
      $tipo_ensayo_ca = $_POST['tipo_ensayo_ca_'][$key];
      $descripcion_ca = $_POST['descripcion_ca_'][$key];
      $observacion_ca = $_POST['observacion_ca_'][$key];

      if ($cant != $key) {
        $sql4.="($id_informe, '$fecha_ca', '$tipo_ensayo_ca', '$descripcion_ca', '$observacion_ca' ),";
      }
      else{
        $sql4.="($id_informe, '$fecha_ca', '$tipo_ensayo_ca', '$descripcion_ca', '$observacion_ca' )";
      }
    }
    // echo $sql4;
    $result4 = $mysqli->query($sql4);
    if ($result4) {
      confirmar('CALIDADES GUARDADAS...', 'fa fa-thumbs-o-up', 'green', '../modulos/informes/informe.php');
    }
    else{
      confirmar('ERROR AL GUARDAR CALIDADES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
    }
  }
  else{
    confirmar('NO LLEGARON CALIDADES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
  }
}
else if (isset($_POST['formEjecucion']) && $_POST['formEjecucion']=5  ) {
  scripts('../');
  $datos = false;
  $errores = 0;
  if (isset($_POST['no_observacion_']) && !empty($_POST['no_observacion_'][0]) &&
      isset($_POST['descripcion_act_']) && !empty($_POST['descripcion_act_'][0])
  ){
    $datos= true;
    $sql5= "INSERT INTO actividad (informe_id, no_observacion, descripcion_act ) VALUES ";

    $cant=count($_POST['no_observacion_'])-1;;
    foreach ($_POST['no_observacion_'] as $key => $value) {
      $no_observacion = $_POST['no_observacion_'][$key];
      $descripcion_act = $_POST['descripcion_act_'][$key];

      if ($cant != $key) {
        $sql5.="($id_informe, '$no_observacion', '$descripcion_act' ),";
      }
      else{
        $sql5.="($id_informe, '$no_observacion', '$descripcion_act' )";
      }
    }
    // echo $sql5;
    $result5 = $mysqli->query($sql5);
    if (!$result5) {
      $errores=1;
      confirmar('ERROR AL GUARDAR ACTIVIDADES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
    }
  }
  if (isset($_POST['titulo_']) && !empty($_POST['titulo_'][0])){
    $datos= true;

    $baseRuta='../modulos/';
    $ruta = getRuta($empresa_nombre, $nombre_proyecto, $baseRuta);

    var_dump($_POST);
    echo "<hr>";
    var_dump($_FILES);
    echo "<hr>";

    $erroresTitulos=0;
    $erroresObservaciones=0;
    $erroresFotos=0;
    $erroresFicheros=0;

    $sqlTitulos="INSERT INTO titulo (informe_id, titulo) VALUES ";
    $sqlObs="INSERT INTO grupo_observacion (id_titulo, observacion_go) VALUES ";
    $sqlFotos="INSERT INTO fotos (titulo_grupo_id, foto, pie_foto) VALUES ";

    foreach (array_keys($_POST['titulo_']) as $key) {
      $tit = $_POST['titulo_'][$key];
      $sqlTitulos.= "($id_informe, $tit),";

      $sql6_1 = sprintf("INSERT INTO titulo (informe_id, titulo) VALUES (%s, %s)",
         GetSQLValueString($id_informe, "int"),
         GetSQLValueString($_POST['titulo_'][$key], "text"));

      $result6_1 = $mysqli->query($sql6_1);
      $idTitulos =  $mysqli->insert_id;
      
      if ($result6_1) {

        foreach (array_keys($_POST['observaciones_'][$key]) as $key2) {
          $ob = $_POST['observaciones_'][$key][$key2];
          $sqlObs.= "($idTitulos, $ob),";
          $sql6_2 = sprintf("INSERT INTO grupo_observacion (id_titulo, observacion_go) VALUES (%s, %s)",
           GetSQLValueString($idTitulos, "int"),
           GetSQLValueString($_POST['observaciones_'][$key][$key2], "text"));

          $result6_2 = $mysqli->query($sql6_2);
          $idObs = $mysqli->insert_id;
          
          if ($result6_2) {
            foreach (array_keys($_POST['pieFoto_'][$key][$key2]) as $key3) {

              $tempPie = $_POST['pieFoto_'][$key][$key2][$key3] ;

              $ruta = $ruta . basename($_FILES['file_']['name'][$key][$key2][$key3]);
              $fichero_subido = $baseRuta . $ruta;
              
              if (move_uploaded_file($_FILES['file_']['tmp_name'][$key][$key2][$key3], $fichero_subido)) {

                  $resultImagen="El fichero es válido y se subió con éxito.";

                  $sqlFotos.= "($idObs, $ruta, $tempPie),";
                  $sql6_3 = sprintf("INSERT INTO fotos (titulo_grupo_id, foto, pie_foto) VALUES (%s, %s, %s)",
                   GetSQLValueString($idObs, "int"),
                   GetSQLValueString($ruta, "text"),
                   GetSQLValueString($tempPie, "text"));

                  $result6_3 = $mysqli->query($sql6_3);
                  $idFotos = $mysqli->insert_id;
                  if ($result6_3) {
                    console('$idFotos Se inserto en BD '.$sqlFotos);
                  }else{
                    $erroresFotos++;
                    console('Fallo en la foto '.$sqlFotos);
                  }
              } else {
                $erroresFicheros++;
                  $resultImagen="¡Posible ataque de subida de ficheros!";
              }
            }
          }else{
            $erroresObservaciones++;
            console('Fallo en la Observacion '.$sqlObs);
          }
        }
      }else{
        $erroresTitulos++;
        console('Fallo en el titulo '.$sqlTitulos);
      }
    } 
        console($sqlTitulos);
        console($sqlObs);
        console($sqlFotos);
        


    if ($erroresFicheros > 0) {
      $errores=2;
      confirmar('ERROR AL SUBIR $erroresFicheros FICHEROS <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
    }
    if ($erroresFotos > 0) {
      $errores=3;
      confirmar('ERROR AL GUARDAR $erroresFotos FOTOS <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
    }
    if ($erroresObservaciones > 0) {
      $errores=4;
      confirmar('ERROR AL GUARDAR $erroresObservaciones OBSERVACIONES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
    }
    if ($erroresTitulos > 0) {
      $errores=5;
      confirmar('ERROR AL GUARDAR $erroresTitulos TITULOS <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
    }
    
  }

  if (isset($_POST['numeracion_']) && !empty($_POST['numeracion_'][0]) &&
      isset($_POST['observacion_cuobs_']) && !empty($_POST['observacion_cuobs_'][0]) &&
      isset($_POST['importancia_']) && !empty($_POST['importancia_'][0]) &&
      isset($_POST['cumplimiento_']) && !empty($_POST['cumplimiento_'][0])
  ){
    $datos= true;
    $sql7= "INSERT INTO cuadro_obs (informe_id, numeracion, observacion_cuobs, importancia, cumplimiento, estado_cuobs ) VALUES ";

   $cant=count($_POST['observacion_cuobs_'])-1;;
    foreach ($_POST['observacion_cuobs_'] as $key => $value) {
      $numeracion= $_POST['numeracion_'][$key];
      $observacion_cuobs= $_POST['observacion_cuobs_'][$key];
      $importancia= $_POST['importancia_'][$key];
      $cumplimiento= $_POST['cumplimiento_'][$key];
      $estado_cuobs= 'PENDIENTE';

      if ($cant != $key) {
        $sql7.="($id_informe, '$numeracion', '$observacion_cuobs', '$importancia', '$cumplimiento', '$estado_cuobs' ),";
      }
      else{
        $sql7.="($id_informe, '$numeracion', '$observacion_cuobs', '$importancia', '$cumplimiento', '$estado_cuobs' )";
      }
    }
    // echo $sql7;
    $result7 = $mysqli->query($sql7);
    if (!$result7) {
      $errores=6;
      confirmar('ERROR AL GUARDAR ACTIVIDADES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
    }
  }

  if (!$datos) {
    confirmar('NO LLEGARON DATOS DE EJECUCION <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
  }
  else if ($errores > 0) {
    confirmar('HUBIERON ALGUNOS ERRORES EN EL PROCESO <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
  }
  else{
    confirmar('MODULO DE EJECUCIONES GUARDADO CORRECTAMENTE', 'fa fa-thumbs-o-up', 'green', '../modulos/informes/informe.php');
  }
}
else if (isset($_POST['formConclusion']) && $_POST['formConclusion']=6  ) {

  if (isset($_POST['no_conclusion_']) && !empty($_POST['no_conclusion_'][0]) &&
      isset($_POST['descripcion_co']) && !empty($_POST['descripcion_co'][0])
  ) {
    $sql9= "INSERT INTO conclusion (informe_id, descripcion_co, no_conclusion ) VALUES ";

    $cant=count($_POST['descripcion_co'])-1;;
    foreach ($_POST['descripcion_co'] as $key => $value) {
      $descripcion = $_POST['descripcion_co'][$key];
      $no_conclusion = $_POST['no_conclusion_'][$key];
      // echo "$descripcion";
      if ($cant != $key) {
        $sql9.="($id_informe, '$descripcion', $no_conclusion),";
      }
      else{
        $sql9.="($id_informe, '$descripcion', $no_conclusion)";
      }
    }
  }
    $result9 = $mysqli->query($sql9);
    if ($result9) {
      confirmar('CONCLUSIONES GUARDADAS...', 'fa fa-thumbs-o-up', 'green', '../modulos/informes/informe.php');
    }
    else{
      confirmar('ERROR AL GUARDAR CONCLUSIONES <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/informes/informe.php');
    }
  scripts('../');
}
else if (isset($_POST['finalizar']) && $_POST['finalizar']=13  ) {
  $sql10= "UPDATE informe SET estado = 'COMPLETO' WHERE id = $id_informe";

  $result10 = $mysqli->query($sql10);
  if ($result10) {
    unset($_SESSION['id_informe']);
    confirmar('EL REPORTE HA FINALIZADO CON EXITO...', 'fa fa-thumbs-o-up', 'green', '../modulos/proyectos.php');
  }
  else{
    confirmar('ERROR AL FINALIZAR EL REPORTE <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', '../modulos/proyectos.php');
  }
  scripts('../');
}
else if (isset($_POST['director']) && !empty($_POST['director']) &&
    isset($_POST['residente']) && !empty($_POST['residente'])) {
  $sql = sprintf("UPDATE informe SET director_obra = %s, residente_obra = %s WHERE id = %s",
     GetSQLValueString($_POST['director'], "text"),
     GetSQLValueString($_POST['residente'], "text"),
     GetSQLValueString($id_informe, "text"));

    $result0 = $mysqli->query($sql);
    if ($result0) {
      echo 113;
    }else{
      scripts('../');
      confirmar('ERROR AL GUARDAR LOS RESPONSABLES DE OBRA <br> INTENTA DE NUEVO...', 'fa fa-window-close', 'red', 'S');
    }
}
else{

  var_dump($_POST);
  echo '<pre>'; 
print_r($_POST);
print "</pre>";

 // console($sqlTitulos);
 //   echo $resultImagen;
 // unset($_SESSION['datos']);
}

function getRuta($value1, $value2, $base)
{
  
  $rutaTemp="imagenes/".$value1;
  //verificamos que la carpeta de la empresa u la carpeta del pryecto existan y sino se crean
  if(!file_exists($base.$rutaTemp)){
    console($base.$rutaTemp);
    if (!mkdir($base.$rutaTemp)) {
      $rutaTemp = 'Fallo al crear la carpta';
    }

    if ($rutaTemp != 'Fallo al crear la carpta') {
      $rutaTemp.='/'.$value2;
      if(!file_exists($base.$rutaTemp)){
        if (!mkdir($base.$rutaTemp)) {
          $rutaTemp = 'Fallo al crear la carpta';
        }
      }
    }
  }else{
    $rutaTemp.='/'.$value2;
    if(!file_exists($base.$rutaTemp)){
      if (!mkdir($base.$rutaTemp)) {
        $rutaTemp = 'Fallo al crear la carpta';
      }
    }
  }
  return $rutaTemp.='/';
}

// echo "<hr>";
die();
