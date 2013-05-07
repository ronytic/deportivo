<?php
include_once("db2.php");
class medico extends db{
	var $tabla="medico";
	function insertarMedico($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where='',$ordenamiento="CodMedico"){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1",$ordenamiento,0,0,0);
		else
			return $this->getRecords($condicion."Activo=1",$ordenamiento,0,$cantidad,0);
	}
	function actualizarMedico($values,$Cod){
		$this->updateRow($values,"CodMedico=$Cod");
	}
}
?>