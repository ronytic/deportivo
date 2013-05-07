<?php
include_once("../login/check.php");
if(!empty($_POST)){
	include_once("../class/jugador.php");
	$jugador=new jugador;
	$cod=$_POST['Cod'];
	$nombres=$_POST['nombres'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$fechaNac=$_POST['fechaNac'];
	$ci=$_POST['ci'];
	$direccion=$_POST['direccion'];
	$clubprocedencia=$_POST['clubprocedencia'];
	$clubnuevo=$_POST['clubnuevo'];
	$tutor=$_POST['tutor'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
//	print_r($_FILES['foto']);
	@copy($_FILES['foto']['tmp_name'],"../images/jugadores/".$_FILES['foto']['name']);
	@$nombreFoto=$_FILES['foto']['name']!=''?$_FILES['foto']['name']:'';
	
	$values=array(
					"Nombres"=>"'$nombres'",
					"Paterno"=>"'$paterno'",
					"Materno"=>"'$materno'",
					"FechaNac"=>"'$fechaNac'",
					"Ci"=>"'$ci'",
					"Direccion"=>"'$direccion'",
					"ClubProcedencia"=>"'$clubprocedencia'",
					"CodClubNuevo"=>"'$clubnuevo'",
					"Tutor"=>"'$tutor'",
					"Foto"=>"'$nombreFoto'",
			);
	$jugador->actualizarJugador($values,$cod);
	header("Location:../");
}
?>