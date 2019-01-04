<?php 

require_once('../../cx/conexion.php');

// $sql="SELECT * FROM construc_empresa"
// if ($_SESSION['usuario']) {
//   # code...
// }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supervisión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="../../plugins/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
  <link href="../../plugins/DataTables/DataTables/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <script src="../../plugins/DataTables/DataTables/js/jquery.dataTables.min.js"></script>

  <link rel="stylesheet" href="../../css/layout.css">
 
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
    #Jtabla_filter{
      margin-bottom: 15px;
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
  </style>

  <script>
   
    $(document).ready(function(){

      var ultimoid = null;

      // var table = $('#Jtabla').DataTable();

      var table = $('#Jtabla').DataTable({
         keys: true,
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
          "sLengthMenu":     "Mostrar _MENU_ Empresas",
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

          //alert( 'Código del cliente '+codigo+' '+'Nombre '+nombre);

          if (datos[4]=="SI") {
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

              $('<form action="../proyectos/proyectos.php" method="POST">' + 
                 '<input type="hidden" name="nit" value="' + dato[0]+ '">' +
                 '<input type="hidden" name="empresa_nombre" value="' + dato[1]+ '">' +
                 '<input type="hidden" name="datos" value="' + dato[5]+ '">' +
                 '</form>').appendTo('body').submit();
            }
          }else{
            alert( 'La Empresa '+nombre+ ' se encuentra Desactivada');
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
      <div>
      <?php 
        $clase="";
        if (isset($_SESSION['profesion']) && !empty($_SESSION['profesion']) && ($_SESSION['profesion']== 'Administrador' || utf8_encode($_SESSION['profesion'])== 'Tecnólogo en Análisis y Desarrollo de Sistemas de Información' )) {
          $clase="col-md-6";
        ?>
          <div class="col-md-6" align="left" style="color: #fff;">
            <a href="../administracion/">
              Administrar
               <span class="glyphicon glyphicon-pencil"></span>
            </a>
          </div>
      <?php
        }
      ?>
        <div class="<?php echo $clase; ?>" align="right" style="color: #fff;">
          <a href="../../cx/destroy_session.php">
            Cerrar Session
             <span class="glyphicon glyphicon-off"></span>
          </a>
        </div>
      </div>
  </header>
  <hr>

<div class="container-fluid" style=" margin-left: 6%; margin-right: 6%; ">
 

  <!-- <?php echo $_POST['algo']; ?> -->

  <h2>Bienvenido Sr : <?php if (!empty($_SESSION['usuario'])) echo $_SESSION['usuario']; ?> </h2>

  <!-- <table class="table table-hover"> -->
  <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="margin-bottom : 30px;">
   <thead>
    <tr class="gradeC" style="background: #ff3636; color: #ffffff;">
     <th  width="20%" align="left">NIT</th>
     <th  width="40%" align="left">NOMBRE</th>
     <th  width="20%" align="left">TELEFONO</th>
     <th  width="20%" align="left">DIRECCION</th> 
     <th  width="20%" align="left">ESTADO</th>
    </tr>
   </thead>
   <tbody>
     <?php 
     // $query = $mysqli->query ("SELECT * FROM empresa ORDER BY nombre ASC");
     $query = $mysqli->query ("SELECT * from terceros where `id_profesion` = 25 or `id_profesion` = 26");
        while ( $valores = mysqli_fetch_array($query) ) {
          echo "<tr class='gradeA'>";
            echo "<th>".$valores['nit']."</th>";
            echo "<th>".$valores['nombre']."</th>";
            echo "<th>".$valores['telefono1']."</th>";
            echo "<th>".$valores['direccion']."</th>";
            if ($valores['estado'] == 'SI')
              echo "<th >".$valores['estado']."</th>";
            elseif ($valores['estado'] == 'NO')
             echo "<th style='background-color: #ff4343;'>".$valores['estado']."</th>";
          echo "</tr>";

        } ?> 
   </tbody>
  </table>

  <div class="form-group">
    <?php 
    // $query = $mysqli->query ("SELECT COUNT(nombre) AS cant_empre, (SELECT COUNT(nombre) FROM proyecto) AS cant_proyect, (SELECT COUNT(nombre) FROM proyecto WHERE estado = 'Proceso') AS cant_proyect_on FROM empresa");
    $query = $mysqli->query ("SELECT COUNT(nombre) AS cant_empre, (SELECT COUNT(nombre) FROM proyecto) AS cant_proyect, (SELECT COUNT(nombre) FROM proyecto WHERE estado = 'Proceso') AS cant_proyect_on FROM terceros where `id_profesion` = 25 or `id_profesion` = 26");
          
    $fila = mysqli_fetch_assoc($query);

    ?>
  <script>
    function contadores(cantidad, sitio){
     // Autoincrease function. start -------------->
      var cont = 0;
      var rango = document.getElementById(sitio);
      //we allocate time from a query to the database
      var tiempo = cantidad+1;

      var id = setInterval(function(){
        rango.innerHTML = cont;
        cont++;
        if(cont == tiempo) 
        {
          //we stop the function
          clearInterval(id);
        }
      }, 150); 
    //<------------------Autoincrease function. stop
    }

  </script>
    <div class="caja_contadores derecho" >
      <p><span>Total de Empresas</span></p>
      <div id="cont1" class="numero">
        <script>contadores(<?php echo $fila['cant_empre']; ?>, "cont1");
        </script>
      </div>
    </div>
    <div  class="caja_contadores" >
      <p><span>Total de Proyectos</span></p>
      <div id="cont2" class="numero">
        <script>contadores(<?php echo $fila['cant_proyect']; ?>, "cont2");
        </script>
      </div>
    </div>
    <div class="caja_contadores">
      <p><span>Proyectos Activos</span></p>
      <div id="cont3" class="numero">
        <script>contadores(<?php echo $fila['cant_proyect_on']; ?>, "cont3");
        </script>
      </div>
    </div>
  </div>


    
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

      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a></div>

   </footer> <!-- Footer End-->


</body>
</html>