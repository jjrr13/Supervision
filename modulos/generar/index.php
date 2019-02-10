<?php 
require_once('../../cx/conexion.php');
// $resultado = 0%2;
// show($resultado);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supervisión</title>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
 <!--  <script src="../../DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
  <link href="../../DataTables/DataTables/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <script src="../../DataTables/DataTables/js/jquery.dataTables.min.js"></script> -->

  <link rel="stylesheet" href="../../css/layout.css">

</head>
<body>
 <!--Header-->
  <header id="header">
      <div class="container-fluid" >
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
  <div class="row col-md-9">

    <h2>Bienvenido Sr : <?php if (!empty($_SESSION['usuario'])) echo $_SESSION['usuario']; ?> </h2>
    
    <?php 
      $nit = $_SESSION['empresa_nit'];
      // var_dump($_SESSION);
      // echo $nit;

      $result = $mysqli->query ("SELECT id, nombre FROM proyecto WHERE estado != 'TERMINADO' AND empresa_nit = $nit ");
     ?>
    <form id="generar" name="generar" method="post" action="../pdf/index.php">     

      <div class="col-md- 12">
        <div class="col-md-6">
          <label for="empresa">Empresa: </label>
          <label><strong><u><i><h3><?php echo $_SESSION['empresa_nombre']; ?></h3></i></u></strong></label>
          <!-- <input type="text" id="empresa" name="empresa" value=""> -->
        </div>
        <div class="col-md-6">
          <br>
          <label for="proyecto">Proyectos: </label>
          <?php 
          echo "<select name='id_proyecto' id='proyecto'>";
          if ($result->num_rows > 0) {
              echo "<option value=''>Seleccione</option>";
            while ( $datos =mysqli_fetch_assoc($result) ) {
              echo "<option value='".$datos['id']."'>".$datos['nombre']."</option>";
            }
          }
          else{
            echo "<option value=''>Sin proyectos disponibles</option>";
          }
          echo "</select>";
         ?>
        </div>
      </div>
      <div class="col-md-12" style="margin-top: 15px;">
        <div class="col-md-6">
          <label for="fechaDesde">Desde: </label>
          <input id="fechaDesde" name="fechaDesde" type="date" value="2018-12-03" class="form-control datepicker">
        </div>
        <div class="col-md-6">
          <label for="fechaHasta">Hasta: </label>
          <input id="fechaHasta" name="fechaHasta" type="date" value="2018-12-13" class="form-control datepicker">
        </div>
      </div>
      <br><br>
      <div class="form-group"></div>
      <div class="form-group"></div>
      <div class="col-md-12" style="margin-top: 15px; margin-bottom: 75px;">
        <div class="col-md-2">
          <input type="checkbox" name="planos" id="planos"><br>
          <label for="planos">Control de planos</label>
        </div>
        <div class="col-md-2">
          <input type="checkbox" name="especificaciones" id="especificaciones"><br>
          <label for="especificaciones">Control de especificaciones</label>
        </div>
        <div class="col-md-2">
          <input type="checkbox" name="materiales" id="materiales"><br>
          <label for="materiales">Control de materiales</label>
        </div>
        <div class="col-md-2">
          <input type="checkbox" name="calidad" id="calidad"><br>
          <label for="calidad">Ensayos de control de calidad</label>
        </div>
        <div class="col-md-2">
          <input type="checkbox" name="ejecucion" id="ejecucion"><br>
          <label for="ejecucion">Control de ejecucion</label>
        </div>
        <div class="col-md-2">
          <input type="checkbox" name="recomendaciones" id="recomendaciones"><br>
          <label for="recomendaciones">Conclusiones y recomendaciones</label>
        </div>
      </div>
      <div style="text-align: center; margin-bottom: 105px;" class="col-md-12">
          <button  type="submit" name="pdf" value="13" class="btn btn-success">Generar PDF</button>
      </div>

    </form>
  </div>
</div>

  <!-- footer
   ================================================== -->
   <footer class="container navbar-bottom">

      <div class="row">

         <div class="twelve columns">            
            <ul class="copyright" style="color: #ccc;">
              <li>Celular: </li>
              <li>318 329 11 68</li>          
            </ul>
            <ul class="copyright" style="color: #ccc;">
               <li>Direccion: </li>
               <li>Carrera 27 # 2A - 30 Oficina 04</li>          
            </ul>
            <ul class="copyright" style="color: #ccc;">
               <li>Barrio: </li>
               <li>San Fernando</li>          
            </ul>
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