@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_capitulosStyle.css') }}">
    <div class="container">
        <div class="fila">
            <img class="tuto" src="{{ asset('images/capitulos/imgJrrn2.png') }}" alt="Tuto">
            <div class="cap_0">
                <img class="btnTuto" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
            </div>
        </div>
        <br>
        <div class="fila">
            <img class="cap1" src="{{ asset('images/capitulos/imgJrrn2.png') }}" alt="Cap1">
            <div class="cap_1">
                <img class="btnCap1" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
            </div>
        </div>
        <br>
        <div class="fila">
            <img class="cap2" src="{{ asset('images/capitulos/imgJrrn2.png') }}" alt="Cap2">
            <div class="cap_2">
                <img class="btnCap1" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
            </div>
        </div>
        <br>
    </div>
@endsection
