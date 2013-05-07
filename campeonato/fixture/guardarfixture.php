<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/fixture.php");
	$fixture=new fixture;
	$nombre=$_POST['nombre'];
	foreach($_POST['f'] as $fechas){
		if($fechas['equipo1']!="0" && $fechas['equipo2']!="0"){
			$cod=$fechas['cod'];
			$fecha=$fechas['fecha'];
			$hora=$fechas['hora'];
			$lugar=$fechas['lugar'];
			$CodEquipo1=$fechas['equipo1'];
			$CodEquipo2=$fechas['equipo2'];
			$fechaR=date("Y-m-d");
			$horaR=date("H:i:s");
			$values=array(
				"Nombre"=>"'$nombre'",
				"Fecha"=>"'$fecha'",
				"Hora"=>"'$hora'",
				"Lugar"=>"'$lugar'",
				"CodEquipo1"=>"$CodEquipo1",
				"CodEquipo2"=>"$CodEquipo2",
			);
			$fixture->actualizarFixture($values,$cod);
		}
	}
	header("Location:../../index.php");
}
?>