

window.onload= function() {
	var estado = document.getElementById("estado").innerHTML;

	if (estado == "Aceptada") {
		document.getElementById("botonFinalizar").style.display= "inline-block";
		document.getElementById("botonCancelar").style.display= "none";
		document.getElementById("botonAceptar").style.display= "none";
	}
	if (estado == "Cancelada") {
		document.getElementById("botonCancelar").style.display= "none";
		document.getElementById("botonAceptar").style.display= "none";
		document.getElementById("botonPostergar").style.display= "none";
		document.getElementById("acciones").innerHTML = "---";
	}

	if (estado == "Rechazada") {
		document.getElementById("botonCancelar").style.display= "none";
		document.getElementById("botonAceptar").style.display= "none";
		document.getElementById("botonPostergar").style.display= "none";
		document.getElementById("acciones").innerHTML = "---";
	}

	if (estado == "Finalizada") {
		document.getElementById("botonTicket").style.display= "inline-block";
		document.getElementById("botonPostergar").style.display= "none";
		document.getElementById("acciones").innerHTML = "---";
	}			
}


		
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

function validarFecha(){
	var date    = new Date(),
    yr      = date.getFullYear();
    month   = date.getMonth()+1;
    day     = date.getDate();
    newDate = yr + '-' +0+ month + '-' + day;    
    var fecha = $('#varFecha').val();
    console.log(newDate);
    console.log(fecha);
		
	if (newDate < fecha) {
       $("#mensajeFecha").html('Seleccione una fecha posterior').css({"display": "block"});
       $("#botonNaranja").prop('disabled', true);
       return false;
	}
	else {
		$("#mensajeFecha").css({"display": "none"});
		$("#botonNaranja").prop('disabled', false);
		return true;
	}
	
}

function validarHora(){
	var date    = new Date(),
    yr      = date.getFullYear();
    month   = date.getMonth()+1;
    day     = date.getDate();
    newDate = yr + '-' +0+ month + '-' + day;
    var fecha = $('#varFecha').val();

	var hoy = new Date(); 
    var horaHoy = newDate + hoy.getHours() + ":" + hoy.getMinutes();
    var hora = fecha + $('#varHora').val();

    console.log(horaHoy);
    console.log(hora);
	
	if (horaHoy > hora) {
       $("#mensajeHora").html('Seleccione una hora posterior').css({"display": "block"});
       $("#botonNaranja").prop('disabled', true);
       return false;
	}
	else {
		$("#mensajeHora").css({"display": "none"});
		$("#botonNaranja").prop('disabled', false);
		return true;
	}
}
