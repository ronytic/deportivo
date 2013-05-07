<?php
include_once("../login/check.php");
if(!empty($_POST)){
	include_once("../class/categoria.php");
	$categoria=new  categoria;
	$cod=$_POST['Cod'];
	$nombres=$_POST['nombre'];
	$observaciones=$_POST['observaciones'];
	
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$values=array(
					"Nombre"=>"'$nombres'",
					"Observaciones"=>"'$observaciones'",
					
			);
	$categoria->actualizarCategoria($values,$cod);
	header("Location:../");
}
?>