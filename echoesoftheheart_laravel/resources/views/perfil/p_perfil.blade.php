@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_perfilStyle.css') }}">
    <div class="container">
        <div class="info">
            <div class="nombre" id="nombreDisplay">
                {{ Auth::user()->name }}
            </div>
            <a class="edit-button" onclick="openEditForm()">
                <img src="{{ asset('images/perfil/btnEdit.png') }}" alt="">
            </a>
            <div class="cositas">
                {{ Auth::user()->email }}<br>
                {{ Auth::user()->fecha_de_registro }}
            </div>
        </div>
    </div>

    <div class="modal" id="editModal" style="display: none;">
        <div class="modal-content">
            <h2>Editar Nombre</h2>
            <form id="editNameForm">
                @csrf
                <input type="text" name="new_name" id="newNameInput" placeholder="Nuevo nombre" required>
                <button type="submit">Guardar</button>
                <button type="button" onclick="closeEditForm()">Cancelar</button>
            </form>
        </div>
    </div>
    <script src="js/perfil.js"></script>
@endsection
