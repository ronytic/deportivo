<?php
include_once("../login/check.php");
if(!empty($_POST)){
	include_once("../class/categoria.php");
	$categoria=new  categoria;
	$nombres=$_POST['nombre'];
	$observaciones=$_POST['observaciones'];
	
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$values=array("CodCategoria"=>"NULL",
					"Nombre"=>"'$nombres'",
					"Observaciones"=>"'$observaciones'",
					"FechaRegistro"=>"'$fecha'",
					"HoraRegistro"=>"'$hora'",
					"Activo"=>"1",
			);
	$categoria->insertarCategoria($values);
	header("Location:../");
}
?>