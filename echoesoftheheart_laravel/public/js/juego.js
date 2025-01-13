function siguienteTexto() {
    const data = {
        textOrder: textOrder,
        _token: _token
    }
    $.post("/juego/siguiente", data, function (data) {
        mostrar(data)
    })
    .fail(function(response) {
        alert('Error: ' + response.responseText);
    });
}

function decision(id){
    const data = {
        id: id,
        _token: _token
    }
    $.post("/juego/decision", data, function (data) {
        mostrar(data)
    })
    .fail(function(response) {
        alert('Error: ' + response.responseText);
    });
}

function mostrar(data){

    // text handling
    if (data.personaje_id == 1) {
        if (data.tipo=="elecion"){
            document.getElementById("text").removeAttribute("onclick")
            document.getElementById("playertext").innerHTML = data.html

        }
        else{
            document.getElementById("playertext").innerHTML = data.html
            document.getElementById("text").setAttribute("onclick","siguienteTexto()")

        }
    }
    else {
        $("#char_"+data.personaje_id).css("display", "flex");
        document.getElementById("char_"+data.personaje_id).querySelectorAll(".textbox")[0].innerHTML = data.html
        document.getElementById("text").setAttribute("onclick","siguienteTexto()")
        document.getElementById("playertext").innerHTML =    "siguiente . . ."
    }

    // background image handling
    $(".juego").css("background-image", "url("+data.url_fondo+")");

    // hide characters
    if(data.esconder != ""){
        if(data.esconder == "todos"){
            $("#char_2").css("display", "none");
            $("#char_3").css("display", "none");
            $("#char_4").css("display", "none");

        }
        else{
            $("#char_"+data.esconder).css("display", "none")
        }
    }

    textOrder = data.orden
    document.getElementById("esencias").innerHTML = data.esencias
}

siguienteTexto()
