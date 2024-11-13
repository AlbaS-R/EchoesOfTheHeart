@extends('layouts.login-signin')

@section('content')
<div id="contenido">
    <br>
    <br>
    <img src="{{ asset('images/login/logo.png') }}" style=" width: 250px;" id="logo"/>
    <div class="contenidor">

        <p>Usuario /  Email</p>
        <input type="text">
        <br>
        <p>Contraseña</p>
        <input type="text">
    </div>
    <br>
    <div class="botones">
        <button id="btnSend" type="submit" style="border: none; background: none;">
            <img src="{{ asset('images/login/botón.png') }}" alt="Enviar" style="width: 150px; height: auto;">
        </button>

        <button id="btnRgt" type="submit" style="border: none; background: none;">
            <img src="{{ asset('images/login/botón.png') }}" alt="Registrar" style="width: 150px; height: auto;">
        </button>
        <br>
    <button id="btnRgtGoogle" type="submit" style="border: none; background: none;">
        <img src="{{ asset('images/login/botón.png') }}" alt="Registrar" style="width: 200px; height: auto;">
    </button>
    </div>

</div>
@endsection
