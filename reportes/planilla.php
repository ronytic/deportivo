<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		global $cod;
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(255,4,utf8_decode("PLANILLA"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->SetFont("Arial","",10);
		$this->Cell(190,4,"Nombre del Puntaje: ".utf8_decode($cod),0,5,"L");
		$this->ln(0);
		$this->Cell(255,0,"",1,1);
		$this->SetFont("Arial","B",10);
		/*$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(70,5,utf8_decode("Nombre del Club"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PJ"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PTS"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PG"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PE"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PP"),1,0,"C");
		$this->Cell(15,5,utf8_decode("DG"),1,0,"C");
		$this->Ln(5);*/
	}
	function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(255,0,"",1,1);
		$anio=date("Y");
		$this->Cell(255,4,$anio,0,1,"C");
		
	}
}
$cod=$_GET['Cod'];

include_once("../class/fixture.php");
include_once("../class/club.php");
include_once("../class/medico.php");
include_once("../class/jugador.php");
include_once("../class/planilla.php");
include_once("../class/planillajugadores.php");
$fixture=new fixture;
$club=new club;
$jugador=new jugador;
$medico=new medico;
$planilla=new planilla;
$planillajug=new planillajugadores;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","B",10);
@$f=array_shift($fixture->mostrarTodo(0,"CodFixture=$cod"));
@$c1=array_shift($club->mostrarTodo(0,"CodClub=".$f['CodEquipo1']));
@$c2=array_shift($club->mostrarTodo(0,"CodClub=".$f['CodEquipo2']));
@$p=array_shift($planilla->mostrarTodo(0,"CodFixture=".$cod));
@$pj1=$planillajug->mostrarTodo(0,"CodPlanilla=".$p['CodPlanilla']." and Equipo=1");
@$pj2=$planillajug->mostrarTodo(0,"CodPlanilla=".$p['CodPlanilla']." and Equipo=2");
@$cp1=array_shift($jugador->mostrarTodo(0,"CodJugador=".$p['CodCapitan1']));
@$cp2=array_shift($jugador->mostrarTodo(0,"CodJugador=".$p['CodCapitan2']));
@$m=array_shift($medico->mostrarTodo(0,"CodMedico=".$p['CodMedico']));
$i=0;
$pdf->SetFont("Arial","BU",10);
$pdf->Cell(255,5,utf8_decode("ASOCIACIÓN DE FUTBOL"),0,0,"C");
$pdf->ln(8);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Presidente de Club:"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($c1['NombreResponsable']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(20,5,utf8_decode("Lugar:"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(35,5,utf8_decode($f['Lugar']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Presidente de Club:"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($c2['NombreResponsable']),1,0,"C");
$pdf->ln(5);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Club:"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($c1['Nombre']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(20,5,utf8_decode("Hora:"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(35,5,utf8_decode($f['Hora']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Club:"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($c2['Nombre']),1,0,"C");
$pdf->ln(5);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Capitán:"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($cp1['Nombres']." ".$cp1['Paterno']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(20,5,utf8_decode("Doctor:"),1,0,"C");
$pdf->SetFont("Arial","",8);
$pdf->Cell(35,5,utf8_decode($m['Nombres']." ".$m['Paterno']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Capitán:"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($cp2['Nombres']." ".$cp2['Paterno']),1,0,"C");
$pdf->ln(5);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Juez de Linea 1"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($p['JuezLinea1']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(20,5,utf8_decode("Arbitro:"),1,0,"C");
$pdf->SetFont("Arial","",8);
$pdf->Cell(35,5,utf8_decode($p['Arbitro']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Juez de Linea 2"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($p['JuezLinea2']),1,0,"C");
$pdf->ln(5);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Jugador Destacado"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($p['JugadorDestacado1']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(20,5,utf8_decode("4 Arbitro:"),1,0,"C");
$pdf->SetFont("Arial","",8);
$pdf->Cell(35,5,utf8_decode($p['CuartoArbitro']),1,0,"C");
$pdf->SetFont("Arial","B",10);
$pdf->Cell(35,5,utf8_decode("Jugador Destacado"),1,0,"C");
$pdf->SetFont("Arial","",10);
$pdf->Cell(65,5,utf8_decode($p['JugadorDestacado2']),1,0,"C");

$pdf->ln(10);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(10,5,utf8_decode("Nº"),1,0,"C");
$pdf->Cell(55,5,utf8_decode("Jugador"),1,0,"C");
$pdf->Cell(10,5,utf8_decode("TA"),1,0,"C");
$pdf->Cell(10,5,utf8_decode("TR"),1,0,"C");
$pdf->Cell(10,5,utf8_decode("G"),1,0,"C");
$pdf->Cell(15,5,utf8_decode("Cam. E"),1,0,"C");
$pdf->Cell(15,5,utf8_decode("Cam. S"),1,0,"C");
$pdf->Cell(5,5,utf8_decode(""),1,0,"C");
$pdf->Cell(10,5,utf8_decode("Nº"),1,0,"C");
$pdf->Cell(55,5,utf8_decode("Jugador"),1,0,"C");
$pdf->Cell(10,5,utf8_decode("TA"),1,0,"C");
$pdf->Cell(10,5,utf8_decode("TR"),1,0,"C");
$pdf->Cell(10,5,utf8_decode("G"),1,0,"C");
$pdf->Cell(15,5,utf8_decode("Cam. E"),1,0,"C");
$pdf->Cell(15,5,utf8_decode("Cam. S"),1,0,"C");
$pdf->ln(5);
foreach($pj1 as $u){
@	$j=array_shift($jugador->mostrarTodo(0,"CodJugador=".$u['CodJugador']));
	$i++;
	$pdf->SetFont("Arial","",10);
	$pdf->Cell(10,5,utf8_decode($u['Numero']));
	$pdf->Cell(55,5,utf8_decode(nombre($j["Nombres"])." ".$j['Paterno']." ".$j['Materno']));
	$pdf->Cell(10,5,utf8_decode($u['Ta']),0,0,"C");
	$pdf->Cell(10,5,utf8_decode($u['Tr']),0,0,"C");
	$pdf->Cell(10,5,utf8_decode($u['G']),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u['CambioE']),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u['CambioS']),0,0,"C");
	$pdf->Ln(5);
}
$pdf->SetXY(140,79);
$i=0;
foreach($pj2 as $u){
@	$j=array_shift($jugador->mostrarTodo(0,"CodJugador=".$u['CodJugador']));
	$i++;
	$pdf->SetFont("Arial","",10);
	$pdf->Cell(10,5,utf8_decode($u['Numero']),0);
	$pdf->Cell(55,5,utf8_decode(nombre($j["Nombres"])." ".$j['Paterno']." ".$j['Materno']));
	$pdf->Cell(10,5,utf8_decode($u['Ta']),0,0,"C");
	$pdf->Cell(10,5,utf8_decode($u['Tr']),0,0,"C");
	$pdf->Cell(10,5,utf8_decode($u['G']),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u['CambioE']),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u['CambioS']),0,0,"C");
	$pdf->SetXY(140,79+($i*5));
}
$pdf->SetFont("Arial","",8);
$pdf->SetXY(10,170);
$pdf->MultiCell(50,5,utf8_decode($p['ObservacionesPartido']),1);
$pdf->SetXY(65,170);
$pdf->MultiCell(50,5,utf8_decode($p['ObservacionArbitro']),1);
$pdf->SetXY(120,170);
$pdf->MultiCell(50,5,utf8_decode($p['Impugnaciones']),1);
$pdf->SetXY(175,170);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(45,5,utf8_decode($c1['Nombre'].":"),1,2,"C");
$pdf->Cell(45,5,utf8_decode($f['Resultado1']),1,2,"C");
$pdf->Cell(45,5,utf8_decode($c2['Nombre'].":"),1,2,"C");
$pdf->Cell(45,5,utf8_decode($f['Resultado2']),1,2,"C");
$pdf->Output();
function nombre($nombre){
	$nom=explode(" ",$nombre);
	return $nom[0];
}
?>