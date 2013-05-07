<?php
include_once("../../login/check.php");
if(!empty($_GET)){
$folder="../../";
$titulo="Modificar Planilla";
include_once("../../class/fixture.php");
include_once("../../class/club.php");
include_once("../../class/medico.php");
include_once("../../class/jugador.php");
include_once("../../class/planilla.php");
include_once("../../class/planillajugadores.php");
$fixture=new fixture;
$club=new club;
$jugador=new jugador;
$medico=new medico;
$planilla=new planilla;
$planillajug=new planillajugadores;
$cod=$_GET['Cod'];
$f=$fixture->mostrarTodo(0,"CodFixture=$cod");$f=array_shift($f);
$c1=$club->mostrarTodo(0,"CodClub=".$f['CodEquipo1']);$c1=array_shift($c1);
$c2=$club->mostrarTodo(0,"CodClub=".$f['CodEquipo2']);$c2=array_shift($c2);
$p=$planilla->mostrarTodo(0,"CodFixture=".$cod);$p=array_shift($p);
$pj1=$planillajug->mostrarTodo(0,"CodPlanilla=".$p['CodPlanilla']." and Equipo=1");
$pj2=$planillajug->mostrarTodo(0,"CodPlanilla=".$p['CodPlanilla']." and Equipo=2");
?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/campeonato/resultado.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_1 grid_10 suffix_1">
    <form action="guardarmodiplanilla.php" method="post"><input type="hidden" name="CodPlanilla" value="<?php echo $p['CodPlanilla'];?>"/>
    <input type="hidden" name="CodFixture" value="<?php echo $cod;?>"/>
    	<span class="resaltar">Planilla</span>
        <div class="centrar resaltar">Asociación de Futbol</div>
        <table class="tabla">
        	<tr>
            	<td class="resaltar">Presidente Club:</td><td><?php echo $c1['NombreResponsable']?></td>
                <td class="resaltar">Hora:</td><td><?php echo $f['Hora']?></td>
                <td class="resaltar">Presidente Club</td><td><?php echo $c2['NombreResponsable']?></td></tr>
            <tr>
            	<td class="resaltar">Club:</td><td><?php echo $c1['Nombre']?></td>
                <td class="resaltar">Arbitro:</td><td><input type="text" name="arbitro" value="<?php echo $p['Arbitro']?>" size="30" autofocus/></td>
                <td class="resaltar">Club:</td><td><?php echo $c2['Nombre']?></td></tr>
            <tr>
            	<td class="resaltar">Juez de Linea 1:</td><td><input type="text" name="juezlinea1" value="<?php echo $p['JuezLinea1']?>" size="25"/></td>
                <td class="resaltar">Juez de Linea 2:</td><td><input type="text" name="juezlinea2" value="<?php echo $p['JuezLinea2']?>" size="25"/></td>
                <td class="resaltar">Cuarto Arbitro:</td><td><input type="text" name="cuartoarbitro" value="<?php echo $p['CuartoArbitro']?>" size="25" /></td>
            </tr>
            <tr>
            	<td class="resaltar">Capitán:</td><td><select name="capitan1">
				<option value="0" selected="selected">Selecciona Capitán</option>
				<?php foreach($jugador->mostrarTodo(0,"CodClubNuevo=".$c1['CodClub']) as $j){
					?><option value="<?php echo $j['CodJugador']?>" <?php echo $j['CodJugador']==$p['CodCapitan1']?'selected="selected"':'';?>><?php echo $j['Paterno']?> <?php echo $j['Materno']?> <?php echo $j['Nombres']?></option><?php
				}?></select></td>
                <td class="resaltar">Doctor:</td><td><select name="doctor"><option value="0" selected="selected">Selecciona Doctor</option><?php foreach($medico->mostrarTodo(0) as $m){
					?><option value="<?php echo $m['CodMedico']?>" <?php echo $m['CodMedico']==$p['CodMedico']?'selected="selected"':'';?>><?php echo $m['Paterno']?> <?php echo $m['Materno']?> <?php echo $m['Nombres']?></option><?php
				}?></select></td>
                <td class="resaltar">Capitán:</td><td><select name="capitan2"><option value="0" selected="selected">Selecciona Capitán</option><?php foreach($jugador->mostrarTodo(0,"CodClubNuevo=".$c2['CodClub']) as $j){
					?><option value="<?php echo $j['CodJugador']?>" <?php echo $j['CodJugador']==$p['CodCapitan2']?'selected="selected"':'';?>><?php echo $j['Paterno']?> <?php echo $j['Nombres']?></option><?php
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
			$p1=array_shift($pj1);
			$p2=array_shift($pj2);
		?>
        <tr class="contenido">
        	<td class="der"><?php echo $i;?>
            	<input type="hidden" name="jugador1[<?php echo $i;?>][CodPlanillaJugadores]" value="<?php echo $p1['CodPlanillaJugadores']?>"/>
            	<input type="hidden" name="jugador1[<?php echo $i;?>][numero]" value="<?php echo $p1['Numero']==''?$i:$p1['Numero'];?>"/></td>
            <td><select name="jugador1[<?php echo $i;?>][CodJugador]"><option value="0">Selecciona</option><?php foreach($jugador->mostrarTodo(0,"CodClubNuevo=".$c1['CodClub']) as $j){
					?><option value="<?php echo $j['CodJugador']?>" <?php echo $j['CodJugador']==$p1['CodJugador']?'selected="selected"':'';?>><?php echo $j['Paterno']?> <?php echo nombre($j['Nombres'])?></option><?php
				}?></select></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][ta]" value="<?php echo $p1['Ta']?>"/></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][tr]" value="<?php echo $p1['Tr']?>"/></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][g]" value="<?php echo $p1['G']?$p1['G']:'0';?>" class="g1"/></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][cambioE]" value="<?php echo $p1['CambioE']?>"/></td>
            <td><input type="text" size="1" name="jugador1[<?php echo $i;?>][cambioS]" value="<?php echo $p1['CambioS']?>"/></td>
            
            <td class="der"><?php echo $i;?>
            <input type="hidden" name="jugador2[<?php echo $i;?>][CodPlanillaJugadores]" value="<?php echo $p2['CodPlanillaJugadores']?>"/>
            <input type="hidden" name="jugador2[<?php echo $i;?>][numero]" value="<?php echo $p2['Numero']==''?$i:$p2['Numero'];?>"/></td>
            <td><select name="jugador2[<?php echo $i;?>][CodJugador]"><option value="0" selected="selected">Selecciona</option><?php foreach($jugador->mostrarTodo(0,"CodClubNuevo=".$c2['CodClub']) as $j){
					?><option value="<?php echo $j['CodJugador']?>" <?php echo $j['CodJugador']==$p2['CodJugador']?'selected="selected"':'';?>><?php echo $j['Paterno']?> <?php echo nombre($j['Nombres'])?></option><?php
				}?></select></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][ta]" value="<?php echo $p2['Ta']?>"/></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][tr]" value="<?php echo $p2['Tr']?>"/></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][g]" value="<?php echo $p2['G']?$p2['G']:'0';?>" class="g2"/></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][cambioE]" value="<?php echo $p2['CambioE']?>"/></td>
            <td><input type="text" size="1" name="jugador2[<?php echo $i;?>][cambioS]" value="<?php echo $p2['CambioS']?>"/></td>
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
            	<td><textarea name="observacionespartido" rows="4"><?php echo $p['ObservacionesPartido']?></textarea></td>
                <td><textarea name="observacionesarbitro" rows="4"><?php echo $p['ObservacionArbitro']?></textarea></td>
                <td><textarea name="impugnaciones" rows="4"><?php echo $p['Impugnaciones']?></textarea></td>
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