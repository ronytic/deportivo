<?php
include_once("../../login/check.php");
$folder="../";

$nombre=$_POST['Nombre'];

$condicion="Nombre LIKE '%$nombre%'";
include_once("../../class/club.php");
include_once("../../class/fixture.php");

$fixture=new fixture;
$club=new club;
?>
            <tr class="cabecera">
                	<td>Nº</td>
                    <td>Nombre Fixture</td>
                    <td>Cantidad de Fechas</td>
                </tr>
            <?php
			$i=0;
            foreach($fixture->mostrarFixture($condicion) as $al){$i++;
				
				//$c1=array_shift($club->mostrarTodo(0,"CodClub=".$al['CodEquipo1']));
				//$c2=array_shift($club->mostrarTodo(0,"CodClub=".$al['CodEquipo2']));
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombre']?></td>
                    <td class="der"><?php echo $al['Cantidad']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodClub']?>">Modificar</a>
                        <a href="../../reportes/fixture.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all" rel="<?php echo $al['CodClub']?>">Impresión</a>
                        <a href="eliminar.php?Cod=<?php echo $al['Nombre']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodClub']?>">Eliminar</a>
                    </td>
                </tr>
                <?php	
			}
			?>