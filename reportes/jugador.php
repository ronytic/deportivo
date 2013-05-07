<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("DATOS DEL JUGADOR"),0,5,"C");
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
include_once("../class/club.php");
$club=new club;
$jugador=new jugador;

$Cod=$_GET['Cod'];
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$i=0;
foreach($jugador->mostrarTodo(0,"CodJugador=".$Cod) as $j){
	$c=array_shift($club->mostrarTodo(0,"CodClub=".$j['CodClubNuevo']));
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Nombres"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Nombres"]),1);
		$pdf->Ln(5);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Paterno"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Paterno"]),1);
		$pdf->Ln(5);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Materno"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Materno"]),1);
		$pdf->Ln(5);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Fecha Nacimiento"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["FechaNac"]),1);
		$pdf->Ln(5);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("C.I."),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Ci"]),1);
		$pdf->Ln(5);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Dirección"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Direccion"]),1);
		$pdf->Ln(5);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("ClubProcedencia"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["ClubProcedencia"]),1);
		$pdf->Ln(5);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Club Nuevo"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($c["Nombre"]),1);
		$pdf->Ln(5);
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(40,5,utf8_decode("Tutor"),1,0,"L");
		$pdf->SetFont("Arial","",10);
		$pdf->Cell(100,5,utf8_decode($j["Tutor"]),1);
		$pdf->Ln(5);
		if(file_exists("../images/jugadores/".$j["Foto"])){
			$pdf->Image("../images/jugadores/".$j["Foto"],170,36,30,30);
		}

}
$pdf->Output();
function nombre($nombre){
	$nom=explode(" ",$nombre);
	return $nom[0];
}
?>
