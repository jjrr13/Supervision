<?php 
require_once('../../cx/conexion.php');


// $id_proyecto= isset($_POST['id_proyecto']) ? $_POST['id_proyecto'] : "";

echo isset($_POST['id_proyecto']) ? $_POST['id_proyecto'] : "No llego el proyecto";
echo isset($_POST['id_informe']) ? $_POST['id_informe'] : "No llego el informe";
	
	if (isset($_POST['id_informe']) && !empty($_POST['id_informe'])) {
		$id_informe = $_POST['id_informe'];

        $sql= "SELECT * FROM informe WHERE id = '$id_informe'";
    		$result = $mysqli->query ($sql);
            $valores = mysqli_fetch_array($result);	

        $sql1= "SELECT * FROM planos WHERE informe_id = '$id_informe'";
            $result1 = $mysqli->query ($sql1);
            
        $sql2= "SELECT * FROM especificacion WHERE informe_id = '$id_informe'";
            $result2 = $mysqli->query ($sql2);

        $sql3= "SELECT * FROM material WHERE informe_id = '$id_informe'";
            $result3 = $mysqli->query ($sql3);

        $sql4= "SELECT * FROM calidad WHERE informe_id = '$id_informe'";
            $result4 = $mysqli->query ($sql4);

        $sql5= "SELECT id FROM ejecucion WHERE informe_id = '$id_informe'";
            $result5 = $mysqli->query ($sql5);
            $result5 = mysqli_fetch_array($result5);
            $id_ejecu= $result5['id'];

            $sql5_1= "SELECT * FROM actividad WHERE ejecucion_id = '$id_ejecu'";
                $result5_1 = $mysqli->query ($sql5_1);

            $sql5_2= "SELECT * FROM titulo AS ti
                    INNER JOIN grupo_observacion AS gro ON ti.id = gro.id_titulo
                    INNER JOIN fotos AS ft ON gro.id = ft.titulo_grupo_id 
                    WHERE ti.ejecucion_id = '$id_ejecu'";
                $result5_2 = $mysqli->query ($sql5_2);

            $sql5_3= "SELECT * FROM cuadro_obs WHERE ejecucion_id = '$id_ejecu'";
                $result5_3 = $mysqli->query ($sql5_3);

        $sql6= "SELECT * FROM conclusion WHERE informe_id = '$id_informe'";
            $result6 = $mysqli->query ($sql6);


		$ejecucion_descripcion  = (!empty($valores['Ejecucio_descrip'])) ? $valores['Ejecucio_descrip'] : "" ;
		$Proyect_nomb = (!empty($valores['Proyect_nomb'])) ? $valores['Proyect_nomb'] : "" ;
	}else{
		$sentencia = "INSERT INTO vistas";
	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supervisión</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-1.12.3.js"></script> -->

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../../css/layout.css">
  <link rel="stylesheet" href="../../css/file-input.css">

    <style type="text/css">
        
        .cabeza th{
          border-radius: 8px !important;
          border-top: 2px solid #000;
          border-bottom: 2px solid #000;
          border-right: 2px solid #000;
          text-align: center;
          padding-top: 9px;
          padding-bottom: 9px;
        }

        .cabeza th:first-child{
          border-left: 1px solid #000;
        }

        .accordion {
              background-color: #9b9090; color: #fff;
              /*background-color: #eee;
              color: #444;*/
              cursor: pointer;
              padding: 18px;
              width: 100%;
              border: none;
              text-align: left;
              outline: none;
              font-size: 15px;
              transition: 0.4s;
              margin-bottom: 20px;
          }
          .collapse{
              margin-bottom: 20px;
          }

           .accordion:hover {
              background-color: #ccc;
          }

          .accordion:after {
              font-family: 'Glyphicons Halflings';
              content: '\e114';
              color: #777;
              font-weight: bold;
              float: right;
              margin-left: 5px;
          }

          /*.active:after {
              content: "\e113";
          }*/

          .panel {
              border: 1px solid #9b9090;
              padding: 0 18px;
              background-color: white;
              max-height: 0;
              overflow: hidden;
              transition: max-height 0.2s ease-out;
          }
          /*con esto corregimo el problema de las flechitas no queden en todos los botones*/
          .btn.collapsed:after {
            content: "\e080";
          }

    </style>
<script type="text/javascript">
  $("#submit2").click(function(){

        });

   var valores = new Array();
            var j =0;
            
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){
                valores[j]=$(this).html();
                j++;
                // valores[0]=$(this).val();
            });
   $("#ss-submit").click(function(){
        //capturas los valores de los campos con jquery
        var campo_1= $('#entry_1022626025').val();
        var campo_2= $('#entry_121012742').val();
        var campo_3= $('#entry_1619168523').val();
        var campo_4= $('#entry_1598229916').val();
        var campo_5= $('#entry_518966266').val();
        var campo_6= $('#entry_1469275999').val();

        //una variable que llevara los datos 
        datos = "entry_1022626025="+fecha_cita+"&entry_121012742="+atendio+"&entry_1619168523="+nombre+"&entry_1598229916="+apellido+"&entry_518966266="+LISTA+"&entry_1469275999="+nroradicado;

      $.ajax({
        type: "POST",
        url: "mi_url_de_destino.php",
        data: datos, //pasas los valores de la variable datos
        dataType:"html",
        success: function(data) 
        {
           //si la peticion sale bien, aqui tendras los resultados que quieres
            alert(data);
        },
        error: function( jqXHR, textStatus, errorThrown ){
            //si la peticion falla aqui puedes saber alguna pista respecto al error 
            console.log(textStatus);
            alert('ALGO SALIO MAL, INTENTA DE NUEVO');
        },

        
      });
  });

