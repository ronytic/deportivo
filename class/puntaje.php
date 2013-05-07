<?php
include_once("db2.php");
class puntaje extends db{
	var $tabla="puntaje";
	function insertarPuntaje($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodPuntaje",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodPuntaje",0,$cantidad,0,1);
	}
	function mostrarPuntajesNombres($categoria=""){
		$condicion=$categoria?$categoria.' and ':'';
		$this->campos=array('DISTINCT(Nombre)');
		return $this->getRecords($condicion."Activo=1");
	}
	function mostrarPuntajesXNombre($Nombre,$equipo=''){
		$this->campos=array('*');
		$condicion=$equipo?$where.' and ':'';
		return $this->getRecords("Nombre='$Nombre' and Activo=1");
	}
	function estadisticaPuntaje($CodCategoria){
		$this->campos=array('*');
		return $this->getRecords("CodCategoria=$CodCategoria and Activo=1",0,"CodClub",0,0);
	}
	function actualizarPuntaje($values,$CodPuntaje){
		$this->updateRow($values,"CodPuntaje=$CodPuntaje");	
	}
	function actualizarPuntajeNombre($values,$CodPuntaje){
		$this->updateRow($values,"Nombre='$CodPuntaje'");	
	}
}
?>