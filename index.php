<?php 

require_once('cx/conexion.php');

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
  
  <!-- <script type="text/javascript" language="javascript" src="DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
 
  <script type="text/javascript" language="javascript" src="DataTables/DataTables/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" type="text/css" href="DataTables/DataTables/css/jquery.dataTables.css" media="screen" /> -->

<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  <link rel="stylesheet" href="css/layout.css">
 
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
              //console.log(dato + 'dentro al else');
              //console.log( table.row( this ).data() );
              alert(dato[0]);
              // parametro = dato.serialize();


              $('<form action="modulos/proyectos.php" method="POST">' + 
                 '<input type="hidden" name="nit" value="' + dato[0]+ '">' +
                 '<input type="hidden" name="empresa_nombre" value="' + dato[1]+ '">' +
                 '<input type="hidden" name="datos" value="' + dato[5]+ '">' +
                 '</form>').appendTo('body').submit();
          }
        }else{
          alert( 'La Empresa '+nombre+ 'se encuentra Desactivada');
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
               <img src="img/logo_blanc2.png" class="img-responsive" width="100%">
          </div>
      </div>
  </header>

<div class="container">
 

  <!-- <?php echo $_POST['algo']; ?> -->

  <h2>Bienvenido Sr : <?php if (!empty($_SESSION['usuario'])) echo "el nombre"; ?> </h2>
  

  <!-- <div class="input-group">
    <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Buscar empresa...">
  </div> -->

  <!-- <table class="table table-hover"> -->
  <table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display">
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
     $query = $mysqli->query ("SELECT * FROM construc_empresa ORDER BY Empresa_nomb ASC");
        while ( $valores = mysqli_fetch_array($query) ) {
          echo "<tr class='gradeA'>";
            echo "<th>".$valores['Empresa_nit']."</th>";
            echo "<th>".$valores['Empresa_nomb']."</th>";
            echo "<th>".$valores['Empresa_tel']."</th>";
            echo "<th>".$valores['Empresa_dir']."</th>";
            if ($valores['Empresa_active'] == 'SI')
              echo "<th >".$valores['Empresa_active']."</th>";
            elseif ($valores['Empresa_active'] == 'NO')
             echo "<th style='background-color: #ff4343;'>".$valores['Empresa_active']."</th>";
          echo "</tr>";

        } ?> 
   </tbody>
  </table>



  <div class="form-group">
    <?php $query = $mysqli->query ("SELECT COUNT(Empresa_nomb) AS cant_empre, (SELECT COUNT(Proyect_nomb) FROM construc_proyect) AS cant_proyect, (SELECT COUNT(Proyect_nomb) FROM construc_proyect WHERE Proyect_estado = 'Proceso') AS cant_proyect_on FROM construc_empresa");
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
      <div id="cont1" class="numero"><script>contadores(<?php echo $fila['cant_empre']; ?>, "cont1");</script></div>
    </div>
    <div  class="caja_contadores" >
      <p><span>Total de Proyectos</span></p>
      <div id="cont2" class="numero"><script>contadores(<?php echo $fila['cant_proyect']; ?>, "cont2");</script></div>
      
      
    </div>
    <div class="caja_contadores">
      <p><span>Proyectos Activos</span></p>
      <div id="cont3" class="numero"><script>contadores(<?php echo $fila['cant_proyect_on']; ?>, "cont3");</script></div>
    </div>
  </div>

  <!-- <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Planos</a></li>
    <li><a data-toggle="tab" href="#menu1">Especificaciones</a></li>
    <li><a data-toggle="tab" href="#menu2">Materiales</a></li>
    <li><a data-toggle="tab" href="#menu3">Control de Calidad</a></li>
    <li><a data-toggle="tab" href="#menu4">Control de Ejecusion</a></li>
    <li><a data-toggle="tab" href="#menu5">Observaciones</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Planos</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Especificaciones</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Materiales</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Control de Calidad</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <div id="menu4" class="tab-pane fade">
      <h3>Control de Ejecusion</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <div id="menu5" class="tab-pane fade">
      <h3>Observaciones</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div> -->


    
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