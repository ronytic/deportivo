<?php
include_once("../login/check.php");
$folder="../";
$titulo="Modificar Categoria";
$cod=$_GET['Cod'];
include_once("../class/categoria.php");
$categoria=new categoria;
$c=$categoria->mostrarTodo(0,"CodCategoria=$cod");
$c=array_shift($c);
?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/medico/personal.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	<div class="titulo">Modificar Datos de la Categoria</div>
    	<div class="cuerpo">
    	<form action="guardarcategoria.php" method="post"><input type="hidden" name="Cod" value="<?php echo $cod;?>" />
        	<table>
            	<tr><td>Nombre Categoria:</td><td><input type="text" name="nombre" required value="<?php echo $c['Nombre']?>"/></td></tr>
                <tr><td>Observación:</td><td><textarea name="observaciones" rows="10"><?php echo $c['Observaciones']?></textarea></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>