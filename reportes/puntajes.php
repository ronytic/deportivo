<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		global $cod;
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DE PUNTAJES"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->SetFont("Arial","",10);
		$this->Cell(190,4,"Nombre del Puntaje: ".utf8_decode($cod),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(70,5,utf8_decode("Nombre del Club"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PJ"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PTS"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PG"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PE"),1,0,"C");
		$this->Cell(15,5,utf8_decode("PP"),1,0,"C");
		$this->Cell(15,5,utf8_decode("DG"),1,0,"C");
		$this->Ln(5);
	}
	function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(195,0,"",1,1);
		$anio=date("Y");
		$this->Cell(176,4,$anio,0,1,"C");
		
	}
}
$cod=$_GET['Cod'];
include_once("../class/puntaje.php");
include_once("../class/club.php");
$puntaje=new puntaje;
$club=new club;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();

$i=0;
foreach($puntaje->mostrarTodo(0,"Nombre='".$cod."'") as $u){
	$i++;
	$c1=array_shift($club->mostrarClubWhere("CodClub=".$u['CodClub']));
	$pdf->SetFont("Arial","",10);
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(70,5,utf8_decode($c1["Nombre"]));
	$pdf->Cell(15,5,utf8_decode($u["PJ"]),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u["PTS"]),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u["PG"]),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u["PE"]),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u["PP"]),0,0,"C");
	$pdf->Cell(15,5,utf8_decode($u["DG"]),0,0,"C");
	$pdf->Ln(5);
}
$pdf->Output();
?>
