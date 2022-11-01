function cargarServicios() {
		    // javascript puro: obtengo un objeto del documento
			// var provincia = document.getElementById("cboProvincias");
			
			// asi seria con jquery
	var cboCategorias = $("#cboCategorias");

            // javascript puro: obtengo el valor de un objeto del documento
			//alert(provincia.value);
			
			// Asi se obtiene el valor de un objto con jquery, utilizando val()
			//alert(cboProvincias.val());

	var idCategoria = cboCategorias.val();

            // se utiliza la funcion ajax de jquery
            // se define el metodo (GET/POST), la url y los parametros
            // .done se ejecuta si todo salio bien
            // .fail se ejecuta si hubo algun error
	$.ajax({
		method: "GET",
		url: "cargarServicios.php",
		data: {id: idCategoria}
	})
				.done(function(respuesta) {
			       // jquery utiliza la funcion html() para manipular el contenido de un componente
			       // con javascript puro se utliza innerHtml
                	$("#cboSubcategorias").html(respuesta);
				})
				.fail(function() {
			  	alert("ERROR");
				});

	}

function filtrarSubcategoria($idCategoria) {

	
}