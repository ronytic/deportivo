<?php
include_once("../../login/check.php");
if(!empty($_GET)){
	$a="encargado";
	include_once("../../class/encargado.php");
	$clase=new $a;
	$Cod=$_GET['Cod'];
	$values=array("Activo"=>0);
	$metodo="actualizar$a";
	$clase->$metodo($values,$Cod);
}
?>