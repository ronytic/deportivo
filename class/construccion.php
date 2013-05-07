<?php
include_once("db2.php");
class construccion extends db{
	var $tabla="construccion";
	function insertarConstruccion($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodConstruccion",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodConstruccion",0,$cantidad,0,1);
	}
	function mostrarConstruccionXNombre($Nombre){
		$this->campos=array('*');
		return $this->getRecords("Nombre='$Nombre' and Activo=1");
	}
	function actualizarConstruccion($values,$Cod){
		$this->updateRow($values,$Cod);	
	}
}
?>