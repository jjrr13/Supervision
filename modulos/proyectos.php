<?php 

require_once('../cx/conexion.php');

unset($_SESSION['id_informe']);
if (!empty($_POST['empresa_nombre'])) {
  $_SESSION['empresa_nombre'] = $_POST['empresa_nombre'];
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supervisión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../css/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- necesario para el modal -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../css/layout.css">
 
  <style>
    td.filaseleccionada {
        background-color: #A1B7D1;
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
    }

    .active, .accordion:hover {
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

    .active:after {
        content: "\e113";
    }

    .panel {
        border: 1px solid #9b9090;
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
   
  </style>


  <script>
   
    $(document).ready(function(){

    var tip= $('[data-title]').tooltip({
          placement: 'top auto',
          trigger: 'manual'
        });
            tip.tooltip( 'show');
        
        window.setTimeout(function(){
            $('input').trigger('change');
        }, 1000);
      
      $('crear_Proyecto').click(function(){

      });
    });
  </script>

</head>
 <!--Header-->
  <header id="header">
      <div class="container-fluid" >
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <img src="../img/logo_blanc2.png" class="img-responsive" width="100%">
          </div>
      </div>
  </header>

<div  class="container-fluid" style=" margin-left: 6%; margin-right: 2%; ">
 


  <h2>Empresa contratante: <?php echo $_SESSION['empresa_nombre']; ?> </h2>
  
  <div class="row col-md-12">
    <div class="col-md-6">
      <a href="../" class="btn btn-primary" style="background-color: #ff3636" >
        <span class="glyphicon glyphicon-arrow-left"></span> Volver
      </a>
    </div>
    <div class="col-md-6" style="text-align: right;">
      <button type="button" class="btn btn-success " data-toggle="modal" data-target="#crearProyecto" style="background-color: #ff3636">
        <span class="glyphicon glyphicon-plus"></span> Crear!!!
      </button>
    </div>
  </div>
  <br><br>
  <div class="row col-md-2">

  <?php 
    $nit2="";
    //capturar el valor si se devolvio de informes
    if (isset($_POST['id_proyecto']) && !empty($_POST['id_proyecto'])) {
      $valor =$_POST['id_proyecto'];
      $result = $mysqli->query ("SELECT empresa_nit FROM proyecto WHERE id = '$valor' ");
      $fila =mysqli_fetch_assoc($result);
      $_SESSION['empresa_nit']= $fila['empresa_nit'];
    }
    if (isset($_POST['nit']) && !empty($_POST['nit'])) {
      $_SESSION['empresa_nit']= $_POST['nit'];
    }

    $nit = $_SESSION['empresa_nit'];//validamos que haya llegado algun nit

     $result = $mysqli->query ("SELECT id, nombre, estado FROM proyecto WHERE empresa_nit = '$nit' ");
     $fila =mysqli_fetch_assoc($result);

     $error="";

    if ( (isset($_GET['error1']) && !empty($_GET['error1'])) ||
        (isset($_GET['error2']) && !empty($_GET['error2'])) ||
        (isset($_GET['error3']) && !empty($_GET['error3'])) ||
        (isset($_GET['error4']) && !empty($_GET['error4'])) ||
        (isset($_GET['error5']) && !empty($_GET['error5'])) 
      ) {
        $error =" error";
        echo  "<script>
                $(document).ready(function(){
                    alert('No tiene proyectos con esta empresa2222');
                    $('#crearProyecto').modal('show');
                    $('#advierte').removeAttr('hidden');
                });
              </script>";
      }elseif ( $fila <= 0) {
        echo  "<script>
                $(document).ready(function(){
                    alert('No tiene proyectos con esta empresa');
                    $('#crearProyecto').modal('show');
                });
              </script>";
      }

   ?>
<!--  -->
  </div>
  <div class="row col-md-8">
    <div class="col-md-12">
      <h2>Listado de proyectos</h2>
      <!-- <p>Aqui ira cada una de las descripciones de las visitas y casos puntuales.</p> -->

      <?php 

       // $result = $mysqli->query ("SELECT p.Proyect_id, p.Proyect_nomb, p.Proyect_estado, COUNT(i.Inform_id) AS cantidad FROM construc_proyect AS p
       //     INNER JOIN construc_informe AS i ON i.Inform_id_proyect =p.Proyect_id WHERE Proyect_nit_empre = '$nit' ");
       //  //cosulta que trae todos los proyectos de la empresa seleccionada
         

         $result = $mysqli->query ("SELECT p.id, p.nombre, p.estado FROM proyecto AS p
           WHERE p.empresa_nit = '$nit' ");

         $x=0;
        while ( $valores = mysqli_fetch_array($result)) {
              $x=1;
              $id_proyecto = $valores['id'];
              $nombre_proyecto = $valores['nombre'];

              
               echo "<button class='accordion'>".$nombre_proyecto."</button>";
                echo "<div class='panel'>";
                  echo "<div class='row col-md-10'  style='margin-top:10px; margin-bottom:20px'>";
                    echo "<p style='font-size:18px;'>El estado del proyecto es: <strong>".$valores['estado']."</strong></p>";
                    // echo $id_proyecto;
                  echo "</div>";
                  echo "<div class='row col-md-2' style='margin-top:10px; margin-bottom:20px; padding-left: 2px;'>";
               echo "<form action='informes/informe.php' method='POST' >" ;
                    echo "<input type='hidden' name='nombre_proyecto' value='$nombre_proyecto'>";
                    echo "<button type='submit' name='id_proyecto' value='$id_proyecto' class='btn btn-warning '><span class='glyphicon glyphicon-plus-sign'></span>  Nueva Visita</button>";
               echo "</form>";
                  echo "</div>";

                  // consulta que trae los informes del proyecto
                  //   se debe condicionar que solo vea los que el creo... Inform_inge_redact
              $result2 = $mysqli->query ("SELECT id, fecha_visita, estado FROM informe 
                    WHERE proyecto_id = '$id_proyecto' ");
              
              $y=0;
              while ( $valores2 = mysqli_fetch_array($result2) ) {
                  $y=1;
                  $estado_informe= $valores2['estado'];
                  $id_informe = $valores2['id'];
                  $boton = '';
                  if ($estado_informe == "INCOMPLETO") {
                    $boton="<input type='hidden' name='id_proyecto' value='$id_proyecto'>
                      <input type='hidden' name='nombre_proyecto' value='$nombre_proyecto'>
                      <button style='text-align: right; margin-top: -10px; background-color:#ff3636;' type='submit' class='btn btn-warning ' name='id_informe' value='$id_informe'><span class='glyphicon glyphicon-pencil'></span>. Terminar</button>"; 
                  }else{
                    $boton="<button disabled style='text-align: right; margin-top: -10px;' class='btn btn-success'><span class='glyphicon glyphicon-saved'></span> Completo</button>"; 
                  }
                    echo "<div class='row col-md-12'>";
                      echo "<div class='row col-md-6'>";
                        echo "<p>Fecha: ".$valores2['fecha_visita']."</p>";
                      echo "</div>";
                      echo "<div class='row col-md-5'>";
                        echo "<p>Estado: ".$valores2['estado']."</p>";
                      echo "</div>";
                      echo "<div class='row col-md-1'  style='margin-bottom:20px'>";
                  echo "<form action='informes/informe.php' method='POST' >" ;
                        echo $boton;
                  echo "</form>";
                      echo "</div>";
                    echo "</div>";
                  
                }
      
              
            
              if($y==0){
                  echo "<div class='row col-md-12'>";
                    echo "<p style='font-size: 26px;'>No hay Informes en el proyecto para Mostrar! </p>";
                  echo "</div>";
              }
            echo "</div>";


            }
          if($x==0){
              
                echo "<button class='accordion'>Section</button>";
                echo "<div class='panel'>";
                  echo  "<p style='font-size: 26px;'>No hay informacion para Mostrar! </p>";
                echo "</div>";
            }

       ?>
 <p ></p>
      
    </div>
  </div>
  
<script type="text/javascript">
  var acc = document.getElementsByClassName("accordion");
  var i;
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });
  }
</script>





  <!-------------------- inicio del modal para crear  ---------------------------->

  <div class="modal fade" id="crearProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ff3636; ">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true" >&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Crear un proyecto a la Empresa: <strong> <?php echo $_SESSION['empresa_nombre']; ?></strong></h4>
        </div>
        <div class="modal-body">
          <p class="statusMsg"></p>
              <form  action="../controllers/proyecto_controller.php" method="POST">
                  <div id="advierte" class="col-lg-12  form-group" hidden="">
                    <strong><p style="color: red;">Todos los Campos en Rojo son Necesarios (*)</p></strong>
                  </div>
                  <div class="col-lg-12  form-group">
                      <label for="nombre_proyecyo">Nombre del proyecto:</label>
                      <input type="text" class="form-control <?php echo $error; ?>" <?php if(isset($_GET['error0']) && $_GET['error0']==0) echo "data-title='Please enter a Name'"; ?> id="nombre" name="nombre_proyecto" placeholder="Titulo del proyecto"/>
                  </div>
                  <div class="col-lg-6  form-group">
                      <label for="fecha_inicio">Fecha de Inicio:</label>
                      <input type="date" class="form-control <?php echo $error; ?>" <?php if(isset($_GET['error1']) && $_GET['error1']==1) echo "class='error' data-title='Please select a Date'"; ?> id="fecha_inicio" name="fecha_inicio"/>
                  </div>
                  <div class="col-lg-6  form-group">
                      <label for="fecha_final">Fecha de Finalizacion:</label>
                      <input type="date" class="form-control " id="fecha_final" name="fecha_final" />
                  </div>
                  <div class="col-lg-6  form-group">
                    <label for="visitor" class="col-form-label col-lg-3 ">Visitor:</label>
                    <select class="form-control col-lg-9 <?php echo $error; ?>" id="visitor" name="visitor" <?php if(isset($_GET['error3']) && $_GET['error3']==3) echo "class='error' data-title='Please enter a Visitor'"; ?> >
                      <option value="">SELECCIONAR</option>
                       <?php 
                        $query = $mysqli -> query ("SELECT u.id_usuario AS id, CONCAT(t.nombre, ' ', t.apellido) AS nombre FROM usuarios u
                            INNER JOIN terceros t ON t.nit = u.nit
                          WHERE `id_cargo` = 7");
                          while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
                          } 
                       ?>
                    </select>
                  </div>
                  <div class="col-lg-6  form-group">
                    <label for="supervisor" class="col-form-label col-lg-3 ">Supervisor:</label>
                    <select class="form-control col-lg-9 <?php echo $error; ?>" <?php if(isset($_GET['error3']) && $_GET['error3']==3) echo "class='error' data-title='Please enter a Supervisor'"; ?> id="supervisor" name="supervisor" >
                      <option value="">SELECCIONAR</option>
                       <?php 
                        $query = $mysqli -> query ("SELECT u.id_usuario AS id, CONCAT(t.nombre, ' ', t.apellido) AS nombre FROM usuarios u
                            INNER JOIN terceros t ON t.nit = u.nit
                          WHERE `id_cargo` = 3");
                          while ($valores = mysqli_fetch_array($query)) {

                            echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
                            
                          } 
                       ?>
                    </select>
                  </div>
                  
                  <div class="col-lg-12 form-group">
                      <label for="contenido">Especificaciones Unicas</label>
                      <textarea class="form-control" name="contenido" id="contenido" placeholder="Enter your message" >Algo aqui deberia de describir el proyecto</textarea>
                  </div>
                  <div class="col-lg-12 form-group">
                      <input type="hidden" name="empresa_nombre" value="<?php echo $_SESSION['empresa_nombre']; ?>"/>
                      <input type="hidden" name="nit" value="<?php if (!empty($_POST['nit'])) echo $_POST['nit']; ?>"/>
                      <button type="submit" id="crear_Proyecto" class="btn btn-primary btn-lg btn-block">Crear!</button>
                  </div>
              </form>
              <p style="text-align: center;">&nbsp;</p>
        </div>
      </div>
    </div>
  </div>


    
</div>

  <!-- footer
   ================================================== -->
   <br><br><br>
   <footer class="container navbar-bottom">

      <div class="row">

         <div class="twelve columns">            

            <ul class="copyright">
               <li>Copyright 2018 &copy; Computer Services</li>
               <li>Design by <a title="By: srJJ" href="http://www.styleshout.com/">srJJ</a></li>          
            </ul>

         </div>          

      </div>

      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a></div>

   </footer> <!-- Footer End-->


</body>
</html>


