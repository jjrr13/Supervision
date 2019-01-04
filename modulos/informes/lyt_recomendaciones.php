<div id="menu5" class="tab-pane fade">
  <h3>Conclusiones y recomendaciones</h3>
  <form id="miform6" method="post" name="miform6" action="../../controllers/controller_informe.php">
	  <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
      <thead style=" background-color: #9b9090; color: #fff;">
        <tr class="cabeza" >
          <th style="width: 10%;" >No. Item</th>
          <th >Comentario</th>
        </tr>
      </thead>
      <tbody id="miBody7">
      <?php
      if (isset($result9) && $result9->num_rows > 0) {
          
        while ($valores9 = mysqli_fetch_array($result9)) {
      ?>
          <tr>
            <th>
                <input size="10" class="form-control " style="text-align: center;" type="number" <?php echo "readonly name='no_conclusion_0".$valores9['id']."' value='".$valores9['no_conclusion']."'" ; ?> >
            </th>
            <th>
                <input class="form-control descripcion_co_" type="text" <?php echo "readonly name='descripcion_co".$valores9['id']."' value='".$valores9['descripcion_co']."'" ; ?> >
            </th>
          </tr>
      <?php } 
      }else {
      ?>
        <tr class="gradeA" id="div_no_conclusion_0">
          <th >
            <input id="no_conclusion_0" name="no_conclusion_[]" type="number" class="form-control" value="1">
          </th>
          <th >
            <input id="descripcion_co0" name="descripcion_co[]" type="text" class="form-control descripcion_co_">
          </th>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <?php if (empty($result9) || $result9->num_rows <= 0) { ?>
      <div class="form-group"></div>
        <div class="col-md-12">
          <div class="col-md-6">
            <button   type="button" class="btn btn-danger" id="no_conclusion_eliminar" disabled="" onclick="eliminarfila('conclusion')"><span class='glyphicon glyphicon-minus' ></span></button>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <button type="button" class="btn btn-success" onclick="crearFilaConclusion()"><span class='glyphicon glyphicon-plus'></span></button>
          </div>
        </div>
    <?php  } ?>
	  <div style="text-align: center;">
        <?php 
          if (  $mostarBoton==true || (isset($result9) && $result9->num_rows <= 0) ){ ?>
            <button  id="guarda_r" type="submit" name="formConclusion" value="6" class="btn btn-success">GUARDAR</button>
        <?php } ?>
	  </div>
  </form>
</div>