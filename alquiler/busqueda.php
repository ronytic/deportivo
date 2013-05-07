<?php
include_once("../login/check.php");
$folder="../";
$titulo="Listar Alquileres";
include_once("../class/alquiler.php");
$nombre=$_POST['Nombre'];
$nombreresponsable=$_POST['NombreResponsable'];
$fecha=$_POST['Fecha'];
$estado=$_POST['Estado'];
$condicion="NombreCliente LIKE '%$nombre%' and NombreResponsable LIKE '%$nombreresponsable%' and Fecha LIKE '%$fecha%' and Estado LIKE '%$estado%'";
$alquiler=new alquiler;

?>
            <tr class="cabecera">
                	<td>Nº</td>
                	<td>Fecha</td>
                    <td>Hora</td>
                    <td>Nombre Cliente</td>
                    <td>Monto</td>
                    <td>Observaciones</td>
                    <td>Responsable</td>
                    <td>Estado</td>
                </tr>
            <?php
			$i=0;
            foreach($alquiler->mostrarTodo(0,$condicion) as $al){$i++;
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Fecha']?></td>
                    <td><?php echo $al['Hora']?></td>
                    <td><?php echo $al['NombreCliente']?></td>
                    <td><?php echo $al['Monto']?></td>
                    <td><?php echo $al['Observaciones']?></td>
                    <td><?php echo $al['NombreResponsable']?></td>
                    <td><?php echo $al['Estado']=1?'Pendiente':'Terminado';?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodAlquiler']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodAlquiler']?>">Modificar</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodAlquiler']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodAlquiler']?>">Eliminar</a>
                    </td>
                </tr>
                <?php	
			}
			?>