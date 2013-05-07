<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registrar Nueva Tabla de Puntuaciones";
include_once("../../class/categoria.php");
$categoria=new categoria;

?>
<?php include_once("../../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../../js/campeonato/puntajes.js"></script>
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
    	<div class="titulo">Registrar Nueva Tabla de Puntuaciones</div>
    	<div class="cuerpo">
        
    	<form action="registrarpuntajes.php" method="post">
        	<table>
				<tr ><td>Nombre de Tabla de Puntuaciones:</td><td><input type="text" name="nombre" required/></td></tr>
            </table>
            <table id="continuar" class="tabla">
            	
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../pie.php");?>