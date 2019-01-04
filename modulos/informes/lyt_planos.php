<script>
  $(document).ready(function() {
    $("#guarda_p").click(function() {
      var valores = "";
var cont=0;
      $(".numero").find("input").each(function() {
        valores += $(this).val() + "\n";
     // alert( $(this).val());
      cont++;
      });
      
      valores = valores + "\n";
      //alert(valores + ' -----  '+ cont);
    });

  });
</script>


<div id="home" class="tab-pane fade ">
  <h3>Control de planos</h3>
  <form id="miformPlanos" method="post" name="miformPlanos" action="../../controllers/controller_informe.php">       
    <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
      <thead style=" background-color: #9b9090; color: #fff;">
        <tr class="cabeza" >
          <th >No. Plano</th>
          <th >Versión</th>
          <th >Fecha</th>
          <th >Descripción</th> 
          <th >Observaciones</th>
        </tr>
      </thead>
      <tbody id="miBody1">
      <?php
      if (isset($result1) && $result1->num_rows > 0) {

        while ($valores1 = mysqli_fetch_array($result1)) {
      ?>
          <tr>
            <th>
              <input size="10" class="form-control " style="text-align: center;" type="text" <?php echo "readonly name='".$valores1['no_plano']."_".$valores1['id']."' value='".$valores1['no_plano']."'" ; ?> >
            </th>
            <th>
              <input size="5" class="form-control " style="text-align: center;"  type="text" <?php echo "readonly name='".$valores1['version_pl']."_".$valores1['id']."' value='".$valores1['version_pl']."'" ; ?> >
            </th>
            <th>
              <input size="7" class="form-control datepicker" style="text-align: center;"  type="date" <?php echo "readonly name='".$valores1['fecha_pl']."_".$valores1['id']."' value='".$valores1['fecha_pl']."'" ; ?> >
            </th>
            <th>
              <input  class="form-control "  type="text" <?php echo "readonly name='".$valores1['descripcion_pl']."_".$valores1['id']."' value='".$valores1['descripcion_pl']."'" ; ?> >
            </th>
            <th>
              <input class="form-control " type="text" <?php echo "readonly name='".$valores1['observacion_pl']."_".$valores1['id']."' value='".$valores1['observacion_pl']."'" ; ?> >
            </th>
          </tr>
      <?php } 
      }else {
      ?>
        <tr class="gradeA" id="div_no_plano_0">
          <td class="numero"> 
            <input size="14" id="no_plano_0" name="no_plano_[]" type="text" class="form-control ">
          </td>
          <td class="numero">
            <input size="5" id="version_pl_0" name="version_pl_[]" type="text" class="form-control ">
          </td>
          <td class="numero">
            <input size="14" id="fecha_pl_0" name="fecha_pl_[]" type="date" class="form-control datepicker">
          </td>
          <td class="numero">
            <input size="32" id="descripcion_pl_0" name="descripcion_pl_[]" type="text" class="form-control ">
          </td>
          <td class="numero">
            <input type="text" id="observacion_pl_0" name="observacion_pl_[]" class="form-control ">
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <?php if (empty($result1) || $result1->num_rows <= 0) { ?>
    <div class="form-group"></div>
    <div class="col-md-12">
      <div class="col-md-6">
        <button   type="button" class="btn btn-danger" id="no_plano_eliminar" disabled="" onclick="eliminarfila('plano')"><span class='glyphicon glyphicon-minus' ></span></button>
      </div>
      <div class="col-md-6" style="text-align: right;">
        <button   type="button" class="btn btn-success" onclick="crearfila('plano')"><span class='glyphicon glyphicon-plus'></span></button>
      </div>
    </div>
    <?php  } ?>
    <!-- `filas -->
    <br><br>

    <div style="text-align: center;"  >
      <?php if (  $mostarBoton==true || (isset($result1) && $result1->num_rows <= 0)){ ?>
        <button  id="guarda_p" type="submit" name="formPlanos" value="1" class="btn btn-success">GUARDAR</button>
      <?php } ?>
    </div>
  </form>
</div>