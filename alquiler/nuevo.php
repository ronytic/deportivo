<?php
include_once("../login/check.php");
$folder="../";
$titulo="Registrar Nuevo Alquiler";
?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/alquiler/alquiler.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Registrar Nuevo Alquiler</div>
    	<div class="cuerpo">
    	<form action="registraralquiler.php" method="post">
        	<table>
                <tr><td>Fecha:</td><td><input type="text" name="fecha" class="fecha" required autocomplete="off"/></td></tr>
                <tr><td>Hora:</td><td><input type="text" name="hora" required/></td></tr>
                <tr><td>Nombre Cliente:</td><td><input type="text" name="nombrecliente" required/></td></tr>
                <tr><td>Monto:</td><td><input type="text" name="monto" required/></td></tr>
                <tr><td>Observaciones:</td><td><textarea name="observaciones" ></textarea></td></tr>
                <tr><td>Tipo Alquiler:</td><td><input type="text" name="tipo" required/></td></tr>
                <tr><td>Nombre Responsable:</td><td><input type="text" name="nombreresponsable" required/></td></tr>
                <tr><td>Estado:</td><td><select name="estado"><option value="1">Pendiente para alquilar</option><option value="0">Alquiler Terminado</option></select></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>