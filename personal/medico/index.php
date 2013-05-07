<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registrar Nuevo Médico";
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/personal/medico.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	<div class="titulo">Datos del Médico</div>
    	<div class="cuerpo">
    	<form action="registrarmedico.php" method="post">
        	<table>
            	<tr><td>Nombres:</td><td><input type="text" name="nombres" required/></td></tr>
                <tr><td>Paterno:</td><td><input type="text" name="paterno" required/></td></tr>
                <tr><td>Materno:</td><td><input type="text" name="materno" required/></td></tr>
                <tr><td>Fecha Nacimiento:</td><td><input type="text" name="fechaNac" required/></td></tr>
                <tr><td>C.I.:</td><td><input type="text" name="ci" required/></td></tr>
                <tr><td>Dirección Domicilio:</td><td><input type="text" name="direccion" required/></td></tr>
                <tr><td>Especialidad:</td><td><input type="text" name="cargo" required/></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>