</script>
<script type="text/javascript">
    window.onload=function()
    {
    };
    //factor de cambio para los names de los inputs
    var numero = 0;
    var numPlano=0;
    var numEspc=0;
    //crea las filas de los planos y de las especificaciones
function crearfila(tipo){
    numero = (tipo != 'plano')? numEspc : numPlano ;

    var body = (tipo != 'plano') ? 2 : 1;
    var documento = (tipo != 'plano') ? 'documento_anx_' : 'no_plano_';
    var version = (tipo != 'plano') ? 'version_es_' : 'version_pl_';
    var fecha = (tipo != 'plano') ? 'fecha_es_' : 'fecha_pl_';
    var contenido = (tipo != 'plano') ? 'contenido_es_' : 'descripcion_pl_';
    var observacion   = (tipo != 'plano') ? 'observacion_es_' : 'observacion_pl_';

    //obtener el valor de los campos requeridos
    var contenidoPlano =  $("input[name='"+documento+"[]']").val().length;
    var contenidoFecha = $("input[name='"+fecha+"[]']").val().length;
    alert(contenidoFecha);
    //validar que no esten vacios
    if (contenidoPlano > 0 && contenidoFecha > 0) {
        var nuevaFila="";
        //se crea la nueva fila con los inputs adentro
        nuevaFila ="<tr class='gradeA numero'>";
        nuevaFila +=   "<th ><input size='14' name='"+documento+"[]' type='text' class='form-control '></th>";
        nuevaFila +=    "<th ><input size='5' name='"+version+"[]' type='text' class='form-control '></th>";
        nuevaFila +=    "<th ><input size='14' name='"+fecha+"[]' type='date' class='form-control datepicker'></th>";
        nuevaFila +=    "<th ><input size='32' name='"+contenido+"[]' type='text' class='form-control '></th>";
        nuevaFila +=    "<th ><input type='text' name='"+observacion+"[]' class='form-control '></th>";
        nuevaFila += "</tr>";

        //se envia en contenido mas la nueva fila
         $("#miBody"+body).append(nuevaFila);
        //se aunmente la variable de factor de cambio
        (tipo != 'plano')? numEspc = numEspc + 1 : numPlano = numPlano + 1 ;
        //se reinicia el valor de numero
        numero = 0;
    }else{
        //en caso de que el uno de los inputs este vacio
        alert('Falta rellenar algun campo');
    }
}
    
    




   //factor de cambio para los names de los inputs
    var numero2 = 0;
    var numMaterial=0;
    var numCalidad=0;
    //crea las filas de los materiales y de la calidad
function crearfila2(tipo){
      numero2 = (tipo == 'material')? numMaterial : numCalidad ;

    var body2 = (tipo == 'material') ? 3 : 4;
    var fecha2 = (tipo == 'material') ? 'fecha_ma_' : 'fecha_ca_';
    var ensayo2 = (tipo == 'material') ? 'tipo_ensayo_ma_' : 'tipo_ensayo_ca_';
    var contenido2 = (tipo == 'material') ? 'descripcion_ma_' : 'descripcion_ca_';
    var observacion2   = (tipo == 'material') ? 'observacion_ma_' : 'observacion_ca_';
    // alert(numero2);
    //obtener el valor de los campos requeridos
    var contenidoMaterial =  $("input[name='"+ensayo2+numero2+"']").val().length;
    var contenidoFecha2 = $("input[name='"+fecha2+numero2+"']").val().length;
    // alert(contenidoFecha2 + ' funcion de '+ tipo);
    //validar que no esten vacios
    if (contenidoMaterial > 0 && contenidoFecha2 > 0) {
        var nuevaFila="";
        //se crea la nueva fila con los inputs adentro
        nuevaFila ="<tr class='gradeA'>";
        nuevaFila += "<th ><input size='14' name='"+fecha2+(numero2+1)+"' type='date' class='form-control datepicker'></th>";
        nuevaFila += "<th ><input size='14' name='"+ensayo2+(numero2+1)+"' type='text' class='form-control '></th>";
        nuevaFila += "<th ><input size='32' name='"+contenido2+(numero2+1)+"' type='text' class='form-control '></th>";
        nuevaFila += "<th ><input type='text' name='"+observacion2+(numero2+1)+"' class='form-control '></th>";
        nuevaFila +="</tr>";

        //se envia en contenido mas la nueva fila
         $("#miBody"+body2).append(nuevaFila);
        //se aunmente la variable de factor de cambio
        (tipo == 'material')? numMaterial = numMaterial + 1 : numCalidad = numCalidad + 1 ;
        //se reinicia el valor de numero
        numero2 = 0;
    }else{
        //en caso de que el uno de los inputs este vacio
        alert('Falta rellenar algun campo');
    }
}

    var numero3 = 0;
