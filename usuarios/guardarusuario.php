<?php
include_once("../login/check.php");
if(!empty($_POST)){
	include_once("../class/categoria.php");
	include_once("../class/usuarios.php");
	$usuarios=new  usuarios;
	$cod=$_POST['Cod'];
	$nombres=$_POST['nombres'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$nick=$_POST['nick'];
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$nivel=$_POST['nivel'];
	
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$values=array(
					"Nombres"=>"'$nombres'",
					"Paterno"=>"'$paterno'",
					"Materno"=>"'$materno'",
					"Nick"=>"'$nick'",
					"Usuario"=>"'$usuario'",
					"Nivel"=>"'$nivel'",
			);
	$usuarios->actualizarUsuarios($values,$cod);
	header("Location:../");
}
?>