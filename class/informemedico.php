<?php
include_once("db2.php");
class informemedico extends db{
	var $tabla="informemedico";
	function insertarInformeMedico($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodInformeMedico",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodInformeMedico",0,$cantidad,0,1);
	}
	function mostrarInformeNombres(){
		$this->campos=array('DISTINCT(Nombre)');
		return $this->getRecords("Activo=1");
	}
	function mostrarInformeMediXNombre($Nombre){
		$this->campos=array('*');
		return $this->getRecords("Nombre='$Nombre' and Activo=1");
	}
	function actualizarInformeMedico($values,$CodInformeMedico){
		$this->updateRow($values,"CodInformeMedico=$CodInformeMedico");	
	}
}
?>