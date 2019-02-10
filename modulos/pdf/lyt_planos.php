<?php 

function getPlanos($id_informe)
{
  global $mysqli;
  $sql1= "SELECT * FROM planos WHERE informe_id = '$id_informe'";
        $result1 = $mysqli->query ($sql1);

  $planos='<table border="1" cellpadding="3" align="center" width="100%">
    <tr nobr="true">
      <th colspan="5" style="padding: 5px;">Control de planos</th>
    </tr>
    <thead>
      <tr>
        <th><strong>No. Plano</strong></th>
        <th><strong>Versión</strong></th>
        <th><strong>Fecha</strong></th>
        <th><strong>Descripción</strong></th> 
        <th><strong>Observaciones</strong></th>
      </tr>
    </thead>';
      
      if (isset($result1) && $result1->num_rows > 0) {

        while ($valores1 = mysqli_fetch_array($result1)) {
          console($valores1['no_plano']);
      $planos.="
          <tr>
            <td style='white-space:nowrap'>
             <label>".$valores1['no_plano']."</label >
            </td>
            <td>
              <label>".$valores1['version_pl']."</label>
            </td>
            <td>
              <label>".$valores1['fecha_pl']."</label>
            </td>
            <td>
              <label>".$valores1['descripcion_pl']."</label>
            </td>
            <td>
              <label>".$valores1['observacion_pl']."</label>
            </td>
          </tr>";
        } 
      }else {
      $planos.='
          <tr nobr="true">
            <th colspan="5">EN ESTE PERIODO NO HUBO PLANOS</th>
          </tr>';
       }
    $planos.="
    </table>
    <br>
  <hr>
  <br>";

  return $planos;
}
