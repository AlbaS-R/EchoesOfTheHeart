@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_capitulosStyle.css') }}">
    <div class="container">
        @foreach ($capitulos as $capitulo)
            <div class="fila">
                <div class="overlay-text">{{ $capitulo->nombre }}</div>
                <img class="tuto" src="{{ asset('images/capitulos/imgJrrn2.png') }}" alt="Tuto">
                <div class="cap_0">
                    <div class="descrp">{{ $capitulo->descripcion }}</div>
                    <div class="progress-bar-container">
                        <div id="progress-bar-{{ $capitulo->id }}" class="progress-bar"></div>
                    </div>
                    <a href="">
                        <img class="btnTuto" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
                    </a>
                </div>
            </div>
            <br>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    @foreach ($capitulos as $capitulo)
                        fetch(`/progreso/{{$capitulo->id}}`)
                            .then(response => response.json())
                            .then(data => {
                                const progressBar = document.getElementById("progress-bar-{{$capitulo->id}}");
                                progressBar.style.width = `${data.progreso}%`;
                            })
                            .catch(error => console.error('Error al cargar el progreso:', error));
                    @endforeach
                });
            </script>
        @endforeach
        <br>
    </div>
@endsection
