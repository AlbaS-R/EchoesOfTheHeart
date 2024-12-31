@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ asset('css/p_juegoStyle.css') }}">
    <div class="juego">
        <div class="dialogo">
            <img class="marco" src="{{ asset('images/juego/marco.png') }}" alt="Marco">
            <img class="m_dialogo" src="{{ asset('images/juego/dialogo.png') }}" alt="Dialogo">
            <img class="e_marco" src="{{ asset('images/juego/elipse_marco.png') }}" alt="elipse">
        </div>
    </div>
@endsection
