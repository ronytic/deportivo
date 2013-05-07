<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listar Encargados";
include_once("../../class/encargado.php");

$encargado=new encargado;

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/listado.js"></script>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../../js/personal/encargado.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
  <div class=" prefix_2 grid_8 suffix_2">
    	<div class="titulo">Criterios de Listado de los Encargados</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
			  <label for="Nombre">Nombres</label>
			  <input type="text" name="Nombres" id="Nombre" size="10"/>
              <label for="Paterno">Paterno</label>
			  <input type="text" name="Paterno" id="Paterno" size="10"/>
              <label for="Materno">Materno</label>
			  <input type="text" name="Materno" id="Materno" size="10"/>
              <label for="resp">C.I.</label>
			  <input type="text" name="Ci" id="resp" size="10"/><hr />
              <label for="esp">Cargo</label>
			  <input type="text" name="Especialidad"  size="10" id="esp"/>
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
                    <td>Paterno</td>
                    <td>Materno</td>
                    <td>Nombres</td>
                    <td>C.I.</td>
                    <td>Cargo</td>
                </tr>
            <?php
			$i=0;
            foreach($encargado->mostrarTodo(10) as $al){$i++;
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Paterno']?></td>
                    <td><?php echo $al['Materno']?></td>
                    <td><?php echo $al['Nombres']?></td>
                    <td><?php echo $al['Ci']?></td>
                    <td><?php echo $al['Cargo']?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodEncargado']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodAlquiler']?>">Modificar</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodEncargado']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodAlquiler']?>">Eliminar</a>
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