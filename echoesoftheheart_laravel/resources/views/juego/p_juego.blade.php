@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_juegoStyle.css') }}">
    <div class="juego">
        <div class="dialogo">


            {{-- variables iniciales para el js --}}
            <script>
                let textOrder = {{ $dialogo->orden-1 }}
                let _token = "{{ csrf_token() }}"
            </script>

            {{-- div para texto jugador --}}
            <div id="text" onclick="siguienteTexto()">

                <a id="playertext">siguiente...</a>
            </div>


            {{-- div para personajes --}}
            <div id="characters">
                <div id="char_2" hidden>
                    <img id="char_2_img" src="https://echoesoftheheart.subpolygon.com/media_juego/personajes/amongus.png" style="height: 400px;">
                    <div class="textbox" id="amaranta_text"></div>
                </div>
                <div id="char_3" hidden>
                    <img id="char_3_img" src="https://echoesoftheheart.subpolygon.com/media_juego/personajes/ajax.png" style="height: 400px;">
                    <div class="textbox" id="ajax_text"></div>
                </div>
                <div id="char_4" hidden>
                    <img id="char_4_img" src="https://echoesoftheheart.subpolygon.com/media_juego/personajes/helium.png" style="height: 400px;">
                    <div class="textbox" id="elio_text"></div>
                </div>
            </div>

            <img class="marco" src="{{ asset('images/juego/marco.png') }}" alt="Marco">
            <img class="m_dialogo" src="{{ asset('images/juego/dialogo.png') }}" alt="Dialogo">
            <img class="e_marco" src="{{ asset('images/juego/elipse_marco.png') }}" alt="elipse">
        </div>
    </div>
    <script src="js/juego.js"></script>
@endsection
