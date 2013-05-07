<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registrar Nuevo Informe Médico";
include_once("../../class/club.php");
include_once("../../class/jugador.php");
$jugador=new jugador;
$Cod=$_GET['Cod'];
$jug=$jugador->mostrarTodo(0,"CodJugador=$Cod");$jug=array_shift($jug);
?>
<?php include_once("../../cabecerahtml.php");?>

</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Registrar Nuevo Informe Médico</div>
    	<div class="cuerpo">
    	<form action="registrarinforme.php" method="post">
        	<input type="hidden" name="CodJugador" value="<?php echo $Cod;?>"/>
        	<table>
                <tr><td>Nombre Jugador:</td><td><input type="text" value="<?php echo $jug['Paterno']." ".$jug['Materno']." ".$jug['Nombres']?>" size="50" readonly/></td></tr>
                <tr><td>Peso:</td><td><input type="number" step="0.1" min="50" value="50" name="peso" autofocus/> Kg.</td></tr>
                <tr><td>Estatura:</td><td><input type="number" min="1"  max="3" step="0.01" value="1" name="estatura"/> m.</td></tr>
                <tr><td>Presión:</td><td><input type="text" name="presion"/></td></tr>
                <tr><td>Tipo de Sangre:</td><td><select name="tiposangre"><option>O POSITIVO (+)</option><option>A POSITIVO (+)</option><option>O NEGATIVO (-)</option><option>B POSITIVO (+)</option><option>AB NEGATIVO (-)</option><option>A NEGATIVO (-)</option><option>AB POSITIVO (+)</option><option>B NEGATIVO (-)</option></select></td></tr>
                <tr><td>Accidente:</td><td><input type="text" name="accidentes"/></td></tr>
                <tr><td>Enfermedades:</td><td><input type="text" name="enfermedades"/></td></tr>
                <tr><td>Hábil</td><td><select name="habil"><option value="1">Si</option><option value="0">No</option></select></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>