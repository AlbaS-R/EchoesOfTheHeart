@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ asset('css/p_imagenesStyle.css') }}">
    <div class="contenedor">
        <div class="fila">
            <img class="jrrnTuto" src="{{ asset('images/galeria/imgJrrn3.png') }}" alt="JrrnTutorial">
            <div class="cap0">
                <p class="titulos">Tutorial</p>
                <div class="imgsTuto" >
                    <img src="{{ asset('images/galeria/marcoImg.png') }}" alt="">
                    <img src="{{ asset('images/galeria/marcoImg.png') }}" alt="">
                </div>
            </div>

        </div>
        <div class="fila">
            <img class="jrrnCap1" src="{{ asset('images/galeria/imgJrrn3.png') }}" alt="JrrnCap1">
            <div class="cap1">
                <p class="titulos">capitulo 1</p>
                <div class="imgsTuto">
                    <img  src="{{ asset('images/galeria/marcoImg.png') }}" alt="">
                    <img  src="{{ asset('images/galeria/marcoImg.png') }}" alt="">
                </div>

            </div>
        </div>

    </div>
@endsection
