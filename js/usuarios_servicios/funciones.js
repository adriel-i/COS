function validarServicio() {

    var servicio = $("#varServicio").val();
    if (servicio.length > 0) {

        $.ajax({
            method: "POST",
            url: "validar_servicio.php",
            data: {servicio: servicio}
        })
        .done(function(respuesta) {
           $("#mensaje").html(respuesta);
        })
        .fail(function() {
            alert("ERROR");
        });
    }
}