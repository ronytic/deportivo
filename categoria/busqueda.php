<?php
include_once("../login/check.php");
$folder="../";
include_once("../class/categoria.php");
$nombre=$_POST['Nombre'];
$observaciones=$_POST['Observaciones'];
$condicion="Nombre LIKE '%$nombre%' and Observaciones LIKE '%$observaciones%'";
$categoria=new categoria;

?>
            <tr class="cabecera">
                	<td>Nº</td>
                    <td>Nombre</td>
                    <td>Observaciones</td>
                </tr>
            <?php
			$i=0;
            foreach($categoria->mostrarTodo(0,$condicion) as $al){$i++;
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombre']?></td>
                    <td><?php echo $al['Observaciones']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodCategoria']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodAlquiler']?>">Modificar</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodCategoria']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodAlquiler']?>">Eliminar</a>
                    </td>
                </tr>
                <?php	
			}
			?>