<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DE AYUDANTES"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Paterno"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Materno"),1,0,"C");
		$this->Cell(40,5,utf8_decode("Nombres"),1,0,"C");
		$this->Cell(20,5,utf8_decode("C.I."),1,0,"C");
		$this->Cell(20,5,utf8_decode("Fecha Nac"),1,0,"C");
		$this->Cell(40,5,utf8_decode("Especialidad"),1,0,"C");
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
include_once("../class/ayudante.php");
$ayudante=new ayudante;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$i=0;
foreach($ayudante->mostrarTodo(0,"","Paterno,Materno,Nombres") as $m){
	$i++;
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(30,5,utf8_decode($m["Paterno"]));
	$pdf->Cell(30,5,utf8_decode($m["Materno"]));
	$pdf->Cell(40,5,utf8_decode($m["Nombres"]));
	$pdf->Cell(20,5,utf8_decode($m["Ci"]));
	$pdf->Cell(20,5,utf8_decode($m["FechaNac"]));
	$pdf->Cell(40,5,utf8_decode($m["Cargo"]));
	$pdf->Ln(5);
}
$pdf->Output();
?>
