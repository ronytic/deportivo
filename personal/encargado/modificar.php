<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Datos Encargado";
$cod=$_GET['Cod'];
include_once("../../class/encargado.php");
$encargado=new encargado;
$e=$encargado->mostrarTodo(0,"CodEncargado=$cod");
$e=array_shift($e);
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/personal/encargado.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	<div class="titulo">Modificar Datos del Encargado</div>
    	<div class="cuerpo">
    	<form action="guardarempleado.php" method="post"><input type="hidden" name="Cod" value="<?php echo $cod;?>"/>
        	<table>
            	<tr><td>Nombres:</td><td><input type="text" name="nombres" required value="<?php echo $e['Nombres']?>"/></td></tr>
                <tr><td>Paterno:</td><td><input type="text" name="paterno" required value="<?php echo $e['Paterno']?>"/></td></tr>
                <tr><td>Materno:</td><td><input type="text" name="materno" required value="<?php echo $e['Materno']?>"/></td></tr>
                <tr><td>Fecha Nacimiento:</td><td><input type="text" name="fechaNac" required value="<?php echo $e['FechaNac']?>"/></td></tr>
                <tr><td>C.I.:</td><td><input type="text" name="ci" required value="<?php echo $e['Ci']?>"/></td></tr>
                <tr><td>Dirección Domicilio:</td><td><input type="text" name="direccion" required value="<?php echo $e['Direccion']?>"/></td></tr>
                <tr><td>Cargo:</td><td><input type="text" name="cargo" required value="<?php echo $e['Cargo']?>"/></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>