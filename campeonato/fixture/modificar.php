<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Fixture";

include_once("../../class/fixture.php");
include_once("../../class/club.php");
include_once("../../class/categoria.php");
$cat=new categoria;
$fixture=new fixture;
$cod=$_GET['Cod'];
$club=new club;

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/campeonato/fixture.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_1 grid_10 suffix_1">
    	<div class="titulo">Modificar Fixture</div>
    	<div class="cuerpo">
        
    	<form action="guardarfixture.php" method="post">
        	<table>
				<tr ><td>Nombre del Fixture</td><td><input type="text" name="nombre" required readonly value="<?php echo $cod;?>"/></td></tr>
            </table>
            <table id="continuar" class="tabla">
            	<tr class="cabecera"><td>Fecha</td><td>Hora</td><td>Lugar</td><td>Equipo 1</td><td>Vs</td><td>Equipo 2</td></tr>
            	<?php 
					$i=0;
					foreach($fixture->mostrarTodo(0,"Nombre='".$cod."'") as $f){$i++;
						$cl=array_shift($club->mostrarTodo(0,"CodClub=".$f['CodEquipo1']));
						$clubes=$club->mostrarClubXCategoria($cl['CodCategoria']);
					?>
                    <tr class="contenido">
                        <td><input type="hidden" name="f[<?php echo $i?>][cod]" value="<?php echo $f['CodFixture']?>"/><input type="text" name="f[<?php echo $i?>][fecha]" class="fecha" size="10" value="<?php echo $f['Fecha']?>"></td>
                        <td><input type="text" name="f[<?php echo $i?>][hora]" class="hora" size="8" value="<?php echo $f['Hora']?>"></td>
                        <td><input type="text" name="f[<?php echo $i?>][lugar]" size="15" value="<?php echo $f['Lugar']?>"></td>
                        <td><select name="f[<?php echo $i?>][equipo1]">
                            <option value="0">Ningún Partido</option>
                            <?php foreach($clubes as $c){
                                ?><option value="<?php echo $c['CodClub']?>" <?php echo $c['CodClub']==$f['CodEquipo1']?'selected="selected"':'';?>><?php echo $c['Nombre']?></option><?php	
                            }?>
                            </select></td>
                        <td>Vs</td>
                        <td><select name="f[<?php echo $i?>][equipo2]">
                            <option value="0">Ningún Partido</option>
                            <?php foreach($clubes as $c){
                                ?><option value="<?php echo $c['CodClub']?>" <?php echo $c['CodClub']==$f['CodEquipo2']?'selected="selected"':'';?>><?php echo $c['Nombre']?></option><?php	
                            }?>
                            </select></td>
        			</tr>
                    <?php
				}?>
                <tr><td></td><td><input type="submit" value="Guardar" class="corner-all"/></td><td><input type="reset" value="Limpiar" class="corner-all"></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>