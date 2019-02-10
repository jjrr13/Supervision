  $(document).ready(function(){
    inputsImg();
    $("#guarda_responsables").click(function(){
      //capturas los valores de los campos con jquery
      // alert('entro al evento del botn');
      var director= $('#dir_obra').val();
      var residente= $('#resi_obra').val();

      //una variable que llevara los datos 
      datos = "director="+director+"&residente="+residente;

      $.ajax({
        type: "POST",
        url: "../../controllers/controller_informe.php",
        data: datos, //pasas los valores de la variable datos
        dataType:"html",
        success: function(data) 
        {
         //si la peticion sale bien, aqui tendras los resultados que quieres
          // alert(data);
          if (data == 113) {
            confirmar('Se guardaron los responsables SATISFACTORIAMENTE', 'fa fa-check-circle', 'green', 'S');

            // alert('Se guardaron los responsables SATISFACTORIAMENTE');
            $('#dir_obra').attr("disabled", true);
            $('#resi_obra').attr("disabled", true);
            
            $('#dir_obra').attr("readonly", true);
            $('#resi_obra').attr("readonly", true);
            $('#boton_responsables').attr("hidden", true);

          }
        },
        error: function( jqXHR, textStatus, errorThrown ){
            //si la peticion falla aqui puedes saber alguna pista respecto al error 
            console.log(textStatus);
            alert('ALGO SALIO MAL, INTENTA DE NUEVO');
        },
      });
    });
  });


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
    // alert(numero);
    var contenidoPlano =  $("#"+documento+numero).val().length;
    var contenidoFecha = $("#"+fecha+numero).val().length;
    // alert(contenidoFecha);
    //validar que no esten vacios
    if (contenidoPlano > 0 && contenidoFecha > 0) {
      numero = numero + 1; 
      var nuevaFila="";
      //se crea la nueva fila con los inputs adentro
      nuevaFila ="<tr class='gradeA' id='div_"+documento+numero+"'>";
      nuevaFila +=   "<th ><input size='14' id='"+documento+numero+"' name='"+documento+"[]' type='text' class='form-control '></th>";
      nuevaFila +=    "<th ><input size='5' id='"+version+numero+"' name='"+version+"[]' type='text' class='form-control '></th>";
      nuevaFila +=    "<th ><input size='14' id='"+fecha+numero+"' name='"+fecha+"[]' type='date' class='form-control datepicker'></th>";
      nuevaFila +=    "<th ><input size='32' id='"+contenido+numero+"' name='"+contenido+"[]' type='text' class='form-control '></th>";
      nuevaFila +=    "<th ><input type='text' id='"+observacion+numero+"' name='"+observacion+"[]' class='form-control '></th>";
      nuevaFila += "</tr>";

      //se envia en contenido mas la nueva fila
       $("#miBody"+body).append(nuevaFila);
      //se aunmente la variable de factor de cambio
      (tipo != 'plano')? numEspc = numEspc + 1 : numPlano = numPlano + 1 ;
      //se reinicia el valor de numero
      numero = 0;
      $('#'+documento+'eliminar').removeAttr('disabled');
    }else{
      //en caso de que el uno de los inputs este vacio
      confirmar('La primer casilla y la tercera no pueden estar VACIAS', 'fa fa-window-close-o', 'red', 'S');

      // alert('La primer casilla y la tercera no pueden estar VACIAS');
    }
  }

  function eliminarfila(tipo) {
    if (tipo=='plano' && numPlano > 0) {
      $('#div_no_plano_'+numPlano).remove();
      numPlano = numPlano -1;
    }else if (tipo == 'especificaciones' && numEspc > 0) {
      $('#div_documento_anx_'+numEspc).remove();
      numEspc = numEspc -1;
    }else if (tipo == 'material' && numMaterial > 0) {
      $('#div_fecha_ma_'+numMaterial).remove();
      numMaterial = numMaterial -1;
    }else if (tipo == 'calidad' && numCalidad > 0) {
      $('#div_fecha_ca_'+numCalidad).remove();
      numCalidad = numCalidad -1;
    }else if (tipo == 'conclusion' && numero4 > 0) {
      $('#div_no_conclusion_'+numero4).remove();
      numero4 = numero4 -1;
    }else if (tipo == 'actividades' && numero3 > 0) {
      $('#div_no_observacion_'+numero3).remove();
      numero3 = numero3 -1;
    }else if (tipo == 'observacion' && numero5 > 0) {
      $('#div_numeracion_'+numero5).remove();
      numero5 = numero5 -1;
    }

  }

  //factor de cambio para los names de los inputs
  var numero2 = 0;
  var numMaterial=0;
  var numCalidad=0;
  //crea las filas de los materiales y de la calidad
  function crearfila2(tipo){
    var body2;
    var fecha2;
    var ensayo2;
    var contenido2;
    var observacion2;
    if (tipo == 'material') {
      numero2 = numMaterial ;
      body2 =  3;     
      fecha2 =  'fecha_ma_';
      ensayo2 =  'tipo_ensayo_ma_';
      contenido2 =  'descripcion_ma_';
      observacion2   =  'observacion_ma_';
    }else{
      numero2 = numCalidad ;
      body2 = 4;
      fecha2 =  'fecha_ca_';
      ensayo2 =  'tipo_ensayo_ca_';
      contenido2 =  'descripcion_ca_';
      observacion2   =  'observacion_ca_';
    }
    // alert(numero2);
    //obtener el valor de los campos requeridos
    var contenidoFecha2 = $("#"+fecha2+numero2).val().length;
    var contenidoMaterial =  $("#"+ensayo2+numero2).val().length;
    // alert(contenidoFecha2 + ' funcion de '+ tipo);
    //validar que no esten vacios
    if (contenidoMaterial > 0 && contenidoFecha2 > 0) {
      numero2 = numero2+1;
      var nuevaFila="";
      //se crea la nueva fila con los inputs adentro
      nuevaFila ="<tr class='gradeA' id='div_"+fecha2+numero2+"'>";
      nuevaFila += "<th ><input size='14' id='"+fecha2+numero2+"' name='"+fecha2+"[]' type='date' class='form-control datepicker'></th>";
      nuevaFila += "<th ><input size='14' id='"+ensayo2+numero2+"' name='"+ensayo2+"[]' type='text' class='form-control '></th>";
      nuevaFila += "<th ><input size='32' id='"+contenido2+numero2+"' name='"+contenido2+"[]' type='text' class='form-control '></th>";
      nuevaFila += "<th ><input type='text' id='"+observacion2+numero2+"' name='"+observacion2+"[]' class='form-control '></th>";
      nuevaFila +="</tr>";

      //se envia en contenido mas la nueva fila
       $("#miBody"+body2).append(nuevaFila);
      //se aunmente la variable de factor de cambio
      (tipo == 'material')? numMaterial = numMaterial + 1 : numCalidad = numCalidad + 1 ;
      //se reinicia el valor de numero
      numero2 = 0;
       $('#'+fecha2+'eliminar').removeAttr('disabled');
    }else{
        //en caso de que el uno de los inputs este vacio
        // alert('Falta rellenar algún campo. El 1ro y el 2do son requeridos');
        confirmar('Falta rellenar algún campo. El 1ro y el 2do son requeridos', 'fa fa-window-close-o', 'red', 'S');

    }
  }


  var numero3 = 0;
  function crearfila3(){

    var item = 'no_observacion_';
    var descripcion = 'descripcion_act_';

    //obtener el valor de los campos requeridos
     var contenidoItem = $("#"+item+numero3).val().length;
    var contenidoDescrip =  $("#"+descripcion+numero3).val().length;
    // var contenidoItem =  $("input[name='"+item+numero3+"']").val().length;
    // var contenidoDescrip = $("input[name='"+descripcion+"']").val().length;
    //validar que no esten vacios
    if (contenidoItem > 0 && contenidoDescrip > 0) {
      //se aunmente la variable de factor de cambio
      numero3 = numero3 + 1;
    
      var nuevaFila="";
      //se crea la nueva fila con los inputs adentro
      nuevaFila ="<tr class='gradeA' id='div_"+item+numero3+"'>";
      nuevaFila += "<th ><input id='"+item+numero3+"' name='"+item+"[]' value='"+(numero3+1)+"' type='number' class='form-control'></th>";
      nuevaFila += "<th ><input id='"+descripcion+numero3+"' name='"+descripcion+"[]' type='text' class='form-control descripcion_act_'></th>";
      nuevaFila +="</tr>";

      //se envia en contenido mas la nueva fila
      $("#miBody"+5).append(nuevaFila);
      $('#'+item+'eliminar').removeAttr('disabled');
    }else{
      //en caso de que el uno de los inputs este vacio
      // alert('Falta rellenar algún campo en el seguimiento de actividades');
      confirmar('Falta rellenar algún campo en el seguimiento de actividades', 'fa fa-window-close-o', 'red', 'S');

    }
  }
  
  var numero4 = 0;
  function crearFilaConclusion(){

    var item = 'no_conclusion_';
    var descripcion = 'descripcion_co';

    //obtener el valor de los campos requeridos
    var contenidoItem =  $("#"+item+numero4).val().length;
    var contenidoDescrip = $("#"+descripcion+numero4).val().length;
    // alert(contenidoItem+' / '+contenidoDescrip);
    //validar que no esten vacios
    if (contenidoItem > 0 && contenidoDescrip > 0) {
      // alert('Paso del if');
      //se aunmente la variable de factor de cambio
      numero4 = numero4+1;
      var nuevaFila="";
      //se crea la nueva fila con los inputs adentro
      nuevaFila ="<tr class='gradeA' id='div_"+item+numero4+"'>";
      nuevaFila += "<th ><input id='"+item+numero4+"' name='"+item+"[]' value='' type='number' class='form-control'></th>";
      nuevaFila += "<th ><input id='"+descripcion+numero4+"' name='"+descripcion+"[]' type='text' class='form-control descripcion_co_'></th>";
      nuevaFila +="</tr>";

      //se envia en contenido mas la nueva fila
       $("#miBody"+7).append(nuevaFila);
       $('#'+item+'eliminar').removeAttr('disabled');
    }else{
        //en caso de que el uno de los inputs este vacio
      // alert('Falta rellenar algún campo en las conclusiones');
      confirmar('Falta rellenar algún campo en las conclusiones', 'fa fa-window-close-o', 'red', 'S');


    }
  }

  function getFormData(formId){
    let formValues = {};
    var id = $(this).attr('id');
    // alert(id);
    var form1Inputs = document.forms[id].getElementsByTagName("input");
    for(let j=0; j<form1Inputs.length; j++){
          formValues[form1Inputs[j].name]=form1Inputs[j].value;
    }
    console.log(formValues);
  }

    var numero5 = 0;
  function crearfila5(){

    var numeracion = 'numeracion_';
    var observacion_cuobs = 'observacion_cuobs_';
    var importancia = 'importancia_';
    var cumplimiento = 'cumplimiento_';
    var estado_cuobs = 'estado_cuobs_';

    //obtener el valor de los campos requeridos
    var contenidoNumeracion =  $("#"+numeracion+numero5).val().length;
    var contenidoObs = $("#"+observacion_cuobs+numero5).val().length;
    var contenidoImportancia =  $("#"+importancia+numero5).val();
    var contenidocumplimiento = $("#"+cumplimiento+numero5).val().length;
    // var contenidocumplimiento = $("input[name='"+cumplimiento+numero5+"']").val().length;
    //validar que no esten vacios
    if (contenidoNumeracion > 0 && contenidoObs > 0 && contenidoObs > 0 && contenidoImportancia != 'ELIJA' && contenidocumplimiento > 0) {
        //se aunmente la variable de factor de cambio
        numero5 = numero5 + 1;
        var nuevaFila="";
        //se crea la nueva fila con los inputs adentro
        nuevaFila ="<tr class='gradeA' id='div_"+numeracion+numero5+"'>";
        nuevaFila += "<th><input id='"+numeracion+numero5+"' name='"+numeracion+"[]' type='text' class='form-control'></th>";
        nuevaFila += "<th><input id='"+observacion_cuobs+numero5+"' name='"+observacion_cuobs+"[]' type='text' class='form-control'></th>";
        nuevaFila += "<th>";
        nuevaFila +=    "<select id='"+importancia+numero5+"' name='"+importancia+"[]' class='form-control'>";
        nuevaFila +=        "<option>ELIJA</option>";
        nuevaFila +=        "<option value='BAJA'>BAJA</option>";
        nuevaFila +=        "<option value='MEDIA'>MEDIA</option>";
        nuevaFila +=        "<option value='ALTA'>ALTA</option>";
        nuevaFila +=        "<option value='URGENTE'>URGENTE</option>";
        nuevaFila +=    "</select>";
        nuevaFila += "</th>";
        nuevaFila += "<th ><input id='"+cumplimiento+numero5+"' name='"+cumplimiento+"[]' type='text' class='form-control'></th>";
        nuevaFila += "<input hidden id='"+estado_cuobs+numero5+"' name='"+estado_cuobs+"[]' type='text' value='PENDIENTE' '>";
        nuevaFila +="</tr>";

        //se envia en contenido mas la nueva fila
         $("#miBody"+6).append(nuevaFila);
         $('#'+numeracion+'eliminar').removeAttr('disabled');
    }else{
        //en caso de que el uno de los inputs este vacio
      // alert('Falta rellenar algún campo en las observaciones. Todos los campos son obligatorios');
      confirmar('Falta rellenar algún campo en las observaciones. Todos los campos son obligatorios', 'fa fa-window-close-o', 'red', 'S');

    }
  }

  /////////////////////////empiezan funciones de seccion fotos ///////////////////////////
  var contTitulo=0;
  var numeroObs=0;
  var numeroFoto=0;


  function crearFoto() {
    var nuevaFoto="";
    nuevaFoto +="<div class='col-md-6' style='margin-bottom: 10px;''>";
    nuevaFoto +="<div class='conten'>";
    nuevaFoto +=   "<input style='text-align: center;' type='text' name='pieFoto_["+(contTitulo)+"]["+(numeroObs)+"]["+(numeroFoto+1)+"]' class='form-control' placeholder='Ingrese Pie-Foto'>";
    nuevaFoto +=    "<input type='file' name='file_["+(contTitulo)+"]["+(numeroObs)+"]["+(numeroFoto+1)+"]' id='file_"+(contTitulo)+""+(numeroObs)+""+(numeroFoto+1)+"' class='inputfile inputfile-7' onchange='visualiza(event);'>";
    nuevaFoto +=    "<label for='file_"+(contTitulo)+""+(numeroObs)+""+(numeroFoto+1)+"'>";
    nuevaFoto +=    "<span class='iborrainputfile'>Ninguna Seleccion</span>";
    nuevaFoto +=    "<strong>";
    nuevaFoto +=    "<svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>";
    nuevaFoto +=    "Seleccione Foto</strong>";
    nuevaFoto +=    "</label>";
    nuevaFoto +=    "<div id='file_"+(contTitulo)+""+(numeroObs)+""+(numeroFoto+1)+"_0'>Previsualizacion...</div>";
    nuevaFoto +="</div>";
    nuevaFoto +="</div>";

    $('#divObs_'+contTitulo+''+numeroObs).append(nuevaFoto);
    numeroFoto = numeroFoto +1;
    inputsImg();
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
    nuevaObs +=    "<input type='file' name='file_["+(contTitulo)+"]["+(numeroObs+1)+"]["+(numeroFoto)+"]' id='file_"+(contTitulo)+""+(numeroObs+1)+""+(numeroFoto)+"' class='inputfile inputfile-7' onchange='visualiza(event);'>";
    nuevaObs +=    "<label for='file_"+(contTitulo)+""+(numeroObs+1)+""+(numeroFoto)+"'>";
    nuevaObs +=    "<span class='JJinputfile'>Ninguna Seleccion</span>'";
    nuevaObs +=    "<strong>";
    nuevaObs +=    "<svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>";
    nuevaObs +=    "Seleccione Foto</strong>";
    nuevaObs +=    "</label>";
    nuevaObs +=    "<div id='file_"+(contTitulo)+""+(numeroObs+1)+""+(numeroFoto)+"_0'>Previsualización...</div>";
    nuevaObs +="</div>";
    nuevaObs +="</div>";
    nuevaObs +="</div>";
    nuevaObs +="<div id='masFotos_"+contTitulo+''+(numeroObs+1)+"' style='text-align: right; margin-right: 15px;'>";
    nuevaObs +="<label class='control-label'>Agregar mas fotos</label>";
    nuevaObs +="<button id='masFotos_"+contTitulo+''+(numeroObs+1)+"'  type='button' class='btn btn-success' onclick='crearFoto()'><span class='glyphicon glyphicon-plus'></span></button>";
    nuevaObs +="</div>";
    nuevaObs +="<div class='col-md-12'>";
    nuevaObs +="<label for='observaciones_"+contTitulo+''+(numeroObs+1)+"' class='col-md-12 control-label' >Observaciones</label>";
    nuevaObs +="<input type='text' name='observaciones_["+(contTitulo)+"]["+(numeroObs+1)+"]' class='form-control' id='observaciones_"+contTitulo+''+(numeroObs+1)+"'>";
    nuevaObs +="<div id='masObservaciones_"+contTitulo+''+(numeroObs+1)+"' style='text-align: right; margin-right: 15px;'>";
    nuevaObs +="<label class='control-label'>Agregar mas contenido</label>";
    nuevaObs +="<button id='masObservaciones_"+contTitulo+''+(numeroObs+1)+"'  type='button' class='btn btn-success' onclick='crearObservacion(this)'><span class='glyphicon glyphicon-plus'></span></button>";
    nuevaObs +="</div>";


      
    $('#titulos_'+contTitulo).append(nuevaObs);
    
    numeroObs = numeroObs + 1;
    numeroFoto=0;
    inputsImg();
  }

  var contenedor=0;
  function crearContenido(){

    $('#masFotos_'+contTitulo+''+numeroObs).css('display', 'none');
    $('#masObservaciones_'+contTitulo+''+numeroObs).css('display', 'none');
    $('.masContenido_'+(contTitulo)).each(function(){ $(this).css('display', 'none');});

    numeroObs = 0;
    numeroFoto=0;
    // $('#masContenido_'+(contTitulo)).css('display', 'none');

    var nuevoContenedor="";
    nuevoContenedor +="<div id='titulos_"+(contTitulo+1)+"' class='col-md-12' style='margin-bottom: 15px; border: 1px solid #ccc; padding-top: 15px; padding-bottom: 15px ;'>";
    nuevoContenedor +="<div class='col-md-12'>";
    nuevoContenedor +="<label for='titulo_"+(contTitulo+1)+"' class='col-md-9 control-label' >Agregue un titulo</label>";
    nuevoContenedor +="<label id='masContenido_"+(contTitulo+1)+"' for='contenido' class='col-md-3 control-label masContenido_"+(contTitulo+1)+"' >Agregue un contenido</label>";
    nuevoContenedor +="<div class='col-md-10'>";
    nuevoContenedor +="<input type='text' id='titulo_"+(contTitulo+1)+"' name='titulo_["+(contTitulo+1)+"]' class='col-md-10 form-control'>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="<div class='col-md-2'>";
    nuevoContenedor +="<button id='masContenido_"+(contTitulo+1)+"'  type='button' class='btn btn-success masContenido_"+(contTitulo+1)+"' onclick='crearContenido()'><span class='glyphicon glyphicon-plus'></span></button>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="<div id='divObs_"+(contTitulo+1)+''+(numeroObs)+"' class='col-md-12' style='margin-top: 10px;'>";
    nuevoContenedor +="<div class='col-md-6' style='margin-bottom: 10px;'>";
    nuevoContenedor +="<div class='conten'>";
    nuevoContenedor +=   "<input style='text-align: center;' type='text' name='pieFoto_["+(contTitulo+1)+"]["+(numeroObs)+"]["+(numeroFoto)+"]' class='form-control' placeholder='Ingrese Pie-Foto'>";
    nuevoContenedor +=    "<input type='file' name='file_["+(contTitulo+1)+"]["+(numeroObs)+"]["+(numeroFoto)+"]' id='file_"+(contTitulo+1)+(numeroObs)+""+numeroFoto+"' class='inputfile inputfile-7' onchange='visualiza(event);'>";
    nuevoContenedor +=    "<label for='file_"+(contTitulo+1)+(numeroObs)+""+numeroFoto+"'>";
    nuevoContenedor +=    "<span class='iborrainputfile'>Ninguna selección</span>'";
    nuevoContenedor +=    "<strong>";
    nuevoContenedor +=    "<svg xmlns='http://www.w3.org/2000/svg' class='iborrainputfile' width='20' height='17' viewBox='0 0 20 17'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'></path></svg>";
    nuevoContenedor +=    "Seleccione Foto</strong>";
    nuevoContenedor +=    "</label>";
    nuevoContenedor +=    "<div id='file_"+(contTitulo+1)+""+(numeroObs)+""+(numeroFoto)+"_0'>Previsualización...</div>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="<div id='masFotos_"+(contTitulo+1)+''+(numeroObs)+"' style='text-align: right; margin-right: 15px;'>";
    nuevoContenedor +="<label class='control-label'>Agregar mas fotos</label>";
    nuevoContenedor +="<button id='masFotos_"+(contTitulo+1)+''+(numeroObs)+"'  type='button' class='btn btn-success' onclick='crearFoto()'><span class='glyphicon glyphicon-plus'></span></button>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="<div class='col-md-12'>";
    nuevoContenedor +="<label for='observaciones_"+(contTitulo+1)+''+(numeroObs)+"' class='col-md-12 control-label' >Observaciones</label>";
    nuevoContenedor +="<input type='text' name='observaciones_["+(contTitulo+1)+"]["+(numeroObs)+"]' class='form-control' id='observaciones_"+(contTitulo+1)+''+(numeroObs)+"'>";
    nuevoContenedor +="<div id='masObservaciones_"+(contTitulo+1)+''+(numeroObs)+"' style='text-align: right; margin-right: 15px;'>";
    nuevoContenedor +="<label class='control-label'>Agregar mas observaciones</label>";
    nuevoContenedor +="<button id='masObservaciones_"+(contTitulo+1)+''+(numeroObs)+"'  type='button' class='btn btn-success' onclick='crearObservacion()'><span class='glyphicon glyphicon-plus'></span></button>";
    nuevoContenedor +="</div>";
    nuevoContenedor +="</div>";

    $('#demo1').append(nuevoContenedor);
    // numeroObs = numeroObs + 1;
    // contenedor =contenedor + 1;
    contTitulo = contTitulo + 1;
    inputsImg();
  }

  function getFormData2(formId){
    // $('#demo1').empty();
    $('#titulos_'+contTitulo).empty();
    if(numeroObs >0) numeroObs = numeroObs - 1;
    if(contenedor >0) contenedor = contenedor - 1;
    if(contTitulo >0) contTitulo = contTitulo - 1;
    
    var dejarBoton="";
      
    dejarBoton +="<div class='col-md-10'>";
    dejarBoton +="<label for='contenido' class='col-md-3 control-label' >Agregue un contenido</label>";
    dejarBoton +="</div>";
    dejarBoton +="<div class='col-md-2'>";
    dejarBoton +="<button id='masContenido_0'  type='submit' class='btn btn-success' onclick='creaarContenido()'><span class='glyphicon glyphicon-plus'></span></button>";
    dejarBoton +="</div>";

    $('#titulos_'+contTitulo).append(dejarBoton);
  }

  function visualiza(input) {
    
    // capturamos el id del elemento seleccionado
    let id = input.target.id;
    //creamos un elemento de reader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(input.target.files[0]);
    
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function(){
      //obtenemos el id a donde va a ir la imagen
      let preview = document.getElementById(id+'_0'),
      //creamos un elemento tipo img
      image = document.createElement('img');
      //le damos los tributos que se necesitan
      image.src = reader.result;
      image.id= id+'_1';
      //se vacia el div donde va la imagen
      preview.innerHTML = '';
      //ponemos la imagen dentro
      preview.append(image);
      //cambiamos el tamaño de la imagen para que no se desborde
      $('#'+id+'_1').width('100%');
      // $('#'+id+'_1').height('100%');
    };
  }
