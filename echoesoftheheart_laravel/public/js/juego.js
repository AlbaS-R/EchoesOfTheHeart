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

function mostrar(data) {
    // Manejo de texto
    if (data.opciones && data.opciones.length > 0) {
        // Si hay múltiples opciones (elecciones), crear botones para cada una.
        const opcionesDiv = document.getElementById("text");
        opcionesDiv.innerHTML = ""; // Limpiar el texto previo

        data.opciones.forEach(opcion => {
            const boton = document.createElement("button");
            boton.className = "opcion";
            boton.innerText = opcion.html;
            boton.onclick = function () {
                decision(opcion.id);
            };
            opcionesDiv.appendChild(boton);
        });

        document.getElementById("text").removeAttribute("onclick"); 
    } else if (data.personaje_id == 1) {
        if (data.tipo == "eleccion") {
            document.getElementById("text").removeAttribute("onclick");
            document.getElementById("playertext").innerHTML = data.html;
        } else {
            document.getElementById("playertext").innerHTML = data.html;
            document.getElementById("text").setAttribute("onclick", "siguienteTexto()");
        }
    } else {
        $("#char_" + data.personaje_id).css("display", "flex");
        document.getElementById("char_" + data.personaje_id).querySelectorAll(".textbox")[0].innerHTML = data.html;
        document.getElementById("text").setAttribute("onclick", "siguienteTexto()");
        document.getElementById("playertext").innerHTML = "siguiente . . .";
    }

    // bg image handler
    $(".juego").css("background-image", "url(" + data.url_fondo + ")");

    // hiding chars
    if (data.esconder != "") {
        if (data.esconder == "todos") {
            $("#char_2").css("display", "none");
            $("#char_3").css("display", "none");
            $("#char_4").css("display", "none");
        } else {
            $("#char_" + data.esconder).css("display", "none");
        }
    }

    textOrder = data.orden;
    document.getElementById("esencias").innerHTML = data.esencias;
}