function crearfila3(){

    var item = 'no_observacion_';
    var descripcion = 'descripcion_act_';

    //obtener el valor de los campos requeridos
    var contenidoItem =  $("input[name='"+item+numero3+"']").val().length;
    var contenidoDescrip = $("input[name='"+descripcion+"']").val().length;
    //validar que no esten vacios
    if (contenidoItem > 0 && contenidoDescrip > 0) {
        var nuevaFila="";
        //se crea la nueva fila con los inputs adentro
        nuevaFila ="<tr class='gradeA'>";
        nuevaFila += "<th ><input name='"+item+(numero3+1)+"' value='"+(numero3+2)+"' type='number' class='form-control'></th>";
        nuevaFila += "<th ><input id='"+descripcion+(numero3+1)+"' name='"+descripcion+"' type='text' class='form-control descripcion_act_'></th>";
        nuevaFila +="</tr>";

        //se envia en contenido mas la nueva fila
         $("#miBody"+5).append(nuevaFila);
        //se aunmente la variable de factor de cambio
        numero3 = numero3 + 1;
    }else{
        //en caso de que el uno de los inputs este vacio
        alert('Falta rellenar algun campo');
    }
}

function getFormData(formId){
  let formValues = {};
  var id = $(this).attr('id');
  alert(id);
  var form1Inputs = document.forms[id].getElementsByTagName("input");
  for(let j=0; j<form1Inputs.length; j++){
        formValues[form1Inputs[j].name]=form1Inputs[j].value;
  }
  console.log(formValues);
}

function contenidos(){
    var nombres_paises = {};

    $('.descripcion_act_').each(function() {
        nombres_paises[$(this).attr('id')] = $(this).val();
    });

    console.log(nombres_paises);
    // $.ajax({
    //     type : 'POST',
    //     data : {
    //         'nombres_paises' : nombres_paises
    //     },
    //     url : 'index.php',
    //     success : function(){}
    // });
}

    var numero5 = 0;

// $(document).on('change', "#"+importancia+numero5, function(event) {
//             contenidoImportancia = $("#"+importancia+numero5+" option:selected").val().length;
//             alert(contenidoImportancia);
//         });

function crearfila5(){

    var numeracion = 'numeracion_';
    var observacion_cuobs = 'observacion_cuobs_';
    var importancia = 'importancia_';
    var cumplimiento = 'cumplimiento_';
    var estado_cuobs = 'estado_cuobs_';

    //obtener el valor de los campos requeridos
    var contenidoNumeracion =  $("input[name='"+numeracion+numero5+"']").val().length;
    var contenidoObs =  $("input[name='"+observacion_cuobs+numero5+"']").val().length;
//tener en cuenta este que es el mas dificil de obtener
    var contenidoImportancia =  $("select[name='"+importancia+numero5+"'] ").val();
    // var contenidoImportancia = $("#"+importancia+numero5+" option:selected").val().length;
        
    var contenidocumplimiento = $("input[name='"+cumplimiento+numero5+"']").val().length;
    //validar que no esten vacios
    if (contenidoNumeracion > 0 && contenidoObs > 0 && contenidoObs > 0 && contenidoImportancia != 'ELIJA' && contenidocumplimiento > 0) {
        var nuevaFila="";
        //se crea la nueva fila con los inputs adentro
        nuevaFila ="<tr class='gradeA'>";
        nuevaFila += "<th><input name='"+numeracion+(numero5+1)+"' type='text' class='form-control'></th>";
        nuevaFila += "<th><input name='"+observacion_cuobs+(numero5+1)+"' type='text' class='form-control'></th>";
        nuevaFila += "<th>";
        nuevaFila +=    "<select name='"+importancia+(numero5+1)+"' class='form-control'>";
        nuevaFila +=        "<option>ELIJA</option>";
        nuevaFila +=        "<option value='BAJA'>BAJA</option>";
        nuevaFila +=        "<option value='MEDIA'>MEDIA</option>";
        nuevaFila +=        "<option value='ALTA'>ALTA</option>";
        nuevaFila +=        "<option value='URGENTE'>URGENTE</option>";
        nuevaFila +=    "</select>";
        nuevaFila += "</th>";
        nuevaFila += "<th ><input name='"+cumplimiento+(numero5+1)+"' type='text' class='form-control'></th>";
        nuevaFila += "<input hidden name='"+estado_cuobs+(numero5+1)+"' type='text' value='PENDIENTE' '>";
        nuevaFila +="</tr>";

        //se envia en contenido mas la nueva fila
         $("#miBody"+6).append(nuevaFila);
        //se aunmente la variable de factor de cambio
        numero5 = numero5 + 1;
    }else{
        //en caso de que el uno de los inputs este vacio
        alert('Falta rellenar algun campo del cuadro');
    }
}

///////////////////////////////////////////////////// empiezan funciones de seccion fotos ///////////////////////////
var contTitulo=0;
var numeroObs=0;
var numeroFoto=0;


