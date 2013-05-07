<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/club.php");
	$categoria=$_POST['CodCategoria'];
	$club=new club;
	$clubes=$club->mostrarClubXCategoria($categoria);
	
	?>
    <input type="hidden" name="CodCategoria" value="<?php echo $categoria?>"/>
    <tr class="cabecera"><td>Nº</td><td>Nombre de Club</td><td>PJ</td><td>PTS</td><td>PG</td><td>PE</td><td>PP</td><td>DG</td></tr>
    
	<?php	
	$i=0;
	foreach($clubes as $c){$i++;
		?>
        <tr class="contenido">
        	<td><?php echo $i;?></td>
        	<td><?php echo $c['Nombre'];?><input type="hidden" name="p[<?php echo $i?>][CodClub]" size="3" value="<?php echo $c['CodClub'];?>"></td>
            <td><input type="text" name="p[<?php echo $i?>][pj]" size="3" class="der"></td>
            <td><input type="text" name="p[<?php echo $i?>][pts]" size="3" class="der"></td>
            <td><input type="text" name="p[<?php echo $i?>][pg]" size="3" class="der"></td>
            <td><input type="text" name="p[<?php echo $i?>][pe]" size="3" class="der"></td>
            <td><input type="text" name="p[<?php echo $i?>][pp]" size="3" class="der"></td>
            <td><input type="text" name="p[<?php echo $i?>][dg]" size="3" class="der"></td>
        </tr>
        <?php
	}
	?>
		<tr><td></td><td><input type="submit" value="Guardar" class="corner-all"/></td><td><input type="reset" value="Limpiar" class="corner-all"></td></tr>
	<?php
}
?>
