<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/construccion.php");
	$construccion=new construccion;
	$cod=$_POST['Cod'];
	$nombreconstruccion=$_POST['nombreconstruccion'];
	$direccion=$_POST['direccion'];
	$financiamiento=$_POST['financiamiento'];
	$fechainicio=$_POST['fechainicio'];
	$fechafinal=$_POST['fechafinal'];
	$fechaR=date("Y-m-d");
	$horaR=date("H:i:s");
	$values=array(
					"Nombre"=>"'$nombreconstruccion'",
					"Direccion"=>"'$direccion'",
					"Financiamiento"=>"'$financiamiento'",
					"FechaInicio"=>"'$fechainicio'",
					"FechaFinal"=>"'$fechafinal'",
			);
	$construccion->actualizarConstruccion($values,"CodConstruccion=$cod");
	header("Location:../../");
}
?>