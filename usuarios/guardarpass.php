<?php
include_once("../login/check.php");
if(!empty($_POST)){
	include_once("../class/usuarios.php");
	$usuarios=new  usuarios;
	$cod=$_POST['Cod'];
	$contrasena=$_POST['pass'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$values=array(
					"PASS"=>"MD5('$contrasena')",
			);
	$usuarios->actualizarUsuarios($values,$cod);
	header("Location:../");
}
?>