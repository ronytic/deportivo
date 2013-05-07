<?php
include_once("fpdf/fpdf.php");
class PDF extends FPDF{
	function Header(){
		$this->SetFont("Arial","BU",10);
		$this->Cell(190,4,"SISTEMA DEPORTIVO",0,5,"L");
		$this->ln(5);
		$this->SetFont("Arial","B",15);
		$this->Cell(190,4,utf8_decode("LISTADO DE CLUBES"),0,5,"C");
		$this->ln(5);
		$this->SetFont("Arial","",8);
		$this->Cell(190,4,"Fecha: ".date("Y-m-d H:i:s"),0,5,"L");
		$this->ln(0);
		$this->Cell(195,0,"",1,1);
		$this->SetFont("Arial","B",10);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Nombre"),1,0,"C");
		$this->Cell(20,5,utf8_decode("Cant. Jug."),1,0,"C");
		$this->Cell(25,5,utf8_decode("Categoria"),1,0,"C");
		$this->Cell(35,5,utf8_decode("Nombre Resp."),1,0,"C");
		$this->Cell(25,5,utf8_decode("Técnico"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Medico"),1,0,"C");
		$this->Cell(25,5,utf8_decode("Ayudante"),1,0,"C");
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
include_once("../class/categoria.php");
include_once("../class/tecnico.php");
include_once("../class/medico.php");
include_once("../class/ayudante.php");
$club=new club;
$categoria=new categoria;
$tecnico=new tecnico;
$medico=new medico;
$ayudante=new ayudante;
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$i=0;
foreach($club->mostrarTodo(0) as $c){
	$ca=array_shift($categoria->mostrarTodo(0,"CodCategoria=".$c['CodCategoria']));
	$t=array_shift($tecnico->mostrarTodo(0,"CodTecnico=".$c['CodTecnico']));
	$m=array_shift($medico->mostrarTodo(0,"CodMedico=".$c['CodMedico']));
	$a=array_shift($ayudante->mostrarTodo(0,"CodAyudante=".$c['CodAyudante']));
	$i++;
	$pdf->Cell(10,5,utf8_decode($i));
	$pdf->Cell(30,5,utf8_decode($c["Nombre"]));
	$pdf->Cell(20,5,utf8_decode($c["CantidadJugadores"]),0,"","C");
	$pdf->Cell(25,5,utf8_decode($ca["Nombre"]));
	$pdf->Cell(35,5,utf8_decode($c["NombreResponsable"]));
	$pdf->Cell(25,5,utf8_decode(nombre($t["Nombres"]))." ".$t['Paterno']);
	$pdf->Cell(25,5,utf8_decode(nombre($m["Nombres"])));
	$pdf->Cell(25,5,utf8_decode(nombre($a["Nombres"]))." ".$a['Paterno']);
	$pdf->Ln(5);
}
$pdf->Output();
function nombre($nombre){
	$nom=explode(" ",$nombre);
	return $nom[0];
}
?>