function crearFoto() {
    var nuevaFoto="";
    nuevaFoto +="<div class='col-md-6' style='margin-bottom: 10px;''>";
    nuevaFoto +="<div class='conten'>";
    nuevaFoto +=   "<input style='text-align: center;' type='text' name='pieFoto_["+(contTitulo)+"]["+(numeroObs)+"]["+(numeroFoto+1)+"]' class='form-control' placeholder='Ingrese Pie-Foto'>";
    nuevaFoto +=    "<input type='file' name='file_["+(contTitulo)+"]["+(numeroObs)+"]["+(numeroFoto+1)+"]' id='file_"+(contTitulo)+""+(numeroObs)+""+(numeroFoto+1)+"' class='inputfile inputfile-7'>";
    nuevaFoto +=    "<label for='file_"+(contTitulo)+""+(numeroObs)+""+(numeroFoto+1)+"'>";
    nuevaFoto +=    "<span class='iborrainputfile'>Ninguna Seleccion</span>";
    nuevaFoto +=    "<strong>";
    nuevaFoto +=    "<svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>";
    nuevaFoto +=    "Seleccione Foto</strong>";
    nuevaFoto +=    "</label>";
    nuevaFoto +="</div>";
    nuevaFoto +="</div>";

    $('#divObs_'+contTitulo+''+numeroObs).append(nuevaFoto);
    numeroFoto = numeroFoto +1;
}

function crearObservacion(event){
  numeroFoto=0;

  console.log( $('#masFotos_'+contTitulo+''+numeroObs));
  $('#masFotos_'+contTitulo+''+numeroObs).css('display', 'none');
  $('#masObservaciones_'+contTitulo+''+numeroObs).css('display', 'none');

// alert('entro a crear el evento');
  var nuevaObs="";
  nuevaObs +="<div id='divObs_"+contTitulo+''+(numeroObs+1)+"' class='col-md-12' style='margin-top: 10px;'>";
  nuevaObs +="<div class='col-md-6' style='margin-bottom: 10px;'>";
  nuevaObs +="<div class='conten'>";
  nuevaObs +=   "<input style='text-align: center;' type='text' name='pieFoto_["+(contTitulo)+"]["+(numeroObs+1)+"]["+(numeroFoto)+"]' class='form-control' placeholder='Ingrese Pie-Foto'>";
  nuevaObs +=    "<input type='file' name='file_["+(contTitulo)+"]["+(numeroObs+1)+"]["+(numeroFoto)+"]' id='file_"+(contTitulo)+""+(numeroObs+1)+""+(numeroFoto)+"' class='inputfile inputfile-7'/>";
  nuevaObs +=    "<label for='file_"+(contTitulo)+""+(numeroObs+1)+""+(numeroFoto)+"'>";
  nuevaObs +=    "<span class='JJinputfile'>Ninguna Seleccion</span>'";
  nuevaObs +=    "<strong>";
  nuevaObs +=    "<svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>";
  nuevaObs +=    "Seleccione Foto</strong>";
  nuevaObs +=    "</label>";
  nuevaObs +="</div>";
  nuevaObs +="</div>";
  nuevaObs +="</div>";
  nuevaObs +="<div id='masFotos_"+contTitulo+''+(numeroObs+1)+"' style='text-align: right; margin-right: 15px;'>";
  nuevaObs +="<label class='control-label'>Agregar mas Fotos</label>";
  nuevaObs +="<button id='masFotos_"+contTitulo+''+(numeroObs+1)+"'  type='button' class='btn btn-success' onclick='crearFoto()'><span class='glyphicon glyphicon-plus'></span></button>";
  nuevaObs +="</div>";
  nuevaObs +="<div class='col-md-12'>";
  nuevaObs +="<label for='observaciones_"+contTitulo+''+(numeroObs+1)+"' class='col-md-12 control-label' >Observaciones</label>";
  nuevaObs +="<input type='text' name='observaciones_["+(contTitulo)+"]["+(numeroObs+1)+"]' class='form-control' id='observaciones_"+contTitulo+''+(numeroObs+1)+"'>";
  nuevaObs +="<div id='masObservaciones_"+contTitulo+''+(numeroObs+1)+"' style='text-align: right; margin-right: 15px;'>";
  nuevaObs +="<label class='control-label'>Agregar mas Contenido</label>";
  nuevaObs +="<button id='masObservaciones_"+contTitulo+''+(numeroObs+1)+"'  type='button' class='btn btn-success' onclick='crearObservacion(this)'><span class='glyphicon glyphicon-plus'></span></button>";
  nuevaObs +="</div>";


    
  $('#titulos_'+contTitulo).append(nuevaObs);
  
  numeroObs = numeroObs + 1;
  numeroFoto=0;
}

