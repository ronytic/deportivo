<?php
include_once("db2.php");
class tecnico extends db{
	var $tabla="tecnico";
	function insertarTecnico($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodTecnico",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodTecnico",0,$cantidad,0,1);
	}
	function actualizarTecnico($values,$Cod){
		$this->updateRow($values,"CodTecnico=$Cod");	
	}
}
?>