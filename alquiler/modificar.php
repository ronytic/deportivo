<?php
include_once("../login/check.php");
$folder="../";
$titulo="Modificar Alquiler";
if(!empty($_GET)){
	$Cod=$_GET['Cod'];
	include_once("../class/alquiler.php");
	$alquiler=new alquiler;
	$al=$alquiler->mostrarTodo(0,"CodAlquiler=$Cod");
	$al=array_shift($al);
?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/alquiler/alquiler.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Modificar Alquiler</div>
    	<div class="cuerpo">
    	<form action="guardaralquiler.php" method="post"><input type="hidden" name="Cod" value="<?php echo $Cod?>" />
        	<table>
                <tr><td>Fecha:</td><td><input type="text" name="fecha" class="fecha" required autocomplete="off" value="<?php echo $al['Fecha']?>"/></td></tr>
                <tr><td>Hora:</td><td><input type="text" name="hora" required value="<?php echo $al['Hora']?>"/></td></tr>
                <tr><td>Nombre Cliente:</td><td><input type="text" name="nombrecliente" required value="<?php echo $al['NombreCliente']?>"/></td></tr>
                <tr><td>Monto:</td><td><input type="text" name="monto" required value="<?php echo $al['Monto']?>"/></td></tr>
                <tr><td>Observaciones:</td><td><textarea name="observaciones" ><?php echo $al['Observaciones']?></textarea></td></tr>
                <tr><td>Tipo Alquiler:</td><td><input type="text" name="tipo" required value="<?php echo $al['Tipo']?>"/></td></tr>
                <tr><td>Nombre Responsable:</td><td><input type="text" name="nombreresponsable" required value="<?php echo $al['NombreResponsable']?>"/></td></tr>
                <tr><td>Estado:</td><td><select name="estado"><option value="1" <?php echo $al['Estado']?'selected="selected"':'';?>>Pendiente para alquilar</option><option value="0" <?php echo !$al['Estado']?'selected="selected"':'';?>>Alquiler Terminado</option></select></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");}?>