var contenedor=0;
function crearContenido(){

    numeroObs = 0;
    numeroFoto=0;

    $('#masFotos_'+contTitulo+''+numeroObs).css('display', 'none');
    $('#masObservaciones_'+contTitulo+''+numeroObs).css('display', 'none');
    $('.masContenido_'+(contTitulo)).each(function(){ $(this).css('display', 'none');});
    // $('#masContenido_'+(contTitulo)).css('display', 'none');

    var nuevoContenedor="";
    nuevoContenedor +="<div id='titulos_"+(contTitulo+1)+"' class='col-md-12' style='margin-bottom: 15px; border: 1px solid #ccc; padding-top: 15px; padding-bottom: 15px ;'>";
    nuevoContenedor +="<div class='col-md-12'>";
    nuevoContenedor +="<label for='titulo_"+(contTitulo+1)+"' class='col-md-9 control-label' >Agregue un titulo</label>";
    nuevoContenedor +="<label id='masContenido_"+(contTitulo+1)+"' for='contenido' class='col-md-3 control-label masContenido_"+(contTitulo+1)+"' >Agregue un Contenido</label>";
    nuevoContenedor +="<div class='col-md-10'>";
    nuevoContenedor +="<input type='text' id='titulo_"+(contTitulo+1)+"' name='titulo_["+(contTitulo+1)+"]' class='col-md-10 form-control'>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="<div class='col-md-2'>";
    nuevoContenedor +="<button id='masContenido_"+(contTitulo+1)+"'  type='button' class='btn btn-success masContenido_"+(contTitulo+1)+"' onclick='creaarContenido()'><span class='glyphicon glyphicon-plus'></span></button>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="<div id='divObs_"+(contTitulo+1)+''+(numeroObs)+"' class='col-md-12' style='margin-top: 10px;'>";
    nuevoContenedor +="<div class='col-md-6' style='margin-bottom: 10px;'>";
    nuevoContenedor +="<div class='conten'>";
    nuevoContenedor +=   "<input style='text-align: center;' type='text' name='pieFoto_["+(contTitulo+1)+"]["+(numeroObs)+"]["+(numeroFoto)+"]' class='form-control' placeholder='Ingrese Pie-Foto'>";
    nuevoContenedor +=    "<input type='file' name='file_["+(contTitulo+1)+"]["+(numeroObs)+"]["+(numeroFoto)+"]' id='file_"+(contTitulo+1)+(numeroObs)+""+numeroFoto+"' class='inputfile inputfile-7'/>";
    nuevoContenedor +=    "<label for='file_"+(contTitulo+1)+(numeroObs)+""+numeroFoto+"'>";
    nuevoContenedor +=    "<span class='iborrainputfile'>Ninguna Seleccion</span>'";
    nuevoContenedor +=    "<strong>";
    nuevoContenedor +=    "<svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>";
    nuevoContenedor +=    "Seleccione Foto</strong>";
    nuevoContenedor +=    "</label>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="<div id='masFotos_"+(contTitulo+1)+''+(numeroObs)+"' style='text-align: right; margin-right: 15px;'>";
    nuevoContenedor +="<label class='control-label'>Agregar mas Fotos</label>";
    nuevoContenedor +="<button id='masFotos_"+(contTitulo+1)+''+(numeroObs)+"'  type='button' class='btn btn-success' onclick='crearFoto()'><span class='glyphicon glyphicon-plus'></span></button>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="<div class='col-md-12'>";
    nuevoContenedor +="<label for='observaciones_"+(contTitulo+1)+''+(numeroObs)+"' class='col-md-12 control-label' >Observaciones</label>";
    nuevoContenedor +="<input type='text' name='observaciones_["+(contTitulo+1)+"]["+(numeroObs)+"]' class='form-control' id='observaciones_"+(contTitulo+1)+''+(numeroObs)+"'>";
    nuevoContenedor +="<div id='masObservaciones_"+(contTitulo+1)+''+(numeroObs)+"' style='text-align: right; margin-right: 15px;'>";
    nuevoContenedor +="<label class='control-label'>Agregar mas Observaciones</label>";
    nuevoContenedor +="<button id='masObservaciones_"+(contTitulo+1)+''+(numeroObs)+"'  type='button' class='btn btn-success' onclick='crearObservacion()'><span class='glyphicon glyphicon-plus'></span></button>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="</div>";

    $('#demo1').append(nuevoContenedor);
    // numeroObs = numeroObs + 1;
    // contenedor =contenedor + 1;
    contTitulo = contTitulo + 1;
}

function getFormData2(formId){
  // $('#demo1').empty();
  $('#titulos_'+contTitulo).empty();
  if(numeroObs >0) numeroObs = numeroObs - 1;
  if(contenedor >0) contenedor = contenedor - 1;
  if(contTitulo >0) contTitulo = contTitulo - 1;
  
  var dejarBoton="";
    
    dejarBoton +="<div class='col-md-10'>";
    dejarBoton +="<label for='contenido' class='col-md-3 control-label' >Agregue un Contenido</label>";
    dejarBoton +="</div>";
    dejarBoton +="<div class='col-md-2'>";
    dejarBoton +="<button id='masContenido_0'  type='submit' class='btn btn-success' onclick='creaarContenido()'><span class='glyphicon glyphicon-plus'></span></button>";
    dejarBoton +="</div>";

    $('#titulos_'+contTitulo).append(dejarBoton);
}



 
</script>

</head>
<body>
 <!--Header-->
  <header id="header">
      <div class="container-fluid" >
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <img src="../../img/logo_blanc2.png" class="img-responsive" width="100%">
          </div>
      </div>
  </header>


