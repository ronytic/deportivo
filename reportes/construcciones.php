<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DE CONTRUCCIONES"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(50,5,utf8_decode("Nombre"),1,0,"C");
		$this->Cell(55,5,utf8_decode("Dirección"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Financiamiento"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Fecha Inicio"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Fecha Final"),1,0,"C");
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
include_once("../class/construccion.php");
$construccion=new construccion;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$i=0;
foreach($construccion->mostrarTodo(0) as $c){
	$i++;
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(50,5,utf8_decode($c["Nombre"]));
	$pdf->Cell(55,5,utf8_decode($c["Direccion"]));
	$pdf->Cell(30,5,utf8_decode($c["Financiamiento"]));
	$pdf->Cell(25,5,utf8_decode($c["FechaInicio"]));
	$pdf->Cell(25,5,utf8_decode($c["FechaFinal"]));
	$pdf->Ln(5);
}
$pdf->Output();
?>
