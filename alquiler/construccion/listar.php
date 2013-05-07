<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listar Contrucciones";
include_once("../../class/construccion.php");

$construccion=new construccion;

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/listado.js"></script>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../../js/alquiler/construccion.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
  <div class=" prefix_2 grid_8 suffix_2">
    	<div class="titulo">Criterios de Listado de Construcciones</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
			  <label for="Nombre">Nombre</label>
			  <input type="text" name="Nombre" id="Nombre" />
              <label for="resp">Direccion.</label>
			  <input type="text" name="Direccion" id="resp" size="15"/><hr />
              <label for="Fecha">Fecha Inicio</label>
			  <input type="text" name="FechaInicio"  size="10" class="fecha"/>
              <label for="Fecha">Fecha Final</label>
			  <input type="text" name="FechaFinal"  size="10" class="fecha"/>
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
                	<td>Nombre</td>
                    <td>Dirección</td>
                    <td>Financiamiento</td>
                    <td>Fecha Inicio</td>
                    <td>Fecha Final</td>
                </tr>
            <?php
			$i=0;
            foreach($construccion->mostrarTodo(10) as $al){$i++;
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
            </table>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>