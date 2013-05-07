<?php
include_once("db2.php");
class alquiler extends db{
	var $tabla="alquiler";
	function insertarAlquiler($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodAlquiler",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodAlquiler",0,$cantidad,0,1);
	}
	function mostrarAlquilerXNombre($Nombre){
		$this->campos=array('*');
		return $this->getRecords("Nombre='$Nombre' and Activo=1");
	}
	function actualizarAlquiler($values,$CodAlquiler){
		$this->updateRow($values,"CodAlquiler=$CodAlquiler");	
	}
}
?>