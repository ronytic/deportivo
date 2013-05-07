<?php
include_once("db2.php");
class club extends db{
	var $tabla="club";
	function insertarClub($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodClub",0,0,0);
		else
			return $this->getRecords($condicion."Activo=1","CodClub",0,$cantidad,0);
	}
	function mostrarClubWhere($Where){
		$this->campos=array('*');
		return $this->getRecords($Where." and Activo=1");
	}
	function mostrarClubXCategoria($CodCategoria){
		$this->campos=array('*');
		return $this->getRecords("CodCategoria=$CodCategoria and Activo=1");
	}
	function actualizarClub($values,$CodClub){
		$this->updateRow($values,"CodClub=$CodClub");	
	}
}
?>