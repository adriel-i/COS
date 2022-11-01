
function validar() {

    var regexLetras = /^[a-zA-Z ]+$/;
    var regexNumeros = /^[0-9 ]+$/;
    var tipoContacto = document.getElementById("varTipoContacto").value;                           
    var valor = document.getElementById("varValor").value;

    if (tipoContacto == 0) {
        alert("ERROR: Debe seleccionar un tipo de contacto");
        return false;
    }
    else if (tipoContacto == 2) {
        if (valor.length != 7 || regexNumeros.test(valor) == false) {
            alert("ERROR: Valor invalido, debe contener 7 caracteres numericos");
            return false;
        }
    }
    else if (tipoContacto == 1) {
        if (valor.length != 10 || regexNumeros.test(valor) == false) {
            alert("ERROR: Valor invalido, debe contener 10 caracteres numericos");
            return false;
        }
    }   
}