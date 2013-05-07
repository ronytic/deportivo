<?php
include_once("../../login/check.php");
$folder="../../";
$cod=$_GET['Cod'];
$titulo="Modificar Tabla de Puntuaciones";
include_once("../../class/club.php");
include_once("../../class/puntaje.php");
$club=new club;
$puntaje=new puntaje;
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/campeonato/puntajes.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_1 grid_10 suffix_1">
    	<div class="titulo">Modificar Tabla de Puntuaciones</div>
    	<div class="cuerpo">
        
    	<form action="guardarpuntajes.php" method="post">
        	<table>
				<tr ><td>Nombre de Tabla de Puntuaciones:</td><td><input type="text" name="nombre" readonly="readonly" value="<?php echo $cod;?>"/></td></tr>
            </table>
            <table id="continuar" class="tabla">
    <tr class="cabecera"><td>Nº</td><td>Nombre de Club</td><td>PJ</td><td>PTS</td><td>PG</td><td>PE</td><td>PP</td><td>DG</td></tr>
    
	<?php	
	$i=0;
	foreach($puntaje->mostrarTodo(0,"Nombre='".$cod."'") as $p){$i++;
		$c=array_shift($club->mostrarTodo(0,"CodClub=".$p['CodClub']));
		?>
        <tr class="contenido">
        	<td><?php echo $i;?></td>
        	<td><input type="hidden" name="p[<?php echo $i?>][CodPuntaje]" class="der" value="<?php echo $p['CodPuntaje']?>"><?php echo $c['Nombre'];?><input type="hidden" name="p[<?php echo $i?>][CodClub]" size="3" value="<?php echo $c['CodClub'];?>"></td>
            <td><input type="text" name="p[<?php echo $i?>][pj]" size="3" class="der" value="<?php echo $p['PJ']?>"></td>
            <td><input type="text" name="p[<?php echo $i?>][pts]" size="3" class="der" value="<?php echo $p['PTS']?>"></td>
            <td><input type="text" name="p[<?php echo $i?>][pg]" size="3" class="der" value="<?php echo $p['PG']?>"></td>
            <td><input type="text" name="p[<?php echo $i?>][pe]" size="3" class="der" value="<?php echo $p['PE']?>"></td>
            <td><input type="text" name="p[<?php echo $i?>][pp]" size="3" class="der" value="<?php echo $p['PP']?>"></td>
            <td><input type="text" name="p[<?php echo $i?>][dg]" size="3" class="der" value="<?php echo $p['DG']?>"></td>
        </tr>
        <?php
	}
	?>
		<tr><td></td><td><input type="submit" value="Guardar" class="corner-all"/></td><td><input type="reset" value="Limpiar" class="corner-all"></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>