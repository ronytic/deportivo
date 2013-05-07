<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/construccion.php");
	$construccion=new construccion;
	
	$nombreconstruccion=$_POST['nombreconstruccion'];
	$direccion=$_POST['direccion'];
	$financiamiento=$_POST['financiamiento'];
	$fechainicio=$_POST['fechainicio'];
	$fechafinal=$_POST['fechafinal'];
	$fechaR=date("Y-m-d");
	$horaR=date("H:i:s");
	$values=array("CodConstruccion"=>"NULL",
					"Nombre"=>"'$nombreconstruccion'",
					"Direccion"=>"'$direccion'",
					"Financiamiento"=>"'$financiamiento'",
					"FechaInicio"=>"'$fechainicio'",
					"FechaFinal"=>"'$fechafinal'",
					"FechaRegistro"=>"'$fechaR'",
					"HoraRegistro"=>"'$horaR'",
					"Activo"=>"1",
			);
	$construccion->insertarConstruccion($values);
	header("Location:../../");
}
?>