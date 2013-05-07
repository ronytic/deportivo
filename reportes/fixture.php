<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		global $cod;
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DEL FIXTURE"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->SetFont("Arial","",10);
		$this->Cell(190,4,"Nombre de Fixture: ".$cod,0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(20,5,utf8_decode("Fecha"),1,0,"C");
		$this->Cell(15,5,utf8_decode("Hora"),1,0,"C");
		$this->Cell(45,5,utf8_decode("Lugar"),1,0,"C");
		$this->Cell(40,5,utf8_decode("Equipo1"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Vs"),1,0,"C");
		$this->Cell(40,5,utf8_decode("Equipo2"),1,0,"C");
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
$cod=$_GET['Cod'];
include_once("../class/fixture.php");
include_once("../class/club.php");
$fixture=new fixture;
$club=new club;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();

$i=0;
foreach($fixture->mostrarTodo(0,"Nombre='".$cod."'") as $u){
	$i++;
	$c1=array_shift($club->mostrarClubWhere("CodClub=".$u['CodEquipo1']));
	$c2=array_shift($club->mostrarClubWhere("CodClub=".$u['CodEquipo2']));
	$pdf->SetFont("Arial","",10);
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(20,5,utf8_decode($u["Fecha"]));
	$pdf->Cell(15,5,utf8_decode($u["Hora"]));
	$pdf->Cell(45,5,utf8_decode($u["Lugar"]));
	$pdf->Cell(40,5,utf8_decode($c1["Nombre"]));
	$pdf->Cell(25,5,utf8_decode("Vs"));
	$pdf->Cell(40,5,utf8_decode($c2["Nombre"]));
	$pdf->Ln(5);
}
$pdf->Output();
?>
