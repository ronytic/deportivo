$(document).ready(function(e) {
    $("#formulario").ajaxForm(function(data){
		$("#resultado").html(data);
	});
	$("#resultado").on("click",".eliminar",function(e){
		var direccion=$(this).attr("href");
		e.preventDefault();
		e.stopPropagation();
		if(confirm("¿Desea elminiar este Registro?")){
			$.post(direccion,function(){$("#formulario").submit()});
		}
		return false;
	});
	/*$("#resultado").on("click",".modificar",function(e){
		e.preventDefault();
		$("#formulario").submit()
		return false;
	});*/
});