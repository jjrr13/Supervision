<div id="menu2" class="tab-pane fade">
				  <h3>Materiales</h3>
    				<table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
                       <thead style=" background-color: #9b9090; color: #fff;">
                        <tr class="cabeza" >
                         <th >Fecha</th>
                         <th >Tipo de Ensayo</th>
                         <th >Descripcion</th> 
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
                          <?php } }
                          else {
                           ?>

                           <tr class="gradeA">
                               <th ><input size="14" name="fecha_ma_0" type="date" class="form-control datepicker"></th>
                               <th ><input size="14" name="tipo_ensayo_ma_0" type="text" class="form-control "></th>
                               <th ><input size="32" name="descripcion_ma_0" type="text" class="form-control "></th>
                               <th ><input type="text" name="observacion_ma_0" class="form-control "></th>
                           </tr>
                           <?php } ?>
                       </tbody>
                    </table>
                     <?php if (empty($result3) || $result3->num_rows <= 0) { ?>
                        <div style="text-align: right;">
                            <button   type="submit" class="btn btn-success" onclick="crearfila2('material')"><span class='glyphicon glyphicon-plus'></span></button>
                        </div>
                     <?php  } ?>
                  <!-- `filas -->
                  <br><br>
                  
                  <div style="text-align: center;"  >
                    <button <?php if (isset($result3) && $result3->num_rows > 0) echo "disabled"; ?> type="submit" class="btn btn-success">GUARDAR</button>
                  </div>
                </div>