
<?php

$valor="";
 foreach (array_keys($_POST['titulo_']) as $key) {
  $tit = $_POST['titulo_'][$key];
	$obs="";
	$pie ="";
	$titulo = "<hr>Tutulo: $tit<br>";
	foreach (array_keys($_POST['observaciones_']) as $key2) {
  		$ob = $_POST['observaciones_'][$key][$key2];
  		$obs.= "-->Observacion: $ob"."<br>";
  		
  		foreach (array_keys($_POST['pieFoto_']) as $key3) {
  			$tempPie = $_POST['pieFoto_'][$key][$key2][$key3]	;
  			// $tempFile = $_POST['file_'][$key][$key2][$key3];
	  		$obs.= "|*|	 Pie de Foto: $tempPie"."<br>";
		}
	}
 

   echo $titulo.$obs;
 }
// $tempFile = $_POST['pieFoto_'];
// 	  	echo "Pie de Foto: $tempFile"."<br>";
// 	  		echo $pie;
// echo "<pre>";
// echo var_dump($_POST);
// echo "</pre>";

echo "<hr>";
die();


