<?php
include_once("db2.php");
class planillajugadores extends db{
	var $tabla="planillajugadores";
	function insertarPlanilla($Values){
		$this->insertRow($Values,1);
	}
	function mostrarTodo($cantidad=0,$where=''){
		$this->campos=array('*');
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."Activo=1","CodPlanillaJugadores",0,0,0);
		else
			return $this->getRecords($condicion."Activo=1","CodPlanillaJugadores",0,$cantidad,0);
	}
	function actualizarJugadores($values,$Cod){
		$this->updateRow($values,"CodPlanillaJugadores=$Cod");	
	}
	function estadisticaGoles($codjugador){
		$this->campos=array('CodJugador,sum(G) as CantidadGoles');
		return $this->getRecords("CodJugador IN ($codjugador) and Activo=1","Sum(G)","CodJugador",0,0,1);
	}
}
?>