<div class="container">
	<div class="row col-md-2">
	</div>
		<div class="row col-md-9">
			<h2>Informe del proyecto:<br><br> <strong><?php if (!empty($_POST['nombre_proyecto']) || isset($Proyect_nomb)) echo (isset($Proyect_nomb)) ? $Proyect_nomb : $_POST['nombre_proyecto'] ; ?></strong></h2><hr>

            <div class="row col-md-12">
                <div class="col-md-6">
                <form action='../proyectos.php' method='POST' >
                  <button type="submit" name='id_proyecto' value='<?php if (isset($_POST['id_proyecto'])) echo $_POST['id_proyecto'] ?>' class="btn btn-primary" style="background-color: #ff3636" >
                    <span class="glyphicon glyphicon-arrow-left"></span> Volver
                  </button>
                </form>
                </div>
                <div class="col-md-6" style="text-align: right;">
                  <button type="button" disabled="" class="btn btn-success " data-toggle="modal" data-target="#crearProyecto" style="background-color: #ff3636">
                    <span class="glyphicon glyphicon-plus"></span> Crear!!!
                  </button>
                </div>
            </div>
            <br>
			<ul class="nav nav-tabs">
				<li class=""><a data-toggle="tab" href="#home">Planos</a></li>
				<li><a data-toggle="tab" href="#menu1">Especificaciones</a></li>
				<li><a data-toggle="tab" href="#menu2">Materiales</a></li>
				<li><a data-toggle="tab" href="#menu3">Control de Calidad</a></li>
				<li><a class="active" data-toggle="tab" href="#menu4">Control de Ejecusion</a></li>
				<li><a data-toggle="tab" href="#menu5">Observaciones</a></li>
			</ul>

			<div class="tab-content">
<!------------- empieza planos  -------------->
				<?php include_once ('lyt_planos.php'); ?>
<!------------- empieza especificaciones  -------------->
                <?php include_once ('lyt_especificaciones.php'); ?>
<!------------- empieza materiales  -------------->
                <?php include_once ('lyt_materiales.php'); ?>
<!------------- empieza calidad  -------------->
                <?php include_once ('lyt_calidad.php'); ?>
<!------------- empieza control de la ejecucion  -------------->

				<div id="menu4" class="tab-pane fade in active">
				  <h3>Control de Ejecusion</h3>
				  
                    <button type="button" class="btn accordion collapsed" data-toggle="collapse" data-target="#demo">Seguimiento de Actividades</button>
                      <div id="demo" class="collapse">
                        <button class="btn btn-primary btn-sm" onclick="contenidos();">contenido</button>
<!-- //// Tabla  de actividades///////////////////////////////////////////////////////////////// -->
                        <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
                           <thead style=" background-color: #9b9090; color: #fff;">
                            <tr class="cabeza" >
                             <th style="width: 10%;" >No. Item</th>
                             <th >Obervacion</th>
                            </tr>
                           </thead>
                           <tbody id="miBody5">
                                <?php
                            if (isset($result5_1) && $result5_1->num_rows > 0) {
                                
                            while ($valores5_1 = mysqli_fetch_array($result5_1)) {
                                
                            ?>
                            <tr>
                              <th>
                                  <input size="10" class="form-control " style="text-align: center;" type="number" <?php echo "readonly name='no_observacion_0".$valores5_1['id']."' value='".$valores5_1['no_observacion']."'" ; ?> >
                              </th>
                              <th>
                                  <input class="form-control descripcion_act_" type="text" <?php echo "readonly name='descripcion_act_".$valores5_1['id']."' value='".$valores5_1['descripcion_act']."'" ; ?> >
                              </th>
                            </tr>
                              <?php } }
                              else {
                               ?>

                               <tr class="gradeA">
                                   <th ><input name="no_observacion_0" type="number" class="form-control" value="1"></th>
                                   <th ><input id="descripcion_act_0" name="descripcion_act_" type="text" class="form-control descripcion_act_"></th>
                               </tr>
                               <?php } ?>
                           </tbody>
                        </table>
                         <?php if (empty($result5_1) || $result5_1->num_rows <= 0) { ?>
                            <div style="text-align: right;">
                                <button   type="submit" class="btn btn-success" onclick="crearfila3()"><span class='glyphicon glyphicon-plus'></span></button>
                            </div>
                         <?php  } ?>
                      </div>

