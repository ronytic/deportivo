<?php
include_once("db2.php");
class planilla extends db{
	var $tabla="planilla";
	function insertarPlanilla($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodPlanilla",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodPlanilla",0,$cantidad,0,1);
	}
	function actualizarPlanilla($values,$Cod){
		$this->updateRow($values,"CodPlanilla=$Cod");	
	}
}
?>