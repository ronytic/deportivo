<?php
include_once("db2.php");
class categoria extends db{
	var $tabla="categoria";
	function insertarCategoria($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodCategoria",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodCategoria",0,$cantidad,0,1);
	}
	function actualizarCategoria($values,$CodCategoria){
		$this->updateRow($values,"CodCategoria=$CodCategoria");	
	}
}
?>