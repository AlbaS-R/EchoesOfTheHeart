function siguienteTexto() {
    const data = {
        textOrder: textOrder,
        _token: _token
    }
    $.post("/juego/siguiente", data, function (data) {
        mostrar(data)
    })
        .fail(function (response) {
            if (response.status == 302) {
                window.location.replace(response.responseText);
            }
            else {
                alert('Error: ' + response.responseText);
            }
        });
}

function decision(id) {
    const data = {
        id: id,
        _token: _token
    }
    $.post("/juego/decision", data, function (data) {
        mostrar(data)
    })
        .fail(function (response) {
            alert('Error: ' + response.responseText);
        });
}

function mostrar(data) {

    // text handling
    if (data.personaje_id == 1) {
        if (data.tipo == "eleccion") {

            document.getElementById("text").removeAttribute("onclick")
            document.getElementById("playertext").innerHTML = ""

            data.choices.forEach(element => {
                document.getElementById("playertext").innerHTML += `<a onclick="decision(${element.destination})">${element.html}</a><br>`
            });
            // document.getElementById("playertext").innerHTML = "DECISION"

        }
        else {
            document.getElementById("playertext").innerHTML = data.html
            document.getElementById("text").setAttribute("onclick", "siguienteTexto()")

        }
    }
    else {
        $("#char_" + data.personaje_id).css("display", "flex");
        document.getElementById("char_" + data.personaje_id).querySelectorAll(".textbox")[0].innerHTML = data.html
        document.getElementById("text").setAttribute("onclick", "siguienteTexto()")
        document.getElementById("playertext").innerHTML = "siguiente . . ."
    }

    // background image handling
    $(".juego").css("background-image", "url(" + data.url_fondo + ")");

    // show characters
    if (data.mostrar && data.mostrar !== "") {
        if (data.mostrar === "todos") {
            // Mostrar todos los personajes si el valor es "todos"
            $("#char_2").css("display", "flex");
            $("#char_3").css("display", "flex");
            $("#char_4").css("display", "flex");
        } else {
            // Ocultar todos los personajes por defecto
            $("#char_2, #char_3, #char_4").css("display", "none");

            // Mostrar solo los personajes cuyas IDs están en data.mostrar
            let personajes = data.mostrar.split(",");
            personajes.forEach(function (personaje) {
                let charElement = $("#char_" + personaje);
                if (charElement.length) {
                    charElement.css("display", "flex");
                }
            });
        }
    } else {
        // Si data.mostrar está vacío, oculta todos los personajes
        $("#char_2, #char_3, #char_4").css("display", "none");
    }


    textOrder = data.orden_origen
    document.getElementById("esencias").innerHTML = data.esencias
}

siguienteTexto()
