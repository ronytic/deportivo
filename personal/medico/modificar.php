<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/medico.php");
$titulo="Modificar Médico";
$medico=new medico;
$Cod=$_GET['Cod'];
$m=$medico->mostrarTodo(0,"CodMedico=$Cod");
$m=array_shift($m);
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/personal/medico.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	<div class="titulo">Modificar Datos del Médico</div>
    	<div class="cuerpo">
    	<form action="guardarmedico.php" method="post"><input type="hidden" name="Cod" value="<?php echo $Cod;?>"/>
        	<table>
            	<tr><td>Nombres:</td><td><input type="text" name="nombres" required value="<?php echo $m['Nombres'];?>"/></td></tr>
                <tr><td>Paterno:</td><td><input type="text" name="paterno" required value="<?php echo $m['Paterno'];?>"/></td></tr>
                <tr><td>Materno:</td><td><input type="text" name="materno" required value="<?php echo $m['Materno'];?>"/></td></tr>
                <tr><td>Fecha Nacimiento:</td><td><input type="text" name="fechaNac" required value="<?php echo $m['FechaNac'];?>"/></td></tr>
                <tr><td>C.I.:</td><td><input type="text" name="ci" required value="<?php echo $m['Ci'];?>"/></td></tr>
                <tr><td>Dirección Domicilio:</td><td><input type="text" name="direccion" required value="<?php echo $m['Direccion'];?>"/></td></tr>
                <tr><td>Especialidad:</td><td><input type="text" name="cargo" required value="<?php echo $m['Especialidad'];?>"/></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>