<?php
include_once("../login/check.php");
$folder="../";
$titulo="Listar Alquileres";
include_once("../class/alquiler.php");

$alquiler=new alquiler;

?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/alquiler/alquiler.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../js/listado.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
  <div class=" prefix_2 grid_8 suffix_2">
    	<div class="titulo">Criterios de Listado de Alquileres</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
			  <label for="Nombre">Nombre Cliente</label>
			  <input type="text" name="Nombre" id="Nombre" />
              <label for="resp">Nombre Resp.</label>
			  <input type="text" name="NombreResponsable" id="resp" size="15"/><hr />
              <label for="Fecha">Fecha</label>
			  <input type="text" name="Fecha" id="Fecha" size="10" class="fecha"/>
              <label for="estado">Estado del Alquiler</label>
              <select name="Estado" id="estado"><option value="1">Pendiente</option><option value="0">Terminado</option></select>
              <input type="submit" value="Buscar" class="corner-all"/><input type="reset" value="Borrar Busqueda" class="corner-all"/>
		  </form>
      </div>
    </div>
    <div class="clear"></div>
	<div class="prefix_1 grid_10 suffix_1">
    	<div class="cuerpo" id="">
    		<table class="tabla" id="resultado">
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
            foreach($alquiler->mostrarTodo(10) as $al){$i++;
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
            </table>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>