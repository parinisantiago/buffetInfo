function valLetras(text, form){

    var error=  document.createElement("P");


    if( text.value.length == 0){


        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe completar este campo";
        form.insertBefore(error, text);

    }else if ( /[A-Za-z]+/.exec(text.value) != text.value){

        error=  document.createElement("P");

        error.setAttribute("class", "error");
            error.innerHTML ="Solo se aceptan letras";
        form.insertBefore(error, text);
    } else {
        return(true);
    }
    return(false);
}

function valLetrasYNumeros(text, form){

    var error=  document.createElement("P");


    if( text.value.length == 0){


        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe completar este campo";
        form.insertBefore(error, text);

    }else if ( /[A-Za-z09]+/.exec(text.value) != text.value){

        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Solo se aceptan letras o numeros";
        form.insertBefore(error, text);
    } else {
        return(true);
    }
    return(false);
}

function valEmail(text, form){
    var error=  document.createElement("P");

    if( text.value.length == 0){
        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe completar este campo";
        form.insertBefore(error, text);

    }else if ( /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/.exec(text.value) != text.value){
        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe poseer el formato usuario@correo";
        form.insertBefore(error, text);
    } else {
        return(true);
    }
    return(false);
}

function valNumeros(text, form){
    var error=  document.createElement("P");

    if( text.value.length == 0){

        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe completar este campo";
        form.insertBefore(error, text);
    }else if ( /[0-9]+/.exec(text.value) != text.value){

        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Solo se aceptan números";
        form.insertBefore(error, text);
    } else {
        return(true);
    }
    return(false);
}

function valReales(text, form){
    var error=  document.createElement("P");

    if( text.value.length == 0){
        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe completar este campo";
        form.insertBefore(error, text);
    }else if ( /[0-9,]+/.exec(text.value) != text.value){
        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Solo se acepta el formato 00,00";
        form.insertBefore(error, text);
    } else {
        return(true);
    }
    return(false);
}

function valPalabras(text, form){
    var error=  document.createElement("P");

    if( text.value.length == 0){
        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe completar este campo";
        form.insertBefore(error, text);
    }else if ( /[A-Za-z áéíóúàèìòùñ]+/.exec(text.value) != text.value){
        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Soo se aceptan letras, numeros y espacios";
        form.insertBefore(error, text);
    } else {
        return(true);
    }
    return(false);
}

function valFechas(text, form){
    var error=  document.createElement("P");

    if( text.value.length == 0){
        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe completar este campo";
        form.insertBefore(error, text);
    }else if ( /[0-9]+/.exec(text.value) != text.value){
        error=  document.createElement("P");

        error.setAttribute("class", "error");
        error.innerHTML ="Debe poseer el formato YYYY-MM-DD";
        form.insertBefore(error, text);
    } else {
        return(true);
    }
    return(false);
}

function valUsuario() {

    document.getElementById("error").setAttribute("hidden","true");


    var bol = true;
    var form = document.getElementById("form");
    var text= document.getElementById("usuario");
    var pass = document.getElementById("clave");
    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var documento = document.getElementById("documento");
    var email = document.getElementById("email");
    var telefono = document.getElementById("telefono");


    if(valLetrasYNumeros(text, form)){
        bol = false;
    }
    if(valLetrasYNumeros(pass, form))
    {
        bol = false;
    }
    if(valPalabras(nombre, form))
    {
        bol = false;
    }
    if(valPalabras(apellido, form))
    {
        bol = false;
    }
    if(valNumeros(documento, form))
    {
        bol = false;
    }
    if(valEmail(email, form))
    {
        bol = false;
    }
    if(valNumeros(telefono, form))
    {
        bol = false;
    }
    return(bol);
}