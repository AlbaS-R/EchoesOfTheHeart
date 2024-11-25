<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/loginStyle.css') }}">
</head>
<body>
    <div class="error">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    
    <div class="container">
        <div id="contenido">
            <form action="{{ route('processLogin') }}" method="POST">
                @csrf
                <img src="{{ asset('images/login/logo.png') }}" style="width: 250px;" id="logo"/>
                <div class="contenidor">
                    <p>Email</p>
                    <input type="email" name="email" required>
                    <br>
                    <p>Contraseña</p>
                    <input type="password" name="password" required>
                </div>
                <br>
                <div class="botones">
                    <button id="btnSend" type="submit" style="border: none; background: none;">
                        <img src="{{ asset('images/login/botón.png') }}" alt="Enviar" style="width: 150px; height: auto;">
                    </button>

                    <a id="btnRegister" href="{{route('registrar')}}" style="border: none; background: none;">
                        <img src="{{ asset('images/login/botón.png') }}" alt="Registrar" style="width: 150px; height: auto;">
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

