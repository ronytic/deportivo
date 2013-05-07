<?php
include_once("../../login/check.php");
if(!empty($_GET)){
$folder="../../";
$titulo="Registrar Nueva Planilla";
include_once("../../class/fixture.php");
include_once("../../class/club.php");
include_once("../../class/medico.php");
include_once("../../class/jugador.php");
$fixture=new fixture;
$club=new club;
$jugador=new jugador;
$medico=new medico;
$cod=$_GET['Cod'];
$f=$fixture->mostrarTodo(0,"CodFixture=$cod");$f=array_shift($f);
$c1=$club->mostrarTodo(0,"CodClub=".$f['CodEquipo1']);$c1=array_shift($c1);
$c2=$club->mostrarTodo(0,"CodClub=".$f['CodEquipo2']);$c2=array_shift($c2);

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/campeonato/resultado.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_1 grid_10 suffix_1">
    <form action="guardarplanilla.php" method="post"><input type="hidden" name="CodFixture" value="<?php echo $cod;?>"/>
    	<span class="resaltar">Planilla</span>
        <div class="centrar resaltar">Asociación de Futbol</div>
        <table class="tabla">
        	<tr>
            	<td class="resaltar">Presidente Club:</td><td><?php echo $c1['NombreResponsable']?></td>
                <td class="resaltar">Hora:</td><td><?php echo $f['Hora']?></td>
                <td class="resaltar">Presidente Club</td><td><?php echo $c2['NombreResponsable']?></td></tr>
            <tr>
            	<td class="resaltar">Club:</td><td><?php echo $c1['Nombre']?></td>
                <td class="resaltar">Arbitro:</td><td><input type="text" name="arbitro" value="" size="30" autofocus required/></td>
                <td class="resaltar">Club:</td><td><?php echo $c2['Nombre']?></td></tr>
            <tr>
            	<td class="resaltar">Juez de Linea 1:</td><td><input type="text" name="juezlinea1" value="" size="25"/></td>
                <td class="resaltar">Juez de Linea 2:</td><td><input type="text" name="juezlinea2" value="" size="25"/></td>
                <td class="resaltar">Cuarto Arbitro:</td><td><input type="text" name="cuartoarbitro" value="" size="25" /></td>
            </tr>
            <tr>
            
            	<td class="resaltar">Capitán:</td><td><select name="capitan1">
				<option value="0" selected="selected">Selecciona Capitán</option>
				<?php foreach($jugador->mostrarTodo(0,"CodClubNuevo=".$c1['CodClub']) as $j){
					?><option value="<?php echo $j['CodJugador']?>"><?php echo $j['Paterno']?> <?php echo $j['Materno']?> <?php echo $j['Nombres']?></option><?php
				}?></select></td>
                <td class="resaltar">Doctor:</td><td><select name="doctor"><option value="0" selected="selected">Selecciona Doctor</option><?php foreach($medico->mostrarTodo(0) as $m){
					?><option value="<?php echo $m['CodMedico']?>"><?php echo $m['Paterno']?> <?php echo $m['Materno']?> <?php echo $m['Nombres']?></option><?php
				}?></select></td>
                <td class="resaltar">Capitán:</td><td><select name="capitan2"><option value="0" selected="selected">Selecciona Capitán</option><?php foreach($jugador->mostrarTodo(0,"CodClubNuevo=".$c2['CodClub']) as $j){
					?><option value="<?php echo $j['CodJugador']?>"><?php echo $j['Paterno']?> <?php echo $j['Nombres']?></option><?php
				}?></select></td></tr>
            <tr>
            	<td></td><td></td>
                <td class="resaltar">Campo Deportivo:</td><td><?php echo $f['Lugar']?></td>
                <td></td><td></td></tr>
        </table>
        <table class="tabla">
        <tr class="cabecera"><td>Nº</td><td>Jugador</td><td>TA</td><td>TR</td><td>G</td><td>Cambio Entra</td><td>Cambio Sale</td><td>Nº</td><td>Jugador</td><td>TA</td><td>TR</td><td>G</td><td>Cambio Entra</td><td>Cambio Sale</td></tr>
        <?php
        for($i=1;$i<=15;$i++){
		?>
        <tr class="contenido">
        	<td class="der"><?php echo $i;?><input type="hidden" name="jugador1[<?php echo $i;?>][numero]" value="<?php echo $i;?>"/></td>
            <td><select name="jugador1[<?php echo $i;?>][CodJugador]"><option value="0" selected="selected">Selecciona</option><?php foreach($jugador->mostrarTodo(0,"CodClubNuevo=".$c1['CodClub']) as $j){
					?><option value="<?php echo $j['CodJugador']?>"><?php echo $j['Paterno']?> <?php echo nombre($j['Nombres'])?></option><?php
				}?></select></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][ta]"/></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][tr]"/></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][g]" class="g1 centrar" value="0"/></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][cambioE]"/></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][cambioS]"/></td>
            <td class="der"><?php echo $i;?><input type="hidden" name="jugador2[<?php echo $i;?>][numero]" value="<?php echo $i;?>"/></td>
            <td><select name="jugador2[<?php echo $i;?>][CodJugador]"><option value="0" selected="selected">Selecciona</option><?php foreach($jugador->mostrarTodo(0,"CodClubNuevo=".$c2['CodClub']) as $j){
					?><option value="<?php echo $j['CodJugador']?>"><?php echo $j['Paterno']?> <?php echo nombre($j['Nombres'])?></option><?php
				}?></select></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][ta]"/></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][tr]"/></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][g]" class="g2 centrar" value="0"/></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][cambioE]"/></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][cambioS]"/></td>
        </tr>
        <?php	
		}
		?>
        <tr>
        	<td colspan="2">Jugador Destacado 1</td><td colspan="5"><input type="text" name="jugadordestacado1" value="<?php echo $p['JugadorDestacado1']?>" size="35"/></td>
            <td colspan="2">Jugador Destacado 2</td><td colspan="5"><input type="text" name="jugadordestacado2" value="<?php echo $p['JugadorDestacado2']?>" size="35"/></td>
        </tr>
        </table>
      <table class="tabla">
       	<tr class="cabecera"><td>Observaciones del Partido</td><td>Observacion del Arbitro</td><td>Impugnaciones</td><td><?php echo $c1['Nombre']?></td><td><?php echo $c2['Nombre']?></td></tr>
        	<tr class="contenido">
            	<td><textarea name="observacionespartido" rows="4" required></textarea></td>
                <td><textarea name="observacionesarbitro" rows="4" required></textarea></td>
                <td><textarea name="impugnaciones" rows="4"></textarea></td>
                <td style="vertical-align:top"><input type="text" value="<?php echo $f['Resultado1']?>" size="4" readonly class="centrar" name="r1" id="r1"/></td>
                <td style="vertical-align:top"><input type="text" value="<?php echo $f['Resultado2']?>" size="4" readonly class="centrar" name="r2" id="r2"/></td>
            </tr>
        </table>
        <table>
        	<tr><td><input type="submit" value="Guardar" class="corner-all"/></td></tr>
        </table>
        </form>
	</div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");}?>
<?php
function nombre($nombre){
	$nom=explode(" ",$nombre);
	return $nom[0];
}
?>