<?php
include_once("../login/check.php");
if(!empty($_POST)){
	include_once("../class/alquiler.php");
	$alquiler=new alquiler;
	$CodAlquiler=$_POST['Cod'];
	$fecha=$_POST['fecha'];
	$hora=$_POST['hora'];
	$nombrecliente=$_POST['nombrecliente'];
	$monto=$_POST['monto'];
	$observaciones=$_POST['observaciones'];
	$tipo=$_POST['tipo'];
	$nombreresponsable=$_POST['nombreresponsable'];
	$estado=$_POST['estado'];
	$fechaR=date("Y-m-d");
	$horaR=date("H:i:s");
	$values=array(
					"Fecha"=>"'$fecha'",
					"Hora"=>"'$hora'",
					"NombreCliente"=>"'$nombrecliente'",
					"Monto"=>"'$monto'",
					"Observaciones"=>"'$observaciones'",
					"Tipo"=>"'$tipo'",
					"NombreResponsable"=>"'$nombreresponsable'",
					"Estado"=>"'$estado'",

			);
	$alquiler->actualizarAlquiler($values,$CodAlquiler);
	header("Location:../");
}
?>