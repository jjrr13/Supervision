<?php 

function getEspecificaciones($id_informe)
{
  global $mysqli;
  $sql2= "SELECT * FROM especificacion WHERE informe_id = '$id_informe'";
      $result2 = $mysqli->query ($sql2);

  $especificaciones='
  <table border="1" cellpadding="1" cellspacing="0" align="center" width="100%">
    <tr nobr="true">
      <th colspan="5" style="padding: 5px;">Control de especificaciones</th>
    </tr>
    <thead>
      <tr>
        <th><strong>Documento</strong></th>
        <th><strong>Versión</strong></th>
        <th><strong>Fecha</strong></th>
        <th><strong>Contenido</strong></th> 
        <th><strong>Observaciones</strong></th>
      </tr>
    </thead>';

      if (isset($result2) && $result2->num_rows > 0) {
          
        while ($valores2 = mysqli_fetch_array($result2)) {
          $especificaciones.="
          <tr>
            <td>
                <label>".$valores2['documento_anx']."</label>
            </td>
            <td>
                <label>".$valores2['version_es']."</label>
            </td>
            <td>
                <label>".$valores2['fecha_es']."</label>
            </td>
            <td>
                <label>".$valores2['contenido_es']."</label>
            </td>
            <td>
                <label>".$valores2['observacion_es']."</label>
            </td>
          </tr>";
        } 
      }
      else {
       $especificaciones.='
          <tr nobr="true">
            <th colspan="5">EN ESTE PERIODO NO HUBIERON ESPECIFICACIONES</th>
          </tr>';
      } 
    $especificaciones.="
  </table>
  <br>
  <hr>
  <br>";
  return $especificaciones;
}
