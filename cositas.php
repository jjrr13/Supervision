
      $result2 =$mysqli->query($sql2);
      // $result2 = mysqli_num_rows($result2);
      $datosLic = array();
      while ($valores2 = mysqli_fetch_array($result2)) {

        array_push($datosLic, $valores2['id_lic']);
        array_push($datosLic, $valores2['nombre']);
        array_push($datosLic, $valores2['modalidad']);

        array_push($tipos_licencias, $datosLic );

        $datosLic = array();
      }
      // var_dump($tipos_licencias);

      

      $result3 =$mysqli->query($sql);
      // $result3 = mysqli_num_rows($result3);

      while ($valores3 = mysqli_fetch_array($result3)) {
        array_push($tipos_usos, $valores3['nombre']);
      }

      $arrayjson = array();
      $arrayjson[] = array(
              'radicado'     => $_SESSION['radicado'],
              'estrato'    => $_SESSION['estrato'],
              'dir_act'    => $_SESSION['dir_act'],
              'barrio_act'    => $_SESSION['barrio_act'],
              'fecha'     => $_SESSION['fecha'],
              'tipos_licencias' => $tipos_licencias,
              'tipos_usos'  => $tipos_usos
      );

      echo json_encode($arrayjson);
      // var_dump($arrayjson);

    }<?php
session_start();

 require_once('../../conexion.php');
    $hoy = getdate();
  
    $begin = new DateTime( '2018-08-01' );
   
    $end = new DateTime( '2018-08-05' );
 
    $end = $end->modify( '+1 day' ); 

       $sql = "SELECT * FROM pago_p WHERE fechadeposito BETWEEN '$begin' AND '$end'"; 

       $resultado = mysqli_num_rows($resultado);

      if ($resultado <= 0) {
          echo '<script> alert("No realizaste el pago en la fecha determinada"); </script>';
      }
   
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($begin, $interval ,$end);

    $alerta="";
   
    foreach($daterange as $date){
     
        $fecha_dia= $date->format("Ymd");

        echo $fecha_dia + '<br>';
     
        // $res = mysqli_query($conexion,$sql);

        // while($resultado = mysqli_fetch_array($res)){
       
        //     if(!empty($resultado["pago"])) {
            
        //         $alerta="si";
        //     }
        // }

        if ($alerta=="si") {
            //despues del ciclo imprimimos la alerta para que en cada ciclo no la repita
        }
    }
?> 
<?php
public static boolean Comprobar(int numeros[], int num){
	boolean igual = false;
    for(int i = 0; i<numeros.length;i++){
        if(numeros[i] != num){ 
            igual = true;
        } 
    }
    return igual; 
}

include_once ($_SERVER['DOCUMENT_ROOT'].'/gestionweb/models/claseTicket.php');
session_start();

if (isset($_POST['accion'])){
	if ($_POST['accion']=="listar"){

		if(isset($_SESSION['carrito'])){
			
			$carrito =$_SESSION['carrito'];
			echo json_encode($carrito);
		}else{

			$carrito = array();
			echo json_encode($carrito);
		}



	}else if ($_POST['accion']=="agregar"){
		$id = $_POST['id'];
		$pu = $_POST['precio'];
		$cant = $_POST['cantidad'];
		$nom = $_POST['nombre'];
		$detalle = new detalleTicket($id,$pu,$cant,$nom);




		if(isset($_SESSION['carrito'])){
			$informacion =$_SESSION['carrito']; 
			$carrito[] = unserialize($informacion);
		} else {
			$carrito = array();
		}

		array_push($carrito, $detalle);

		$_SESSION['carrito'] = serialize($carrito);

	}

private void BtnCalcular_Click(object sender, EventArgs e)
	{
	    entero = new Numero();
		
	    entero.Numero(double.Parse(txtNum1.Text), txtNum2.Text);

	    entero.Numero(double.Parse(txtNum1.Text), double.Parse(txtNum2.Text));

	    txtResultado.Text = entero.Imprimir();
	}

} 


$horasbd = [ '00:30:00', '01:00:00', '04:30:00'];

function sumarHoras($horas) {
    $total = 0;
    foreach($horas as $h) {
        $parts = explode(":", $h);
        $total += $parts[2] + $parts[1]*60 + $parts[0]*3600;        
    }   
    return gmdate("H:i:s", $total);
}

echo sumarHoras($horasbd);



?>       echo '<script> alert("No realizaste el pago en la fecha determinada"); </script>';
        }
    }
<script type="text/javascript">

    $(document).ready(function() {
listarDetalle();

});
function listarDetalle(){
     var accion="listar";
      
    $.ajax({
     
            type: "POST",
            url: "//localhost/gestionweb/includes/php/procesoDetalle.php",
            data: { "accion":accion}, 
           dataType:'json',
        
            error: function(){
                alert("error petición ajax");
               
            },
            
            success: function(data){
              
          console.log(data);
          
                                   
               for (var i = 0; i < data.length; i++) {
        
                var newRow =
                    "<tr>" +
                    "<td>" + data[i].idp + "</td>" +
               
                    "<td>" + data[i].cantidad + "</td>" +
                    "<td>" + data[i].nombre + "</td>" +
                      "<td>" + data[i].pu + "</td>" +
                    "<td><input type='radio' id='"+data[i].idp+"' name='seleccion'/></td>"+
                    "</tr>";
                $(newRow).appendTo("#ticket tbody");                 
        } }
        
}).fail( function( jqXHR, textStatus, errorThrown ) {

  if (jqXHR.status === 0) {

    alert('Not connect: Verify Network.');

  } else if (jqXHR.status == 404) {

    alert('Requested page not found [404]');
  

  } else if (jqXHR.status == 500) {

    alert('Internal Server Error [500].');

  } else if (textStatus === 'parsererror') {

    alert('Requested JSON parse failed.');

  } else if (textStatus === 'timeout') {

    alert('Time out error.');

  } else if (textStatus === 'abort') {

    alert('Ajax request aborted.');

  } else {

    alert('Uncaught Error: ' + jqXHR.responseText);

  }

});;

};


</script>
Bienvenido bro, no lo tomes a mal pero tu pregunta no cumple con los requisitos del sitio, por ende te invito a que te des un

Hola y bienvenido a [es.so]. Nótese que esta pregunta tiene problemas de formato. Dale a [edit](/edit) para modificarla siguiendo las reglas de lo que es aceptado en este sitio: [¿Qué tipo de preguntas puedo hacer aquí?](/help/on-topic). También puede serte de interés realizar el [tour] y leer [ask].


https://es.stackoverflow.com/questions/166097/como-mostrar-ocultar-sliders-de-jquery-ui-con-botones //posible eliminar btns

https://www.highcharts.com/docs/working-with-data/live-data // graficas
https://plot.ly/javascript/  // graficas

https://select2.org/getting-started/basic-usage // select con buscador

https://www.npmjs.com/package/bootstrap-select // select con buscador y eleccion multiple

https://stackoverflow.com/questions/21146382/bootstrap-datepicker-restrict-available-dates-to-be-selected // admitir fechas con picker

// imprimir en un archivo desde php del lado del cliente
https://es.stackoverflow.com/questions/188839/descargar-txt-desde-html/188846?noredirect=1#comment353796_188846
-?(\d+|\d+\.\d+|\.\d+)([eE][-+]?

 StdIn in = new StdIn ();  
    float[] PC = new float [15];  
    float[] SC = new float [30];
    float[] TC = new float [46];    
    int A, B, C;  
    float S;  

    for (j=1; j <= 45 ; j++) {

        if (j <=15 ) {
            System.out.println ("Primer Columna");
            System.out.print (j + "\tNumero: ");
            PC [j] = in.readFloat ();
        }
        else if (j > 15 && j <= 30) {
            System.out.println ("Segunda Columna");
            System.out.print (j + "\tNumero:\t");
            SC [j] = in.readFloat ();
        }
        else if (j > 30 && j <= 45) {
            System.out.println ("Tercer Columna");
            System.out.print (j + "\tNumero:\t");
            TC [j] = in.readFloat ();
        }
    }
    for (j = 1; j < PC.length ; j++) {
        System.out.println ("Primer Columna" + PC [j]);
        System.out.println ("Segunda Columna" + SC [j]);
        System.out.println ("Tercer COlumna" + TC [j]);
        S = PC [j] + SC [j] + TC [j];
        System.out.println ("Sumatoria de las 3 columnas" + S);
    }
    
} 


SELECT a.id_agendamiento, CONCAT(t.nombre, ' ', t.apellido) AS cliente, c.consulta, 

CASE WHEN 
    (   CASE WHEN 
        a.nro_radicado is null 
            THEN a.nro_solicitud 
            ELSE a.nro_radicado  
        END) is null 
            THEN 'POR DEFINIR' 
            ELSE (
                CASE WHEN 
                    a.nro_radicado is null 
                    THEN a.nro_solicitud 
                    ELSE a.nro_radicado  
               END) 
 END AS numero, 
    
    a.hora, ae.estado
                                  
        FROM agendamiento a, terceros t, agendamiento_estado ae, consultas c 
        WHERE a.nit = t.nit AND a.id_estado = ae.id_estado AND a.id_consulta = c.id_consulta AND ae.id_estado = 1
        
        ORDER BY a.fecha, a.hora ASC





SELECT a.id_agendamiento, CONCAT(t.nombre, ' ', t.apellido) AS cliente, c.consulta, 


case 
  WHEN a.nro_radicado is null then ( 
      case
        when a.nro_solicitud is null then 'POR DEFINIR' 
        ELSE a.nro_solicitud 
      END)
  ELSE a.nro_radicado
   

 END as numero, 
 a.hora, ae.estado
                                  
        FROM agendamiento a, terceros t, agendamiento_estado ae, consultas c 
        WHERE a.nit = t.nit AND a.id_estado = ae.id_estado AND a.id_consulta = c.id_consulta AND ae.id_estado = 1
        
        ORDER BY a.fecha, a.hora ASC



<?php 
  $date = strftime( "%Y-%m-%d %H:%M:%S"); //FECHA
  
  function conectarse($host,$usuario,$password,$BBDD){ 
    $link=@mysql_connect($host,$usuario,$password) or die (mysql_error()); 
    mysql_select_db($BBDD,$link) or die (mysql_error()); 
    return $link; 
  } 

  $link=conectarse("localhost","usuario1","123456","basededatos");  

  $con_at = "select * from tabla";
  $con_at = mysql_query($con_at,$link);
  $con = mysql_fetch_array($con_at);
  $atdb_server = $con['at_dbserver'];
  $atdb_user = $con['at_dbuser'];
  $atdb_pass = $con['at_dbpass'];

  function conectarse2($host,$usuario,$password,$BBDD){ 
    $link2=@mysql_connect($host,$usuario,$password) or die ('error 2da db'); 
    mysql_select_db($BBDD,$link2) or die (mysql_error()); 
    return $link2; 
  } 
  $link2=conectarse2($atdb_server,$atdb_user, $atdb_pass,"base2");  

  $sql = "SELECT * FROM config_camp where cp_tipo = '0' ";
  $data =mysql_query($sql, $link);
  $afectadas = mysql_num_rows(mysql_query($sql, $link));



$table ="<table class='tab' width=\"600\">";
$table .="<tr>";

foreach ($info_campo as $valor) {
    $table .= "<th>".$valor->name."</th>";
}
$table .= "</tr>";
$a=0;

while ($fila=mysqli_fetch_row($result)) {
    $table .="<tr aling=\"center\">";

    for ($i=1; $i <=$col; $i++) {

        $table .= "<td aling=\"center\">".$fila[$i]."</td>";
    }

    $a++;
    $table .= "</tr>";
}

$table .="</table>";

}
echo $table;

SELECT E.EmployeeID AS 'ID',
     E.FirstName AS 'NOMBRE',
     E.LastName AS 'APELLIDO',
     COUNT(OD.OrderID) AS 'CANTIDAD',
     SUM(Quantity*UnitPrice)
     FROM [Order Details] OD
     INNER JOIN Orders O ON O.OrderID = OD.OrderID
     INNER JOIN Employees E ON E.EmployeeID = O.EmployeeID
     WHERE YEAR(O.OrderDate) = @ANO
     GROUP BY 'E.EmployeeID','E.FirstName'

<div class="alert alert-info" role="alert">
    <?php
        include_once '../pruebas/conexion.php';
        $sql_leer = 'SELECT * FROM reporteusu WHERE id';

        $gsnet = $pdo->prepare($sql_leer);
        $gsnet->execute();

        $resultado = $gsnet->fetchAll();
        for ($j=0; $j< $resultado.length ; $j++) {
            echo $resultado[$j]."<br>";
        }
    ?>
</div>


var fruits = ["Banana", "Orange", "Apple", "Mango","Orange", "Orange", 
"Apple", "Mango"];

var cant = fruits.filter(function(value) {

return value == "Orange";})


console.log(cant.length);


function igual(elemento) {
  return (elemento== elemento)? 1 : 0; 
}
var cant = fruits.filter(igual);

console.log(cant.length);
// filtrados es [12, 130, 44]




