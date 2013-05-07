<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/fixture.php");
	include_once("../../class/club.php");
	include_once("../../class/planilla.php");
	$Nombre=$_POST['Nombre'];
	$fixture=new fixture;
	$club=new club;
	$planilla=new planilla;
	?>
    <tr class="cabecera"><td>Fecha</td><td>Hora</td><td>Lugar</td><td>Equipo 1</td><td>Resultado 1</td><td>Vs</td><td>Equipo 2</td><td>Resultado 2</td></tr>
    
	<?php	
	$i=0;
	foreach($fixture->mostrarFixtureXNombre($Nombre) as $fix){$i++;
		$c1=$club->mostrarClubWhere("CodClub=".$fix['CodEquipo1']);
		$c1=array_shift($c1);
		$c2=$club->mostrarClubWhere("CodClub=".$fix['CodEquipo2']);
		$c2=array_shift($c2);
		$p=array_shift($planilla->mostrarTodo(0,"CodFixture=".$fix['CodFixture']));
		
		?>
        <tr class="contenido">
        	<td class="der"><?php echo $fix['Fecha']?></td>
            <td class="centrar"><?php echo $fix['Hora']?></td>
            <td><?php echo $fix['Lugar']?></td>
            <td><?php echo $c1['Nombre']?></td>
            <td class="der"><?php echo $fix['Resultado1']?></td>
            <td><input type="hidden" name="f[<?php echo $i;?>][CodFixture]" value="<?php echo $fix['CodFixture']?>"/>Vs</td>
            <td><?php echo $c2['Nombre']?></td>
            <td class="der"><?php echo $fix['Resultado2']?></td>
            <td><?php if($fix['CodFixture']==$p['CodFixture']){?>
            
            	<a href="modificarplanilla.php?Cod=<?php echo $fix['CodFixture']?>" class="botonSec">Modificar Planilla</a>
                <a href="../../reportes/planilla.php?Cod=<?php echo $fix['CodFixture']?>" class="botonSec">Impresión Planilla</a>
                <?php
				}else{
				?>
                <a href="planilla.php?Cod=<?php echo $fix['CodFixture']?>" class="botonSec">Abrir Planilla</a>
                <?php		
				}
				?>
            </td>
        </tr>
        <?php
	}
	?>
		
	<?php
}
?>
