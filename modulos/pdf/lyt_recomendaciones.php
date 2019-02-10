<?php 

function getRecomendaciones($id_informe)
{
  global $mysqli;
  $sql9= "SELECT * FROM conclusion WHERE informe_id = '$id_informe'";
          $result9 = $mysqli->query ($sql9);

  $recomendaciones='
  <table border="1" cellpadding="1" cellspacing="0" align="center">
    <tr nobr="true">
      <th colspan="2" style="padding: 5px;">Conclusiones y recomendaciones</th>
    </tr>
    <thead>
      <tr>
        <th><strong>No. Item</strong></th>
        <th><strong>Comentario</strong></th>
      </tr>
    </thead>';

    if (isset($result9) && $result9->num_rows > 0) {
        
      while ($valores9 = mysqli_fetch_array($result9)) {
        $recomendaciones.="
        <tr>
          <td>
             <label>".$valores9['no_conclusion']."</label>
          </td>
          <td>
              <label>".$valores9['descripcion_co']."</label>
          </td>
        </tr>";
      } 
    }else {
      $recomendaciones.='
        <tr nobr="true">
          <th colspan="2">EN ESTE PERIODO NO HUBO PROCESOS DE RECOMENDACIONES</th>
        </tr>';
    }
    $recomendaciones.="
  </table>
  <br>
  <hr>
  <br>";

  return $recomendaciones;
}