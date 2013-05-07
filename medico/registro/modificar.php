<?php
include_once("../../login/check.php");
$folder="../../";
$cod=$_GET['Cod'];
$titulo="Modificar Informe Médico";
include_once("../../class/informemedico.php");
include_once("../../class/jugador.php");
$jugador=new jugador;
$informemedico=new informemedico;
$inf=$informemedico->mostrarTodo(0,"CodInformeMedico=$cod");
$inf=array_shift($inf);
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/alquiler/alquiler.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Modificar Informe Médico</div>
    	<div class="cuerpo">
    	<form action="guardarinforme.php" method="post"><input type="hidden" value="<?php echo $cod?>" name="Cod" />
        	<table>
                <tr><td>Nombre Jugador:</td><td><select name="CodJugador"><?php foreach($jugador->mostrarTodo() as $jug){}
												?><option value="<?php echo $jug['CodJugador']?>" <?php echo $inf['CodJugador']==$jug['CodJugador']?'selected="selected"':'';?></option><?php echo $jug['Paterno']." ".$jug['Materno']." ".$jug['Nombres']?></option><?php
											?></select></td></tr>
                <tr><td>Peso:</td><td><input type="number" name="peso" step="0.1" min="50" value="<?php echo $inf['Peso']?>"/> Kg.</td></tr>
                <tr><td>Estatura:</td><td><input type="number" name="estatura" min="1"  max="3" step="0.01" value="<?php echo $inf['Estatura']?>"/>m.</td></tr>
                <tr><td>Presión:</td><td><input type="text" name="presion" value="<?php echo $inf['Presion']?>"/></td></tr>
                <tr><td>Tipo de Sangre:</td><td><select name="tiposangre">
                		<option <?php echo $inf['TipoSangre']=='O POSITIVO (+)'?'selected':'';?>>O POSITIVO (+)</option>
                        <option <?php echo $inf['TipoSangre']=='A POSITIVO (+)'?'selected':'';?>>A POSITIVO (+)</option>
                        <option <?php echo $inf['TipoSangre']=='O NEGATIVO (-)'?'selected':'';?>>O NEGATIVO (-)</option>
                        <option <?php echo $inf['TipoSangre']=='B POSITIVO (+)'?'selected':'';?>>B POSITIVO (+)</option>
                        <option <?php echo $inf['TipoSangre']=='AB NEGATIVO (-)'?'selected':'';?>>AB NEGATIVO (-)</option>
                        <option <?php echo $inf['TipoSangre']=='A NEGATIVO (-'?'selected':'';?>>A NEGATIVO (-)</option>
                        <option <?php echo $inf['TipoSangre']=='AB POSITIVO (+)'?'selected':'';?>>AB POSITIVO (+)</option>
                        <option <?php echo $inf['TipoSangre']=='B NEGATIVO (-)'?'selected':'';?>>B NEGATIVO (-)</option>
                        </select></td></tr>
                <tr><td>Accidente:</td><td><input type="text" name="accidentes" value="<?php echo $inf['Accidentes']?>"/></td></tr>
                <tr><td>Enfermedades:</td><td><input type="text" name="enfermedades" value="<?php echo $inf['Enfermedades']?>"/></td></tr>
                <tr><td>Hábil</td><td><select name="habil"><option value="1" <?php echo $inf['Habil']==1?'selected="selected"':'';?>>Si</option><option value="0" <?php echo $inf['Habil']==0?'selected="selected"':'';?>>No</option></select></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>