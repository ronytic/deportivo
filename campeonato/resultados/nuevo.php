<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registrar Nuevo Fixture";
include_once("../../class/fixture.php");
$fixture=new fixture;

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/campeonato/resultado.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	<div class="cuerpo">
        	<table>
                <tr><td>Elegir el Fixture:</td><td><select name="nombre" id="nombre">
													<?php
                                                foreach($fixture->mostrarFixtureNombres()as $fix){
												?>	
                                                	<option value="<?php echo $fix['Nombre'];?>"><?php echo $fix['Nombre'];?></option>
                                                <?php
												}
												?>
                								</select></td></tr>
                
                <tr><td></td><td><input type="submit" value="Ver Fixture" class="corner-all" id="ver"/></td></tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
	<div class="prefix_1 grid_10 suffix_1">
    	<div class="titulo">Registrar Nuevo Fixture</div>
    	<div class="cuerpo">
        
    	<form action="registrarresultados.php" method="post">
        	
            <table id="continuar" class="tabla">
            	
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>