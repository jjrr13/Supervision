        <div id="menu1" class="tab-pane fade">
				  <h3>Especificaciones</h3>

            <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
               <thead style=" background-color: #9b9090; color: #fff;">
                <tr class="cabeza" >
                 <th >Doc:</th>
                 <th >Version</th>
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

                   <tr class="gradeA">
                       <th ><input size="14" name="documento_anx_0" type="text" class="form-control "></th>
                       <th ><input size="5" name="version_es_0" type="text" class="form-control "></th>
                       <th ><input size="14" name="fecha_es_0" type="date" class="form-control datepicker"></th>
                       <th ><input size="32" name="contenido_es_0" type="text" class="form-control "></th>
                       <th ><input type="text" name="observacion_es_0" class="form-control "></th>
                   </tr>
                   <?php } ?>
               </tbody>
            </table>
            <?php if (empty($result2) || $result2->num_rows <= 0) { ?>
                <div style="text-align: right;">
                    <button   type="submit" class="btn btn-success" onclick="crearfila('especificaciones')"><span class='glyphicon glyphicon-plus'></span></button>
                </div>
            <?php  } ?>
            <!-- `filas -->
            <br><br>

            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
         
            <div style="text-align: center;"  >
              <button <?php if (isset($result2) && $result2->num_rows > 0) echo "disabled"; ?> type="submit" class="btn btn-success">GUARDAR</button>
            </div>
				</div>