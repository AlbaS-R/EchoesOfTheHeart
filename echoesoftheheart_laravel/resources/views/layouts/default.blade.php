<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <script src="/js/jquery-3.7.1.min.js"></script>
    <title>Inicio</title>
</head>
<body>
    <img class="img1" src="{{ asset('images/principal/pilar.png') }}" alt="Imagen Principal">
    <img class="img2"  src="{{ asset('images/principal/pilar.png') }}" alt="Imagen Principal">
    <div class="usuario">
        <div class="logout-button">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">X</button>
            </form>
        </div>
        <div class="user-info">
            <div class="name">
                {{ Auth::user()->name }}
            </div>
            <div class="stats">
                <div class="stat-item">
                    ${{ Auth::user()->dolares }}
                </div>
                <div class="stat-item">
                    {{ Auth::user()->esencias }}
                </div>
            </div>
        </div>
    </div>

    <div class="todo">
        <div class="menu">

            <a href="{{ route('inicio') }}"
                style="border: none; background: none; position: relative; display: inline-block;">
                <img src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Inicio">
                <span
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(224, 126, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Inicio</span>
            </a>
            <a href="{{ route('juego') }}"
                style="border: none; background: none; position: relative; display: inline-block;">
                <img src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Historia">
                <span
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(224, 126, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Historia</span>
            </a>
            <a href="{{ route('capitulos') }}"
                style="border: none; background: none; position: relative; display: inline-block;">
                <img src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Capitulos">
                <span
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(224, 126, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Capitulos</span>
            </a>
            <a href="{{ route('personajes') }}"
                style="border: none; background: none; position: relative; display: inline-block;">
                <img src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Personajes">
                <span
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(224, 126, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Personajes</span>
            </a>
            <a href="{{ route('imagenes') }}"
                style="border: none; background: none; position: relative; display: inline-block;">
                <img src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Imagenes">
                <span
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(224, 126, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Imagenes</span>
            </a>
            <a href="{{ route('perfil') }}"
                style="border: none; background: none; position: relative; display: inline-block;">
                <img src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Perfil">
                <span
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(224, 126, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Perfil</span>
            </a>

        </div>
        <div class="contenido">
            @yield('content')

        </div>
        <div class="footer">

            <p>ejemplo</p>
        </div>

    </div>
</body>
</html>

