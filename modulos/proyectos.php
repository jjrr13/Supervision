<?php 

require_once('../cx/conexion.php');

// $sql="SELECT * FROM construc_empresa"
// var_dump($_POST['nit']);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supervisión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- necesario para el modal -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="../css/layout.css">
 
<style>
  td.filaseleccionada {
      background-color: #A1B7D1;
  }

.caja_contadores{
   font-size: 30px; 
   font-family: arial; 
   text-align: center; 
   color: #fff;
   background-color: #ff3636;
   width: 30%;
   display: inline-block;
   margin-right: 2.5%;  
   margin-top: 15px;
   margin-bottom: 15px;
   border:solid 2px #000;
   border-radius: 5%;
  
}
.caja_contadores>p{
   text-decoration: underline;
   font-weight: bold;
}
.derecho{
  margin-left: 1.7%;
}

.numero{
  font-size: 120px;
}

.accordion {
    background-color: #eee;
    color: #444;
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
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2212";
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
 
</style>


<script>
 
$(document).ready(function(){

  var ultimoid = null;

  // var table = $('#Jtabla').DataTable();

    var table = $('#Jtabla').DataTable({
       keys: true,
       "bFilter": false,
       "bInfo": false,
       "bPaginate": false,
       "aoColumnDefs": [
          { "bSortable": false, "aTargets": [ 0, 1, 2 ]}
        ],
       columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [3 ],
            orderData: [ 3, 0 ]
        } ],

         "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],

        "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ Proyectos",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }

    } );


    $('#Jtabla tbody').on('click', 'tr', function () {
        var datos =table.row( this ).data() ;
        var codigo = datos[0];
        var nombre = datos[1];

        alert( 'Código del cliente '+codigo+' '+'Nombre '+nombre);

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            dato =table.row( this ).data();
            //console.log(dato + 'dentro al fi');
            //alert(dato);
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            dato =table.row( this ).data();
            //console.log(dato + 'dentro al else');
            //console.log( table.row( this ).data() );
            alert(dato);
            parametro = dato.serialize();
            $.ajax({
                data:  parametro,
                url:   "proyectos.php",
                type:  "POST",
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
                complete : function(xhr, status) {
                    window.location="proyectos.php";
                },
            }); 
        }
    } );
       

    table
    .on( 'key-focus', function ( e, datatable, cell, originalEvent ) {
        var rowData = datatable.row( cell.index().row ).data();
 
        $('#details').html( 'Cell in '+rowData[0]+' focused' );
        console.log(rowData);    
      } )
    .on( 'key-blur', function ( e, datatable, cell ) {
        $('#details').html( 'No cell selected' );
    } );

});

  $('[data-title]').tooltip({
      placement: 'top auto',
      trigger: 'manual'
    });
    
    $('input').on('change', function(){
        var hasValue = $(this).val();
        var $div = $(this).closest('div.form-group');
                
        if(hasValue){
            $(this).one('hidden.bs.tooltip', function(){
                $div.removeClass('has-error');
            });
        } else {
            $div.addClass('has-error');
        }
        
        $(this).tooltip(hasValue ? 'hide' : 'show');
    });
    
    window.setTimeout(function(){
        $('input').trigger('change');
    }, 1000);
  
  $('crear_Proyecto').click(function(){

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

<div class="container">
 


  <h2>Proyecto de la Empresa : <?php if (!empty($_POST['empresa_nombre'])) echo $_POST['empresa_nombre']; ?> </h2>
  
  <div class="row col-md-12">
    <div class="col-md-6">
      <button type="submit" class="btn btn-primary " >
        <span class="glyphicon glyphicon-fast-backward"></span> Volver
      </button>
    </div>
    <div class="col-md-6" style="text-align: right;">
      <button type="button" class="btn btn-success " data-toggle="modal" data-target="#crearProyecto">
        <span class="glyphicon glyphicon-plus"></span> Crear!!!
      </button>
    </div>
  </div>
  <br><br>
  <div class="row col-md-6">
  <form action="../" method="POST">
    
  
    <div style=" width: 100%">
      <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display">
       <thead>
        <tr class="gradeC" style="background: #ff3636; color: #ffffff;">
         <th style="display: none;">id</th>
         <th  align="left">NOMBRE</th>
         <th  align="left">ESTADO</th>
        </tr>
       </thead>
       <tbody>
         <?php 
         $nit = (!empty($_POST['nit'])) ? $_POST['nit'] : "" ;
         $query = $mysqli->query ("SELECT Proyect_id, Proyect_nomb, Proyect_estado FROM construc_proyect WHERE Proyect_nit_empre = '$nit' ");
            while ( $valores = mysqli_fetch_array($query) ) {
              echo "<tr class='gradeA'>";
               echo "<th style='display: none;'>".$valores['Proyect_id']."</th>";
                echo "<th>".$valores['Proyect_nomb']."</th>";
                echo "<th style='text-align: center;'>".$valores['Proyect_estado']."</th>";
              echo "</tr>";

            }
              if ($valores < 1) {
                echo  "<script>
                        $(document).ready(function(){
                            alert('no tiene proyectos en esta empresa');
                            $('#crearProyecto').modal('show');
                        });
                      </script>";
              }elseif (isset($_GET['error']) && !empty($_GET['error'])) {
                echo  "<script>
                        $(document).ready(function(){
                            alert('no tiene proyectos en esta empresa');
                            $('#crearProyecto').modal('show');
                            $('#advierte').removeAttr('hidden');
                        });
                      </script>";
              }

             ?> 
       </tbody>
      </table>
    </div>
  <br></form>
  </div>
  <div class="row col-md-6">
    <div class="col-md-12">
      <h2>Visitas al Proyecto</h2>
      <p>Aqui ira cada una de las descripciones de las visitas y casos puntuales.</p>
      <button class="accordion">Section 1</button>
      <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>

      <button class="accordion">Section 2</button>
      <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>

      <button class="accordion">Section 3</button>
      <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
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





  <!--------------------- inicio del modal para crear  ---------------------------->

  <div class="modal fade" id="crearProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ff3636; ">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true" >&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Crear un proyecto a la Empresa: <strong> <?php if (!empty($_POST['empresa_nombre'])) echo $_POST['empresa_nombre']; ?></strong></h4>
        </div>
        <div class="modal-body">
          <p class="statusMsg"></p>
              <form  action="../controllers/proyecto_controller.php" method="POST">
                  <div id="advierte" class="col-lg-12  form-group" hidden="">
                    <p>Todos los Campos en Rojo son Necesarios (*)</p>
                  </div>
                  <div class="col-lg-12  form-group">
                      <label for="nombre">Nombre del proyecto:</label>
                      <input type="text" class="form-control <?php if(isset($_GET['error1']) && $_GET['error1']==1) echo 'error' ?>" id="nombre" name="nombre" placeholder="Titulo del proyecto" />
                  </div>
                  <div class="col-lg-6  form-group">
                      <label for="fecha_inicio">Fecha de Inicio:</label>
                      <input type="date" class="form-control <?php if(isset($_GET['error2']) && $_GET['error2']==2) echo 'error' ?>" id="fecha_inicio" name="fecha_inicio" />
                  </div>
                  <div class="col-lg-6  form-group">
                      <label for="fecha_final">Fecha de Finalizacion:</label>
                      <input type="date" class="form-control " id="fecha_final" name="fecha_final" />
                  </div>
                  <div class="col-lg-6  form-group">
                    <label for="visitor" class="col-form-label col-lg-3 ">Visitor:</label>
                    <select class="form-control col-lg-9" id="visitor" name="visitor" >
                      <option value="">SELECCIONAR</option>
                       <?php 
                        $query = $mysqli -> query ("SELECT User_id AS id, CONCAT(User_nombre, ' ', User_apell) AS nombre FROM construc_user WHERE User_cargo = 'Ingeniero'");
                          while ($valores = mysqli_fetch_array($query)) {

                            echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                        
                          } 
                       ?>
                    </select>
                  </div>
                  <div class="col-lg-6  form-group">
                    <label for="supervisor" class="col-form-label col-lg-3 ">Supervisor:</label>
                    <select class="form-control col-lg-9 <?php if(isset($_GET['error3']) && $_GET['error3']==3) echo 'error' ?>" id="supervisor" name="supervisor" >
                      <option value="">SELECCIONAR</option>
                       <?php 
                        $query = $mysqli -> query ("SELECT User_id AS id, CONCAT(User_nombre, ' ', User_apell) AS nombre FROM construc_user WHERE User_cargo = 'Supervisor'");
                          while ($valores = mysqli_fetch_array($query)) {

                            echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                            
                          } 
                       ?>
                    </select>
                  </div>
                  <div class="col-lg-6  form-group">
                      <label for="dir_obra">Director de la Obra:</label>
                      <input type="text" class="form-control <?php if(isset($_GET['error4']) && $_GET['error4']==4) echo 'error' ?>" id="dir_obra" name="dir_obra" data-title="Please enter a value"/>
                  </div>
                  <div class="col-lg-6  form-group">
                      <label for="resi_obra">Residente de la Obra:</label>
                      <input type="text" class="form-control <?php if(isset($_GET['error5']) && $_GET['error5']==5) echo 'error' ?>" id="resi_obra" name="resi_obra" />
                  </div>
                  <div class="col-lg-12 form-group">
                      <label for="contenido">Especificaciones Unicas</label>
                      <textarea class="form-control" id="contenido" placeholder="Enter your message"></textarea>
                  </div>
                  <div class="col-lg-12 form-group">
                      <input type="hidden" name="empresa_nombre" value="<?php if (!empty($_POST['empresa_nombre'])) echo $_POST['empresa_nombre']; ?>"/>
                      <input type="hidden" name="nit" value="<?php if (!empty($_POST['nit'])) echo $_POST['nit']; ?>"/>
                      <button type="submit" id="crear_Proyecto" class="btn btn-primary btn-lg btn-block">Crear!</button>
                  </div>
              </form>
              <p style="text-align: center;">&nbsp;</p>
        </div>
      </div>
    </div>
  </div>


    


  <!-- footer
   ================================================== -->
   <br><br><br>
   <footer class="container navbar-fixed-bottom">

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
</div>

</body>
</html>