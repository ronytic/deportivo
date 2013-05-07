<?php
include_once("../../login/check.php");
$folder="../";

$categoria=$_POST['categoria'];

include_once("../../class/club.php");
include_once("../../class/puntaje.php");
$puntaje=new puntaje;
$club=new club;

?>
            <tr class="cabecera">
                	<td>Nº</td>
                    <td>Nombre Fixture</td>
                </tr>
            <?php
			$i=0;
            foreach($puntaje->mostrarPuntajesNombres("CodCategoria=$categoria") as $al){$i++;
				
				//$c1=array_shift($club->mostrarTodo(0,"CodClub=".$al['CodClub']));
				//$c2=array_shift($club->mostrarTodo(0,"CodClub=".$al['CodEquipo2']));
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombre']?></td>
                    <td class="der"><?php echo $al['Cantidad']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodClub']?>">Modificar</a>
                        <a href="../../reportes/puntajes.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all" rel="<?php echo $al['CodClub']?>">Impresión</a>
                        <a href="eliminar.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodClub']?>">Eliminar</a>
                    </td>
                </tr>
                <?php	
			}
			?>