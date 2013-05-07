<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Estadistica de Goleadores";
include_once("../../class/categoria.php");
$categoria=new categoria;

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/campeonato/puntajes.js"></script>
<script language="javascript" type="text/javascript" src="../../js/estadistica/highcharts.js"></script>
</head>
<body>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	<div class="cuerpo">
        	<table>
                <tr><td>Elegir Categoria:</td><td><select name="categoria" id="categoria">
													<?php
                                                foreach($categoria->mostrarTodo()as $cat){
												?>	
                                                	<option value="<?php echo $cat['CodCategoria'];?>"><?php echo $cat['Nombre'];?></option>
                                                <?php
												}
												?>
                								</select></td></tr>
                
                <tr><td></td><td><input type="submit" value="Ver Categoria" class="corner-all" id="ver"/></td></tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
	<div class="prefix_1 grid_10 suffix_1">
    	<div class="cuerpo">
            <table id="continuar" class="tabla">
            	
            </table>
        </div>
       	
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>