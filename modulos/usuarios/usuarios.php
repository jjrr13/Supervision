<?php 
require_once('../../cx/conexion.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supervisión</title>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <script src="../../js/main.js"></script> -->
  <script src="../../plugins/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
  <!-- <link href="../../DataTables/DataTables/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <script src="../../DataTables/DataTables/js/jquery.dataTables.min.js"></script> -->



  <link rel="stylesheet" href="../../css/layout.css">
  <script type="text/javascript">
    function cargarCombo(input) {
      $('#tdocumento').empty();
      $('#tProfesion').empty();
      
      var option='';
      var profesion='';
      var valor = $(input).attr("id");

      if (valor =="empresa") {
        option = "<option value='3'>NIT</option>";

        profesion="<option value='1'>Otros</option>";
        profesion+= "<option value='25'>Empresa</option>";
        profesion+= "<option value='26'>Constructora</option>";

        $('#apellido').attr("placeholder", "Razon Social");
        $('#apellido2').html("Tipo de razon social <p class='requerido col-md-1'>*</p>");
      }
      else if(valor =="usuario") {
          option= "<option value='1'>CC</option>";
          option+= "<option value='2'>CE</option>";

          profesion="<option value='1'>Otros</option>";
          profesion+="<option value='2'>Diseñador</option>";
          profesion+="<option value='3'>Ingeniero Civil</option>";
          profesion+="<option value='4'>Ingeniero Geotécnico</option>";
          profesion+="<option value='5'>Ingeniero Constructor</option>";
          profesion+="<option value='6'>Ingeniero Proyectista</option>";
          profesion+="<option value='7'>Arquitecto</option>";
          profesion+="<option value='8'>Revisor Independiente</option>";
          profesion+="<option value='10'>Topógrafo</option>";
          profesion+="<option value='11'>Abogado</option>";
          profesion+="<option value='12'>Contador</option>";
          profesion+="<option value='13'>Administración de Empresas</option>";
          profesion+="<option value='14'>Técnico en Sistemas</option>";
          profesion+="<option value='15'>Técnico en Administración de Empresas</option>";
          profesion+="<option value='16'>Bachiller</option>";
          profesion+="<option value='17'>Trabajador Social</option>";
          profesion+="<option value='18'>Técnico en Gestión Documental</option>";
          profesion+="<option value='19'>Administración Pública</option>";
          profesion+="<option value='20'>Técnico Analista Financiero y Contable</option>";
          profesion+="<option value='21'>Técnico Asistente Administrativo</option>";
          profesion+="<option value='22'>Técnico Auxiliar Contable</option>";
          profesion+="<option value='23'>Tecnólogo en Análisis y Desarrollo de Sistemas de Infromacion</option>";
          profesion+="<option value='24'>Tramitador</option>";

          $('#apellido').attr("placeholder", "Apellido");
          $('#apellido2').html("Apellido <p class='requerido col-md-1'>*</p>");
      }
      $('#tdocumento').append(option);
      $('#tProfesion').append(profesion);
      // $('#tipo_usuario').val(valor);
      
    }
  </script>
</head>
<body>
 <!--Header-->
  <header id="header">
      <div class="container-fluid" >
          <div class="col-xs-12 col-sm-12 col-md-12 col-md-12">
               <img src="../../img/logo_blanc2.png" class="img-responsive" width="100%">
          </div>
      </div>
      <div align="right" style="color: #fff;">
        <a href="../../cx/destroy_session.php">
          Cerrar Session
           <span class="glyphicon glyphicon-off"></span>
        </a>
      </div>
  </header>

<!-- <div class="container-fluid" style=" margin-left: 6%; margin-right: 6%; "> -->
<div class="container">
  <div class="row col-md-2">
  </div>
  <div class="row col-md-9" style="border: 1px solid #ccc;">

    <h2>Bienvenido Sr : <?php if (!empty($_SESSION['usuario'])) echo $_SESSION['usuario']; ?> </h2>
    
    <?php 
      //$nit = $_SESSION['empresa_nit'];

      // $result = $mysqli->query ("SELECT id, nombre FROM proyecto WHERE estado != 'TERMINADO' AND empresa_nit = $nit ");
     ?>
    <form class="form-horizontal" action="../../controllers/tercero_controller.php" method="post" >
      <div class="card-body">
        <div class="form-group col-md-12 "></div>
        <div class="col-md-12  from-group" style="border: 1px solid #ccc; border-radius: 5px; padding-top: 15px; padding-bottom: 10px;">
          <div class="col-md-6">
            <div class="col-md-8"></div>
            <label for="empresa" class="col-form-label col-md-3">Empresa</label>
            <input type="radio" class="radio-control " id="empresa" value="empresa" name="tipo_usuario" onChange="cargarCombo(this)" >
          </div>
          <div class="col-md-6">
            <input type="radio" class="radio-control col-md-2"  id="usuario" value="usuario" name="tipo_usuario" onChange="cargarCombo(this)" >
            <label for="usuario" class="col-form-label  ">Persona</label>
          </div>
        </div>
        <div class="form-group col-md-12 "></div>
        <div class="form-group col-md-12 "></div>
        <div class="col-md-12  from-group">
          <!-- validar el tipo de documento -->
          <div class="col-md-6 ">
            <label for="tdocumento" class="form-label col-md-8 ">Tipo <p class="requerido col-md-1">*</p></label>
            <select class="form-control col-md-8" id="tdocumento" name="tdocumento" >
            </select>
          </div>
          <div class="col-md-6 ">
            <label for="nit" class="col-form-label col-md-8">Documento <p class="requerido col-md-1">*</p></label>
            <input type="text" id="nit" name="nit" class="form-control col-md-8 " placeholder="Numero de Documento" min="0" onkeypress="return ValidNum(event)"  maxlength="10" minlength="5">
          </div>
        </div>
        <div class="form-group col-md-12 "></div>
        <div class="col-md-12  from-group">
          <div class="col-md-6">
            <label for="nombre" class="col-form-label col-md-8">Nombre <p class="requerido col-md-1">*</p></label>
            <input type="text" class="form-control col-md-8" id="nombre" name="nombre" placeholder="Nombre" onChange="letras(this)" >
          </div>
          <div class="col-md-6">
            <label for="apellido" id="apellido2" class="col-form-label col-md-8 ">Apellido <p class="requerido col-md-1">*</p></label>
            <input type="text" class="form-control col-md-8"  id="apellido" name="apellido" placeholder="Apellido" onChange="letras(this)" >
          </div>
        </div>
        <div class="form-group col-md-12 "></div>
        <div class="col-md-12  from-group">
          <div class="col-md-6 ">
            <label for="telefono1" class="form-label col-md-8 ">Telefono</label>
            <input type="text" class="form-control col-md-8"  id="telefono" name="telefono1" placeholder="Telefono Fijo 1" onkeypress="return ValidNum(event)">
          </div>
          <div class="col-md-6 ">
            <label for="telefono2" class="col-form-label col-md-4 ">Telefono2</label>
            <input type="text" class="form-control col-md-8"  id="telefono2" name="telefono2" placeholder="Telefono Fijo 2" onkeypress="return ValidNum(event)">
          </div>
        </div>
        <div class="form-group col-md-12 "></div>
        <div class="col-md-12  from-group">
          <div class="col-md-6 ">
            <label for="celular" class="form-label col-md-8 ">Celular</label>
            <input type="text" class="form-control col-md-12" id="celular" name="celular" placeholder="Celular" onkeypress="return ValidNum(event)" >
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label col-md-8 ">Email</label>
            <input type="text" class="form-control col-md-12"  id="email" name="email" placeholder="Email" onChange="letras(this)" >
          </div>
        </div>
        <div class="form-group col-md-12 "></div>
        <div class="col-md-12  from-group">
          <div class="col-md-6">
            <label for="direccion" class="col-form-label col-md-8 "><p class="requerido col-md-1">*</p> Direccion</label>
            <input type="text" class="form-control col-md-8"  id="direccion" name="direccion" placeholder="Direccion" onChange="letras(this)" >
          </div>
          <div class="col-md-6 ">
            <label for="tProfesion" class="form-label col-md-8 ">Especialidad <p class="requerido col-md-1">*</p></label>
            <select class="form-control col-md-8" id="tProfesion" name="tProfesion" >
            </select>
          </div>
        </div>
        <div class="form-group col-md-12 "></div>
        <div class="col-md-12  from-group">
          <div class="col-md-6">
            <label for="userName" class="col-form-label col-md-8 "><p class="requerido col-md-1">*</p> User name</label>
            <input type="text" class="form-control col-md-8"  id="userName" name="userName" placeholder="Nombre de acceso" onChange="letras(this)" >
          </div>
        </div>
        </div>
        <div class="form-group col-md-12 "></div>
        <div class="col-md-12  input-group">
          <div class="col-md-6  input-group">
            <label class="col-form-label col-md-12 requerido">&nbsp;&nbsp;&nbsp;&nbsp;Los campos con (*) son obligatorios</label>
          </div>
        </div>
            <!-- /.card-body -->
        <div class="card-footer">
          <div class="form-group col-md-12 "></div>
          <div class="col-md-12  form-group">
            <div class="col-md-6 offset-3">  
              <button class="btn btn-danger col-md-4" type="submit" name="submit" id="submit" >Crear</button>
            </div>
            <div class="col-md-6">              
              <button class="btn btn-default col-md-4" type="submit" id="cancelar" name="cancelar" value="9" formaction="../../functions/routes.php">cancelar</button>
            </div>
          </div>
          <div class="form-group col-md-12 "></div>
        </div>
        <!-- /.card-footer -->
      </div>
    </form>
  <!-- /.card-footer -->
  </div>

  <!-- footer
   ================================================== -->
  <footer class="container navbar-bottom">
    <div class="row">
      <div class="twelve columns">            
        <ul class="copyright">
          <li>Copyright 2018 &copy; Computer Services</li>
          <li>Design by <a title="By: srJJ" href="http://www.styleshout.com/">srJJ</a></li>          
        </ul>
      </div>          
    </div>
    <div id="go-top">
      <a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a>
    </div>
  </footer> <!-- Footer End-->
</body>
</html>