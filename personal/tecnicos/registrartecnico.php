<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/tecnico.php");
	$tecnico=new  tecnico;
	$nombres=$_POST['nombres'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$fechaNac=$_POST['fechaNac'];
	$ci=$_POST['ci'];
	$direccion=$_POST['direccion'];
	$cargo=$_POST['cargo'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$values=array("CodTecnico"=>"NULL",
					"Nombres"=>"'$nombres'",
					"Paterno"=>"'$paterno'",
					"Materno"=>"'$materno'",
					"FechaNac"=>"'$fechaNac'",
					"Ci"=>"'$ci'",
					"Direccion"=>"'$direccion'",
					"Cargo"=>"'$cargo'",
					"FechaRegistro"=>"'$fecha'",
					"HoraRegistro"=>"'$hora'",
					"Activo"=>"1",
			);
	$tecnico->insertarTecnico($values);
	header("Location:../../");
}
?>