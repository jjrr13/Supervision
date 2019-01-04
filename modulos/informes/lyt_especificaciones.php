<div id="menu1" class="tab-pane fade">
  <h3>Control de especificaciones</h3>
  <form id="miformEspecificaciones" method="post" name="miformEspecificaciones" action="../../controllers/controller_informe.php">       

    <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
       <thead style=" background-color: #9b9090; color: #fff;">
        <tr class="cabeza" >
         <th >Documento</th>
         <th >Versión</th>
         <th >Fecha</th>
         <th >Contenido</th> 
         <th >Observaciones</th>
        </tr>
       </thead>
       <tbody id="miBody2">
            <?php
        if (isset($result2) && $result2->num_rows > 0) {
            
        while ($valores2 = mysqli_fetch_array($result2)) {
            

        ?>
        <tr>
          <th>
              <input size="10" class="form-control " style="text-align: center;" type="number" <?php echo "readonly name='".$valores2['documento_anx']."_".$valores2['id']."' value='".$valores2['documento_anx']."'" ; ?> >
          </th>
          <th>
              <input size="5" class="form-control " style="text-align: center;"  type="text" <?php echo "readonly name='".$valores2['version_es']."_".$valores2['id']."' value='".$valores2['version_es']."'" ; ?> >
          </th>
          <th>
              <input size="7" class="form-control datepicker" style="text-align: center;"  type="date" <?php echo "readonly name='".$valores2['fecha_es']."_".$valores2['id']."' value='".$valores2['fecha_es']."'" ; ?> >
          </th>
          <th>
              <input  class="form-control "  type="text" <?php echo "readonly name='".$valores2['contenido_es']."_".$valores2['id']."' value='".$valores2['contenido_es']."'" ; ?> >
          </th>
          <th>
              <input class="form-control " type="text" <?php echo "readonly name='".$valores2['observacion_es']."_".$valores2['id']."' value='".$valores2['observacion_es']."'" ; ?> >
          </th>
        </tr>
          <?php } }
          else {
           ?>

           <tr class="gradeA" id="div_documento_anx_0">
               <th ><input size="14" id="documento_anx_0" name="documento_anx_[]" type="text" class="form-control "></th>
               <th ><input size="5" id="version_es_0" name="version_es_[]" type="text" class="form-control "></th>
               <th ><input size="14" id="fecha_es_0" name="fecha_es_[]" type="date" class="form-control datepicker"></th>
               <th ><input size="32" id="contenido_es_0" name="contenido_es_[]" type="text" class="form-control "></th>
               <th ><input type="text" id="observacion_es_0" name="observacion_es_[]" class="form-control "></th>
           </tr>
           <?php } ?>
       </tbody>
    </table>
    <?php if (empty($result2) || $result2->num_rows <= 0) { ?>
        <div class="form-group"></div>
        <div class="col-md-12">
          <div class="col-md-6">
            <button   type="button" class="btn btn-danger" id="documento_anx_eliminar" disabled="" onclick="eliminarfila('especificaciones')"><span class='glyphicon glyphicon-minus' ></span></button>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <button   type="button" class="btn btn-success" onclick="crearfila('especificaciones')"><span class='glyphicon glyphicon-plus'></span></button>
          </div>
        </div>
    <?php  } ?>
    <!-- `filas -->
    <br><br>
 
    <div style="text-align: center;"  >
      <?php if (  $mostarBoton==true || (isset($result2) && $result2->num_rows <= 0) ){ ?>
        <button id="guarda_es" type="submit" name="formEspecificaciones" value="2" class="btn btn-success">GUARDAR</button>
      <?php } ?>
    </div>
  </form>
</div>