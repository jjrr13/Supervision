<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="container1">
<button id="masfilas" class="add_form_field">Agregar malla o fondo &  nbsp; 
<span style="font-size:16px; font-weight:bold;">+ </span>
</button>

<table id="mytable" class="table-bordered table-striped">
  <tr>
    <th>PÁRAMETRO</th>
    <th>UNIDAD</th> 
    <th>ESPECIFICACIÓN</th>
    <th>RESULTADO</th>
    <th>opciones</th>
  </tr>
</table>
</div>

 $(document).ready(function() {
    $("#masfilas").click(function(){
        $("#mytable").append('<tr><td><input type="text" name="parametros[]"/></td><td> <input type="text" name="unidad[]"/></td><td> <input type="text" name="especificacion[]"/></td><td> <input type="text" name="resultado[]"/></td><td> <a href="#" class="delete">Eliminar</a></td></tr>');
        $('.delete').off().click(function(e) {
            $(this).parent('td').parent('tr').remove();
        });
    });
});

<!--  /////////////////////////////// agregar filas ///////////////////////////// -->