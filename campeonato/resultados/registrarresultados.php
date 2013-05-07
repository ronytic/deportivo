<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/fixture.php");
	$fixture=new fixture;
	foreach($_POST['f'] as $fechas){
			$CodFixture=$fechas['CodFixture'];
			$r1=$fechas['r1'];
			$r2=$fechas['r2'];
			$values=array(
				"Resultado1"=>"'$r1'",
				"Resultado2"=>"'$r2'",
			);
			$fixture->actualizarFixture($values,$CodFixture);

	}
	header("Location:../../index.php");
}
?>