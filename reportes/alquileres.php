<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DE ALQUILERES"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(15,5,utf8_decode("Fecha"),1,0,"C");
		$this->Cell(15,5,utf8_decode("Hora"),1,0,"C");
		$this->Cell(49,5,utf8_decode("Nombre Cliente"),1,0,"C");
		$this->Cell(11,5,utf8_decode("Monto"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Observaciones"),1,0,"C");
		$this->Cell(15,5,utf8_decode("Tipo"),1,0,"C");
		$this->Cell(35,5,utf8_decode("Nombre Resp."),1,0,"C");
		$this->Cell(15,5,utf8_decode("Estado"),1,0,"C");
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
include_once("../class/alquiler.php");
$alquiler=new alquiler;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","",8);
$i=0;
foreach($alquiler->mostrarTodo(0) as $a){
	$i++;
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(15,5,utf8_decode($a["Fecha"]));
	$pdf->Cell(15,5,utf8_decode($a["Hora"]));
	$pdf->Cell(49,5,utf8_decode($a["NombreCliente"]));
	$pdf->Cell(11,5,utf8_decode($a["Monto"]));
	$pdf->Cell(30,5,utf8_decode($a["Observaciones"]));
	$pdf->Cell(15,5,utf8_decode($a["Tipo"]));
	$pdf->Cell(35,5,utf8_decode($a["NombreResponsable"]));
	$pdf->Cell(15,5,utf8_decode($a["Estado"]==1?'Pendiente':'Terminado'));
	$pdf->Ln(5);
}
$pdf->Output();
?>
