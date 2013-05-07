<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Construcción";
include_once("../../class/construccion.php");
$Cod=$_GET['Cod'];
$contruccion=new construccion;
$con=$contruccion->mostrarTodo(0,"CodConstruccion=$Cod");
$con=array_shift($con);
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/alquiler/construccion.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Modificar Construcción</div>
    	<div class="cuerpo">
    	<form action="guardarconstruccion.php" method="post"><input type="hidden" name="Cod" value="<?php echo $Cod?>"/>
        	<table>
                <tr><td>Nombre de la Construcción:</td><td><input type="text" name="nombreconstruccion" required value="<?php echo $con['Nombre']?>"/></td></tr>
                <tr><td>Dirección:</td><td><input type="text" name="direccion" required value="<?php echo $con['Direccion']?>"/></td></tr>
                <tr><td>Financiamiento:</td><td><input type="text" name="financiamiento" value="<?php echo $con['Financiamiento']?>"/></td></tr>
                <tr><td>Fecha Inicio:</td><td><input type="text" name="fechainicio" class="fecha" required value="<?php echo $con['FechaInicio']?>"/></td></tr>
                <tr><td>Fecha Final:</td><td><input type="text" name="fechafinal" class="fecha" required value="<?php echo $con['FechaFinal']?>"/></td></tr>

                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>