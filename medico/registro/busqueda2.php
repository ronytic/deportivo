<?php
include_once("../../login/check.php");
$folder="../";
include_once("../../class/jugador.php");
include_once("../../class/club.php");
$nombre=$_POST['Nombre'];
$paterno=$_POST['Paterno'];
$ci=$_POST['Ci'];
$club=$_POST['Club'];
$condicion="Nombres LIKE '%$nombre%' and Paterno LIKE '%$paterno%' and Ci LIKE '%$ci%' and CodClubNuevo LIKE '%$club%'";
$jugador=new jugador;
$club=new club;
?>
            <tr class="cabecera">
                	<td>Nº</td>
                    <td>Nombres</td>
                    <td>Paterno</td>
                    <td>Materno</td>
                    <td>C.I.</td>
                    <td>Club de Procedencia</td>
                    <td>Club Actual</td>
                </tr>
            <?php 
			$i=0;
            foreach($jugador->mostrarTodo(0,$condicion) as $al){$i++;
				$c=$club->mostrarTodo(0,"CodClub=".$al['CodClubNuevo']);
				$c=array_shift($c);
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombres']?></td>
                    <td><?php echo $al['Paterno']?></td>
                    <td><?php echo $al['Materno']?></td>
                    <td><?php echo $al['Ci']?></td>
                    <td><?php echo $al['ClubProcedencia']?></td>
                    <td><?php echo $c['Nombre']?></td>
                    <td>
                    	<a href="nuevo.php?Cod=<?php echo $al['CodJugador']?>" class="botonSec corner-all modificar">Agregar su Informe Médico</a>
                    </td>
                </tr>
                <?php	
			}
			?>