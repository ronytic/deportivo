<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DE CATEGORIAS"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(70,5,utf8_decode("Nombre"),1,0,"C");
		$this->Cell(115,5,utf8_decode("Observaciones"),1,0,"C");
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
include_once("../class/categoria.php");
$categoria=new categoria;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$i=0;
foreach($categoria->mostrarTodo(0,"","Paterno,Materno,Nombres") as $c){
	$i++;
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(70,5,utf8_decode($c["Nombre"]));
	$pdf->Cell(115,5,utf8_decode($c["Observaciones"]));
	$pdf->Ln(5);
}
$pdf->Output();
?>
