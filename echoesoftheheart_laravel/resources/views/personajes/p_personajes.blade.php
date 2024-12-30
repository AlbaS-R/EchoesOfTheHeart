@extends('layouts.default')


@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_personajesStyle.css') }}">

    <div class="container">
        <img class="n_1" src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Pj1">
        <div class="pj_1">
            <p>primera descripción</p>
        </div>

        <img class="n_2" src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Pj2">
        <div class="pj_2">
            <p>descripción</p>
        </div>

        <img class="n_3" src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Pj3">
        <div class="pj_3">
            <p>otra descripción</p>
        </div>

        <img class="n_4" src="{{ asset('images/default/btnMenu/btn.png') }}" alt="Pj4">
        <div class="pj_4">
            <p>última descripción</p>
        </div>
    </div>
@endsection
