@extends('layouts.login-signin')

@section('content')
<div id="contenido">
    <h1>Echoes of the heart</h1>
    <h3>Registro</h3>
    <br>
    <p>Usuario:</p>
    <input type="text">
    <br>
    <p>Email:</p>
    <input type="text">
    <br>
    <p>Contraseña:</p>
    <input type="text">
    <br>
    <p>Repite la contraseña:</p>
    <input type="text">
    <br>
    <br>
    <button>Registro</button> <button>Registrar con Google</button>
</div>
@endsection
