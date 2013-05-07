<?php
include_once("db2.php");
class jugador extends db{
	var $tabla="jugador";
	function insertarJugador($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		//echo $condicion." | ";
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodJugador",0,0,0,1);
		else
			return $this->getRecords($condicion."Activo=1","CodJugador",0,$cantidad,0,1);
	}
	function actualizarJugador($values,$CodJugador){
		$this->updateRow($values,"CodJugador=$CodJugador");	
	}
}
?>