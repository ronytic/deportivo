<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/club.php");
	$categoria=$_POST['CodCategoria'];
	$club=new club;
	$clubes=$club->mostrarClubXCategoria($categoria);
	
	?>
    <tr class="cabecera"><td>Fecha</td><td>Hora</td><td>Lugar</td><td>Equipo 1</td><td>Vs</td><td>Equipo 2</td></tr>
    
	<?php	
	for($i=1;$i<=count($clubes);$i++){
		?>
        <tr class="contenido">
        	<td><input type="text" name="f[<?php echo $i?>][fecha]" class="fecha" size="10"></td>
            <td><input type="text" name="f[<?php echo $i?>][hora]" class="hora" size="8"></td>
            <td><input type="text" name="f[<?php echo $i?>][lugar]" size="15"></td>
            <td><select name="f[<?php echo $i?>][equipo1]">
            	<option value="0">Ningún Partido</option>
            	<?php foreach($clubes as $c){
					?><option value="<?php echo $c['CodClub']?>"><?php echo $c['Nombre']?></option><?php	
				}?>
            	</select></td>
            <td>Vs</td>
            <td><select name="f[<?php echo $i?>][equipo2]">
		        <option value="0">Ningún Partido</option>
            	<?php foreach($clubes as $c){
					?><option value="<?php echo $c['CodClub']?>"><?php echo $c['Nombre']?></option><?php	
				}?>
            	</select></td>
        </tr>
        <?php
	}
	?>
		<tr><td></td><td><input type="submit" value="Guardar" class="corner-all"/></td><td><input type="reset" value="Limpiar" class="corner-all"></td></tr>
	<?php
}
?>
