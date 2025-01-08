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
    if (data.personaje_id == 1) {
        if (data.tipo=="elecion"){
            document.getElementById("text").removeAttribute("onclick")
            document.getElementById("playertext").innerHTML = data.html

        }
        else{
            document.getElementById("playertext").innerHTML = data.html
        }
    }
    else {
        document.getElementById("char_"+data.personaje_id).removeAttribute("hidden")
        document.getElementById("char_"+data.personaje_id).querySelectorAll(".textbox")[0].innerHTML = data.html
        document.getElementById("playertext").innerHTML = "siguiente . . ."
    }

    textOrder = data.orden
    document.getElementById("esencias").innerHTML = data.esencias
}

siguienteTexto()
