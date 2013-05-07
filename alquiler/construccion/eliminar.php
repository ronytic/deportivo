<?php
include_once("../../login/check.php");
if(!empty($_GET)){
	$a="construccion";
	include_once("../../class/construccion.php");
	$clase=new $a;
	$Cod=$_GET['Cod'];
	$values=array("Activo"=>0);
	$metodo="actualizar$a";
	$clase->$metodo($values,$Cod);
}
?>