<!--//// registros///////////////////////////////////////// -->
<!-- /*++++++++++++ QUEDA PENDIENTE VALIDAR DATOS, CAPTURAR INFORMACION DE INPUTS DIMAMICOS GUARDAR EN LA BD TODO ++++++++++++++++++++*/ -->

                    <button type="button" class="btn accordion collapsed" data-toggle="collapse" data-target="#demo1">Registro Fotografico</button>
 

                        <form id="miform" method="post" name="miform" action="../../controllers/controller_informe.php">
                      <div id="demo1" class="collapse" disabled>
                        <?php
                        if (isset($result5_2) && $result5_2->num_rows > 0) {
                            
                        while ($valores5_2 = mysqli_fetch_array($result5_2)) {
                        ?>
                            <div class="col-md-12">
                                <strong><p style="text-align: center;"><?php echo $valores5_2['titulo']; ?></p></strong>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <img src="<?php echo "../../img/logo-p.png" ?>">
                                </div>
                                <div class="col-md-6">
                                    <img src="<?php echo "../../img/logo-p.png" ?>">
                                </div>

                            </div>

                        <?php } 
                        }else{ ?>
                            <div id="titulos_0" class="col-md-12" style="margin-bottom: 15px; border: 1px solid #ccc; padding-top: 15px; padding-bottom: 15px ;">
<!-- contenedor de los titulos -->
                                <div class="col-md-12">
                                    <label for="titulo_0" class="col-md-9 control-label" >Agregue un titulo</label>
                                    <label id="masContenido_0"  for="titulo" class="col-md-3 control-label masContenido_0" >Agregue Contenido</label>
                                  <div class="col-md-10">
                                    <!-- <input type="text" id="titulo_1" name="titulo_[1]" class="col-md-10 form-control"> -->
                                    <input type="text" id="titulo_0" name="titulo_[0]" class="col-md-10 form-control ">
                                  </div>
                                  <div class="col-md-2">
                                    <button id="masContenido_0"  type="button" class="btn btn-success masContenido_0" onclick="crearContenido()"><span class='glyphicon glyphicon-plus'></span></button>
                                  </div>
                                </div>
<!-- espacio para las fots -->
                                <div id="divObs_00" class="col-md-12" style="margin-top: 10px;">
                                    
                                    <div class="col-md-6" style="margin-bottom: 10px;" >
                                        <div class="conten">
                                            <input style="text-align: center;" type="text" name="pieFoto_[0][0][0]" class="form-control" placeholder="Ingrese Pie-Foto">

                                            <input type="file" name="file_[0][0][0]" id="file_000" class="inputfile inputfile-7">
                                            <label for="file_000">
                                            <span class="iborrainputfile">Ninguna Seleccion</span>
                                            <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>Seleccione Foto</strong>
                                            </label>
                                        </div>
                                    </div>
                                   <!--  <div class="col-md-6" style="margin-bottom: 10px;" >
                                      <div class="conten"><input style="text-align: center;" type="text" name="pieFoto_[0][0][1]" class="form-control" placeholder="Ingrese Pie-Foto"><input type="file" name="file_[0][0][1]" id="file_001" class="inputfile inputfile-7"><label for="file_001"><span class="iborrainputfile">Ninguna Seleccion</span><strong><svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>Seleccione Foto</strong></label></div>
                                    </div> -->
                                   
                                     
                                </div>
                                <div id="masFotos_00" style="text-align: right; margin-right: 15px; ">
                                    <label class="control-label">Agregar mas Fotos</label>
                                    <button id="masFotos_00"  type="button" class="btn btn-success" onclick="crearFoto()"><span class='glyphicon glyphicon-plus'></span></button>
                                </div>
<!-- Observvaciones -->
                                <div class="col-md-12">
                                    <label for="observaciones_00" class="col-md-12 control-label" >Observaciones</label>
                                    <input type="text" name="observaciones_[0][0]" class="form-control">

                                </div>
                                <div id="masObservaciones_00" style="text-align: right; margin-right: 15px;">
                                  <button id="masObservaciones_00"  type="button" class="btn btn-primary" onclick="getFormData2(this)"><span class='glyphicon glyphicon-less'></span>quitar</button>
                                    <label class="control-label" style="">Agregar mas Observaciones</label>
                                    <button id="masObservaciones_00"  type="button" class="btn btn-success" onclick="crearObservacion(this)"><span class='glyphicon glyphicon-plus'></span></button>
                                </div>
                            </div>

                       <?php } ?>
                      </div>
<!-- //// Observaciones ///////////////////////////////////////////////////////////////// -->
                    <button type="button" class="btn accordion collapsed" data-toggle="collapse" data-target="#demo2">Cuadro de Observaciones</button>
                      <div id="demo2" class="collapse">
                         <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
                           <thead style=" background-color: #9b9090; color: #fff;">
                            <tr class="cabeza" >
                             <th style="width: 13%;" >Numeracion</th>
                             <th style="width: 55%"; >Observacion</th>
                             <th style="width: 14%" >Importancia</th>
                             <th >Cumpliento</th> 
                            </tr>
                           </thead>
                           <tbody id="miBody6">
                                <?php
                            if (isset($result5_3) && $result5_3->num_rows > 0) {
                                
                            while ($valores5_3= mysqli_fetch_array($result5_3)) {
                                
                            ?>
                            <tr>
                              <th>
                                  <input size="3" class="form-control " style="text-align: center;" type="number" <?php echo "readonly name='".$valores5_3['numeracion']."_".$valores5_3['id']."' value='".$valores5_3['numeracion']."'" ; ?> >
                              </th>
                              <th>
                                  <input size="20" class="form-control " type="text" <?php echo "readonly name='".$valores5_3['observacion_cuobs']."_".$valores5_3['id']."' value='".$valores5_3['observacion_cuobs']."'" ; ?> >
                              </th>
                              <th>
                                  <select class="form-control "  type="text" <?php echo "readonly name='".$valores5_3['importancia']."_".$valores5_3['id']."' " ; ?> >
                                      <option <?php echo "value='".$valores5_3['importancia']."'"; ?>><?php echo $valores5_3['importancia']; ?></option>
                                  </select>
                              </th>
                              <th>
                                  <input size="20" class="form-control " style="text-align: center;" type="text" <?php echo "readonly name='".$valores5_3['cumplimiento']."_".$valores5_3['id']."' value='".$valores5_3['cumplimiento']."'" ; ?> >
                              </th>
                              <input hidden="hidden" type="text" <?php echo "name='".$valores5_3['estado_cuobs']."_".$valores5_3['id']."' value='".$valores5_3['estado_cuobs']."'" ; ?> >
                            </tr>
                              <?php } }
                              else {
                               ?>

                               <tr class="gradeA">
                                   <th ><input size="14" name="numeracion_0" type="text" class="form-control "></th>
                                   <th ><input size="5" name="observacion_cuobs_0" type="text" class="form-control "></th>
                                   <th >
                                    <select id="importancia_0" name="importancia_0" class="form-control">
                                        <option>ELIJA</option>
                                        <option value="BAJA">BAJA</option>
                                        <option value="MEDIA">MEDIA</option>
                                        <option value="ALTA">ALTA</option>
                                        <option value="URGENTE">URGENTE</option>
                                    </select>
                                   </th>
                                   <th ><input size="32" name="cumplimiento_0" type="text" class="form-control "></th>
                                   <input type="text" hidden="" name="estado_cuobs_0" value="PENDIENTE">
                               </tr>
                               <?php } ?>
                           </tbody>
                        </table>
                         <?php if (empty($result5_3) || $result5_3->num_rows <= 0) { ?>
                            <div style="text-align: right;">
                                <button   type="submit" class="btn btn-success" onclick="crearfila5()"><span class='glyphicon glyphicon-plus'></span></button>
                            </div>
                         <?php  } ?>
                      </div>

				  <div style="text-align: center; margin-top: 5px;">
				  	<button  type="submit" name="guarda_if" class="btn btn-success">GUARDAR</button>
				  </div>
				</div>
				<div id="menu5" class="tab-pane fade">
				  <h3>Observaciones</h3>
				  <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				  <div style="text-align: center;">
				  	<button  type="submit" class="btn btn-success">GUARDAR</button>
				  </div>
        </form>
				</div>
			</div>
			<hr>
			<div style="text-align: center;">
			  	<button  type="submit" class="btn btn-primary">FINALIZAR</button>
			</div>
		</div>
 
