<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/informemedico.php");
	$informemedico=new informemedico;
	$CodJugador=$_POST['CodJugador'];
	$peso=$_POST['peso'];
	$estatura=$_POST['estatura'];
	$presion=$_POST['presion'];
	$tiposangre=$_POST['tiposangre'];
	$accidentes=$_POST['accidentes'];
	$enfermedades=$_POST['enfermedades'];
	$habil=$_POST['habil'];
	$fechaR=date("Y-m-d");
	$horaR=date("H:i:s");
	$values=array("CodInformeMedico"=>"NULL",
					"CodJugador"=>"'$CodJugador'",
					"Peso"=>"'$peso'",
					"Estatura"=>"'$estatura'",
					"Presion"=>"'$presion'",
					"TipoSangre"=>"'$tiposangre'",
					"Accidentes"=>"'$accidentes'",
					"Enfermedades"=>"'$enfermedades'",
					"Habil"=>"$habil",
					"FechaRegistro"=>"'$fechaR'",
					"HoraRegistro"=>"'$horaR'",
					"Activo"=>"1",
			);
	$informemedico->insertarInformeMedico($values);
	header("Location:../../");
}
?>