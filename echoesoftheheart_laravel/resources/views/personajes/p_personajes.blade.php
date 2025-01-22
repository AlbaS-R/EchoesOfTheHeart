@extends('layouts.default')


@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_personajesStyle.css') }}">

    <div class="container">



        @foreach ($personajes as $personaje)
            @if ($personaje['id'] == 2)
                <div id="char_2">
                    <div class="overlay-text1">Amaranta</div>
                    <img class="n_1" src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Pj1">
                    <div class="pj_1">
                        <p>Amaranta una ninfa</p>
                        <br>
                        <p>Love Meter: {{ $personaje['lovemeter'] }}</p>
                        <img class="perfil1" src="{{ asset('images/pjs/perfil_Amaranta.png') }}" alt="perfilAma">
                    </div>
                </div>
            @elseif ($personaje['id'] == 3)
                <div id="char_3">
                    <div class="overlay-text2">Ajax</div>
                    <img class="n_2" src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Pj2">
                    <div class="pj_2">
                        <p>Descripción</p>
                        <br>
                        <p>Love Meter: {{ $personaje['lovemeter'] }}</p>
                        <img class="perfil2" src="{{ asset('images/pjs/perfil_ajax.png') }}" alt="">
                    </div>
                </div>
            @elseif ($personaje['id'] == 4)
                <div id="char_4">
                    <div class="overlay-text3">Helio</div>
                    <img class="n_3" src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Pj3">
                    <div class="pj_3">
                        <p>Otra descripción</p>
                        <br>
                        <p>Love Meter: {{ $personaje['lovemeter'] }}</p>
                        <img class="perfil3" src="{{ asset('images/pjs/perfil_helio.png') }}" alt="">
                    </div>
                </div>
            @endif
        @endforeach

    </div>
@endsection
