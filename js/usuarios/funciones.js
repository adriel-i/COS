
var regexLetras = /^[a-zA-Z- ]+$/;
var regexAlfanumerico = /^[a-zA-Z0-9- ]+$/;
var regexNumeros = /^[0-9 ]+$/;

function validarUsuario() {

    var nombre = document.getElementById("varNombre").value;
    var apellido = document.getElementById("varApellido").value;
    var dni = document.getElementById("varDni").value;
    var fechaNacimiento = document.getElementById("varNacimiento").value;
    var rol = document.getElementById("varRol").value;
    var username = document.getElementById("varUsuario").value;
    var password = document.getElementById("varContrasena").value;

    if (nombre.length < 3 || regexLetras.test(nombre) == false) {
        alert("ERROR: El nombre debe tener minimo 3 caracteres alfabeticos");
        return false;
    }
    else if (apellido.length < 3 || regexLetras.test(apellido) == false) {
        alert("ERROR: El apellido debe tener minimo 3 caracteres alfabeticos");
        return false;
    }
    else if (dni.length != 8) {
        alert("ERROR: El DNI debe contener 8  caracteres");
        return false;
    }
    else if (fechaNacimiento == "") {
        alert("ERROR: Debe colocar su fecha de nacimiento");
        return false;
    }
    else if (rol == "") {
        alert("ERROR: Debe seleccionar un rol");
        return false;
    }
    else if (username.length < 3 || regexAlfanumerico.test(username) == false) {
        alert("ERROR: El nombre de usuario debe tener minimo 3 caracteres alfanumericos");
        return false;
    }
    else if (password.length < 6) {
        alert("ERROR: La contrasena debe tener minimo 6 caracteres");
        return false;
    }
}


function validarDomicilio() {

    var barrio = document.getElementById("varBarrio").value;                           
    var calle = document.getElementById("varCalle").value;
    var altura = document.getElementById("varAltura").value;
    var manzana = document.getElementById("varManzana").value;
    var nroCasa = document.getElementById("varNroCasa").value;
    var torre = document.getElementById("varTorre").value;
    var piso = document.getElementById("varPiso").value;
    var observaciones = document.getElementById("varObservaciones").value;
    
    if (barrio.length < 3) {
        alert("ERROR: Valor invalido, el barrio debe contener minimo 3 caracteres alfanumericos");
        return false;
    }
    else if (calle.length < 3) {
        alert("ERROR: Valor invalido, la calle debe contener minimo 3 caracteres alfanumericos");
        return false;
    }
    else if (altura.length == 0 || altura < 0) {
        alert("ERROR: Valor invalido, la altura debe contener minimo 1 caracter numerico");
        return false;
    }
    else if (manzana != 0) {
        if (manzana.length < 1 || regexAlfanumerico.test(manzana) == false) {
        alert("ERROR: Valor invalido, la manzana debe contener minimo 1 caracter numerico");
        return false;
        }
    }
    else if (nroCasa != 0) {
        if (nroCasa.length < 1 || nroCasa < 0) {
        alert("ERROR: Valor invalido, el numero de casa debe contener minimo 1 caracter numerico");
        return false;
        }
    }
    else if (torre != 0) {
        if (torre.length < 1 || regexAlfanumerico.test(torre) == false) {
        alert("ERROR: Valor invalido, la torre debe contener minimo 1 caracter alfanumerico");
        return false;
        }
    }
    else if (piso != 0) {
        if (piso.length < 1 || piso < 0) {
        alert("ERROR: Valor invalido, el piso debe contener minimo 1 caracter numerico");
        return false;
        }
    }
    else if (observaciones != 0) {
        if (observaciones.length < 10 || regexAlfanumerico.test(observaciones) == false) {
        alert("ERROR: Valor invalido, observacion muy corta, minimo 10 caracteres alfanumericos");
        return false;
        }
    }
}

function validarUsername() {

    var username = $("#varUsername").val();
    if (username.length > 0) {

        $.ajax({
            method: "POST",
            url: "validar_username.php",
            data: {username: username}
        })
        .done(function(respuesta) {
           $("#mensaje").html(respuesta);
        })
        .fail(function() {
            alert("ERROR");
        });
    }
}

function validarDni() {

    var dni = $("#varDni").val();

    if (dni.length > 0) {

        $.ajax({
            method: "POST",
            url: "validar_dni.php",
            data: {dni: dni}
        })
        .done(function(respuesta) {
           $("#mensajeDni").html(respuesta);
        })
        .fail(function() {
            alert("ERROR");
        });
    }

} 
