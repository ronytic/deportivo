<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DE JUGADORES"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Nombres"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Paterno"),1,0,"C");
		$this->Cell(20,5,utf8_decode("Materno"),1,0,"C");
		$this->Cell(20,5,utf8_decode("Fecha Nac"),1,0,"C");
		$this->Cell(25,5,utf8_decode("CI"),1,0,"C");

		$this->Cell(25,5,utf8_decode("ClubNuevo"),1,0,"C");
		$this->Ln(5);
	}
	function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(195,0,"",1,1);
		$anio=date("Y");
		$this->Cell(176,4,"2012",0,1,"C");
		
	}
}
include_once("../class/club.php");
include_once("../class/jugador.php");
$club=new club;
$jugador=new jugador;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$i=0;
foreach($jugador->mostrarTodo(0) as $j){
	$c=array_shift($club->mostrarTodo(0,"CodClub=".$j['CodClubNuevo']));
	$i++;
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(30,5,utf8_decode($j["Nombres"]));
	$pdf->Cell(25,5,utf8_decode($j["Paterno"]),0,"","C");
	$pdf->Cell(20,5,utf8_decode($j["Materno"]));
	$pdf->Cell(20,5,utf8_decode($j["FechaNac"]));
	$pdf->Cell(25,5,utf8_decode($j['Ci']));
	$pdf->Cell(25,5,utf8_decode(($c["Nombre"])));
	$pdf->Ln(5);
}
$pdf->Output();
function nombre($nombre){
	$nom=explode(" ",$nombre);
	return $nom[0];
}
?>
