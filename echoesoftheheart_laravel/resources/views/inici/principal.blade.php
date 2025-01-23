<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/inicioStyle.css') }}">
    <title>Inicio</title>
</head>

<body>
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
        <div class="contenido">

            <img class="imgJrrn" src="{{ asset('images/principal/jarrón.png') }}" alt="Jarrón Principal">
            <div class="progress-container">
                <div class="progress-bar" style="width: {{$progreso}}%;"></div>
            </div>
            <img class="mainChar" src="{{ asset('media_juego/personajes/mainCharacter.png') }}" alt="">
            <img class="imgPrg" src="{{ asset('images/principal/pergaminoMain.png') }}" alt="Pergamino Main">
            <div class="menuPrn">
                <a class="btnH" href="{{ route('juego') }}">
                    <img  src="{{ asset('images/principal/Btn/btnM1.png') }}" alt="Historia">
                </a>
                <a id="btnC" href="{{ route('capitulos') }}">
                    <img src="{{ asset('images/principal/Btn/btnM2.png') }}" alt="Capitulos">

                </a>
                <a id="btnU" href="{{ route('perfil') }}">
                    <img src="{{ asset('images/principal/Btn/btnM3.png') }}" alt="Perfil">

                </a>
                <a id="btnI" href="{{ route('imagenes') }}">
                    <img src="{{ asset('images/principal/Btn/btnM4.png') }}" alt="Imagenes">


                </a>
                <a id="btnP" href="{{ route('personajes') }}">
                    <img src="{{ asset('images/principal/Btn/btnM5.png') }}" alt="Personajes">


                </a>
            </div>
            <div class="primero">
                <img class="ellipse1" src="{{ asset('images/principal/Menu/Ellipse1.png') }}" alt="Ellipse1">
                <img class="rectangle1" src="{{ asset('images/principal/Menu/Rectangle1.png') }}" alt="Rectangle1">
            </div>
            <div class="segundo">
                <img class="ellipse2" src="{{ asset('images/principal/Menu/Ellipse2.png') }}" alt="Ellipse2">
                <img class="rectangle2" src="{{ asset('images/principal/Menu/Rectangle2.png') }}" alt="Rectangle2">
            </div>
            <br>
            <br>
        </div>
        <div class="updates">
            <img class="imgDiv2" src="{{ asset('images/principal/divisor2.png') }}" alt="Divisor Principal 2">
            <br>
            <br>
            <img class="imgPrg2" src="{{ asset('images/principal/updates.png') }}" alt="Updates Main">

            <div class="slider-container">
                <div class="slider">
                    @foreach ($news as $new)
                        <div class="slide">
                            <h3>{{ $new->titulo }}</h3>
                            <p>{{ $new->texto }}</p>
                        </div>
                    @endforeach
                </div>
                <!-- Navigation Buttons -->
                <button class="prev">❮</button>
                <button class="next">❯</button>
            </div>
            <br>



        </div>
        <br>
        <div class="footer">

            <p>Echoes Of The Heart {{date("Y");}}, source available at <a href="https://github.com/AlbaS-R/EchoesOfTheHeart">Github</a>,
                Hosting and development environment provided by <a href="https://subpolygon.com">Subpolygon Servers</a></p>

        </div>
        <script src="js/update.js"></script>


</body>

</html>
