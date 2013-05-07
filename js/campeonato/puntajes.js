$(document).ready(function(e) {
	$("#ver").click(function(e) {
        var categoria=$("#categoria").val();
		$.post("mostrarEquipos.php",{'CodCategoria':categoria},respuesta);
    });
	function respuesta(data){
		$("#continuar").html(data);
		
	}
});