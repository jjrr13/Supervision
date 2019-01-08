<?php 
require_once('../../../cx/conexion.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supervisión</title>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <script src="../../js/main.js"></script> -->
  <script src="../../../plugins/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
  <!-- <link href="../../DataTables/DataTables/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <script src="../../DataTables/DataTables/js/jquery.dataTables.min.js"></script> -->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>



  <link rel="stylesheet" href="../../../css/layout.css">

</head>
<body>
 <!--Header-->
  <header id="header">
      <div class="container-fluid" >
          <div class="col-xs-12 col-sm-12 col-md-12 col-md-12">
               <img src="../../../img/logo_blanc2.png" class="img-responsive" width="100%">
          </div>
      </div>
      <div align="right" style="color: #fff;">
        <a href="../../../cx/destroy_session.php">
          Cerrar Session
           <span class="glyphicon glyphicon-off"></span>
        </a>
      </div>
  </header>

<!-- <div class="container-fluid" style=" margin-left: 6%; margin-right: 6%; "> -->
<div class="container">
  <div class="row col-md-2">
  </div>
  <div class="row col-md-9" style="border: 1px solid #ccc; padding-bottom: 35px;">
  
<script>

   function habilitar(elemento) {
    var valor ='';
     if($(elemento).prop('checked')){
      valor='INCOMPLETO';
     }
     else{
      valor='COMPLETO';
     }

     var datos = "id="+$(elemento).val()+"&valor="+valor;
     // alert(datos);
    $.ajax({
      type: "POST",
      url: "../../../controllers/actualizarInforme_controller.php",
      data: datos, //pasas los valores de la variable datos
      dataType:"html",
      success: function(data) 
      {
        if (data == 1 && valor == 'COMPLETO') {
          alert('Se Blouqeo el Informe SATISFACTORIAMENTE');
        }
        else if (data == 1 && valor == 'INCOMPLETO') {
          alert('Se Deslouqeo el Informe SATISFACTORIAMENTE');
        }
        else  if (data == 2){
          alert('Tuvimos algun problema en el Proceso de Actualizacion');
        }
        else {
          alert('Falto algun dato necesario para la Actualizacion');
        }
      },
      error: function( jqXHR, textStatus, errorThrown ){
        //si la peticion falla aqui puedes saber alguna pista respecto al error 
        console.log(textStatus);
        alert('ALGO SALIO MAL EN LA PETICIONS, INTENTA DE NUEVO');
      },

      
    });
     // alert($(elemento).val());
     // alert(valor);
   }
</script>

    <h2>Bienvenido Sr : <?php if (!empty($_SESSION['usuario'])) echo $_SESSION['usuario']; ?> </h2>
    <div class="col-md-12 form-group"></div>
    <div class="col-md-12 form-group"></div>
    <!-- <form method="POST" name="admin" id="admin"> -->

        <table id="Jtabla" cellpadding="1" cellspacing="0" border="0" class="table table-hover" style="margin-bottom : 30px;">
          <thead>
            <tr class="gradeC" style="background: #ff3636; color: #ffffff;">
             <th  width="15%">NUMERO</th>
             <th  width="30%">FECHA VISITA</th>
             <th  width="35%">DIRECCTOR DE OBRA</th>
             <th  width="35%">RESIDENTE DE OBRA</th> 
             <th  width="35%">TIPO</th> 
             <th  width="5%">ESTADO</th>
            </tr>
          </thead>
          <tbody>
           <?php 
           // $query = $mysqli->query ("SELECT * FROM empresa ORDER BY nombre ASC");
           $query = $mysqli->query ("SELECT * from informe");
            if ($query->num_rows >0) {
              while ( $valores = mysqli_fetch_array($query) ) {
                echo "<tr class='gradeA'>";
                  echo "<th>".$valores['id']."</th>";
                  echo "<th>".$valores['fecha_visita']."</th>";
                  echo "<th>".$valores['director_obra']."</th>";
                  echo "<th>".$valores['residente_obra']."</th>";
                  echo "<th>".$valores['tipo_informe']."</th>";
                  if ($valores['estado'] == 'INCOMPLETO')
                  echo "<th >
                        <div class='checkbox'>
                          <label>
                            <input type='checkbox' onchange='habilitar(this);' value='".$valores['id']."' checked data-toggle='toggle' data-on='Enabled' data-off='Disabled' data-onstyle='success' data-offstyle='danger'>
                          </label>
                        </div>
                       </th>";
                  elseif ($valores['estado'] == 'COMPLETO')
                   echo "<th '>
                          <div class='checkbox'>
                            <label>
                              <input type='checkbox' onchange='habilitar(this);' value='".$valores['id']."' data-toggle='toggle' data-on='Enabled' data-off='Disabled' data-onstyle='success' data-offstyle='danger'>
                            </label>
                          </div>
                        </th>";
                echo "</tr>";

              } 
            }
            else{
               echo "<th colspan='8' style='border: 1px solid #ccc;'><center>
                      No hay proyectos registrados</center>
                     </th>";
            }
              ?> 
      
          </tbody>
        </table>
      
    <!-- </form> -->
  <!-- </div> -->
  <!-- /.card-footer -->
</div>

  <!-- footer
   ================================================== -->
<footer class="container navbar-bottom"  style="position:absolute; bottom: 0; left:3%;">
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