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
                        <p class="descripcion">Una ninfa misteriosa y juguetona que deslumbra con su risa etérea y movimientos gráciles. Su presencia evoca un aire mágico, mientras sus ojos centellean con secretos de los bosques antiguos.</p>

                        <p>Love Meter: {{ $personaje['lovemeter'] }}</p>
                        <img class="perfil1" src="{{ asset('images/pjs/perfil_Amaranta.png') }}" alt="perfilAma">
                    </div>
                </div>
            @elseif ($personaje['id'] == 3)
                <div id="char_3">
                    <div class="overlay-text2">Ajax</div>
                    <img class="n_2" src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Pj2">
                    <div class="pj_2">
                        <p class="descripcion">Un militar espartano serio y defensivo, cuya mirada acerada refleja una disciplina implacable. Su postura firme y armadura impecable hablan de años en el campo de batalla. Aunque reservado, su presencia inspira respeto y seguridad; un guardián dispuesto a proteger a su gente a cualquier costo.</p>
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
                        <p class="descripcion">Un músico tranquilo y amable, con una sonrisa que emana serenidad y calma. Se le encuentra con frecuencia en rincones soleados, acariciando las cuerdas de su lira o cantando melodías suaves. Su música tiene el poder de apaciguar corazones y llenar el aire de armonía.</p>
                        <br>
                        <p>Love Meter: {{ $personaje['lovemeter'] }}</p>
                        <img class="perfil3" src="{{ asset('images/pjs/perfil_helio.png') }}" alt="">
                    </div>
                </div>
            @endif
        @endforeach

    </div>
@endsection
