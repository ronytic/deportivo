<?php
include_once("db2.php");
class encargado extends db{
	var $tabla="encargado";
	function insertarEncargado($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodEncargado",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodEncargado",0,$cantidad,0,1);
	}
	function actualizarEncargado($values,$CodEncargado){
		$this->updateRow($values,"CodEncargado=$CodEncargado");	
	}
}
?>