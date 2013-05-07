<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DE USUARIOS"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Usuarios"),1,0,"C");
		$this->Cell(45,5,utf8_decode("Nombres"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Paterno"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Materno"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Nivel"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Nick"),1,0,"C");
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
include_once("../class/usuarios.php");
$usuarios=new usuarios;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();

$i=0;
foreach($usuarios->mostrarTodo(0) as $u){
	$i++;
	$pdf->SetFont("Arial","",10);
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(30,5,utf8_decode($u["Usuario"]));
	$pdf->Cell(45,5,utf8_decode($u["Nombres"]));
	$pdf->Cell(30,5,utf8_decode($u["Paterno"]));
	$pdf->Cell(25,5,utf8_decode($u["Materno"]));
	switch($u["Nivel"]){
		case 1:{$t="SuperAdministrador";}break;
		case 2:{$t="Presidente";}break;
		case 3:{$t="Coordinador";}break;
		case 4:{$t="Medico";}break;
		case 5:{$t="PresidenteClub";}break;
		case 6:{$t="Comite";}break;
		case 7:{$t="Jugador";}break;
		case 8:{$t="Encargado";}break;
	}
	$pdf->SetFont("Arial","",8);
	$pdf->Cell(25,5,utf8_decode($t));
	$pdf->Cell(30,5,utf8_decode($u["Nick"]));
	$pdf->Ln(5);
}
$pdf->Output();
?>
