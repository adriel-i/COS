
var regexLetras = /^[a-zA-Z ]+$/;
var regexAlfanumerico = /^[a-zA-Z0-9- ]+$/;
var regexNumeros = /^[0-9 ]+$/;
var regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function validarUsuario() {

    var rol = document.getElementById("varRol").value;
    var username = document.getElementById("varUsuario").value;
    var password = document.getElementById("varContrasena").value;
    var email = document.getElementById("varEmail").value;
    var celular = document.getElementById("varCelular").value;

    if (username.length < 3 || regexAlfanumerico.test(username) == false) {
        alert("ERROR: El nombre de usuario debe tener minimo 3 caracteres alfanumericos");
        return false;
    }
    else if (password.length < 6) {
        alert("ERROR: La contrasena debe tener minimo 6 caracteres");
        return false;
    }
    else if (rol == "") {
        alert("ERROR: Debe seleccionar un rol");
        return false;
    }
    else if (email.length < 7 || regexEmail.test(email) == false) {
        alert("ERROR: Ingrese un formato de email");
        return false;
    }

    else if (celular.length != 10 || regexNumeros.test(celular) == false) {
        alert("ERROR: Valor invalido, el celular debe contener 10 caracteres numericos");
        return false;
    }
    else {
        return true;
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
    
    if (barrio.length < 3 || regexAlfanumerico.test(barrio) == false) {
        alert("ERROR: Valor invalido, el barrio debe contener minimo 3 caracteres alfanumericos");
        return false;
    }
    else if (calle.length < 3 || regexAlfanumerico.test(calle) == false) {
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
    else {
        return true;
    }
}

function validarPersona() {
    
    var nombre = document.getElementById("varNombre").value;
    var apellido = document.getElementById("varApellido").value;
    var dni = document.getElementById("varDni").value;
    var fechaNacimiento = document.getElementById("varNacimiento").value;
    var nacionalidad = document.getElementById("varNacionalidad").value;

    if (nombre.length < 3 || regexLetras.test(nombre) == false) {
        alert("ATENCION! El nombre debe tener minimo 3 caracteres alfabeticos");
        return false;
    }
    
    else if (apellido.length < 3 || regexLetras.test(apellido) == false) {
        alert("ATENCION! El apellido debe tener minimo 3 caracteres alfabeticos");
        return false;
        // break;
    }
    else if (dni.length != 8) {
        alert("ATENCION! El DNI debe contener 8  caracteres");
        return false;
    }
    else if (fechaNacimiento == "") {
        alert("ATENCION! Debe colocar su fecha de nacimiento");
        return false;
    }
    else if (nacionalidad.length <3 || regexLetras.test(nacionalidad) == false) {
        alert("ATENCION! La nacionalidad debe tener minimo 3 caracteres alfabeticos");
        return false;
    }
    else {
        return true;
    }
}

function mostrarPaso1() {
    document.getElementById("datosDomicilioYContacto").style.display= "none";
    document.getElementById("datosPersonales").style.display= "block";
    document.getElementById("paso1").style.backgroundColor= "#BED7D1";
    document.getElementById("paso2").style.backgroundColor= "transparent";
}

function mostrarPaso2() {
    document.getElementById("datosPersonales").style.display= "none";
    document.getElementById("datosUsuario").style.display= "none";
    document.getElementById("paso1").style.backgroundColor= "transparent";
    document.getElementById("paso3").style.backgroundColor= "transparent";
    document.getElementById("datosDomicilioYContacto").style.display= "block";
    document.getElementById("paso2").style.backgroundColor= "#BED7D1";
}

function mostrarPaso3() {
    document.getElementById("datosDomicilioYContacto").style.display= "none";
    document.getElementById("paso2").style.backgroundColor= "transparent";
    document.getElementById("datosUsuario").style.display= "block";
    document.getElementById("paso3").style.backgroundColor= "#BED7D1";
}

function mostrarResumen() {
    document.getElementById("tablaVertical").style.display="block";

    var nombre = document.getElementById("varNombre").value;
    document.getElementById("nombre").innerHTML=nombre;

    var apellido = document.getElementById("varApellido").value;
    document.getElementById("apellido").innerHTML=apellido;

    var dni = document.getElementById("varDni").value;
    document.getElementById("dni").innerHTML=dni;

    var nacimiento = document.getElementById("varNacimiento").value;
    document.getElementById("nacimiento").innerHTML=nacimiento;

    var nacionalidad = document.getElementById("varNacionalidad").value;
    document.getElementById("nacionalidad").innerHTML=nacionalidad;

    var iGenero = document.getElementById("varGenero").selectedIndex;
    if (iGenero == "") {
        iGenero = 5
    }
    var genero = document.getElementById("varGenero")[iGenero].text;
    document.getElementById("genero").innerHTML=genero;

    var barrio = document.getElementById("varBarrio").value;
    document.getElementById("barrio").innerHTML=barrio;

    var calle = document.getElementById("varCalle").value;
    document.getElementById("calle").innerHTML=calle;

    var altura = document.getElementById("varAltura").value;
    document.getElementById("altura").innerHTML=altura;

    var manzana = document.getElementById("varManzana").value;
    if (manzana != "") {
        document.getElementById("manzana").innerHTML=manzana
    }

    var nroCasa = document.getElementById("varNroCasa").value;
    if (nroCasa != "") {
        document.getElementById("nroCasa").innerHTML=nroCasa
    }

    var torre = document.getElementById("varTorre").value;
    if (torre != "") {
        document.getElementById("torre").innerHTML=torre
    }

    var piso = document.getElementById("varPiso").value;
    if (piso != "") {
        document.getElementById("piso").innerHTML=piso
    }

    var observaciones = document.getElementById("varObservaciones").value;
    if (observaciones != "") {
        document.getElementById("observaciones").innerHTML=observaciones
    }

    var usuario = document.getElementById("varUsuario").value;
    document.getElementById("usuario").innerHTML=usuario;

    var contrasena = document.getElementById("varContrasena").value;
    document.getElementById("contrasena").innerHTML=contrasena;

    var iRol = document.getElementById("varRol").selectedIndex;
    var rol = document.getElementById("varRol")[iRol].text;
    document.getElementById("rol").innerHTML=rol;

    var email = document.getElementById("varEmail").value;
    document.getElementById("email").innerHTML=email;

    var celular = document.getElementById("varCelular").value;
    document.getElementById("celular").innerHTML=celular;

    document.getElementById("tablaVertical").focus();
}

function validarPersonaYMostrarPaso2(){
    
    validarPersona();
    if (validarPersona() == true) {
        mostrarPaso2();
    }
}

function validarDomicilioYMostrarPaso3(){
    
    validarDomicilio();
    if (validarDomicilio() == true) {
        mostrarPaso3();
    }
}

function validarUsuarioYMostrarResumen(){
    
    validarUsuario();
    if (validarUsuario() == true) {
        mostrarResumen();
    }
}

