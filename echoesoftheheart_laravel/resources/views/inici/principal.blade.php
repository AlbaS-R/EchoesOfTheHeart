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
        <div class="contenido">
            <img class="imgJrrn" src="{{ asset('images/principal/jarrón.png') }}" alt="Jarrón Principal">
            <img class="imgPrg" src="{{ asset('images/principal/pergaminoMain.png') }}" alt="Pergamino Main">
            <div class="menuPrn">
                <a class="btnH" href="{{ route('juego') }}">
                    <img src="{{ asset('images/principal/Btn/btnM1.png') }}" alt="Historia">
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
            <img class="imgDiv" src="{{ asset('images/principal/divisor1.png') }}" alt="Divisor Principal">
        </div>
        <div class="updates">
            <img class="imgDiv2" src="{{ asset('images/principal/divisor2.png') }}" alt="Divisor Principal 2">
            <br>
            <br>
            <img class="imgPrg2" src="{{ asset('images/principal/updates.png') }}" alt="Updates Main">

            @foreach ($news as $new)
                <p>{{$new->titulo}}</p>
            @endforeach

        </div>
        <div class="footer">

            <p>ejemplo</p>

        </div>


    </div>



</body>
</html>

