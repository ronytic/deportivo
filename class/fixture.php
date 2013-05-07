<?php
include_once("db2.php");
class fixture extends db{
	var $tabla="fixture";
	function insertarfixture($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodFixture",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodFixture",0,$cantidad,0,1);
	}
	function mostrarFixture($where=''){
		$this->campos=array('Nombre,count(*) as Cantidad');
		$condicion=$where?$where.' and ':'';
		return $this->getRecords($condicion."Activo=1",0,"Nombre");
	}
	function mostrarFixtureNombres(){
		$this->campos=array('DISTINCT(Nombre)');
		return $this->getRecords("Activo=1");
	}
	function mostrarFixtureXNombre($Nombre){
		$this->campos=array('*');
		return $this->getRecords("Nombre='$Nombre' and Activo=1");
	}
	function actualizarFixture($values,$CodFixture){
		$this->updateRow($values,"CodFixture=$CodFixture");	
	}
	function actualizarFixtureNombre($values,$CodFixture){
		$this->updateRow($values,"Nombre='$CodFixture'");	
	}	
}
?>