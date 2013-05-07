<?php
include_once("../login/check.php");
if(isset($_POST)){
	include_once("../class/jugador.php");
	$jugador=new jugador;
	$ci=$_POST['ci'];
	$j=$jugador->mostrarTodo(0," Ci='$ci'");
	if(count($j)){
		echo "Ya se encuentra registrado el jugador, con este Carnet de Identidad";	
	}else{
		//echo "todo bien";	
	}
}
?>