$mysqli = mysqli_init();
    if (!$mysqli) {
        die('Falló mysqli_init');
    }

    //Process of connection to the database
    if (!$mysqli->real_connect("localhost", "root","", "aeduardo")) {
        die('Error de conexión (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    //se valida que todos los datos lleguen y lleguen llenos
    if ( (isset($_POST['estado']) && !empty($_POST['estado']) ) &&
         (isset($_POST['n_habitacion']) && !empty($_POST['n_habitacion']) ) &&
         (isset($_POST['tipoh']) && !empty($_POST['tipoh']) )  ) {
         
         //traer el id del usuario
         $sql = "SELECT id FROM usuario WHERE usuario ='nombre_elegifo'";
         $result = $mysqli->query($sql);
         $fila = mysqli_fetch_assoc($result);

      if($fila>0){
        $id_usuario= $fila['id'];
      }
        //se pasan valores a las variables
        $estado=$_POST['estado'];
        $n_habitacion=$_POST['n_habitacion'];
        $tipoh= $_POST['tipoh'];
        //se crea el query
        $sql="INSERT INTO habitacion VALUES ('','".$estado."','".$n_habitacion."','".$tipoh."','".$id_usuario."')";
        $result = $mysqli->query($sql);
        //si fue exitoso el devuelve un true
        if($result){
            echo "<script>alert('se inserto en la BD');</script>";
        }else{
            //reultado si no se hizo la insercion
            echo "<script>alert('problemas desde la BD');</script>";
        }
    }else{
        //descarte de los campos vacios
        echo "<script>alert('no llegaron los datos');</script>";
    }



  $arrayjson = array();
                $arrayjson[] = array("
                                    'nit'          => '1223344',//nit del solicitante
                                    'nombre'       => 'el nombre',// nombres concatenados 
                                    'funcionario'  => $atendio,//quien atiende
                                    'nro_radicado' => $nro_radicado,//numero de radicado
                                    'nrosolicitud' => $nrosolicitud,// numero de solicitud
                                    'consulta'     => 'APORTAR PLANOS',//tipo de consulta que se realiza
                                    'hora'         => $hora//hora de agendamiento"
                );

// 
$("#id_boton").click(function(){
    $.post("/Oficina/OficinaGeneral",
      function (data) {
          $.each(data, function (i, item) {
              $('#Ecbooficinageneral').append('<option value="' + item.Cod_Oficina_G + '">' + item.Nom_OFicina_G + '</option>');
              $("#Ecbooficinageneral").val(DepOficina);
              $('#Ecbooficinageneral').change();
          });
      });

    $.post("/Oficina/OficinaDep",
    { codofi: CodOficina },
    function (data) {
        $.each(data, function (i, item) {
            $('#Ecbooficinadep').append('<option value="' + item.Cod_Oficina_D + '">' + item.Nom_Oficina_D + '</option');
            $("#Ecbooficinadep").val(CodOficina);
            $('#Ecbooficinadep').change();
        });
    });
})


 $sql = "CALL registrar(?,?,?,?,?,?,?)";
   $stm = $this->db->prepare($sql);
   $stm->bindParam(1, $this->parametro1);
   $stm->bindParam(2, $this->parametro2);
   $stm->bindParam(3, $this->parametro3);
   $stm->bindParam(4, $this->parametro4);
   $stm->bindParam(5, $this->parametro5);
   $stm->bindParam(6, $this->parametro6);
   $stm->bindParam(7, $this->parametro7);
   $stm->execute();

   $sql = "SELECT * FROM ingresos WHERE visitante = ?";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->parametro5);
    $stm->execute();



SELECT p.id, p.nombre, p.precio, p.foto, p.preciot, t.talla 
FROM productos AS p
INNER JOIN talla AS t ON p.talla = t.id
LEFT JOIN carro AS c ON  p.id = c.id_p
WHERE  p.status = 1 AND c.id_u = $_SESSION[quien]
GROUP BY c.id_u


int num, suma = 0;
string result="";

Console.Write("Ingresa un número:");
num = Convert.ToInt32(Console.ReadLine());

for (int i = 0; i < num; i++){

   suma = suma + i;
    if (i==0) {
        result = result + i;
    }else{
        result= result + "+" +i;
    }

   Console.Write("La suma de los números que anteceden a el número: " + num + " es " + suma + ".");
   Console.ReadKey();
}

Console.Write("La suma de los números que anteceden a el número: " + result + " = " + suma + ".");
Console.ReadKey();

/////////////////////////////// llenar tabla ////////////////////////////////////////

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
         $result = $mysqli->query ("SELECT Proyect_id, Proyect_nomb, Proyect_estado FROM construc_proyect WHERE Proyect_nit_empre = '$nit' ");
         $fila =mysqli_fetch_assoc($result);
            while ( $valores = mysqli_fetch_array($result) ) {
              echo "<tr class='gradeA'>";
               echo "<th style='display: none;'>".$valores['Proyect_id']."</th>";
                echo "<th>".$valores['Proyect_nomb']."</th>";
                echo "<th style='text-align: center;'>".$valores['Proyect_estado']."</th>";
              echo "</tr>";

            }
             ?> 
       </tbody>
      </table>
    </div>
  <br></form>

  //////////////////////////// fin llenar tabla ///////////////////////////////////////////////////////////



  <?php

require('datos.php');

//creamos una instancia
$mysqli = new mysqli($db_host,$db_usuario,$db_contra,$db_nombre);
//verificamos que no hayan errores en la conexion
if(!$mysqli->connect_errno){
  //validamos que los datos llegue y que no esten vacios
  if(isset($_POST['cedula']) && !empty($_POST['cedula']))  {   

    //capturamos la variable del post
    $Cedula=$_POST['cedula'];
    //preparamos la sentencia con el simbolo "?"
    $sql = $mysqli->prepare("SELECT * FROM clientes WHERE cedula=$Cedula");
    //enviamos el parametro que preparamos 
    $sql->bind_param("i", $Cedula)
    //ejecutamos la sentencia
    $sql->execute();
    //obtenemos el resultado
    $resultado = $sql->get_result();
    //sacamos el numero de filas que trae
    $fila = $resultado->fetch_assoc();
    //validamos que si haya traido por lo menos una fila
    if($fila>0) {
      echo "<script type='text/javascript'> alert('El cliente ya esta registrado.'); </script>";  
    }
    else    {
      echo "<script type='text/javascript'> alert('No existe.'); </script>";
    }



  }
  else{
    //validamos si no llegaron los datos
    echo "<script type='text/javascript'> alert('No llegaron los Datos'); </script>"; 
  }
}
else{
  //mostramos alerta por si fallo la conexion
  echo "<script type='text/javascript'> alert('Fallo la conexion a la BD'); </script>"; 
 }


?>

if( isset( $POST['arreglo_direcciones'] ) )
{
 // aqui haces algo si llego
        // !empty veirificas que no este vacia
    if( !empty( $POST['arreglo_direcciones'] ) )
    {
     // aqui haces algo si tiene algun valor
    }else{
        echo "La variable ESTA VACIA"
    }
}else{
    echo "La variable NO LLEGO";
}



<?php
    //$conn contiene la conecion a la base de datos
    $tabla_puesto =sqlsrv_query($conn, "select * from puesto");
    //aqui obtengo el id que corresponde al usuario en este caso seria usuario=2
    $id = $_GET['id'];
    //muestro el valor de pesto 
    $puesto=$res['puesto'];
    //consulta select para identificar BD
    $sql_usuario = sqlsrv_query($conn, "SELECT * FROM usuario WHERE Id=$id ORDER BY Id ASC");
    //traer la info del puesto
    $sql_usuario = sqlsrv_fetch_array($sql_usuario);
    //se recuperan los valores
    $sql_puesto = sqlsrv_query($conn, "SELECT * FROM puesto WHERE id=$puesto");
    //se trae la info del usuario
    $sql_puesto=sqlsrv_fetch_array($sql_puesto);
    //se recuperan los valores

    //se valida si las dos consultas obtuvieron resultados
   if ($sql_puesto >0 && $sql_usuario 0) {
       $tabla_puesto_puesto=$c['puesto'];
   }
     
    //aqui seleciono la tabla puesto y relaciono que el valor de id con el valor del puesto corespondiente a su id de puesto, igualamos y consegumos el puesto con $tabla_puesto_puesto
?>

<select>
                                //tienes ":" y es ";"
        <?php foreach($tabla_puesto as $p):?>
<option value="<?php echo $p['id']; ?>">
        <?php echo $p['puesto']; ?>
</option>
         <?php endforeach; ?>
</select>


<?php 
//damos valor tope al porcentaje
$tope=1000;
                    //sacamos el 1 %
$un_porcentaje = $tope - (1000 * 0.01);

//asignamos valor tope de cada 1000
$dolar = 5,00;

//sacamos el valor induvidual de cada punto
$valor = $dolar / $tope;

//multiplicamos el valor individual de ganancia por la cantidad de puntos
$ganancia = $un_porcentaje * $valor;

 ?>


 <?php 
function listaPendientesEjecutivo()
{
  $sql="SELECT * FROM mtc.datosejecutivo;";

  $resultado=EjecutaProcedures($sql);
//print_r($res);

    $html='

    <div class="col-md-10">

      <table id="pendientes" class="col-md-12 table table-bordered">
        <thead id="ctabla">
          <tr style="background-color:#EC0000;color:white;">
            <th class="col-md-1">Numero De Folio</th>
            <th class="col-md-1">Numero De Credito</th>
            <th class="col-md-1">Nombre Cliente</th>
            <th class="col-md-1">Tasa Anterior</th>
            <th class="col-md-1">Tasa Nueva</th>
             <th class="col-md-1">Spread Anterior</th>
             <th class="col-md-1">Spread Nuevo</th>
              <th class="col-md-1">Saldos No Dispuestos Anterior</th>
              <th class="col-md-1">Saldos No Dispuestos Nuevo</th>
              <th class="col-md-1">Comision Apertura Anterior</th>
              <th class="col-md-1">Comision Apertura  Nuevo</th>
          </tr>
        </thead>
        <tbody id="filas">';

  while($row= mysqli_fetch_array($resultado))  
    {

      $num_folio=$row['num_folio'];
      $num_credito=$row['num_credito'];
      $nombreCliente=$row['nombreCliente'];
      $tasaAnterior=$row['tasaAnterior'];
      $tasaNueva=$row['tasaNueva'];
      
      if($tasaNueva<=0){
            $tasaNueva="No aplica";
            $spreadAnterior=$row['spreadAnterior'];
            $spreadNuevo=$row['spreadNuevo'];
        }
       if($spreadNuevo<=0){
            $spreadNuevo="No aplica";
            $saldosNoDispuestosAnt=$row['saldosNoDispuestosAnt'];
            $saldosNoDispuestosNu=$row['saldosNoDispuestosNu'];
        }
       if($saldosNoDispuestosNu<=0){
            $saldosNoDispuestosNu="No aplica";
            $comisionAperturaAnt=$row['comisionAperturaAnt'];
            $comisionAperturaNu=$row['comisionAperturaNu'];
        }
      if($comisionAperturaNu<=0){
            $comisionAperturaNu="No aplica";
        }

        $html.='
                <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$num_folio.'</p></td>
                  <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$num_credito.'</p></td>
                 <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$nombreCliente.'</p></td>
                <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$tasaAnterior.'</p></td>
                <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$tasaNueva.'</p></td>
                  <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$spreadAnterior.'</p></td>
                <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$spreadNuevo.'</p></td>
                  <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$saldosNoDispuestosAnt.'</p></td>
                <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$saldosNoDispuestosNu.'</p></td>
                  <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$comisionAperturaAnt.'</p></td>
                <td COLSPAN="1">
                <p style="font-size:15px; text-align: center;">'.$comisionAperturaNu.'</p></td>';

    }

    $html.='
        </tbody>
      </table>

    </div>';


$paquete=array($html);
return json_encode($paquete);
}


?>


var ship;
var aliens = []; 
var missiles = [];
...
...
function keyPressed() {
if (key === ' ') {
    //en una sola linea agregas los elementos al array, a menos que necesites usarlos en otro lado
    missiles.push('width/2', 'height/2');

}

#include <stdlib.h>
#include <conio.h>
#include <time.h>
#include <stdio.h>    

void main ()
{
    int edad[10];
    int x,y,r;    

    printf ("BIENVENIDOS AL EVENTO\n");

    for (x=0;x<=9;x++) //Guarda 10 edades
    {
        printf ("Ingrese las edades");
        scanf (" %d",&edad[x]);
    }
    for (x=0;x<=9;x++)
    {
        printf (" %d",edad[x]);
    }    

    r=evento(edad);  //Llamando funcion
    printf ("El total de los boletos es de %d",r);
}

void evento (int edad[]) //Recibe funcion
{
    int sumas[3];
    

    for (j=0; j < 10;j++) // Suma las posiciones que son menor a 13
    {
        if (edad[j] < 13)   
        {
            sumas[0] = sumas[0]+1;
        }
        else if (edad[j]<18)
        {
            sumas[1] = sumas[1]+1;//alamacenamos la suma de cada persona que son menor a 18
        }
        else if (edad[j]<18)
        {
            sumas[2] = sumas[2]+1;// alamacenamos la suma de cada persona que son mayor a 18
        }
    }
    
    printf ("En infantil ingresaron %d personas\n",sumas[0]);    
          
    printf ("En juvenil ingresaron %d personas\n",sumas[1]);    
   
    printf ("Ingresaron %d adultos\n",sumas[2]);

    //q=h+o+t;
    //return q;
}

boolean resultado;
int tipo;
 do
 {

   System.out.println("Ingrese tipo de cuenta  \n1. corriente\n2.Ahorro");

   try {
            tipo=Integer.parseInt(entrada.readLine());
            resultado = true;
        } catch (NumberFormatException excepcion) {
            resultado = false;
        }
 }
 while (!resultado);


 

        

<?php
    $existencia=3;
    $saldo1= 1;
    $precio1=154.16;
    $saldo2= 3;
    $precio2=116;

   
    for (j=0; j < $saldo2;j++) // Suma las posiciones que son menor a 13
    {
        if ($saldo1 <= $existencia) {
            $saldo1 = $saldo1 + 1;
            $precio1 = $precio1 + $precio2;
        }

    }

?>

$(document).ready(function() 
{
    //remueves el atributo de solo leer
      $('#mi_input').removeAttr('readonly');

}
SELECT visitor_ip, visitor_date FROM visitors_table ORDER BY visitor_date DESC LIMIT 1

$fecha_registro= date("Y-m-d H:i:s",strtotime(visitor_date."+ 2 days"));
$fecha_hoy = date('Y-m-d H:i:s');


if (($fecha_registro >= $fecha_hoy) {
    //ejecute la funcion
}




<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Linkar 1</title>

</head>

<body>

 <div id="caja0">

  <h3>Linkar a otros sitios con contraseña</h3>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
 <table width="48%" align="center">
  <tr>
   <td>Pon contraseña:</td>
   <td><label for="nombre_usuario"></label>
    <input type="text" name="nombre_usuario" id="nombre_usuario">
   </td>
  </tr>
  <tr>

  </tr>
  <tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  </tr>
  <tr>
   <td colspan="2" align="center"><input type="submit" name="enviando" id="enviando" value="Enviar">
   </td>
  </tr>
 </table>
</form>
  <?php
  /*Este código comprueba el envío del formulario*/
  if(isset($_POST["enviando"])){
   /*$_POST es una var Super Global y son Arrays y eso es lo que estamos haciendo con este formulario*/
   /*Con estas var almacenamos lo que el usuario ha introducido en los cuadros de texto en caso de que pulse el botón de Enviar  */
   $usuario=$_POST["nombre_usuario"];


   if($usuario=="Juan"){

   //echo(" Puedes entrar ya");
   /*Codigo para redirrecionar a otra pág dentro el sitio*/
   header('Location: /Probando.html');
   /*Codigo para redirrecionar a otra WEB*/
    //header('Location:http://jpbenavente.com/index.html');

   }else{ echo("No puedes entrar nunca");


        }//Del 2º if

   };//DEL iF 
  ?>

 </div>


</body>
</html>



consulta2 = "SELECT * FROM TCMOVIMIENTOCONTABLE WHERE CM1_TERCERO LIKE '%" + TBNit.Text 
    + "' AND CM1_TIPO = '" + comboBoxTipo.Text + "' AND CM1_NUM LIKE '%" + TBCausacion.Text + "'";
    //como dices que la consulta te trae varias filas de resultados, entonces, recorremos la consultas fila por fila
    // y en cada fila comparamos si se cumple cada condicion
    while (lector.Read())
    {
        cuenta1 = lector["CM1_CUENTA"].ToString();
        //textBox4.Text = cuenta1;
        if (cuenta1.StartsWith("2365"))
        {
            //MessageBox.Show("Existe 1");
            TBRete.Text = lector["CM1_VALORH"].ToString();
            break //este es opcional por si solo quieres que termine el ciclo cuando encuentres 2365
        }
        else if (cuenta1.StartsWith("53152001"))
        {
            //MessageBox.Show("Existe 2");
            TBRetenAsum.Text = lector["CM1_VALORD"].ToString();
        }
        else
        {
            TBTotal1.Text = lector["CM1_VALORH"].ToString();
        }
    }

<?php

  header("Content-Type: text/json");

    $id_estudiante = $_GET['id_alumno'];

    $datos = array();
    $array_resultados = array();
    $array_perfiles = array();



    $sql = "";

    $perfiles =9;

    include_once('../../Verificacion/Conexion/Abrir_Conexion.php');

    for($i=1; $i <= $perfiles; $i++){

        $sql .= "SELECT sum(res.respuesta) FROM respuestas as res INNER JOIN preguntas as pre ON res.id_pregunta = pre.id_pregunta WHERE res.id_alumno = '$id_estudiante' AND pre.id_pregunta IN (select id_pregunta from preguntas where id_perfil='$i') group by res.id_alumno;";
    }


    if($conexion->multi_query($sql) === true ){

        do {

             if ($result = $conexion->store_result()) {
                 while ($row = $result->fetch_row()) {
                    array_push($array_resultados, $row[0]);
                    //var_dump($row[0]);
                 }
                 $result->free();
             }
         } while ($conexion->next_result());
         //var_dump($array_resultados);
         //$datos["estado"] = "exito";

    }else{
        printf("Error message: %s\n", mysqli_error($conexion));
        $datos["estado"] = "error";
    }


    $id_perfil= 1;
    $sql2 = "";

    for($i=0; $i < 9; $i++){

        $resultado = $array_resultados[$i];
        $sql2 .= "INSERT INTO puntajes (resultado, id_alumno, id_perfil) VALUES ('$resultado', '$id_estudiante', '$id_perfil');";
        $id_perfil++;
    }

    if($conexion->multi_query($sql2) === true){


        $datos["estado"] = "exito";

    }else{
        printf("Error message: %s\n", mysqli_error($conexion));
        $datos["estado"] = "error";
    }

    include_once('../../Verificacion/Conexion/Cerrar_Conexion.php');



    $resultadoJson = json_encode($datos);
    //var_dump($resultadoJson);
    echo $_GET['jsoncallback'] . '(' . $resultadoJson . ');';

?>


<?php
foreach ($respuesta as $registro) {
$tr = '<tr>';
    if ($registro['idEstado'] == '1') {
        $tr = '<tr style="background-color:#F98888;color:#B72212;">';
    }else if ($registro['idEstado'] == '2') {
        $tr = '<tr style="background-color:#F9BD88;color:brown;">';
    } else {
        $tr = '<tr style="background-color:#B7D5B6;color:green;">';
    }

$cadena .= $tr."
                
            <td>".$registro['fecha']."</td>
            <td>".$registro['nombre']."</td>
            <td>".$registro['direccion']."</td>
            <td>".$registro['telefono']."</td>
            <td>".$registro['estados']."</td>
        </tr>";         
}
echo $cadena;

?>

<?php

    //creas la fecha actual 
    $fecha_hoy = date('Y-m-d H:i:s');
    //traemos la fecha de la base de datos y le sumamos 3 dias...
    $fecha_registro= date($registro['fecha'], strtotime('+3 days');
//creas la fecha actual 
    $fecha_hoy = date('Y-m-d H:i:s');
    //traemos la fecha de la base de datos y le sumamos 3 dias...
    $fecha_registro= date($fecha_hoy, strtotime('-1 month');

    $tr = '<tr>';
    //comparamos las fechas que la fecha de registro no sea mayo a la fecha de hoy
    if ($fecha_hoy > $fecha_registro) {
        //si esto se cumple es por que ya han pasado mas de 3 dias
        $tr = '<tr style="background-color:#F98888;color:#B72212;">';
    }

?>

public void onBindViewHolder(EmpresasViewHolder holder, int position) {

        Usuario usuario = usuarios.get(position);

        String activo = usuario.getActivo();
        if (activo.equalsIgnoreCase('Si')==true) {
            //si entra aqui es por que si es igual ignorando la mayusculas y minusculas
            holder.textviewempresa.setText(usuario.getUsuario());
            holder.textviewciudad.setText(usuario.getDirección());
        }
        else{
            //aqui puede hacer algo en caso de que la respuesta sea NO
        }

    }


<!-- begin snippet: js hide: false console: true babel: false -->

<!-- language: lang-html -->

<?php
    require_once('../conexion.php');
    // $hoy = getdate();
    //fecha inicial
    $begin = new DateTime( '2018-08-01' );
    //fecha final que comprede que debe evaluar los primeros 5 dias 
    $end = new DateTime( '2018-08-05' );
    //agregamos un dia mas para que cuente el 5 en la otra fecha ponemos hasta el 6
    $end = $end->modify( '+1 day' ); 

    //Creamos el intervalo de tiempo para que sea por cada dia 
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($begin, $interval ,$end);

    $alerta="";
    //recorremos la varaible que ahora almacena el rango entre 1 - 5
    foreach($daterange as $date){
        //creamos el formato de la fecha
        $fecha_dia= $date->format("Ymd");
        //hacemos la consulta con la condicion de la fecha para validar los correspondientes dias que se necesitan
        $sql = "SELECT * FROM pago_p WHERE pago =' $fecha_dia'"; 
        $res = mysqli_query($conexion,$sql);

        while($resultado = mysqli_fetch_array($res)){
            //verificamos que en cada fila el campo "pago" no este vacio
            if(!empty($resultado["pago"])) {
                //si no esta vacio entonces realizo el pago
                //y damos valor a una variable
                $alerta="si";
            }
        }

        if ($alerta=="si") {
            //despues del ciclo imprimimos la alerta para que en cada ciclo no la repita
            echo '<script> alert("No realizaste el pago en la fecha determinada"); </script>';
        }
?>


<!-- end snippet -->

$folio =$_POST['folio'];
$fecha =$_POST['fecha'];
$hora =$_POST['hora'];
$puerta =$_POST['puerta'];
$guardia =$_POST['guardia'];
$id =$_POST['id'];
$yesno =$_POST['yesno'];
$pas1 =$_POST['pas1'];
$id1 =$_POST['id1'];
$pas2 =$_POST['pas2'];
$id2 =$_POST['id2'];
$pas3 =$_POST['pas3'];
$id3 =$_POST['id3'];
$trabajador =$_POST['trabajador'];
$jefe =$_POST['jefe'];
$destino =$_POST['destino'];
$tax =$_POST['tax'];
$motivo =$_POST['motivo'];


 #include<stdio.h>
  #include<conio.h>

  void show(int b[], int tam){

  for (int i=0; i<tam; i++)

    printf(b[i], " ");

  }

  int main (){

      const tam 20;
      int a[tam];   
      int suma;
      int mayor =0;
      int menor=9999999999999999;

      for (int j =0; j<tam; j++ ){
        
        a[j]=  1 + rand()% 100;
        //a cada vuelta cumulamos el valor obtenido
        suma= suma + a[j];

        //evaluamos si el numero es mayo y lo almacenamos en la variable
        if (a[j] > mayor) {
            mayor = a[j];
        }
        //evaluamos si el numero es menor y lo almacenamos
        if (a[j] < menor) {
            menor = a[j];
        }
      }
      //obtenemos la media dividiendo la suma total entre la cantidad de elementos
      double media = suma / a.length
      printf("La media es igual a: %d", media);
      printf("El numero mayor es: %d", mayor);
      printf("El numero menor es: %d", menor);
      
     
      show(a, tam);//name and size

      getch();
      return 0;
  }

<?php

session_start();

include("conexion.php");


$usuario2 = $_SESSION['usuario'] ;

$sql = "SELECT * FROM REGISTRO  WHERE ID_ALUMNOS = '$usuario2'";
$result = $conn->query($sql);
//verificar si existen registros de la busqueda
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $ID_CURSOS=$row['ID_CURSO'];
    }

    $sql2 = "SELECT * FROM CURSOS  WHERE ID_CURSO= '$ID_CURSOS'";
    $result2 = $conn->query($sql2);
    //verificar si existen registros de la busqueda
    if($result2->num_rows > 0){
        while($row = $result2->fetch_assoc()){
            $ID_CURSO=$row['ID_CURSO'];
            $NOMBRE_C = $row['NOMBRE_C'];
            $DURACION = $row['DURACION'];
            $CATEGORIA = $row['CATEGORIA'];
            $REQUISITOS = $row['REQUISITOS'];
            $DESCRIPCION = $row['DESCRIPCION'];
            $TIPO_CONTENIDO = $row['TIPO_CONTENIDO'];
            $INSTRUCTOR = $row['INSTRUCTOR'];
            $CORREO_INSTRUCTOR = $row['CORREO_INSTRUCTOR'];
            $REGISTRO = $row['REGISTRO'];
            $NO_LECCIONES = $row['NO_LECCIONES'];

            echo"
              <div class='col-md-4 col-sm-4 col-xs-12 profile_details'>
              <form  method='POST' action='vistaGeneralAlumnos.php?msj=' >
                <div class='well profile_view'>
                    <div class='col-sm-12'>
                    <input value='".$ID_CURSO."'  type='hidden' name='id'>
                          <h4 class='brief'><i>  ".$NOMBRE_C."</i></h4>
                          <div class='left col-xs-7'>
                              <h2><strong>Incluye: </strong> ".$DURACION." / ".$NO_LECCIONES."</h2>
                              <p> <strong>Descripcion:".$DESCRIPCION." </strong></p>
                                  <ul class='list-unstyled'>
                                      <li><i class='fa fa-building'></i>Categoria:".$CATEGORIA." </li>
                                      <li><i class='fa fa-phone'></i>Contenido en:".$TIPO_CONTENIDO." </li>
                                  </ul>
                          </div>

                          <div class='right col-xs-5 text-center'>
                          <img src='images/img.jpg' alt='' class='img-circle img-responsive'>
                          </div>
                          </div>


                      <div class='col-xs-12 bottom text-center'>             
                          <div class='col-xs-12 col-sm-12 emphasis'>
                                             
                            <a href=''> <button type='submit' class='btn btn-primary btn-xs'>
                                 <i class='fa fa-user'> </i>Vista General
                              </button></a>
                          </div>
                      </div>
                </div>
              </div>
                </form>";                   
        }
    }
    else{
        echo "NO SE ENCONTRARON CURSOS RELACIONADOS AL ALUMNO...";
    }
}
else{
    echo "NO SE ENCONTRO EL ALUMNO...";
}

     
?>


function obtenerNombreProyecto($id = null){ 
    include 'conexion.php'; 
    try{ 
    return $conn->query("SELECT nombre FROM proyectos WHERE id = $id"); 
    //las llaves permiten inyectar el $id 
    } catch(Exception $e) { 
        echo "Error! : " . $e->getMessage(); return false; } 
    }
    //trae un objeto de tipo result
    $proyecto = obtenerNombreProyecto($id_proyecto); 
    //utilizamos mysqli_fetch_array para que devuelva un array de tipo asociativo
    $resultado = mysqli_fetch_array($proyecto);
        ?>
                        //ya podemos imprimir la casilla que quieres
            <span><?php echo $resultado['nombre']; ?></span>


foreach($_SESSION['shopping_cart'] as $key => $product):

    $cant=$_POST['nombre'];

    if ($cant=='Taco_pastor') {

        $tacop2= $product['quantity'];

    } else {

        $tacop2=0;

    }

    if ($cant=='Taco_suadero') {

        $tacosu2= $product['quantity'];

    } else {

        $tacosu2=0;

    }

    if ($cant=='Torta_pastor') {

        $tortap2= $product['quantity'];

    } else {

        $tortap2=0;

    }

    if ($cant=='Torta_suadero') {

        $tortasu2= $product['quantity'];

    } else {

        $tortasu2=0;

    }

    if ($cant=='Refresco') {

        $refresco2= $product['quantity'];

    } else {

        $refresco2=0;

    }

    if ($cant=='Jugo') {

        $jugo2= $product['quantity'];

    } else {

        $jugo2=0;

    }

endforeach;

if(!$error){
    echo '';
    $sql = "insert into pedidos(Nombre,Direccion,Email,Telefono, Taco_pastor,Taco_suadero,Torta_pastor,Torta_suadero,Jugo,Refresco,Total,Fecha)
                   values('$cliente', '$dir2', '$email2', '$tel2', '$tacop2','$tacosu2','$tortap2','$tortasu2','$jugo2','$refresco2','$total2','$fecha')";
    if(mysqli_query($conn, $sql)){
        $successMsg = 'SU PEDIDO A SIDO TOMADO EN UN MOMENTO LE LLEGARA A SU DOMICILIO GRACIAS!!!!'; 
    }else{
        echo 'Error '.mysqli_error($conn);
    }
}
<table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="display" style="border-collapse:unset; " width="100%">
<thead style=" background-color: #9b9090; color: #fff;">
    <tr class="cabeza" >
        <th >No. Plano</th>
        <th >Version</th>
        <th >Fecha</th>
        <th >Descripcion</th> 
        <th >Observaciones</th>
    </tr>
</thead>
<tbody id="miBody">
    <tr class="gradeA">
       <th ><input size="14" name="no_plano_0" type="text" class="form-control "></th>
       <th ><input size="5" name="version_pl_0" type="text" class="form-control "></th>
       <th ><input size="14" name="fecha_pl_0" type="date" class="form-control datepicker"></th>
       <th ><input size="32" name="descripcion_pl_0" type="text" class="form-control "></th>
       <th ><input type="text" name="observacion_pl_0" class="form-control "></th>
    </tr>
</tbody>
 </tbody>
</table>

<div style="text-align: right;">
    <button type="submit" class="btn btn-success" onclick="crearfila()"><span class='glyphicon glyphicon-plus'></span></button>
</div>
<br><br>
$lenguaje = $_POST["language"];

<input name="indexar" type="radio" id="case1" value="indexar">Indexar 
<input name="indexar" type="radio" id="case2" value="noindexar">No Indexar<br>

if(isset($_POST["submit"])){
  $index = $_POST['indexar'];
  $title = $_POST['title'];
  $mini_title = $_POST['mini_title'];
  $detail = $_POST['detail'];
  $main_cover = $_POST['main_cover'];

  $stmt = $conexion->prepare("INSERT INTO products (index, title, mini_title, detail, main_cover) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssss", $index,$title,$mini_title,$detail,$main_cover);
  if($stmt->execute()){
      echo "Datos insertados correctamente";

  } else {
      echo "Error";
  }
}
?>

  $('#table-2 tr').each(function () {
    var cuotaNo= $(this).find('td').eq(0).html();
    var interes = $(this).find('td').eq(1).html();
    var abonoCapital = $(this).find('td').eq(2).html();
    var valorCuota = $(this).find('td').eq(3).html();
    var saldoCapital = $(this).find('td').eq(4).html();
    
    $.ajax({
     async: false,
     type: "POST",
     url: "crud/register-payment-plan.php",
        data: "cuotaNo="+cuotaNo+"&interes="+interes+"&abonoCapital="+abonoCapital+"&valorCuota="+valorCuota+"&saldoCapital="+saldoCapital,
     data: {valores:valores},
     success: function(data) { if(data!="");}
    });
   });

    include_once "../connection/connection.php";

    $cuotaNo = $_POST['cuotaNo'];
    $interes = $_POST['interes'];
    $abonoCapital = $_POST['abonoCapital'];
    $valorCuota = $_POST['valorCuota'];
    $saldoCapital = $_POST['saldoCapital'];

    $sql = "INSERT INTO payment_plan (loan_id, fee_number, tentative_payment_date, payment_date_applied, fee_value, pending_value, state) VALUES ('16', '$cuotaNo', '2018-10-10', '$dates', '$valorCuota', '$saldoCapital', 'pendiente')";
    if (mysqli_query($conn, $sql)) {
            // header('Location: ../loans.php?registrationstatus=true');
        echo "Si registro";
    } else {
            // header('Location: ../loans.php?registrationstatus=false');
        echo "No registro";
    }

?>

<?php 
    $sql=mysql_query("SELECT horas_extras, COUNT(*) total FROM calculos 
    GROUP BY horas_extras");
    //decalramos un array en donde almacenaremos todas la sumas
    $sumas[0]  = 0;
    //creamos una variable con el minimo de comparacion
    $compara=1;
    //variable de factor de cambio para el arraya
    $j=0;
    while ($res=mysql_fetch_array($sql))
    {   
        //a cada vuelta de ciclo recorrenos el array para comparar con cada uno de los item
        for ($j=0; $j < count($sumas) ; $j++) { 
            //comparamos si son iguales se sumen
           if ($sumas[$j] == $res['total']) {
            //lo que tenga mas lo que llegue
                $sumas[$j] = $sumas[$j] + $res['total'];
            }
            else{
                //sino son iguales entonces se se almacena el resultado
                $sumas[$j] = $res['total'];
                $compara = $res['total'];
                //y se icrementa el factor de cambio para que en el otro ciclo no se almacene
                $j++;
            }         
        }
    }   
    //utilizamos un foreecha para imprimir el array con todos los resultados
    foreach ($sumas as $sumatorias) {

    ?>

        [<?php echo $sumatorias;?> ],

    <?php         
    }

?>
<form action="PHP/Proyecto/validarPropuesta.php" method="post">
  <h2 class="texto">Validar propuestas</h2>
  <input type="text"     name="idValidar" placeholder="Introducir id">
  <input type="submit"   value="Validar">
</form>

<?php

  $bd_host = "localhost"; 
  $bd_usuario = "root"; 
  $bd_password = ""; 
  $bd_base = "carrot";

  $conexion = mysqli_connect($bd_host, $bd_usuario, $bd_password);
  mysqli_select_db($conexion,$bd_base);

  $idValidacion = $_POST['idValidar'];
  //    $idValidacion = mysqli_real_escape_string($conexion, $_POST['idValidar']);

  $revision = 2;

  $consulta = "
    UPDATE propuesta
    SET revision='$revision'
    WHERE id = $idValidacion
  ";

  $resultado = mysqli_query($conexion, $consulta);

  // Liberamos y cerramos conexión.
  mysqli_free_result($resultado);
  mysqli_close($conexion);

?>

<?php

 <td class="otrotdfgaz">
     <?php
       if ($res['intestado'] == 1) echo "<span value='".$res['intestado']."' class='conect-label'>Activado</span>"; else
       echo "<span value='".$res['intestado']."' class='desconect-label'>Desactivado</span>";
     ?>
    </td>

 ?>

foreach ($totalVotos as $segundoArray) {
    $sumar=0;
    foreach ($segundoArray as $valorVoto) {
        $sumar = $sumar + $valorVoto;
    }
    
    print_r(array_sum($sumar));
}

//activas un evento al click el boton del modal
$('#infoDN').on('click', function () {
    //capturas el valor del input del modal
    var inputModal = $('codigo').val();
    //seleccionar el input de la tabla y la asignas el valor de la nueva variable
    $('serial').val(inputModal);
});



<div class="form-group">
    <form name="add_name" id="add_name">
        <div class="table-responsive">
            <table class="table table-bordered" id="dy_ade">
              <tr>
                <td>
                      <div class='row'>
                        <div class='col-xs-5' style='font-size: 12px;''>
                    <div class='col-xs-12 col-md-11'>
                          <label class='mt-3'><b>Cantidad a reducir de la estructura seleccionada: </b></label>
                        </div>
                        <div class='col-md-2' >
                            <input type='number' min='0' max='100000' name="name[]" class="form-control name_list mb-3" id="unidad" placeholder="$">
                        </div>
                        <div class='col-md-3' >
                          <select class="form-control input-sm selecCap" name="estado" id="cap_c1">
                            <option value="-1">Selecciona el capítulo</option>
                            <option value="1">Capítulo 1000</option>
                            <option value="2">Capítulo 2000</option>
                            <option value="3">Capítulo 3000</option>
                            <option value="4">Capítulo 4000</option>
                            <option value="5">Capítulo 5000</option>
                            <option value="6">Capítulo 6000</option>
                          </select> 
                        </div>
                        <div class='col-md-4'>
                          <select class="form-control input-sm" name="estado" id="estructu_c1" disabled>
                            <option value="-1">Estructura programatica a aumentar</option>
                          </select> 
                        </div>
                      </div>
                    </div>
                </td>
                <td>
                  <center>
                    <button type="button" name="pluss" id="pluss" class="btn btn-success mt-2"><span class="fa fa-plus-circle"></span></button>
                  </center>
                </td>
              </tr>
            </table>
        </div>
    </form>
</div>
<script>

$(document).ready(function(){
    $('.selecCap').on('change', function(){
        var elemento = $('.selecCap').attr("id"); 
        console.log(elemento);
    });

  var i=1;
  $('#pluss').click(function(){
    i++;
    $('#dy_ade').append('<tr id="row'+i+'"><td><div class="col-xs-12 col-md-11"><div class="row"><div class="col-xs-5" style="font-size: 12px;"><label class="mt-3"><b>Cantidad a reducir de la estructura seleccionada: </b></label></div><div class="col-md-2"><input type="number" min="0" max="100000" name="name[]" class="form-control name_list mb-3" id="unidad" placeholder="$"></div><div class="col-md-3"><select class="form-control input-sm selecCap" name="estado" id="cap_c'+i+'"><option value="-1">Selecciona el capítulo</option><option value="1">Capítulo 1000</option><option value="2">Capítulo 2000</option><option value="3">Capítulo 3000</option><option value="4">Capítulo 4000</option><option value="5">Capítulo 5000</option><option value="6">Capítulo 6000</option></select></div><div class="col-md-4"><select class="form-control input-sm" name="estado" id="estructu_c'+i+'" disabled><option value="-1">Estructura programatica a aumentar</option></select></div></div></div></td><td><center><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove mt-4">X</button></center></td></tr>');
  });

  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });




    //declaras una variable que funcionara como bandera para validar y almacenar el antiguo id
    $id_Area=-1;
    //declaras una variable que almacenara los resultados
    $total=0;
    //variable bandera en falso
    $bandera = false;
    while($row=$resultado->fetch_assoc())
    {   
        if ($id_Area != $row['ID_Area'] && $id_Area != -1) $bandera =true;
       $PrecioGrupo=$PrecioGrupo + $row['PrecioTotalOP']; ?>
      <tr>
        <td><?php echo $row['ID_Area'];?></td>
        <td><?php echo $row['Desc_Area'];?></td>
        <td><?php echo $row['OP'];?></td>
        <td><?php echo $row['Cliente'];?></td>
        <td><?php echo $row['CantidadOP'];?></td>
        <td><?php echo number_format($row['VolumenOP'],4,"." , ",");?></td>
        <td><?php echo "$". "". number_format($row['PrecioTotalOP'],0, " " , ",");?></td>
      </tr>
    <?php 
        //comparamos si el nuevo id es igual al viejo && verificamos que para evitar insertar en la primera instacia
        if ($bandera) {
        ?>
            <tr style="width: 100%;">
                <td style="text-align: right; width: 100%;"><?php echo $total;?></td>
            </tr>
        <?php 
            //ponemos la bandera en falso nuevamente
            $bandera= false;
            //reiniciamos la variable total
            $total = 0;
        }else{
            //dentro del ciclo y en cada vueltas vas sumando cuando no se cumpla la condicion
            $total = $total + number_format($row['PrecioTotalOP'],0, " " , ",");
        }
        //alamacenamos el valor del id para compararlo con la proxima vuelta
       $id_Area = $row['ID_Area'];
    }
    ?>
    

  Debes incluir estos scripts en la Cabecera del documento entre <head> y </head>

este se encarga de la parte visual
<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
este se encarga de las funcionalidades
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
este se encarga de crearla
<script type="text/javascript">
  $(document).ready( function () {
      pilas con el id, en este caso es 'myTable' depende del tuyo
      $('#myTable').DataTable();
  } );
</script>


<input type="checkbox" onchange="this.checked ? $('#password'').attr("type", 'password') : $('#password'').attr("type", 'text')">
Debes ir accediendo elemento por elemento hasta llegar a la fecha y luego usar la funcion `ISODate()`
{db.usuario.noticias.fecha:ISODate("2018-08-16 19:00:00.000")}

espero te sirva... XD


echo '<br>total Compra1 :'.$totalCompra.'<br>';

$totalDescuento = $totalCompra * ($descuentoStatus / 100);
echo 'total desc '.$totalDescuento;
$totalCompra = $totalCompra - $totalDescuento;

echo '<br>total Compra:'.$totalCompra.'<br>';
   //$totalCompra = $totalCompra + $gastosEnvio;

 mysqli_query( $conexion, "INSERT INTO compras 

 (numeroCompra, 
 idDistr, 
 nomDistr, 
 fechaCompra, 
 formaPago, 
 articulos, 
 descuento, 
 totalCompra, 
 statusCompra) VALUES 

 ('$numeroCompra',
 '$IDUSUARIO',
 '$nomUsuario', 
 ' $fecha', 
 '$formaPago', 
 '$articulosTotal', 
 '$descuentoStatus', 
 $totalCompra,  
 '$statusCompra'

 )" )or die( "error al insertar datos de compra " . mysqli_error( $conexion ) );


<?php 

  $sql = "SELECT id, CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno AS nombres FROM empleados";

  $query = $conexion -> query ($sql);

  while($valores = mysqli_fetch_array($query)){
     echo "<option value='".$valores[id]."'>".$valores[nombres]."</option>";
  }

?>
<select name="measure" class="form-control{{ $errors->has('measure') ? ' is-invalid' : '' }}">
  <option value="">Selecciona la Porcion</option>
  <option value="{{$food->measure}}">{{$food->measure}}</option>
</select>

<?php 

$currArea = ''; 
$currTotal = 0; 
$CantidadGrupo =0; 
$VolumenGrupo =0; 
while($row=$resultado->fetch_assoc()) { 
  if($currArea != $row['ID_Area']) { 
    echo $currArea; 
    if($currArea != '') { 
      ?> 
      <tr> 
      <td><?php echo $currArea ?></td> 
      <td></td> 
      <td></td> 
      <td class="text-right"> TOTAL</td> 
      <td><?php echo number_format($CantidadGrupo,0, " " , ",") ?></td> 
      <td><?php echo number_format($VolumenGrupo,4,"." , ",");?></td> 
      <td><?php echo number_format($currTotal,0, " " , ",") ?></td> 
      </tr> 
      <?php 
    } 
    $currArea = $row['ID_Area']; 
    $currTotal = 0; 
    $CantidadGrupo =0; 
    $VolumenGrupo =0; 
  } 
  $currTotal += $row['PrecioTotalOP']; 
  $CantidadGrupo += $row['CantidadOP']; 
  $VolumenGrupo += $row['VolumenOP']; 
  ?> 
  <tr> 
  <td><?php echo $row['ID_Area'];?></td> 
  <td><?php echo $row['Desc_Area'];?></td> 
  <td><?php echo $row['OP'];?></td> 
  <td><?php echo $row['Cliente'];?></td> 
  <td><?php echo $row['CantidadOP'];?></td> 
  <td><?php echo number_format($row['VolumenOP'],4,"." , ",");?></td> 
  <td><?php echo "$". "". number_format($row['PrecioTotalOP'],0, " " , ",");?></td> 
  </tr> 
  <?php 

}

//variable que almacenara los valores en cada ciclo
$contador=1;
foreach($usuarios as $key => $value){

    echo '<tr>
  <td>'.$contador.'</td>
  <td>'.$value["nombres"].'</td>
  <td>'.$value["apellidos"].'</td>
  <td>'.$value["correo"].'</td>
  <td>'.$value["usuario"].'</td>';

  //se incrementa el valor para que el proximo ciclo valga uno mas
  $contador= $contador + 1; 



 ?>

 <a href="#deseoIr">Ir a la parte Blanca</a>

<div id="deseoIr">
    <p>Aqui es la parte Blanca</p>
</div>

var chart = Highcharts.chart('container', {

                title: {
                    text: ''
                },
                xAxis: {
                    //categories: fecha,
                    labels: {
                        rotation: -80,
                        style:
                            {
                                fontFamily: 'Sans-serif',
                                fontSize: '12px',
                            }
                    },
                },
                credits:
                {
                    enabled: false,
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true,
                            style: {
                                fontWeight: 'normal',
                                color: '#000000',
                                fontSize: '10px',
                                fontFamily: 'Sans-serif'
                            },
                        },
                        enableMouseTracking: false
                    },
                },
                series: [{
                        name: 'Installation',
                        data: [43934, 52503, 57177]
                    }, {
                        name: 'Manufacturing',
                        data: [24916, 24064, 29742]
                    }, {
                        name: 'Sales & Distribution',
                        data: [11744, 17722, 16005]
                    }, {
                        name: 'Project Development',
                        data: [null, null, 7988]
                    }, {
                        name: 'Other',
                        data: [12908, 5948, 8105]
                    }],
            });

$("#matricula1").append('<a class="ui-btn ui-li-static ui-body-inherit ui-first-child ui-last-child" id="ref'+nuevoId+'" name="id_item" value="'+value.id_item+'" onclick="limpiar1()">'+value.id_marca+'-'+value.id_item+'-'+value.nomItem+'-'+value.nomMarca+'</a> 
<a  id="lo1" value="'+value.id_marca+'" name="id_marca" style="display:none;">'+value.id_marca+'</a>');

<script type="text/javascript">
  
  var nuevoId=0;
//se inicia en 0 para que al primero tenga algun valor
function datos3(){
resp=$("#ref_mi").val();
if(resp != "" && resp !=null &&typeof resp != undefined){
    jqmSimpleMessage('Agrega cotizacion: '+resp);
        $.ajax({
        url: "rest/orden/item1/"+resp,
        cache: false,
        success: function(data) {

            $.each(data, function (index, value) {

              var elemento = "";
                  //creamos el primer boton con su id cambiante
              elemento += '<a class="ui-btn ui-li-static ui-body-inherit ui-first-child ui-last-child" id="ref'+nuevoId+'" name="id_item" value="'+value.id_item+'" onclick="limpiar('+nuevoId+')">'+value.id_marca+'-'+value.id_item+'-'+value.nomItem+'-'+value.nomMarca+'</a>'
                          //creamos el segundo boton
                          //aqui tambien le ponemos un id cambiante para que se pa cual debe eliminar
              elemento += '<a  id="lo'+nuevoId+'" value="'+value.id_marca+'" name="id_marca" style="display:none;">'+value.id_marca+'</a>'

               $("#matricula1").append(elemento);
            //antes de terminar incrementas el valor de la variable
            //en el primer caso el id sera "ref0" y en segundo "ref1"


            nuevoId = nuevoId + 1;
            });

        },
        error: function(error){
            {
                if(error.status==401){
                    desAuth();
                }
                jqmSimpleMessage("Error en listar infor empleado: "+error.responseText);
            }
        },
        beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + getVCookie(getVCookie("userPro"))); }
    });
}else{
    jqmSimpleMessage('Error escoje un Producto');
}

function limpiar(valor){ 
  //conatenamos el nombre base con el id cambiante
  $("#ref"+valor).remove(); 
  $("#lo"+valor).remove(); 
}
</script>


<form class="form horizontal">
  <div class="panel-info">
    <div class="panel-body">
      <div class="form-group">
        <div class="col-md-12">
          <div class="col-md-6">
            <label class="control-label">COMBO1</label>
            <select class="form-control">
              <option>1</option>
              <option>1</option>
            </select>
          </div>

          <br></br>

          <div class="col-md-6">
            <label class="control-label">COMBO2</label>
            <select class="form-control">
              <option>2</option>
              <option>2</option>
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-6">
            <label class="control-label">COMBO3</label>
            <select class="form-control">
              <option>3</option>
              <option>3</option>
            </select>
          </div>

          <br></br>

          <div class="col-md-6">
            <label class="control-label">COMBO4</label>
            <select class="form-control">
              <option>4</option>
              <option>4</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="main-wrapper">

  <div id="register_form"> 
    <?php //<form class="signup-form" action="back_registrarse.php" method="POST"> ?>
    <form id="registro-form" class="signup-form"  method="POST">  

      <h2>Registrarse</h2>

      <input id="first" type="text" name="first" placeholder="Nombre" required> 

      <input id="nick" type="text" name="nick" placeholder="nick" required> 

      <input id="pwd" type="password" name="pwd" placeholder="Password" required>

      <button id="enviar-btn" type="submit" name="submit" value="registrar"> 
        Registrarme
      </button>

    </form>
  </div> 

<?php 

include_once'footer.php';



$first= mysqli_real_escape_string($conn, $_REQUEST ['first']);
$pwd= mysqli_real_escape_string($conn, $_REQUEST ['pwd']);
$nick= mysqli_real_escape_string($conn, $_REQUEST ['nick']);
$date = date("Y-m-d");
  //Creamos el SQL, no siempre funciona agregando así las variables, yo recomiendo concatenar
Quiero hacer una consulta donde me muestre los campos Day, Hour, Assistance, Treatment de la tabla Appointment Ademas del nombre del doctor y de los pacientes
O sea
En vez de que me muestre el Id_Doctors e Id_Patients quiero sus nombres

$sql = "SELECT a.Day, a.Hour, a.Assistance, a.Treatment, CONCAT(p.First_Name, ' ', p.Last_Name) As Patient, CONCAT(d.First_Name, ' ', d.Last_Name) As Doctor FROM Appointment  AS a
        INNER JOIN Patients AS p ON a.Id_Patients = p.Id_Patients
        INNER JOIN Doctors AS d ON a.Id_Doctors = d.Id_DoctorsDoctors
        WHERE ? OPCIONAL";

}


<?php
include_once 'conexion.php';
session_start();


$respuesta = array();

if( empty( $_REQUEST['first'] ) || empty( $_REQUEST['pwd'] ) || empty( $_REQUEST['nick'] ))
{
    $respuesta['mensaje'] = 'Usuario y/o password vacío';

}else{

    $first= $_REQUEST['first'];
    $pwd= $_REQUEST['pwd'];
    $nick= $_REQUEST['nick'];

    $first= mysqli_real_escape_string($conn, $first);
    $pwd= mysqli_real_escape_string($conn, $pwd);
    $nick= mysqli_real_escape_string($conn, $nick);
    $date = date("Y-m-d");

    $sql = mysqli_query($conn, "INSERT INTO Usuario (nombre, fecha_creacion, password, nick)
        VALUES ('".$first."', '".$date."', ".$pwd.", '".$nick."')");

    if($sql == TRUE)
    {
        $respuesta['mensaje'] = 'Registrado con exito';

    }else{

        $respuesta['mensaje'] = 'Error';
    }
}

//Ahora si, retornamos nuestra respuesta con formato y encabezado JSON
header('Content-Type: application/json');
echo json_encode($respuesta);


valor =0;
for (int x = 0; x < matriz.length; x++) {
        System.out.print("|");
        for (int y = 0; y < matriz[x].length; y++) {
            System.out.print(matriz[x][y]);
            if (y != matriz[x].length - 1) {
                System.out.print("\t");
            }
            valor = atriz[x][y];
        }
        System.out.println("|");
    }
?>


$(document).ready(function() {
            $("a").click(function(event) {
              var href = $(this).attr('href');
              alert(href + ' valor del href');
              
          });

        });


<a href="#vista"> aqui ahi al</a>
 <a name="vista"></a>



 <form method="post" action="#vista" name="prueba">

        <input type="checkbox" name="identificacion" onclick="document.forms.prueba.submit()" value="1">
</form>


<?php 

int partidos = 5;
int equipoA = 0;
int equipoB = 0;
int partidosGanados1 = 0;
int partidosGanados2 = 0;

Scanner teclado = new Scanner(System.in);

for (int i = 1; i < partidos; i++) {

    System.out.println(i + "Ingrese goles del equipo A : ");
    equipoA = teclado.nextInt();
    System.out.println(i + "Ingrese goles del equipo B : ");
    equipoB = teclado.nextInt();

    if (equipoA > equipoB) {

        partidosGanados1++;
        System.out.println("Gana equipo A .");
    }
    else if (equipoB > equipoA) {

        partidosGanados2++;
        System.out.println("Gana equipo B .");
    }
    else{
        System.out.println("Hubo Empate .");
    }

}

if (partidosGanados1 != partidosGanados2) {

    if (partidosGanados1 > partidosGanados2)

    {

        System.out.println("El ganador de mas partidos es el equipo A. ");
    }

    else {

        System.out.println("El ganador de mas partidos es el equipo B. ");
    }

    System.out.println("No hay empate.");
}
else{

    System.out.println("Empate.");
}

System.out.println("Cantidad de partidos ganados por el equipo A : " + partidosGanados1);
System.out.println("Cantidad de partidos ganados por el equipo B : " + partidosGanados2);

 ?>

 <?php 



  ?>

dale `return $rawdata` dentro la funcion

 <?php

//add_comment.php


  $connect = new PDO('mysql:host=');

   $error = '';
   $comment_name = '';
   $comment_content = '';

  if(empty($_POST["comment_name"]))
  {
    $error .= '<p class="text-danger">Name is required</p>';
  }
  else
  {
    $comment_name = $_POST["comment_name"];
  }

  if(empty($_POST["comment_content"]))
  {
    $error .= '<p class="text-danger">Comment is required</p>';
  }
  else
  {
    $comment_content = $_POST["comment_content"];
  }

  if($error == '')
  {
    $query = "
    INSERT INTO tbl_comment 
    (parent_comment_id, comment, comment_sender_name) 
    VALUES (:parent_comment_id, :comment, :comment_sender_name)
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
    array(
      ':parent_comment_id' => $_POST["comment_id"],
      ':comment'    => $comment_content,
      ':comment_sender_name' => $comment_name
      )
    );

    $error = '<label class="text-success">Comment Added</label>';
  }

  $data = array(
  'error'  => $error
  );

  echo json_encode($data);

if (isset($_POST['formsubmitted'])) {

    if (empty($_POST['email'])) {
        $email_require = 'Por favor, ingrese su correo electrónico';
    } else {
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
            $email = $_POST['email'];
            
            $active = 1;
            $stmt = $con->prepare("SELECT email, first_name, email_code FROM users WHERE email=? OR username=? AND active=?");
            $stmt->bind_param("ssi",$email,$username,$active);
            $stmt->execute();
            $stmt->store_result();
            //como los datos que pasas en los inputs concuerdan con la Base de datos te tare 1 fila con lo datos que pediste
            //es decir la condicion es verdadera
            if ($stmt->num_rows>0) {
              //aqui debes hacer el proceso de recuperacion 
                $stmt->bind_result($email_user, $first_name, $email_code);
                $stmt->fetch();

                echo '¡Por favor, revise su correo electrónico '.$email_user.' para obtener un enlace de confirmación para completar su restablecimiento de contraseña!';

                $to = $email_user;
                $subject = "Proceso para restablecer su contraseña";
                $message_body = 'Hola '.$first_name.',
                ¡Has solicitado restablecimiento de contraseña!

                Por favor, haga clic en este enlace para restablecer su contraseña.

                http://example/login-system/reset.php?email='.urlencode($email).'&key='.$email_code.'';
                mail($to, $subject, $message_body, 'example@example.com');
            } else {
              //como los campos que envio estan vacion, entonces la base de datos nunca retornara ninguna fila
              //y es aqui donde captura el error 
                echo "¡Usuario con ese correo electrónico no existe!";
            }
        } else {
            $email_require = 'Tu dirección de correo electrónico no es válida';
        }
    }
    
}


$sql= "SELECT idinventario, i.identrada, (select nombre from entrada where identrada = i.identrada) as nombre,
i.idsalida, (select nombre from salida where idsalida=i.idsalida)as nombre1,
i.idusuario,(select login from usuario where idpersona=i.idusuario)as usuarios,   fecha_inventario,fecha_ingreso,fecha_salida,observacion from inventario i inner join entrada e on i.identrada=e.identrada,inner join salida s on i.idsalida=s.idsalida";



  ?>

  function agregarFila() {


   var contendor  = $("#tbody").html();
    var nuevaFila   = '<tr>';
    nuevaFila   = '<td>"el contenido de la celda"</td>';
    nuevaFila  += '<td>"el contenido de la celda"</td>';
    nuevaFila  += '<td>"el contenido de la celda"</td>';
    nuevaFila  += '<td>"el contenido de la celda"</td>';
    nuevaFila  += '<td>"el contenido de la celda"</td>';
    nuevaFila   = '</tr>';
            
    ('entro poner el tabla2222');
    $("#tbody").html(contendor+nuevaFila);

}

var contendor  = $("#tbody").html();
  var nuevaFila   = '<tr>';
  nuevaFila   = '<td>"el contenido de la celda"</td>';
  nuevaFila  += '<td>"el contenido de la celda"</td>';
  nuevaFila  += '<td>"el contenido de la celda"</td>';
  nuevaFila  += '<td>"el contenido de la celda"</td>';
  nuevaFila  += '<td>"el contenido de la celda"</td>';
  nuevaFila   = '</tr>';
          
  ('entro poner el tabla2222');
  $("#tbody").html(contendor+nuevaFila);

  <script type="text/javascript">
    
var data;    

fetch("https://api.....", {

    method: "GET",

}).then(function (response) {

    if (response.ok) {

        return response.json();
    }

    throw new Error(response.statusText);
}).then(function (json) {

    // do something with json data

    data = json;

    console.log(data);

}).catch(function (error) {
    // called when an error occurs anywhere in the chain
    console.log("Request failed: " + error.message);
});    

var people = data.people; // Creo una var para acceder al Json    

makePeopleTable();   

function makePeopleTable() {

    document.getElementById("tablePeople");

    tablePeople.innerHTML = "";      

    for (var i = 0; i < people.length; i ++) {            

        var trpeople = document.createElement("tr");

        var tdNam = document.createElement("td");
        var tdAge = document.createElement("td");
        var tdSpecies = document.createElement("td");
        var tdTeam = document.createElement("td");
        var tdSeniority = document.createElement("td");
        var tdInfo = document.createElement("td");   
var tdBoton = document.createElement("td");
var boton = document.createElement("button");
boton.name = 'mi_boton';
boton.id = 'id_boton';

tdBoton.appendChild(boton);
trpeople.appendChild(tdBoton); 

        tdNam.textContent = data.people[i].name;
        tdAge.textContent = data.people[i].age;
        tdSpecies.textContent = data.people[i].species;
        tdTeam.textContent = data.people[i].team;
        tdSeniority.textContent = data.people[i].seniority;
        tdInfo.textContent = data.people[i].info ;    

        tablePeople.appendChild(trpeople)
        trpeople.appendChild(tdNam);
        trpeople.appendChild(tdAge);
        trpeople.appendChild(tdSpecies);
        trpeople.appendChild(tdTeam);
        trpeople.appendChild(tdSeniority);
        trpeople.appendChild(tdInfo);    

    }
}


$(document).ready(function(){
  var ultimo=1;
  //preguntas si la variable existe en el navegador
  if(localStorage.getItem("ultimo")!=null){
    //sino existe la crea
    localStorage.setItem("ultimo", ultimo);
  }else{
    //si ya existe, entonces le asignas su valor a la variable
    //manipulas normal el codigo
    ultimo = localStorage.getItem("ultimo");
    $('#menu-sup li a').click(function(){
      // obtenemos el nuevo id
      nuevo=$(this).parent().attr("id");
      if(nuevo!=ultimo){
        // escondemos el ultimo id
        $("#cont"+ultimo).fadeOut(function(){
        $("#"+ultimo).removeClass("select");
        $("#"+nuevo).addClass("select");
        // mostramos el nuevo id
        $("#cont"+nuevo).fadeIn();
        //y por ultimo le asignas el nuevo valor a la variable
        localStorage.setItem("ultimo", nuevo);
        });
      }
    });

  }
});


  </script>



<?php
session_start();
include 'conexion.php';

//creas una variable con el contenido base de la tabla

$tabla = "
      <table>
        <thead>
          <tr>
            <th>Nombre </th>
            <th>Fecha creacion </th>
            <th>Nick </th>
            <th>Telefono </th>
            

        </thead>
      ";

//pregunta primero que tipo de usuario es 
if ($_SESSION['cargo'] == "lector") {
  //como es un lector necesitaras el id
  $id_sesion = $_SESSION['id'];
  //ejecutas la sentencia sql
  $consulta = mysqli_query ($conn, "SELECT * FROM Usuario WHERE id = '". $id_sesion . "'" );
  //preguntas si trajo resultados
  if ( $consulta->num_rows > 0)
  {

     
    //rescorres los resultados que haya traido
    while ($row = mysqli_fetch_assoc($consulta) )
    {
      //como ya tenemos la base de la tabla aqui le sumamos las filas
      $tabla.= "</tr>";
      $tabla.= " <td>".$row['nombre']."</td>";
      $tabla.= " <td>".$row['fecha_creacion']."</td>";
      $tabla.= " <td>".$row['nick']."</td>";
      $tabla.= " <td>".$row['telefono']."</td>";
      $tabla.= "</tr>";
    }
  }
    
}
else if ($_SESSION['cargo'] == 'admin'){
  //como es un aministrador no necesitamos id
  $consulta2 = mysqli_query ($conn, "SELECT * FROM Usuario" );
  //preguntamos si trae registros
  if($consulta2->num_rows > 0){

      while ($row = mysqli_fetch_assoc($consulta2))
      {
        //sumamos las filas que trae
        $tabla.= "</tr>";
        $tabla.= " <td>".$row['nombre']."</td>";
        $tabla.= " <td>".$row['fecha_creacion']."</td>";
        $tabla.= " <td>".$row['nick']."</td>";
        $tabla.= " <td>".$row['telefono']."</td>";
        $tabla.= "</tr>";
      }
  }
}

//aqui cierras la tabla
$tabla.= "</table>";
//la imprimes
echo $tabla;

header('Content-Type: application/json');

while ($row = mysqli_fetch_assoc($consulta2))
{
  //sumamos las filas que trae
  $tabla.= "</tr>";
  $tabla.= " <td id='nom'>".$row['nombre']."</td>";
  $tabla.= " <td>".$row['fecha_creacion']."</td>";
  $tabla.= " <td>".$row['nick']."</td>";
  $tabla.= " <td>".$row['telefono']."</td>";
  $tabla.= " <td><button id='".$row['id']."' class='update2'>Actualizar</button></td>";
  $tabla.= " <td><button id='".$row['id']."' class='delete2'>Eliminar</button></td>";
  $tabla.= "</tr>";

}


public function update_item_qty($type, $id, $fromqty, $qty) {
    $to = $fromqty + $qty;

    if(!is_numeric($id) || !is_numeric($fromqty) || !is_numeric($qty))
        die('inc/items_core.php - update_item_qty - Non Numeric Values');

    // Primero actualiza el item
    if($type == 1) {
        $prepared = $this->prepare("UPDATE invento_items SET qty = qty+$qty WHERE id=?", 'update_item_qty()');
        $this->bind_param($prepared->bind_param('i', $id), 'update_item_qty()');
        $this->execute($prepared, 'update_item_qty()');
    }elseif($type == 2){
        $prepared = $this->prepare("UPDATE invento_items SET qty = qty-$qty WHERE id=?", 'update_item_qty()');
        $this->bind_param($prepared->bind_param('i', $id), 'update_item_qty()');
        $this->execute($prepared, 'update_item_qty()');
    }

// Actualiza la cantidad de items (Salidas/Entradas)
if($_POST['act'] == '3' || $_POST['act'] == '4') {
    if(!isset($_POST['id']) || !isset($_POST['val']) || !isset($_POST['fromval']) || $_POST['id'] == '' || $_POST['val'] == '' || $_POST['fromval'] == '')
        die('wrong');
    if($_POST['act'] == '3')
        $type = 1;
    elseif($_POST['act'] == '4') {
        $type = 2;
        $qty = $_items->get_item($_POST['id']);
        $qty = $qty->qty;
        if($qty < $_POST['val'])
            die('2');
    }

    if($_items->update_item_qty($type, $_POST['id'], $_POST['fromval'], $_POST['val']) == true)
        die('1');
    die('wrong');

?>

$.ajax({
        // async: false,
        type: "POST",
        url: "quotes_controller.php",
        data: "fecha_cita="+fecha_cita+"&atendio="+atendio+"&nombre="+nombre+"&apellido="+apellido+"&LISTA="+LISTA+"&nroradicado="+nroradicado+"&nrosolicitud="+nrosolicitud,
        dataType:"html",
        success: function(data) 
        {
           alert(data);
          if (data==0) { 
            alertas('RECUERDE  QUE LOS DATOS CON (*) SON OBLIGATORIOS!', 'fa fa-window-close', 'red', destino );
          }else if (data==1) {
            alertas('ERROR NO SE HA GENERADO LA CITA  VERIFIQUE', 'fa fa-user-circle-o', 'red', destino );
          }if (data==2) {
            window.location.replace(destino);
          }else if (data==3) {
            destino = '../client';
            alertas('EL CLIENTE NO EXISTE!', 'fa fa-window-close ', 'red', destino );
          }else {
            send(data);
            alertas('CITA AGENDADA EXISTOSAMENTE CONTINUEMOS', 'fa fa-check-square', 'green', destino );
          }
        },
        error: function( jqXHR, textStatus, errorThrown ){
            console.log(textStatus);
            alertas('ALGO SALIO MAL, INTENTA DE NUEVO', 'fa fa-user-circle-o', 'RED', destino );
        },

        
      });


      switch (data) {
            case '0':
              alertas('RECUERDE  QUE LOS DATOS CON (*) SON OBLIGATORIOS!', 'fa fa-window-close', 'red', destino );
               break;
            case '1':
              alertas('ERROR NO SE HA GENERADO LA CITA  VERIFIQUE', 'fa fa-user-circle-o', 'red', destino );
               break;
            case '2':
            case '4':
              window.location.reload();
               break;
            case '3':
              destino = '../client';
              alertas('EL CLIENTE NO EXISTE!', 'fa fa-window-close ', 'red', destino );
               break;
            default:
              send(data);
              alertas('CITA AGENDADA EXISTOSAMENTE CONTINUEMOS222222', 'fa fa-check-square', 'green', destino );
               break;
           }

function submit() {

  var rfc = $("#rfc").val();
  var razon = $("#razon").val();
  var correo = $("#email").val();
  var uso = $("#uso").val();

  if(uso === "otr"){
      uso = $("#otro").val();
  }

  var datos = {
      RFC: rfc,
      Razon: razon,
      Correo: correo,
      Uso: uso
  }

  $.ajax({
      type: 'POST',
      url: uri,
      data: JSON.stringify({ datosFactura: datos}),
      dataType: 'json',
      contentType: 'application/json',
      error: function (xhr) {
          alert("error " + xhr)
      },
      success: function (data) {

          alert("Guardado")

      }
  })
}

<div class="input-field col m4">
    <input type="text" id="rfc">
    <label for="rfc">RFC</label>
</div>
<div class="input-field col m4">
    <input type="text" id="razon">
    <label for="razon">RAZON</label>
</div>
<div class="input-field col m4">
    <input type="email" id="email">
    <label for="email">CORREO</label>
</div>
<div class="input-field col m6">
    <select id="uso">
        <option value="Por Definir">POR DEFINIR</option>
        <option value="Gastos Generales">GASTOS GENERALES</option>
        <option value="otr">OTRO</option>
    </select>
</div>
<div class="input-field col m6">
    <input type="text" id="otro" hidden>
    <label for="otro" id="labo" hidden>ESPECIFIQUE</label>
</div>
<div class="col m4">
    <input type="submit" class="btn-large" onclick="submit()" value="Guardar" id="agregar">
</div>


<?php 

¿hola mundo?
á es una vocal acentuada
10 elementos 
hola mundo 
function cambiar($cadena)
{
	//dividimos la cadena
	$caracter = explode("", $cadena);
	//letras permitidas
	$permitidas= array(a,b,c,d,e,f,g,h,i,j,k,l,m,n,ñ,o,p,q,r,s,t,u,v,w,x,y,z,á,é,í,ó,ú);
	//el dolor de cabeza de las acentudas
	$acentuadas = array(á,é,í,ó,ú);

	$resultado='';
	//empezamos a recorrer la cadena
	for ($j=0; $j < count($caracter) ; $j++) { 
		//recorremos las letras permitidas
		for ($r=0; $r < count($permitidas); $r++) { 
			//comparamos si coincid el caracte con una de las permitidas
			if ($caracter[$j] == $permitidas[$r]) {
				//recorremos las acentudas acentuada
				for ($s=0; $s < count($acentuadas); $s++) { 
					//comparamos si coincide con alguna acentuada
					if ($caracter[$j] == $acentuadas[$s]) {
						//con el switch asinamos el nuevo valor
						switch ($caracter[$j]) {
							case 'value':
								$caracter[$j] = 'Á';
								break;
							case 'value':
								$caracter[$j] = 'É';
								break;
							case 'value':
								$caracter[$j] = 'Í';
								break;
							case 'value':
								$caracter[$j] = 'Ó';
								break;
							case 'value':
								$caracter[$j] = 'Ú';
								break;
						}
						//unimos de nuevo la cadena
						$resultado= implode("", $caracter);
						//terminamos el ciclo
						break;
					}
					else{
						//si no es una acentuada entonces le asinamos el valor en mayuscula
						$caracter[$j] = strtoupper($permitidas[$r]);
						//unimos la cadena
						$resultado= implode("", $caracter);
						//terminamos el ciclo
						break;
					}
				}
				
			}
		}
	}
	//retornamos el valor
	return $resultado;
}
function acentuada($vocal)
{
	$temp = $vocal;
	return $temp;
}


 define('CHARSET','UTF-8');
header('Content-type: text/html; charset='.CHARSET);
require_once('../../cx/conexion.php');
function cambiar($cadena)
{
  //dividimos la cadena
  //$caracter = explode('', $cadena);
  $caracter= $cadena;
  //letras permitidas
  $permitidas= array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z','á','é','í','ó','ú');
  //el dolor de cabeza de las acentudas
  $acentuadas = array('á','é','í','ó','ú');

  $resultado='';
  $bandera=false;
  //empezamos a recorrer la cadena
  for ($j=0; $j < strlen($caracter) ; $j++) { 
    if ($bandera) break;
    //recorremos las letras permitidas
    for ($r=0; $r < count($permitidas); $r++) { 
      if ($bandera) break;
        // echo "<script>alert('entro al ciclo de permitidos con: $temp ');</script>";
      //comparamos si coincid el caracte con una de las permitidas
        if (preg_match("/^[áéíóúñ]/",$caracter[$j])) {
      $temp = utf8_encode($caracter[$j]);
      // $temp2 =  htmlentities($caracter[$j]);
      $temp2 = iconv('ISO-8859-1','UTF-8//TRANSLIT',$caracter[$j]);
      // $temp2 = htmlentities($caracter[$j], ENT_QUOTES, 'UTF-8');
      //   $temp2 = strtolower($temp2);
      // $temp =mb_strlen($caracter[$j], 'utf-8');
        echo "<script>alert('entro al ciclo de permitidos con: $temp $temp2');</script>";
        echo "<script>console.log('entro al ciclo de permitidos con: $temp $temp2');</script>";
        }
      if (htmlentities($caracter[$j]) == htmlentities($permitidas[$r])) {
        echo "<script>alert('entro al if de permitidos con: $caracter[$j]');</script>";
        //recorremos las acentudas acentuada
        for ($s=0; $s < count($acentuadas); $s++) { 
          //comparamos si coincide con alguna acentuada
          if ($caracter[$j] == $acentuadas[$s]) {
            //con el switch asinamos el nuevo valor
            echo "<script>alert('entro al switvh');</script>";
            switch ($caracter[$j]) {
              case 'á':
                $caracter[$j] = 'Á';
                break;
              case 'é':
                $caracter[$j] = 'É';
                break;
              case 'í':
                $caracter[$j] = 'Í';
                break;
              case 'ó':
                $caracter[$j] = 'Ó';
                break;
              case 'ú':
                $caracter[$j] = 'Ú';
                break;
            }
            //unimos de nuevo la cadena
            $resultado= implode("", $caracter);
            //terminamos el ciclo
            $bandera=true;
            break;
          }
          else{
            //si no es una acentuada entonces le asinamos el valor en mayuscula
            $caracter[$j] = strtoupper($permitidas[$r]);
            //unimos la cadena
            // $resultado= implode("", $caracter);
            $resultado=  $caracter;
            $bandera=true;
            //terminamos el ciclo
            break;
          }
        }
        $bandera=true;
        break;
      }
    }
  }
  //retornamos el valor
  return $resultado;
}

// echo cambiar('¿hola mundo?').'<br>';
echo cambiar('á és una vocal acentuada').'<br>';
// echo cambiar('hola mundo').'<br>';
// echo cambiar('10 elementos').'<br>';

 ?>
 <!DOCTYPE html>
<html>

<head>
  <style>
    table,
    td {
      border: 1px solid black;
    }
  </style>
</head>

<body>

  <p>Trying to obtain the values of the checkbox inside a table.</p>

  <table id="myTable">
    <tr>
      <td id='C1'> <input type='checkbox' checked='checked' </td>
        <td id='C2'> <input type='checkbox' checked='checked' </td>
    </tr>
    <tr>
      <td id='C3'> <input type='checkbox' checked='checked' </td>
        <td id='C4'> <input type='checkbox' checked='checked' </td>
    </tr>
  </table>
  <p id="print1"></p>
  <p id="print2"></p>
  <p id="print3"></p>
  <p id="print4"></p>

  <br>

  <button onclick="myFunction()">Try it</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<input type="text" id="asunto" name="asunto" value="1" onchange="cambiar()"><br>


<button type="submit" class="btn btn-primary col-md-16" style='width:200px; height:36px' id="bad" name="bad">
Tarde libre por cumpleaños</button>

<script>
	function cambiar() {
		var contenido = document.getElementsById("asunto")[0].value;

		if(contenido == 0 ){
			document.getElementById("#bad").style.backgroundColor="green";
		}
		else if(contenido == 1 ){
			document.getElementById("#bad").style.backgroundColor="red";
		}
		else{
			alert('El valor no es reconocido, intente de nuevo');
		}
	}
	function cambiar() {
		var contenido = $("#asunto").val().trim();

		if(contenido == 0 ){
			$("#bad").css('background', 'green');
		}
		else if(contenido == 1 ){
			$("#bad").css('background', 'red');
		}
		else{
			alert('El valor no es reconocido, intente de nuevo');
		}
	}
</script>

    function myFunction() {
      document.getElementById("print1").innerHTML = document.getElementById("myTable").rows[0].cells[0].checked;

    }

</body>
$(document).ready(function() {
$("#clienteformulario").validate({
    rules: {
        txtrut: {
            // required:true,
            minlength:10,
            maxlength:12
        },
        txtnombres: {
            // required:true,
            minlength:10,
            maxlength:100
        },
        cbocomuna: {
            // required:true
        },
        cboregion:{
            // required:true
        },
        txttelefono: {
            // required:true,
            minlength:8,
            maxlength:9,
            number: true
        },
        fechanaci: {
            // required:true,
            date:true
        },
        txtcorreo:{
            // required:true,
            minlength: 10,
            maxlength: 50,
            email: true
        },
        cbovivienda:{
            // required: true
        }
    }, 
    messages:{
        txtrut: {
            // required: 'El campo rut es OBLIGATORIO',
            minlength: 'El rut debe ir sin punto, pero con Guion EJ: xxxxxxxx-x',
            maxlength: 'El rut debe ir sin punto, pero con Guion EJ: xxxxxxxx-x'
        },
        txtnombres: {
            // required: 'El campo nombre es OBLIGATORIO',
            minlength: 'Por favor ingrese su nombre completo',
            maxlength: 'Máximo de carctareres'
        },
        cbocomuna: {
            // required: 'Por favor selecciona tu comuna'
        },
        cboregion: {
           // required: 'Por favor selecciona tu región'
        },
        cbovivienda: {
           // required: 'Por favor selecciona el tipo de vivienda'
        },
        txttelefono: {
           // required: 'El campo teléfono es OBLIGATORIO',
            minlength: 'Ingrese un número de teléfono valido',
            maxlength: 'Ingrese un número de teléfono valido',
            number: 'Ingrese sólo números'
        },
        fechanaci: {
           // required: 'El campo fecha de nacimiento es OBLIGATORIO',
            date: 'Ingrese una fecha valida. recuerde que el orden es AÑO-MES-DÍA'
        },
        txtcorreo:{
            email: 'Ingrese un correo valido',
           // required: 'El campo de correo es OBLIGATORIO',
            minlength: 'Ingrese un correo valido',
            maxlength: 'Número máxico de caracteres'
        }
    },
    errorPlacement: function (error, element) {
        alert(error.text())
        return false;
    }
});
}); ///////////////// validar fomularios ////////////////////////////////
</html>


<div class="panel-body"> 
<div class="table-responsive"> 
<table id="tabla" style="table-layout:fixed" border="1" > 
	<thead> 
		<tr> 
			<td width="2%">Propietario</td> 
			<td>Enero</td> 
			<td>Febrero</td> 
			<td>Marzo</td> 
			<td>Abril</td> 
			<td>Mayo</td> 
			<td>Junio</td> 
			<td>Julio</td> 
			<td>Agosto</td> 
			<td>Septiembre</td> 
			<td>Octubre</td> 
			<td>Noviembre</td> 
			<td>Diciembre</td> 
		</tr> 
	</thead> 
	<tbody id="tbody"> 
		 
			<?php 
			require_once('../conexion.php'); 

  $ene="No Pago"; $feb="No Pago"; $mar="No Pago"; $abr="No Pago"; $may="No Pago"; $jun="No Pago"; $jul="No Pago"; $ago="No Pago"; $sep="No Pago"; $oct="No Pago"; $nov="No Pago"; $dic="No Pago"; 

				$mes=mktime(0, 0, 0, $x, 1, date("Y")); 
				$fechai=date("Y-m-d", mktime(0,0,0,$x,1,date("Y"))); 
				$fechaf=date("Y-m-d", mktime(23,59,59,$x,date("t",$mes),date("Y"))); 
				//traes los nombre individualiza la consulta por persona
				$sql = "SELECT nombre, apellido FROM pago_p WHERE DATE(fechadeposito) BETWEEN '".$fechai."' AND '".$fechaf."' GROUP BY nombre "; 
				$res = mysqli_query($conexion,$sql); 
				//de pendendiendo de cuantas personas trae hace el ciclo
				while($resultado1 = mysqli_fetch_array($res)){
					//almacenas los nombres y apellido en variables para hacer consulta para cada persona
					$nombre = $resultado1['nombre'];
					$apellido = $resultado1['apellido'];
					//consulta esa persona cuntos pago hizo en el rango que tienes
					$sql2 = "SELECT montod, fechadeposito FROM pago_p WHERE DATE(fechadeposito) BETWEEN '".$fechai."' AND '".$fechaf."' AND nombre = $nombres AND apellido = $apellido"; 
						$res2 = mysqli_query($conexion,$sql); 
						//ejemplo segun veo esta se hara 2 veces
						while($resultado2 = mysqli_fetch_array($res2)){
							//divides la fecha que trae la consulta y capturas el mes $valor[1]
							$valor= explode('-', $resultado2['fechadeposito']);
							//evaluas con un switch para ver a que mes corresponde y le das el nuevo valor que es el moto del pago
							switch ($valor[1]) {
								case '01':
									$ene = $result2['montod'];
									break;
								case '02':
									$feb = $result2['montod'];
									break;
								case '03':
									$mar = $result2['montod'];
									break;
								case '04':
									$abr = $result2['montod'];
									break;
								case '05':
									$may = $result2['montod'];
									break;
								case '06':
									$jun = $result2['montod'];
									break;
								case '07':
									$jul = $result2['montod'];
									break;
								case '08':
									$ago = $result2['montod'];
									break;
								case '09':
									$sep = $result2['montod'];
									break;
								case '10':
									$oct = $result2['montod'];
									break;
								case '11':
									$nov = $result2['montod'];
									break;
								case '12':
									$dic = $result2['montod'];
									break;
							}
						}
						//imprimer los 12 td que traeran 'no pago' por defecto y si encontro un pago tendra el monto
          echo "<tr>"; 
          echo "<td>$nombre $apellido</td>"; 
          echo "<td>$ene</td>"; 
          echo "<td>$feb</td>"; 
          echo "<td>$mar</td>"; 
          echo "<td>$abr</td>"; 
          echo "<td>$may</td>"; 
          echo "<td>$jun</td>"; 
          echo "<td>$jul</td>"; 
          echo "<td>$ago</td>"; 
          echo "<td>$sep</td>"; 
          echo "<td>$oct</td>"; 
          echo "<td>$nov</td>"; 
          echo "<td>$dic</td>"; 
          echo "</tr>"; 
          //reinicia lo valores
          // iniciarValores($meses);
          $ene="No Pago"; $feb="No Pago"; $mar="No Pago"; $abr="No Pago"; $may="No Pago"; $jun="No Pago"; $jul="No Pago"; $ago="No Pago"; $sep="No Pago"; $oct="No Pago"; $nov="No Pago"; $dic="No Pago"; 
				} 
				?> 
		</tr>
	</tbody> 
</table> 
</div> 
</div>

<?php 

$fecha = date('Y-m-d');
//sumas o restas dias
$nuevafecha = strtotime ( '-8 day' , strtotime ( $fecha ) ) ;
//sumas o restas meses
// $nuevafecha = strtotime ( '+1 month' , strtotime ( $fecha ) ) ;
//sumas o restas años
// $nuevafecha = strtotime ( '+2 year' , strtotime ( $fecha ) ) ;
// deja la que necesites y aqui le das el nuevo valor
$nuevafecha = date ( 'Y-m-d' , $nuevafecha );

 
    
<div class="col-md-12 col-sm-12">
    <div class="row">
          <?php
//primero comparas que $quediaes sea diferente "Sun", luego en el otro parentesis que alguna de las dos fechas sean inferiores
          if($quediaes!="Sun"  && ("01-05-2018" >= $fecha || $fecha <= $nuevafecha)){
           include('domingo.php'); 
         }
           ?>
    </div>
</div>

 ?>

<form action="https://docs.google.com/forms/d/e/1FAIpQLScm4zxoRbV-evZpGVzF3vAdfdQVDSWzbipvCAX_TIBTIwQS3g/formResponse" method="POST" target="_self" autocomplete="on" _lpchecked="1">
  
  <label for="entry_1022626025">Nombre y Apellido</label>
  <input type="text" name="entry.1022626025" value="" id="entry_1022626025" required="">
  <br>
  <label for="entry_121012742">Email</label>
  <input type="email" name="entry.121012742" id="entry_121012742" required="">
  <br>  
  <label for="entry_1619168523">Celular</label>
  <input type="number" name="entry.1619168523" id="entry_1619168523" required="">
  <br>
  <label class="ss-q-item-label" for="entry_1598229916">Empresa</label>
  <input type="text" name="entry.1598229916" id="entry_1598229916" required="">
  <br>
  <label for="entry_518966266">Ciudad y/o Municipio</label>
  <input type="text" name="entry.518966266" id="entry_518966266" required="">
  <br>
  <label for="entry_1469275999">Comentarios</label>
  <textarea name="entry.1469275999" rows="8" cols="0" id="entry_1469275999" required=""></textarea>
  <br>
  <input type="submit" name="submit" value="Enviar" id="ss-submit">
  
</form>

<script type="text/javascript">
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


// en el php los capturas de acuerdo al parametro que le diste dentro de la varaible datos
<?php 

if ( !empty($_POST['entry_1022626025'])  &&
     !empty($_POST['entry_121012742'])  &&
     !empty($_POST['entry_1619168523'])  &&
     !empty($_POST['entry_1598229916'])  &&
     !empty($_POST['entry_518966266'])  &&
     !empty($_POST['entry_1469275999']) ) {

  //aqui puedes hacer algo con la info. y luego le das un echo para que devuelva la informacion con formato Json
  //por ejemplo
  $arrayjson[] = array(
                'informacion_1' => $valor_1,
                'informacion_2' => $valor_2,
                'informacion_3' => $valor_3,
                'informacion_4' => $valor_4,
                'informacion_5' => $valor_5,
                'informacion_6' => $valor_6
        );

        echo json_encode($arrayjson);
}

 ?>


public static void main(String[] args) {

        Scanner leer= new Scanner(System.in);
        float notas;
        float [][] matriz = new float[5][6]; 
        float sumaIndividual = 0;
        float promedio;
        int alumno;


        for(alumno = 1; alumno <= 5; alumno++)
        {  

          for(int s = 1; s <= 5; s++)
          {  
            System.out.println("ingresa la nota: "+s+" del estudiante: "+alumno+"");
            notas=leer.nextFloat();
            //rellenas la matriz con los datos
            matriz[alumno][s] = notas;
            //sumas a cada vuelta de ciclo interno los valores
            sumaIndividual = sumaIndividual + notas;
          }
          //en la casilla 6 almacenas la sumatoria para luego usarla
          matriz[alumno][6] = sumaIndividual;
          //reinicias la variable para el proximo ciclo
          sumaIndividual = 0;
        } 

      // ya teniendo toda la informacio la puede manupular mas facilmente 

        for(j = 1; j <= 5; j++)
        {  
          //capturas el valor sumado y lo divides por el valor de 5
          float promedioIndividuo = matriz[j][6] / 5;

            if ( promedioIndividuo >= 5.0)
                System.out.println("El alumno esta aprobado:");

            else
                System.out.println("El alumno esta reprobado:");
            }
            //alamcenas cada valor
            promedio = promedio + promedioIndividuo;
        }

        System.out.println("El promedio de Todas las notas es: "+promedio);


    }

<?php 
Suponiendo que las tablas se llamen de esta manera. ingresoLabor, salidaLabor, ingresoAlmuerso y salidaAlmuerzo hacemos una consulta en la cual treaera todos los registro asociados y en caso de que el campo sea nulo pondra por defecto que 'No Resgistro'

$sql="SELECT ingresoLabor.fecha, IFNULL(ingresoLabor.hora, 'No resgistro'), salidaLabor.fecha, IFNULL(salidaLabor.hora, 'No resgistro'), ingresoAlmuerso.fecha, IFNULL(ingresoAlmuerso.hora, 'No resgistro'), salidaAlmuerzo.fecha, IFNULL(salidaAlmuerzo.hora, 'No resgistro')
FROM ingresoLabor 
  INNER JOIN salidaLabor ON ingresoLabor.user_dni = salidaLabor.user_dni
  INNER JOIN ingresoAlmuerso ON ingresoLabor.user_dni = ingresoAlmuerso.user_dni 
  INNER JOIN salidaAlmuerzo  ON ingresoLabor.user_dni = salidaAlmuerzo.user_dni
WHERE ingresoLabor.fecha = '2018-09-24' AND ingresoLabor.user_dni = 01";

Aunque por cuestiones de agilidad te recomiendo y si no estas obligado a usar las 4 tablas hacerlo en una sola tabla que contenga los campos que necesitas, algo asi:

Tabla_Registro:

id
user_dni
personal
fecha
hora_ini_lab
hora_fin_lab
hora_ini_alm
hora_fin_alm

asi con esto campo la consulta seria mucho mas facil, notese que omiti el campo mes, ya que con el campo fecha puedes obtener el mes, la consulta quedaria asi:

$sql="SELECT user_dni AS Usuario DNI, fecha AS Fecha, IFNULL(hora_ini_lab, 'No resgistro') AS 'Inicio Labor', IFNULL(hora_fin_lab, 'No resgistro') AS 'Fin Labor',  IFNULL(hora_ini_alm, 'No resgistro') AS 'Inicio Almuerzo', IFNULL(hora_fin_alm, 'No resgistro') AS 'Fin Almuerzo'
FROM Tabla_Registro 
WHERE ingresoLabor.fecha = '2018-09-24' AND ingresoLabor.user_dni = 01";

espero te sirva, me cuentas como te fue...

 ?>
////////////// centrar algo //////////////////////
 body, html {
  width: 100%;
  height: 100%;
  min-height: 100vh;
}

.loader-background {
    width: 100%;
    height: 100%;
    position: relative; /* Cambiamos de absolute a relative */
    background-color: #eaeaea4a;
    z-index: 9999;
}

.loader{
  border: 16px solid #d4d4d4;
  border-top: 16px solid #3498db;
  border-bottom: 16px solid #3498db;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 1.5s linear infinite;
  position: absolute; /* cambiamos de fixed a absolute */
  /* Ponemos el valor de left, bottom, right y top en 0 */
  left: 0;
  bottom: 0; 
  right: 0; 
  top: 0; 
  margin: auto; /* Centramos vertical y horizontalmente */
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
<div class="loader-background">
  <div class="loader"></div>
</div>
////////////// centrar algo //////////////////////
<?php 
$sql="INSERT INTO kitchen 
        VALUES (WATER); 
      SELECT COFFEE 
      FROM 
        Work 
      WHERE 
        COLOR= 'black' 
        AND SUGAR = 4;"
 ?>
<li class="nav-item">
          <a  <?php echo (isset($_SESSION['radicar']) && $_SESSION['radicar'] >0)? "class='nav-link' ": "data-toggle='pill' class='nav-link active'"; ?> id="0" href="#home">TIPO LICENCIA</a>
        </li>
        <li class="nav-item">
          <a <?php  if(isset($_SESSION['radicar']) && $_SESSION['radicar'] ==1)echo "class='nav-link active show' data-toggle='pill'"; else if (isset($_SESSION['radicar']) && $_SESSION['radicar'] <1) echo "class='nav-link'";else echo "class='nav-link' data-toggle='pill'";?> id="1" href="#menu1">PREDIO</a>
        </li>
        <li class="nav-item">
          <a <?php  if(isset($_SESSION['radicar']) && $_SESSION['radicar'] ==2)echo "class='nav-link active show' data-toggle='pill'"; else if (isset($_SESSION['radicar']) && $_SESSION['radicar'] <2) echo "class='nav-link'";else echo "class='nav-link' data-toggle='pill'";?> id="2" href="#menu2">VECINOS</a>
        </li>


        <?php  if(isset($_SESSION['radicar']) && $_SESSION['radicar'] ==2)echo "class='nav-link active show' data-toggle='pill'"; else if (isset($_SESSION['radicar']) && $_SESSION['radicar'] <2) echo "class='nav-link'";else echo "class='nav-link' data-toggle='pill'";?>

.borde2{
    /*height: 30px;*/
    overflow:auto;
    max-height: 50px;
    word-wrap:break-word;
    -ms-word-break: break-all;
     word-break: break-all;

     // Non standard for webkit
     word-break: break-word;
-webkit-hyphens: auto;
   -moz-hyphens: auto;
    -ms-hyphens: auto;
        hyphens: auto;
    margin-bottom: 2%;
    border: 1px solid #dad8d8;
    padding-top: 10px;
    padding-bottom: 15px;
  }
<div class="content-header">
  <div class="container row">
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">1 CONTENEDOR DE 1 FILA</label>
    </div> 
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">2 CONTENEDOR DE 1 FILA</label>
    </div>
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">3 CONTENEDOR DE 1 FILA</label>
    </div>
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">4 CONTENEDOR DE 1 FILA</label>
    </div>
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">1 CONTENEDOR DE 1 FILA</label>
    </div> 
  </div>
  <div class="container row">
    <div class="col-lg-3 input-group borde2" >
     1 Cas.d,nflajkfn ajkdbnfjka ndjkandfjknajkfjclñkfañleqowkfoewf  jqo ejiejfiwejrogijwerijoONTENEDOR DE 2 FILA Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div> 
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">2 CONTENEDOR DE 2 FILA</label>
    </div>
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">3 CONTENEDOR DE 2 FILA</label>
    </div>
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">4 CONTENEDOR DE 2 FILA</label>
    </div>
    <div class="col-lg-3 input-group">
      <label for="nombre9" class="col-form-label col-lg-12">1 CONTENEDOR DE 2 FILA</label>
    </div> 
  </div>
</div>


<?php 



foreach($emails as $email) {

    echo $email['mail'];

    $email=$email['mail'];
    $nombre=$email['nombre'];


    $statement = $conexion->prepare("INSERT INTO mailing (id, mail, nombre, telefono, estado) VALUES (null, :mail, :nombre, :telefono, :estado)");
    //pasas los parametros de forma indidual
    $statement->bindParam(':mail', $email);
    $statement->bindParam(':nombre', $email);
    $statement->bindParam(':telefono', '');
    $statement->bindParam(':estado', '1');
    //preguntas si la sentencia fue bien recibida
    if ($sentencia->execute();) {
      echo " - Grabado"."<br>";
    }
    else{ //si con esto sabras que hubo un error
      echo " - Algo Fallo! Revisar la BD"."<br>";
    }

}

 ?>
   <b>CI:</b> <input  type="text" name="cedula" id="cedula" onchange="this.form.submit()" onblur="copiar()" value="<?php  $echo isset($_POST['cedula']) ? $_POST['cedula'] : null ; ?>"/>
          //notese que optimice un poco este ternario de aqui
  <?php
  // $cedul = isset($_POST['cedula']) ? $_POST['cedula'] : null ;
  if (isset($_POST['cedula']) && !empty($_POST['cedula'])) { 
    $nombr = $_POST['cedula'];
    echo "<b>Nombre:</b> <input type='text' name='nombre' id='nombre'  onchange='this.form.submit()' value='$nombr'>";
     // $nombr = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
      //con este validas si si llego y si no esta vacio
     if (isset($_POST['nombre']) && !empty($_POST['nombre'])) { 
       $apellid = $_POST['nombre'];
       echo "<b>Apellido:</b> <input type='text' name='apellido' id='apllido' id='apellido' onchange='this.form.submit()' value= '$apellid' >";
     }
  }

    <div class="col-lg-12 input-group">
      <label for="valor1" class="form-label col-lg-3">Valor 1</label>
      <input type="number" name="valor1" id="valor1" class="form-input col-lg-1" value="0" onchange="sumar(1);">
      <label for="valor2" class="form-label col-lg-3">Valor 2</label>
      <input type="number" name="valor2" id="valor2" class="form-input col-lg-1" value="0" onchange="sumar(1);">
      <label for="Subtotal1" class="form-label col-lg-3">Subtotal1 1</label>
      <input type="number" name="Subtotal1" id="Subtotal1" class="form-input col-lg-1" value="0" onchange="sumar(3);">
    </div>
    <div class="col-lg-12 input-group">
      <label for="valor3" class="form-label col-lg-3">Valor 3</label>
      <input type="number" name="valor3" id="valor3" class="form-input col-lg-1" value="0" onchange="sumar(2);">
      <label for="valor4" class="form-label col-lg-3">Valor 4</label>
      <input type="number" name="valor4" id="valor4" class="form-input col-lg-1" value="0" onchange="sumar(2);">
      <label for="Subtotal2" class="form-label col-lg-3">Subtotal2 2</label>
      <input type="number" name="Subtotal2" id="Subtotal2" class="form-input col-lg-1" value="0" onchange="sumar(3);">
    </div>
    <div class="col-lg-12 offset-8 input-group">
      <label for="Total" class="form-label col-lg-3">Total</label>
      <input type="number" name="Total" id="Total" class="form-input col-lg-1" value="0" >
    </div>
<script type="text/javascript">
  function sumar(opcion){
    if (opcion==1) {
      var suma =   parseInt($('#valor1').val()) +  parseInt($('#valor2').val());
      $('#Subtotal1').val(suma);
      var suma2 =   parseInt($('#Subtotal1').val()) +  parseInt($('#Subtotal2').val());
      $('#Total').val(suma2);
    }else if (opcion == 2) {
      var suma1 =   parseInt($('#valor3').val()) +  parseInt($('#valor4').val());
      $('#Subtotal2').val(suma1);
      var suma3 =   parseInt($('#Subtotal1').val()) +  parseInt($('#Subtotal2').val());
      $('#Total').val(suma3);
    }
  }
</script>