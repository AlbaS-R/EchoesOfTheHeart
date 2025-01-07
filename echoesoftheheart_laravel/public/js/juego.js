function siguienteTexto(){
    const data={
        textOrder: textOrder,
        _token: _token
    }
    $.post("/juego/siguiente", data, function(data, status){
        console.log(`${data} and status is ${status}`)

        if (data.personaje_id == 1){
            document.getElementById("playertext").innerHTML = data.html
        }
        else{
            document.getElementById("characters").innerHTML = data.html
            document.getElementById("playertext").innerHTML = "siguiente..."
        }

        textOrder = data.orden

    })
}

siguienteTexto()
