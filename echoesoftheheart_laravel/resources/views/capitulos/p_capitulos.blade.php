@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_capitulosStyle.css') }}">
    <div class="container">
        <div class="fila">
            <div class="overlay-text">Tutorial</div>
            <img class="tuto" src="{{ asset('images/capitulos/imgJrrn2.png') }}" alt="Tuto">
            <div class="cap_0">
                <a href="">
                    <img class="btnTuto" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
                </a>
            </div>
        </div>
        <br>
        <div class="fila">
            <div class="overlay-text"> <p class="tit1">Capítulo 1</p></div>
            <img class="cap1" src="{{ asset('images/capitulos/imgJrrn2.png') }}" alt="Cap1">
            <div class="cap_1">
                <a href="">
                    <img class="btnCap1" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
                </a>
            </div>
        </div>
        <br>
        <div class="fila">
            <div class="overlay-text"><p class="tit2">Capítulo 2</p></div>
            <img class="cap2" src="{{ asset('images/capitulos/imgJrrn2.png') }}" alt="Cap2">
            <div class="cap_2">
                <a href="">
                    <img class="btnCap2" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
                </a>
            </div>
        </div>
        <br>
    </div>
@endsection
