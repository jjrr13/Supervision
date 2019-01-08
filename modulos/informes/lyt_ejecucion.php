<div id="menu4" class="tab-pane fade in active">
	<h3>Control de la ejecución</h3>
  <form id="miformEjecucion" name="miformEjecucion" method="post" enctype="multipart/form-data"  action="../../controllers/controller_informe.php"> 			  
    <button type="button" class="btn accordion collapsed" data-toggle="collapse" data-target="#demo">Seguimiento de actividades
    </button>
    <div id="demo" class="collapse">
      <!-- <button class="btn btn-primary btn-sm" onclick="contenidos();">contenido
      </button> -->
			<!-- //// Tabla  de actividades/////////////////////////////////////////////////////////////// -->
      <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
        <thead style=" background-color: #9b9090; color: #fff;">
          <tr class="cabeza" >
          	<th style="width: 10%;" >No. Item</th>
          	<th >Observación</th>
          </tr>
        </thead>
        <tbody id="miBody5">
          <?php
          if (isset($result6) && $result6->num_rows > 0) {
              
	          while ($valores6 = mysqli_fetch_array($result6)) {
	        ?>
	          <tr>
	            <th>
	              <input size="10" class="form-control " style="text-align: center;" type="number" <?php echo "readonly disabled name='no_observacion_".$valores6['id']."' value='".$valores6['no_observacion']."'" ; ?> >
	            </th>
	            <th>
	              <input class="form-control descripcion_act_" type="text" <?php echo "readonly disabled name='descripcion_act_".$valores6['id']."' value='".$valores6['descripcion_act']."'" ; ?> >
	            </th>
	          </tr>
          <?php } 
          }else {
          ?>
            <tr class="gradeA" id="div_no_observacion_0">
              <th ><input id="no_observacion_0" name="no_observacion_[]" type="number" class="form-control" value="1"></th>
              <th ><input id="descripcion_act_0" id="descripcion_act_[]" name="descripcion_act_" type="text" class="form-control descripcion_act_"></th>
            </tr>
          <?php } ?>
        </tbody>
      </table>
       <?php 
       if (empty($result6) || $result6->num_rows <= 0) { ?>
          <div class="form-group" ></div>
          <div class="col-md-12" style="padding-bottom: 15px;">
            <div class="col-md-6">
              <button   type="button" class="btn btn-danger" id="no_observacion_eliminar" disabled="" onclick="eliminarfila('actividades')"><span class='glyphicon glyphicon-minus' ></span></button>
            </div>
            <div class="col-md-6" style="text-align: right;">
              <button   type="button" class="btn btn-success" onclick="crearfila3()"><span class='glyphicon glyphicon-plus'></span></button>
            </div>
          </div>
       <?php  } ?>
    </div>

		<!--//// registros///////////////////////////////////////// -->
		<!-- /*++++++++++++ QUEDA PENDIENTE VALIDAR DATOS, ++++++++++++++++++++*/ -->

    <button type="button" class="btn accordion collapsed" data-toggle="collapse" data-target="#demo1">Registro fotográfico</button>
		<div id="demo1" class="collapse" disabled>
      <?php
      if (isset($result7) && $result7->num_rows > 0) {
            
        while ($valores7 = mysqli_fetch_array($result7)) {
          $idTitulo= $valores7['id'];
      ?>
          <div class="col-md-12">
            <h3 style="text-align: center;"><strong><u><?php echo $valores7['titulo']; ?></u></strong></h3>
          </div>
          <?php
          $sql7_2= "SELECT * FROM grupo_observacion WHERE id_titulo = '$idTitulo'";
            $result7_2 = $mysqli->query ($sql7_2);

          while ($valores7_2 = mysqli_fetch_array($result7_2)) {
            $idObs= $valores7_2['id'];

            $sql7_3= "SELECT * FROM fotos WHERE titulo_grupo_id = '$idObs'";
              $result7_3 = $mysqli->query ($sql7_3);

            while ($valores7_3 = mysqli_fetch_array($result7_3)) {
          ?>
              <div class="img-thumbnail ml col-md-6" >
                <label  ><?php echo $valores7_3['pie_foto']; ?></label>
                <img src="<?php echo '../'.$valores7_3['foto']; ?>" width='100%' height='50%'>
                <div class='col-lg-1  form-group'></div>
              </div>

          <?php } ?>
            <div class='col-lg-1  form-group'></div>
            <div class="col-md-12">
              <h4><strong><?php echo $valores7_2['observacion_go']; ?></strong></h4>
              <hr>
            </div>

      <?php 
            }
          } 
        }else{ ?>
          <div id="titulos_0" class="col-md-12" style="margin-bottom: 15px; border: 1px solid #ccc; padding-top: 15px; padding-bottom: 15px ;">
						<!-- contenedor de los titulos -->
            <div class="col-md-12">
              <label for="titulo_0" class="col-md-9 control-label" >Agregar un título</label>
              <label id="masContenido_0"  for="titulo" class="col-md-3 control-label masContenido_0" >Agregar contenido</label>
              <div class="col-md-10">
                <!-- <input type="text" id="titulo_1" name="titulo_[1]" class="col-md-10 form-control"> -->
                <input type="text" id="titulo_0" name="titulo_[0]" class="col-md-10 form-control" value="hola 1">
              </div>
              <div class="col-md-2">
                <button id="masContenido_0"  type="button" class="btn btn-success masContenido_0" onclick="crearContenido()"><span class='glyphicon glyphicon-plus'></span></button>
              </div>
            </div>
						<!-- espacio para las fots -->
            <div id="divObs_00" class="col-md-12" style="margin-top: 10px;">
              <div class="col-md-6" style="margin-bottom: 10px;" >
                <div class="conten">
                  <input style="text-align: center;" type="text" name="pieFoto_[0][0][0]" class="form-control" placeholder="Ingrese Pie-Foto" value="foto 1.1.1">

                  <input type="file" name="file_[0][0][0]" id="file_000" class="inputfile inputfile-7" onchange="visualiza(event);">
                  <label for="file_000">
                  <span class="iborrainputfile">Ninguna selección</span>
                  <strong>
                  <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>Seleccione foto</strong>
                  </label>
                  <div id="file_000_0" class="prew" >Previsualización...</div>
                </div>
              </div>
            </div>
            <div id="masFotos_00" style="text-align: right; margin-right: 15px; ">
              <label class="control-label">Agregar mas fotos</label>
              <button id="masFotos_00"  type="button" class="btn btn-success" onclick="crearFoto()"><span class='glyphicon glyphicon-plus'></span></button>
            </div>
						<!-- Observvaciones -->
            <div class="col-md-12">
              <label for="observaciones_00" class="col-md-12 control-label" >Observaciones</label>
              <input type="text" name="observaciones_[0][0]" class="form-control"  value="obs 1.1">
            </div>
              <div id="masObservaciones_00" style="text-align: right; margin-right: 15px;">
                <!-- <button id="masObservaciones_00"  type="button" class="btn btn-primary" onclick="getFormData2(this)"><span class='glyphicon glyphicon-less'></span>quitar</button> -->
                <label class="control-label" style="">Agregar mas observaciones</label>
                <button id="masObservaciones_00"  type="button" class="btn btn-success" onclick="crearObservacion(this)"><span class='glyphicon glyphicon-plus'></span></button>
              </div>
          </div>
       	<?php } ?>
      </div>
			<!-- //// Observaciones //////////////////////////////////////////////////////// -->
    <button type="button" class="btn accordion collapsed" data-toggle="collapse" data-target="#demo2">Cuadro de observaciones</button>
    <div id="demo2" class="collapse">
			<table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
				<thead style=" background-color: #9b9090; color: #fff;">
				  <tr class="cabeza" >
					  <th style="width: 13%;" >Numeración</th>
					  <th style="width: 55%"; >Observación</th>
					  <th style="width: 14%" >Importancia</th>
					  <th >Cumpliento</th> 
					</tr>
				</thead>
			<tbody id="miBody6">
			<?php
			if (isset($result8) && $result8->num_rows > 0) {
			      
				while ($valores8= mysqli_fetch_array($result8)) {
			?>
				  <tr>
				    <th>
				       <input size="3" class="form-control " style="text-align: center;" type="number" <?php echo "readonly disabled name='".$valores8['numeracion']."_".$valores8['id']."' value='".$valores8['numeracion']."'" ; ?> >
				    </th>
				    <th>
				        <input size="20" class="form-control " type="text" <?php echo "readonly disabled name='".$valores8['observacion_cuobs']."_".$valores8['id']."' value='".$valores8['observacion_cuobs']."'" ; ?> >
				    </th>
				    <th>
				        <select class="form-control "  type="text" <?php echo "readonly disabled name='".$valores8['importancia']."_".$valores8['id']."' " ; ?> >
				            <option <?php echo "value='".$valores8['importancia']."'"; ?>><?php echo $valores8['importancia']; ?></option>
				        </select>
				    </th>
				    <th>
				        <input size="20" class="form-control " style="text-align: center;" type="text" <?php echo "readonly disabled name='".$valores8['cumplimiento']."_".$valores8['id']."' value='".$valores8['cumplimiento']."'" ; ?> >
				    </th>
				    <input hidden="hidden" type="text" <?php echo "disabled name='".$valores8['estado_cuobs']."_".$valores8['id']."' value='".$valores8['estado_cuobs']."'" ; ?> >
				  </tr>
			<?php } 
			}else {
			?>

	     	<tr class="gradeA" id="div_numeracion_0">
	        <th >
	        	<input size="14" id="numeracion_0" name="numeracion_[]" type="text" class="form-control ">
	        </th>
	        <th >
	        	<input size="5" id="observacion_cuobs_0" name="observacion_cuobs_[]" type="text" class="form-control ">
	        </th>
	        <th >
	          <select id="importancia_0" name="importancia_[]" class="form-control">
	            <option>ELIJA</option>
	            <option value="BAJA">BAJA</option>
	            <option value="MEDIA">MEDIA</option>
	            <option value="ALTA">ALTA</option>
	            <option value="URGENTE">URGENTE</option>
	          </select>
	        </th>
	        <th>
	         	<input size="32" id="cumplimiento_0" name="cumplimiento_[]" type="text" class="form-control ">
	         </th>
	        <input type="text" hidden="" id="estado_cuobs_0" name="estado_cuobs_[]" value="PENDIENTE">
	     	</tr>
	    <?php } ?>
			</tbody>
			</table>
      <?php if (empty($result8) || $result8->num_rows <= 0 ) { ?>
        <div class="form-group"></div>
        <div class="col-md-12">
          <div class="col-md-6">
            <button   type="button" class="btn btn-danger" id="numeracion_eliminar" disabled="" onclick="eliminarfila('observacion')"><span class='glyphicon glyphicon-minus' ></span></button>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <button   type="button" class="btn btn-success" onclick="crearfila5()"><span class='glyphicon glyphicon-plus'></span></button>
          </div>
        </div>
      <?php  } ?>
    </div>
	  <div style="text-align: center; margin-top: 5px;">
    <?php if ( (empty($result6) || $result6->num_rows <= 0) ||
              (empty($result7) || $result7->num_rows <= 0 ) ||
              (empty($result8) || $result8->num_rows <= 0) ) { ?>
	  	      <button  id="guarda_ce" type="submit" name="formEjecucion" value="5" class="btn btn-success">GUARDAR</button>
    <?php } ?>
	  </div>
  </form>
</div>