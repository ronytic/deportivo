<?php
include_once("../login/check.php");
$folder="../";
$titulo="Registrar Nuevo Club";
include_once("../class/ayudante.php");
include_once("../class/categoria.php");
include_once("../class/tecnico.php");
include_once("../class/medico.php");
$categoria=new categoria;
$ayudante=new ayudante;
$tecnico=new tecnico;
$medico=new medico;
?>
<?php include_once("../cabecerahtml.php");?>
<script language="javascript" type="text/javascript" src="../js/personal/ayudante.js"></script>
</head>
<body>
<?php include_once("../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_3 grid_6 suffix_3">
    	<div class="titulo">Registrar Nuevo Club</div>
    	<div class="cuerpo">
    	<form action="registrarclub.php" method="post">
        	<table>
                <tr><td>Nombre del Club:</td><td><input type="text" name="nombre" required/></td></tr>
                <tr>
                  <td>Cantidad de Jugadores:</td><td><select name="cantidadjugadores">
                								<?php
                                                for($i=1;$i<=30;$i++){
												?>	
                                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php
												}
												?>
                                            </select></td></tr>
                <tr><td>Categoria del Club:</td><td><select name="categoria">
                								<?php
                                                foreach($categoria->mostrarTodo()as $cat){
												?>	
                                                	<option value="<?php echo $cat['CodCategoria'];?>"><?php echo $cat['Nombre'];?></option>
                                                <?php
												}
												?>
                                            </select></td></tr>
                <tr><td>Nombre Responsable Club:</td><td><input name="nombreresponsable" type="text" required id="nombreresponsable"/></td></tr>
                <tr><td>Nombre Técnico del Club:</td><td><select name="tecnico">
                								<?php
                                                foreach($tecnico->mostrarTodo()as $cat){
												?>	
                                                	<option value="<?php echo $cat['CodTecnico'];?>"><?php echo $cat['Nombres']." ".$cat['Paterno']." - ".$cat['Cargo'];?></option>
                                                <?php
												}
												?>
                                            </select></td></tr>
                <tr><td>Nombre Medico del Club:</td><td><select name="medico">
                								<?php
                                                foreach($medico->mostrarTodo()as $cat){
												?>	
                                                	<option value="<?php echo $cat['CodMedico'];?>"><?php echo $cat['Nombres']." ".$cat['Paterno']." - ".$cat['Especialidad'];?></option>
                                                <?php
												}
												?>
                                            </select></td></tr>
                <tr><td>Nombre Ayudante del Club:</td><td><select name="ayudante">
                								<?php
                                                foreach($ayudante->mostrarTodo()as $cat){
												?>	
                                                	<option value="<?php echo $cat['CodAyudante'];?>"><?php echo $cat['Nombres']." ".$cat['Paterno']." - ".$cat['Cargo'];?></option>
                                                <?php
												}
												?>
                                            </select></td></tr>
                <tr><td></td><td><input type="submit" value="Registrar" class="corner-all"/><input type="reset" value="Borrar" class="corner-all"/></td></tr>
            </table>
        </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../pie.php");?>