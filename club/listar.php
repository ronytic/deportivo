<?php
include_once("../login/check.php");
$folder="../";
$titulo="Listar de los Club's";
include_once("../class/club.php");
include_once("../class/medico.php");
include_once("../class/tecnico.php");
include_once("../class/categoria.php");
include_once("../class/ayudante.php");

$tecnico=new tecnico;
$medico=new medico;
$ayudante=new ayudante;
$club=new club;
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
    	<div class="titulo">Criterios de Listado de los Club's</div>
        <div class="cuerpo">
		  <form id="formulario" name="formulario" method="post" action="busqueda.php">
			  <label for="Nombre">Nombre de Club</label>
			  <input type="text" name="Nombre" id="Nombre" size="10"/>

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
                    <td>Cant. de Jug.</td>
                    <td>Categoria</td>
                    <td>Nombre Responsable</td>
                    <td>Técnico</td>
                    <td>Médico</td>
                    <td>Ayudante</td>
                </tr>
            <?php
			$i=0;
            foreach($club->mostrarTodo(10) as $al){$i++;
				$m=array_shift($medico->mostrarTodo(0,"CodMedico=".$al['CodMedico']));
				$c=array_shift($categoria->mostrarTodo(0,"CodCategoria=".$al['CodCategoria']));
				$t=array_shift($tecnico->mostrarTodo(0,"CodTecnico=".$al['CodTecnico']));
				$a=array_shift($ayudante->mostrarTodo(0,"CodAyudante=".$al['CodAyudante']));
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                	<td><?php echo $al['Nombre']?></td>
                    <td><?php echo $al['CantidadJugadores']?></td>
                    <td><?php echo $c['Nombre']?></td>
                    <td><?php echo $al['NombreResponsable']?></td>
                    <td><?php echo $t['Nombres']." ".$t['Paterno'];?></td>
                    <td><?php echo $m['Nombres']." ".$m['Paterno'];?></td>
                    <td><?php echo $a['Nombres']." ".$a['Paterno'];?></td>
                    <td>
                    	<a href="modificar.php?Cod=<?php echo $al['CodClub']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodClub']?>">Modificar</a>
                        <a href="../reportes/club.php?Cod=<?php echo $al['CodClub']?>" class="botonSec corner-all modificar" rel="<?php echo $al['CodClub']?>">Impresión</a>
                        <a href="eliminar.php?Cod=<?php echo $al['CodClub']?>" class="botonSec corner-all eliminar" rel="<?php echo $al['CodClub']?>">Eliminar</a>
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