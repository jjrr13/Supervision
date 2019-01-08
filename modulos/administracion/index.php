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
  <div class="row col-md-9" style="border: 1px solid #ccc; padding-bottom: 35px;">

    <h2>Bienvenido Sr : <?php if (!empty($_SESSION['usuario'])) echo $_SESSION['usuario']; ?> </h2>
		<div class="col-md-12 form-group"></div>
		<div class="col-md-12 form-group"></div>
		<form method="POST" name="admin" id="admin">
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<button type="submit" formaction="../usuarios/usuarios.php" class="btn btn-success col-md-4">Usuarios / Empresas</button>
				<div class="col-md-2"></div>
				<button type="submit" formaction="actividad/activarEmpresa.php" class="btn btn-primary col-md-4">Habilitar Empresas</button>
			</div>
			<div class="col-md-12 form-group"></div>
			<div class="col-md-12 form-group"></div>
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<button type="submit"  formaction="actividad/activarProyectos.php" class="btn btn-primary col-md-4">Habilitar Proyectos</button>
				<div class="col-md-2"></div>
				<button type="submit" formaction="actividad/activarInformes.php" class="btn btn-primary col-md-4">Habilitar Informes</button>
			</div>
		</form>
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