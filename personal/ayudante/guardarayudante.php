<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/ayudante.php");
	$ayudante=new ayudante;
	$cod=$_POST['Cod'];
	$nombres=$_POST['nombres'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$fechaNac=$_POST['fechaNac'];
	$ci=$_POST['ci'];
	$direccion=$_POST['direccion'];
	$cargo=$_POST['cargo'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$values=array(
					"Nombres"=>"'$nombres'",
					"Paterno"=>"'$paterno'",
					"Materno"=>"'$materno'",
					"FechaNac"=>"'$fechaNac'",
					"Ci"=>"'$ci'",
					"Direccion"=>"'$direccion'",
					"Cargo"=>"'$cargo'",
			);
	$ayudante->actualizarAyudante($values,$cod);
	header("Location:../../");
}
?>