function cargarSubcategorias() {

	var cboCategoria = $("#cboCategoria");

	var idCategoria = cboCategoria.val();

	$.ajax({
		method: "GET",
		url: "cargar_subcategorias.php",
		data: {id: idCategoria}
	})
	   .done(function(respuesta) {
           $("#cboSubcategoria").html(respuesta);
	   })
	   .fail(function() {
	   		alert("ERROR");
	   });


}

function cargarServicios() {

	var cboSubcategoria = $("#cboSubcategoria");

	var idSubcategoria = cboSubcategoria.val();

	$.ajax({
		method: "GET",
		url: "cargar_servicio.php",
		data: {id: idSubcategoria}
	})
	   .done(function(respuesta) {
           $("#cboServicio").html(respuesta);
	   })
	   .fail(function() {
	   		alert("ERROR");
	   });
}