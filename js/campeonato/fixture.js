$(document).ready(function(e) {
	$("#ver").click(function(e) {
        var categoria=$("#categoria").val();
		$.post("mostrarEquipos.php",{'CodCategoria':categoria},respuesta);
    });
	$(".fecha").datepicker({numberOfMonths: 3});
	function respuesta(data){
		$("#continuar").html(data);
		$(".fecha").datepicker({numberOfMonths: 3});
	}
});