<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("DATOS DEL INFORME MEDICO DEL JUGADOR"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		
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
include_once("../class/jugador.php");
include_once("../class/informemedico.php");
$informemedico=new informemedico;
$jugador=new jugador;

$Cod=$_GET['Cod'];
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$i=0;
foreach($informemedico->mostrarTodo(0,"CodInformeMedico=".$Cod) as $in){
	$j=array_shift($jugador->mostrarTodo(0,"CodJugador=".$in['CodJugador']));
		$pdf->SetFont("Arial","B",10);
		
		$pdf->SetX(45);
		$pdf->Cell(40,5,utf8_decode("Nombres"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Nombres"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Paterno"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Paterno"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Materno"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Materno"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Peso"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($in["Peso"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Estatura"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($in["Estatura"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Presión"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($in["Presion"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Tipo de Sangre"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($in["TipoSangre"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Accidentes"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($in["Accidentes"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Enfermedades"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($in["Enfermedades"]),1);
		$pdf->Ln(5);
		
		$pdf->SetX(45);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Hábil"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode(($in["Habil"]==1?'SI':'NO')),1);

}
$pdf->Output();
function nombre($nombre){
	$nom=explode(" ",$nombre);
	return $nom[0];
}
?>
