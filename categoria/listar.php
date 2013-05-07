<?php
include_once("../login/check.php");
$folder="../";
$titulo="Listar Categorias";
include_once("../class/categoria.php");

$categoria=new categoria;

?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/listado.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.form.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
  <div class=" prefix_2 grid_8 suffix_2">
    	<div class="titulo">Criterios de Listado de las Categorias</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
			  <label for="Nombre">Nombres</label>
			  <input type="text" name="Nombre" id="Nombre" size="10"/>
              <label for="Observacion">Paterno</label>
			  <input type="text" name="Observaciones" id="Observacion" size="10"/>

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
                    <td>Observaciones</td>
                </tr>
            <?php
			$i=0;
            foreach($categoria->mostrarTodo(10) as $al){$i++;
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
            </table>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>