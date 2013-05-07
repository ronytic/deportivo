<?php
include_once("../../login/check.php");
if(!empty($_GET)){
	$a="puntaje";
	include_once("../../class/puntaje.php");
	$clase=new $a;
	$Cod=$_GET['Cod'];
	$values=array("Activo"=>0);
	$metodo="actualizar{$a}Nombre";
	$clase->$metodo($values,$Cod);
}
?>