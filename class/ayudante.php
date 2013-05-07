<?php
include_once("db2.php");
class ayudante extends db{
	var $tabla="ayudante";
	function insertarAyudante($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodAyudante",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodAyudante",0,$cantidad,0,1);
	}
	function actualizarAyudante($values,$CodAyudante){
		$this->updateRow($values,"CodAyudante=$CodAyudante");	
	}
}
?>