</div>
<br><br>

  <!-- footer ================================================== -->
   <footer class="container navbar-bottom">

      <div class="row">

         <div class="twelve columns">            

            <ul class="copyright">
               <li>Copyright 2018 &copy; Computer Services</li>
               <li>Design by <a title="By: srJJ" href="jjrrdecali90@gmail.com/">srJJ</a></li>          
            </ul>

         </div>          

      </div>

      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a></div>

   </footer> <!-- Footer End-->

<script src="../../js/custom-file-input.js"></script>
</body>
</html>



SELECT * FROM `ejecucion` AS ej
    left JOIN actividad AS ac ON ej.id = ac.ejecucion_id
    left JOIN titulo AS ti ON ej.id = ti.ejecucion_id
    left JOIN grupo_observacion AS gro ON ti.id = gro.id_titulo
    left JOIN fotos AS ft ON gro.id = ft.titulo_grupo_id
    left JOIN cuadro_obs AS co ON ej.id = co.ejecucion_id

WHERE ej.id = 1
GROUP BY ac.id

<!-- <div class="conten">
  <input style="text-align: center;" type="text" name="pieFoto_[0][0][0]" class="form-control" placeholder="Ingrese Pie-Foto">
  <input type="file" name="file_[0][0][0]" id="file_000" class="inputfile inputfile-7">
  <label for="file_000">
    <span class="iborrainputfile">Ninguna Seleccion</span>
    <strong>
      <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
        </path>
      </svg>Seleccione Foto
    </strong>
  </label>
</div> -->


<!-- <div class="conten"><input style="text-align: center;" type="text" name="pieFoto_[0][0][1]" class="form-control" placeholder="Ingrese Pie-Foto"><input type="file" name="file_[0][0][1]" id="file_001" class="inputfile inputfile-7"><label for="file_001"><span class="iborrainputfile">Ninguna Seleccion</span><strong><svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>Seleccione Foto</strong></label></div> -->
<!-- 
<div class="conten"><input style="text-align: center;" type="text" name="pieFoto_[0][0][1]" class="form-control" placeholder="Ingrese Pie-Foto"><input type="file" name="file_[0][0][1]" id="file_001" class="inputfile inputfile-7"><label for="file_001"><span class="iborrainputfile">Ninguna Seleccion</span><strong><svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>Seleccione Foto</strong></label></div>


<script type="text/javascript">
  // Eventos para elementos generados antes de la declaracion
$('.botonA').on('click', function(){
  $('.cajaA').append('-' + $(this).html() + '<br>');
  $('.botonesB').append('<div class="boton botonB">'+ $(this).html() + 'b</div>');
});

$('.botonB').on('click', function(){
  $('.cajaB').append('-' + $(this).html() + '<br>');
  $('.botonesA').append('<div class="boton botonA">'+ $(this).html() + 'a</div>');
});

// Eventos para elementos generados en cualquier momento
$('.botonesA').on('click', '.botonA', function(){
  $('.cajaA').append('+' + $(this).html() + '<br>');
  $('.botonesB').append('<div class="boton botonB">'+ $(this).html() + 'b</div>');
});


$(document).on('click', '.botonB', function(){
  $('.cajaB').append('+' + $(this).html() + '<br>');
  $('.botonesA').append('<div class="boton botonA">'+ $(this).html() + 'a</div>');
});
  
</script> -->