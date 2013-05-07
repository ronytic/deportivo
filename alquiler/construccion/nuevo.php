<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registrar Nueva Construcción";
include_once("../../class/club.php");

$club=new club;

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/alquiler/construccion.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Registrar Nueva Construcción</div>
    	<div class="cuerpo">
    	<form action="registrarconstruccion.php" method="post">
        	<table>
                <tr><td>Nombre de la Construcción:</td><td><input type="text" name="nombreconstruccion" required/></td></tr>
                <tr><td>Dirección:</td><td><input type="text" name="direccion" required/></td></tr>
                <tr><td>Financiamiento:</td><td><input type="text" name="financiamiento" /></td></tr>
                <tr><td>Fecha Inicio:</td><td><input type="text" name="fechainicio" class="fecha" required/></td></tr>
                <tr><td>Fecha Final:</td><td><input type="text" name="fechafinal" class="fecha" required/></td></tr>

                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>