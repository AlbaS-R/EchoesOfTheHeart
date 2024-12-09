<!-- resources/views/inici/principal.blade.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/inicioStyle.css') }}">
    <title>Inicio</title>
</head>
<body>
    <img class="img1" src="{{ asset('images/principal/pilar.png') }}" alt="Imagen Principal">
    <img class="img2"  src="{{ asset('images/principal/pilar.png') }}" alt="Imagen Principal">
    <div class="usuario">
        <div class="user-info">
            <div class="name">
                {{ Auth::user()->name }}
            </div>
            <div class="stats">
                <div class="stat-item">
                    {{ Auth::user()->dolares }}
                </div>
                <div class="stat-item">
                    {{ Auth::user()->esencias }}
                </div>
            </div>
        </div>
    </div>

    <div class="contenido">
        <img class="imgJrrn" src="{{ asset('images/principal/jarrón.png') }}" alt="Jarrón Principal">
        <img class="imgPrg" src="{{ asset('images/principal/pergaminoMain.png') }}" alt="Pergamino Main">
        <br>
        <br>
        <img class="imgDiv" src="{{ asset('images/principal/divisor1.png') }}" alt="Divisor Principal">
    </div>
    <div class="updates">

    </div>
</body>
</html>

