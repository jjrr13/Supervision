<?php 

function getEjecuciones($id_informe)
{
  global $mysqli;
  $sql6= "SELECT * FROM actividad WHERE informe_id = '$id_informe'";
      $result6 = $mysqli->query ($sql6);

  $sql7= "SELECT * FROM titulo WHERE informe_id = '$id_informe'";
      $result7 = $mysqli->query ($sql7);

  $sql8= "SELECT * FROM cuadro_obs WHERE informe_id = '$id_informe'";
      $result8 = $mysqli->query ($sql8);

  $actividades='';
  $actividades='
  <table border="1" cellpadding="1" cellspacing="1" align="center" width="100%">
    <tr nobr="true">
      <th colspan="2">Seguimiento de actividades</th>
    </tr>
    <thead>
      <tr>
        <th><strong>No. Item</strong></th>
        <th><strong>Observación</strong></th>
      </tr>
    </thead>
    <tbody>';

      if (isset($result6) && $result6->num_rows > 0) {
          
        while ($valores6 = mysqli_fetch_array($result6)) {
          $actividades.="

          <tr>
            <td>
              ".$valores6['no_observacion']."
            </td>
            <td>
              ".$valores6['descripcion_act']."
            </td>
          </tr>";
        } 
      }else {
        $actividades.='
        <tr nobr="true">
          <th colspan="2">EN ESTE PERIODO NO HUBIERON PROCESOS DE ACTIVIDADES</th>
        </tr>';
      }
      $actividades.="
    </tbody>
  </table>";

      //// Registro fotográfico ///////////////////////////////////////// -->
  $fotografias="";
    if (isset($result7) && $result7->num_rows > 0) {
          
      while ($valores7 = mysqli_fetch_array($result7)) {
        $idTitulo= $valores7['id'];

        $sql7_2= "SELECT * FROM grupo_observacion WHERE id_titulo = '$idTitulo'";
        $result7_2 = $mysqli->query ($sql7_2);
          
        if (isset($result7_2) && $result7_2->num_rows > 0) {

          while ($valores7_2 = mysqli_fetch_array($result7_2)) {
            $idObs= $valores7_2['id'];

            $sql7_3= "SELECT * FROM fotos WHERE titulo_grupo_id = '$idObs'";
            $result7_3 = $mysqli->query ($sql7_3);
            
            if (isset($result7_3) && $result7_3->num_rows > 0) {
            
              $j=0;

              $fotografias = '
              <table cellpadding="1" border="1" style="text-align:center;" width="100%">
                <tr nobr="true">
                  <th colspan="2"><h1>'.$valores7['titulo'].'</h1></th>
                </tr>';

              while ($valores7_3 = mysqli_fetch_array($result7_3)) {
                if ($j%2==0 || $result7_3->num_rows == 1) { 
                  $fotografias.=''; 
                }
                $fotografias.=' 
                    
                  <td width="100%" height="100%">
                    <div>
                      <img src="../'.$valores7_3['foto'].'" border="0" height="50%" width="100%"  />
                    </div>
                    <div>
                      <label>'.$valores7_3['pie_foto'].' -  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'.$j.'</label>
                    </div>
                  </td>
                ';
                if ($j%2==0 || $result7_3->num_rows == 1) { $fotografias.='</tr>'; }
                $j++;
              }
            }
            else{
              $fotografias.='
                <tr nobr="true">
                  <th colspan="2">EN ESTE PERIODO NO HUBIERON FOTOS EN LA ASIGNACION</th>
                </tr>';
            }

             $fotografias.='
              <tr nobr="true">
                <th colspan="2">'.$valores7_2['observacion_go'].' - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</th>
              </tr>
              <tr></tr>
            </table>';
            
          } 
        }
        else{
          $fotografias.='
            <tr nobr="true">
              <th colspan="2">EN ESTE PERIODO NO HUBIERON OBSERVACIONES EN ESTE PROCESO</th>
            </tr>
          </table>';
        }
      }
    }else{ 

      $fotografias.='
        <tr nobr="true">
          <th colspan="2">EN ESTE PERIODO NO HUBIERON REGISTROS FOTOGRAFICOS</th>
        </tr>
      </table>';
    } 
        
      //// Cuadro de observaciones ////////////////////////////////////////////// 
     $observaciones='
      <table border="1" cellpadding="1" align="center" width="100%">
        <tr nobr="true">
          <th colspan="4">Cuadro de observaciones</th>
        </tr>
        <thead>
          <tr>
            <th>Numeración</th>
            <th>Observación</th>
            <th>Importancia</th>
            <th>Cumpliento</th> 
          </tr>
        </thead>';
        if (isset($result8) && $result8->num_rows > 0) {
              
          while ($valores8= mysqli_fetch_array($result8)) {
            $observaciones.="
            <tr>
              <td>
                 <label>".$valores8['numeracion']."</label>
              </td>
              <td>
                  <label>".$valores8['observacion_cuobs']."</label>
              </td>
              <td>
                  <label>". $valores8['importancia']."</label>
              </td>
              <td>
                  <label>".$valores8['cumplimiento']."</label>
              </td>
            </tr>";
          } 
        }else {
          $observaciones.='
            <tr nobr="true">
              <th colspan="5">EN ESTE PERIODO NO HUBIERON OBSERVACIONES</th>
            </tr>';
        }
      $observaciones.="
      </table>";

      $contenedor= $actividades."<br><hr><br>".$fotografias."<br><hr><br>".$observaciones."
      <br>
      <hr>
      <br>";
  return $contenedor;
}

