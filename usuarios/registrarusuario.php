<?php
include_once("../login/check.php");
if(!empty($_POST)){
	include_once("../class/categoria.php");
	include_once("../class/usuarios.php");
	$usuarios=new  usuarios;
	$nombres=$_POST['nombres'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$nick=$_POST['nick'];
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$nivel=$_POST['nivel'];
	
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$values=array("CodUsuario"=>"NULL",
					"Nombres"=>"'$nombres'",
					"Paterno"=>"'$paterno'",
					"Materno"=>"'$materno'",
					"Nick"=>"'$nick'",
					"Usuario"=>"'$usuario'",
					"Pass"=>"MD5('$contrasena')",
					"Nivel"=>"'$nivel'",
					"FechaRegistro"=>"'$fecha'",
					"HoraRegistro"=>"'$hora'",
					"Activo"=>"1",
			);
	$usuarios->insertarUsuarios($values);
	header("Location:../");
}
?>