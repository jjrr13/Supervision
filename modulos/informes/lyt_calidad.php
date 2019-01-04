<script>
  $(document).ready(function() {
    $("#ok").click(function() {
      var valores = "";

      $(".numero").parent("tr").find("td").each(function() {
          if($(this).html() != "coger valores de la fila"){
             valores += $(this).html() + " ";
          }
      });
      
      valores = valores + "\n";
      alert(valores);
    });

  });
</script>
<div id="menu3" class="tab-pane fade">
<h3>Ensayos de control de calidad</h3>
<form id="miformCalidad" method="post" name="miformCalidad" action="../../controllers/controller_informe.php"> 
  <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
    <thead style=" background-color: #9b9090; color: #fff;">
      <tr class="cabeza" >
        <th >Fecha</th>
        <th >Tipo de ensayo</th>
        <th >Descripción</th> 
        <th >Observaciones</th>
      </tr>
    </thead>
    <tbody id="miBody4">
    <?php
      if (isset($result4) && $result4->num_rows > 0) {

      while ($valores4 = mysqli_fetch_array($result4)) {
    ?>
        <tr>
          <th>
            <input size="7" class="form-control datepicker" style="text-align: center;"  type="date" <?php echo "readonly name='".$valores4['fecha_ca']."_".$valores4['id']."' value='".$valores4['fecha_ca']."'" ; ?> >
          </th>
          <th>
            <input size="10" class="form-control " style="text-align: center;" type="text" <?php echo "readonly name='".$valores4['tipo_ensayo_ca']."_".$valores4['id']."' value='".$valores4['tipo_ensayo_ca']."'" ; ?> >
          </th>
          <th>
            <input  class="form-control "  type="text" <?php echo "readonly name='".$valores4['descripcion_ca']."_".$valores4['id']."' value='".$valores4['descripcion_ca']."'" ; ?> >
          </th>
          <th>
            <input class="form-control " type="text" <?php echo "readonly name='".$valores4['observacion_ca']."_".$valores4['id']."' value='".$valores4['observacion_ca']."'" ; ?> >
          </th>
        </tr>
    <?php } 
      }else {
    ?>
      <tr class="gradeA" id="div_fecha_ca_0">
        <th >
          <input size="14" id="fecha_ca_0" name="fecha_ca_[]" type="date" class="form-control datepicker">
        </th>
        <th >
          <input size="14" id="tipo_ensayo_ca_0" name="tipo_ensayo_ca_[]" type="text" class="form-control ">
        </th>
        <th >
          <input size="32" id="descripcion_ca_0" name="descripcion_ca_[]" type="text" class="form-control ">
        </th>
        <th >
          <input type="text" id="observacion_ca_0" name="observacion_ca_[]" class="form-control ">
        </th>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php 
    if (empty($result4) || $result4->num_rows <= 0) { ?>
        <div class="form-group"></div>
        <div class="col-md-12">
          <div class="col-md-6">
            <button   type="button" class="btn btn-danger" id="fecha_ca_eliminar" disabled="" onclick="eliminarfila('calidad')"><span class='glyphicon glyphicon-minus' ></span></button>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <button   type="button" class="btn btn-success" onclick="crearfila2('calidad')"><span class='glyphicon glyphicon-plus'></span></button>
          </div>
        </div>
  <?php  } ?>
  <!-- `filas -->
  <br><br>

  <div style="text-align: center;"  >
  <?php 
    if (  $mostarBoton==true || (isset($result4) && $result4->num_rows <= 0) ){ ?>
      <button  id="guarda_cc" type="submit" name="formCalidad" value="4" class="btn btn-success">GUARDAR</button>
  <?php } ?>
  </div>
</form>
</div>