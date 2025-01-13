@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/p_imagenesStyle.css') }}">
    <div class="contenedor">
        <div class="fila">
            <img class="jrrnTuto" src="{{ asset('images/galeria/imgJrrn3.png') }}" alt="JrrnTutorial">
            <div class="cap0">
                <p class="titulos">Tutorial</p>
                <div class="imgsTuto">
                    @foreach ($imagenes as $imagen)
                        <div class="marco">
                            <img class="imagen" src="{{$imagen->url}}" alt="Imagen del usuario"
                                onclick="ampliarImagen('{{$imagen->url}}')">
                            <img class="marcoImg" src="{{ asset('images/galeria/marcoImg.png') }}" alt="Marco">
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <div id="imagenModal" class="modal" onclick="cerrarModal()">
        <span class="close">&times;</span>
        <img class="modal-content" id="imagenAmpliada">
    </div>
    <script>
        // Ampliar imagen
        function ampliarImagen(src) {
            const modal = document.getElementById('imagenModal');
            const modalImg = document.getElementById('imagenAmpliada');
            modal.style.display = 'block';
            modalImg.src = src;
        }

        // Cerrar modal
        function cerrarModal() {
            const modal = document.getElementById('imagenModal');
            modal.style.display = 'none';
        }
    </script>
@endsection
