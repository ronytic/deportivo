<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/planilla.php");
	include_once("../../class/planillajugadores.php");
	include_once("../../class/fixture.php");
	$planilla=new planilla;
	$planillajugadores=new planillajugadores;
	$fixture=new fixture;
	$CodPlanilla=$_POST['CodPlanilla'];
	$CodFixture=$_POST['CodFixture'];
	$arbitro=$_POST['arbitro'];
	$JuezLinea1=$_POST['juezlinea1'];
	$JuezLinea2=$_POST['juezlinea2'];
	$CuartoArbitro=$_POST['cuartoarbitro'];
	$capitan1=$_POST['capitan1'];
	$capitan2=$_POST['capitan2'];
	$doctor=$_POST['doctor'];
	$observacionespartido=$_POST['observacionespartido'];
	$observacionesarbitro=$_POST['observacionesarbitro'];
	$impugnaciones=$_POST['impugnaciones'];
	$jugadordestacado1=$_POST['jugadordestacado1'];
	$jugadordestacado2=$_POST['jugadordestacado2'];
	$r1=$_POST['r1'];
	$r2=$_POST['r2'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$values=array(
				"CodFixture"=>"'$CodFixture'",
				"Arbitro"=>"'$arbitro'",
				"JuezLinea1"=>"'$JuezLinea1'",
				"JuezLinea2"=>"'$JuezLinea2'",
				"CuartoArbitro"=>"'$CuartoArbitro'",
				"CodCapitan1"=>"$capitan1",
				"CodCapitan2"=>"$capitan2",
				"JugadorDestacado1"=>"'$jugadordestacado1'",
				"JugadorDestacado2"=>"'$jugadordestacado2'",
				"CodMedico"=>"$doctor",
				"ObservacionesPartido"=>"'$observacionespartido'",
				"ObservacionArbitro"=>"'$observacionesarbitro'",
				"Impugnaciones"=>"'$impugnaciones'",
				);
	$planilla->actualizarPlanilla($values,$CodPlanilla);
	$id=$CodPlanilla;
	$fixture->actualizarFixture(array("Resultado1"=>$r1,"Resultado2"=>$r2),$CodFixture);
	//print_r($_POST);
	
	foreach($_POST['jugador1'] as $jug1){
//		print_r($jug1);
		if($jug1['CodJugador']!="0"){
			$CodPlanillaJugador1=$jug1['CodPlanillaJugadores'];
			$numero=$jug1['numero'];
			$CodJugador=$jug1['CodJugador'];
			$ta=$jug1['ta'];
			$tr=$jug1['tr'];
			$g=$jug1['g'];
			$cambioE=$jug1['cambioE'];
			$cambioS=$jug1['cambioS'];
			if($CodPlanillaJugador1!=""){
				$valuesJ1=array(
							"Equipo"=>"1",
							"Numero"=>"'$numero'",
							"CodJugador"=>"'$CodJugador'",
							"Ta"=>"'$ta'",
							"Tr"=>"'$tr'",
							"G"=>"'$g'",
							"CambioE"=>"'$cambioE'",
							"CambioS"=>"'$cambioS'",
							);
				$planillajugadores->actualizarJugadores($valuesJ1,$CodPlanillaJugador1);
			}else{
				$valuesJ1=array("CodPlanillaJugadores"=>"NULL",
						"CodPlanilla"=>"$id",
						"Equipo"=>"1",
						"Numero"=>"'$numero'",
						"CodJugador"=>"'$CodJugador'",
						"Ta"=>"'$ta'",
						"Tr"=>"'$tr'",
						"G"=>"'$g'",
						"CambioE"=>"'$cambioE'",
						"CambioS"=>"'$cambioS'",
						"FechaRegistro"=>"'$fecha'",
						"HoraRegistro"=>"'$hora'",
						"Activo"=>"'1'"
						);	
				$planillajugadores->insertarPlanilla($valuesJ1);
			}
		}
	}
	foreach($_POST['jugador2'] as $jug2){
		if($jug2['CodJugador']!="0"){
			$CodPlanillaJugador2=$jug2['CodPlanillaJugadores'];
			$numero=$jug2['numero'];
			$CodJugador=$jug2['CodJugador'];
			$ta=$jug2['ta'];
			$tr=$jug2['tr'];
			$g=$jug2['g'];
			$cambioE=$jug2['cambioE'];
			$cambioS=$jug2['cambioS'];
			if($CodPlanillaJugador2!=""){
				$valuesJ2=array(
							"Equipo"=>"2",
							"Numero"=>"'$numero'",
							"CodJugador"=>"'$CodJugador'",
							"Ta"=>"'$ta'",
							"Tr"=>"'$tr'",
							"G"=>"'$g'",
							"CambioE"=>"'$cambioE'",
							"CambioS"=>"'$cambioS'",
	
							);
				$planillajugadores->actualizarJugadores($valuesJ2,$CodPlanillaJugador2);
			}else{
				$valuesJ2=array("CodPlanillaJugadores"=>"NULL",
						"CodPlanilla"=>"$id",
						"Equipo"=>"2",
						"Numero"=>"'$numero'",
						"CodJugador"=>"'$CodJugador'",
						"Ta"=>"'$ta'",
						"Tr"=>"'$tr'",
						"G"=>"'$g'",
						"CambioE"=>"'$cambioE'",
						"CambioS"=>"'$cambioS'",
						"FechaRegistro"=>"'$fecha'",
						"HoraRegistro"=>"'$hora'",
						"Activo"=>"'1'"
						);
				$planillajugadores->insertarPlanilla($valuesJ2);
			}
		}
	}
	header("Location:nuevo.php");
}
?>