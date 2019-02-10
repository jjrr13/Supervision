<?php  

function getMateriales($id_informe)
{ 
  global $mysqli;
  $sql3= "SELECT * FROM material WHERE informe_id = '1'";
        $result3 = $mysqli->query ($sql3);

  $materiales='
  <table border="1" cellpadding="1" cellspacing="1" align="center" width="100%">
    <tr nobr="true">
      <th colspan="4">Control de materiales</th>
    </tr>
    <thead>
      <tr>
        <th><strong>Fecha</strong></th>
        <th><strong>Tipo de ensayo</strong></th>
        <th><strong>Descripción</strong></th>
        <th><strong>Observaciones</strong></th> 
      </tr>
    </thead>';
      if (isset($result3) && $result3->num_rows > 0) {
        while ($valores3 = mysqli_fetch_array($result3)) {
          $materiales.="
          <tr>
            <td>
              <label>".$valores3['fecha_ma']."</label>
            </td>
            <td>
              <label>".$valores3['tipo_ensayo_ma']."</label>
            </td>
            <td>
              <label>".$valores3['descripcion_ma']."</label>
            </td>
            <td>
              <label>".$valores3['observacion_ma']."</label>
            </td>
          </tr>";
        } 
      }
      else {
        $materiales.='
        <tr nobr="true">
          <th colspan="4">EN ESTE PERIODO NO HUBO MATERIALES</th>
        </tr>';
      }
    $materiales.="
  </table>
  <br>
  <hr>
  <br>";

  return $materiales;
}