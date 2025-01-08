@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_capitulosStyle.css') }}">
    <div class="container">
        @foreach ($capitulos as $capitulo)
            <div class="fila">
                <div class="overlay-text">{{$capitulo->nombre}}</div>
                <img class="tuto" src="{{ asset('images/capitulos/imgJrrn2.png') }}" alt="Tuto">
                <div class="cap_0">
                    <a href="">
                        <img class="btnTuto" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
                    </a>
                </div>
            </div>
            <br>
        @endforeach
        <br>
    </div>
@endsection
