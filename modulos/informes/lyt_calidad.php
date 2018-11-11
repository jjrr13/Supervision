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


      // $(".boton").click(function() {

      //   var valores = "";

      //   // Obtenemos todos los valores contenidos en los <td> de la fila
      //   // seleccionada
      //   $(this).parents("tr").find(".numero").each(function() {
      //     valores += $(this).html() + "\n";
      //   });
      //   console.log(valores);
      //   alert(valores);
      // });
    });
  </script>
      	<div id="menu3" class="tab-pane fade">
				  <h3>Control de Calidad</h3>
				  <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
                       <thead style=" background-color: #9b9090; color: #fff;">
                        <tr class="cabeza" >
                         <th >Fecha</th>
                         <th >Tipo de Ensayo</th>
                         <th >Descripcion</th> 
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
                          <?php } }
                          else {
                           ?>

                           <tr class="gradeA">
                               <th ><input size="14" name="fecha_ca_0" type="date" class="form-control datepicker"></th>
                               <th ><input size="14" name="tipo_ensayo_ca_0" type="text" class="form-control "></th>
                               <th ><input size="32" name="descripcion_ca_0" type="text" class="form-control "></th>
                               <th ><input type="text" name="observacion_ca_0" class="form-control "></th>
                           </tr>
                           <?php } ?>
                       </tbody>
                    </table>
                     <?php if (empty($result4) || $result4->num_rows <= 0) { ?>
                        <div style="text-align: right;">
                            <button   type="submit" class="btn btn-success" onclick="crearfila2('calidad')"><span class='glyphicon glyphicon-plus'></span></button>
                        </div>
                     <?php  } ?>
                  <!-- `filas -->
                  <br><br>
                  
                  <div style="text-align: center;"  >
                    <button <?php if (isset($result4) && $result4->num_rows > 0) echo "disabled"; ?> type="submit" class="btn btn-success">GUARDAR</button>
                  </div>
				</div>