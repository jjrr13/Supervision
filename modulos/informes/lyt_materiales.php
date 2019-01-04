<div id="menu2" class="tab-pane fade">
  <h3>Control de materiales</h3>
  <form id="miformMateriales" method="post" name="miformMateriales" action="../../controllers/controller_informe.php"> 
    <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
      <thead style=" background-color: #9b9090; color: #fff;">
        <tr class="cabeza" >
          <th >Fecha</th>
          <th >Tipo de ensayo</th>
          <th >Descripción</th> 
          <th >Observaciones</th>
        </tr>
      </thead>
      <tbody id="miBody3">
      <?php
        if (isset($result3) && $result3->num_rows > 0) {
           
        while ($valores3 = mysqli_fetch_array($result3)) {
      ?>
          <tr>
            <th>
              <input size="7" class="form-control datepicker" style="text-align: center;"  type="date" <?php echo "readonly name='".$valores3['fecha_ma']."_".$valores3['id']."' value='".$valores3['fecha_ma']."'" ; ?> >
            </th>
            <th>
              <input size="10" class="form-control " style="text-align: center;" type="text" <?php echo "readonly name='".$valores3['tipo_ensayo_ma']."_".$valores3['id']."' value='".$valores3['tipo_ensayo_ma']."'" ; ?> >
            </th>
            <th>
              <input  class="form-control "  type="text" <?php echo "readonly name='".$valores3['descripcion_ma']."_".$valores3['id']."' value='".$valores3['descripcion_ma']."'" ; ?> >
            </th>
            <th>
              <input class="form-control " type="text" <?php echo "readonly name='".$valores3['observacion_ma']."_".$valores3['id']."' value='".$valores3['observacion_ma']."'" ; ?> >
            </th>
          </tr>
      <?php } 
        }
        else {
      ?>
          <tr class="gradeA" id="div_fecha_ma_0">
            <th >
              <input size="14" id="fecha_ma_0" name="fecha_ma_[]" type="date" class="form-control datepicker">
            </th>
            <th >
              <input size="14" id="tipo_ensayo_ma_0" name="tipo_ensayo_ma_[]" type="text" class="form-control ">
            </th>
            <th >
              <input size="32" id="descripcion_ma_0" name="descripcion_ma_[]" type="text" class="form-control ">
            </th>
            <th >
              <input type="text" id="observacion_ma_0" name="observacion_ma_[]" class="form-control ">
            </th>
          </tr>
         <?php } ?>
      </tbody>
    </table>
  <?php if (empty($result3) || $result3->num_rows <= 0) { ?>
        <div class="form-group"></div>
        <div class="col-md-12">
          <div class="col-md-6">
            <button   type="button" class="btn btn-danger" id="fecha_ma_eliminar" disabled="" onclick="eliminarfila('material')"><span class='glyphicon glyphicon-minus' ></span></button>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <button   type="button" class="btn btn-success" onclick="crearfila2('material')"><span class='glyphicon glyphicon-plus'></span></button>
          </div>
        </div>
  <?php  } ?>
  <!-- `filas -->
    <br><br>
    
    <div style="text-align: center;"  >
      <?php if (  $mostarBoton==true || (isset($result3) && $result3->num_rows <= 0)){ ?>
        <button  id="guarda_m" type="submit" name="formMateriales" value="3" class="btn btn-success">GUARDAR</button>
      <?php } ?>
    </div>
  </form>
</div>