<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listar Construccion";
include_once("../../class/construccion.php");
$nombre=$_POST['Nombre'];
$direccion=$_POST['Direccion'];
$fechaInicio=$_POST['FechaInicio'];
$fechaFinal=$_POST['FechaFinal'];
$condicion="Nombre LIKE '%$nombre%' and Direccion LIKE '%$direccion%' and FechaInicio LIKE '%$fechaInicio%' and FechaFinal LIKE '%$fechaFinal%'";
$construccion=new construccion;

?>
            <tr class="cabecera">
                	<td>Nº</td>
                	<td>Nombre</td>
                    <td>Dirección</td>
                    <td>Financiamiento</td>
                    <td>Fecha Inicio</td>
                    <td>Fecha Final</td>
                </tr>
            <?php
			$i=0;
            foreach($construccion->mostrarTodo(0,$condicion) as $al){$i++;
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombre']?></td>
                    <td><?php echo $al['Direccion']?></td>
                    <td><?php echo $al['Financiamiento']?></td>
                    <td><?php echo $al['FechaInicio']?></td>
                    <td><?php echo $al['FechaFinal']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodConstruccion']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodAlquiler']?>">Modificar</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodConstruccion']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodAlquiler']?>">Eliminar</a>
                    </td>
                </tr>
                <?php	
			}
			
			?>