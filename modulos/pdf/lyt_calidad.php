<?php 

function getCalidades($id_informe)
{
  global $mysqli;
  global $pdf;
  $sql4= "SELECT * FROM calidad WHERE informe_id = '1'";
        $result4 = $mysqli->query ($sql4);

  $calidad='
  <table border="1" cellpadding="1" cellspacing="1" align="center" width="100%">
    <tr nobr="true">
      <th colspan="4">Ensayos de control de calidad</th>
    </tr>
    <thead>
      <tr>
        <th><strong>Fecha</strong></th>
        <th><strong>Tipo de ensayo</strong></th>
        <th><strong>Descripción</strong></th>
        <th><strong>Observaciones</strong></th> 
      </tr>
    </thead>';
      if (isset($result4) && $result4->num_rows > 0) {

        while ($valores4 = mysqli_fetch_array($result4)) {
        $calidad.="
          <tr>
            <td>
              <label>".$valores4['fecha_ca']."</label>
            </td>
            <td>
              <label>".$valores4['tipo_ensayo_ca']."</label>
            </td>
            <td>
              <label>".$valores4['descripcion_ca']."</label>
            </td>
            <td>
              <label>".$valores4['observacion_ca']."</label>
            </td>
          </tr>";
        } 
      }else {
        $calidad.='
        <tr nobr="true">
          <th colspan="4">EN ESTE PERIODO NO HUBIERON PROCESOS DE CALIDAD</th>
        </tr>';
      }
      $calidad.="
    </table>
    <br>
  <hr>
  <br>";

  return $calidad;
}