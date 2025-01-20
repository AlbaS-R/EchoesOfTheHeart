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
                        <div class="progress-bar" style="width: {{ $progreso }}%;"></div>
                    </div>
                    @if ($capitulo->reinicios >= 5)
                        <button class="btnTuto" disabled>Limite de reinicios alcanzado</button>
                    @else
                        <div class="reinicios">
                            Reinicios: {{ $capitulo->reinicios ?? 0 }}/5
                        </div>
                        <a href="{{ route('reiniciar.historia', ['capitulo_id' => $capitulo->id]) }}">
                            <img class="btnTuto" src="{{ asset('images/capitulos/btnCap.png') }}" alt="">
                        </a>
                    @endif
                </div>
            </div>
            <br>
        @endforeach
        <br>
    </div>
@endsection
