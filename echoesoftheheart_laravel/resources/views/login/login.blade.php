<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/loginStyle.css') }}">
</head>

<body>

    <div class="container">
        <div id="contenido">

            <form action="{{ route('processLogin') }}" method="POST">
                @csrf
                <img src="{{ asset('images/login/logo.png') }}" style="width: 250px;" id="logo" />
                <div class="contenidor">
                    <p>Email</p>
                    <input type="text" name="email" required>
                    <br>
                    <p>Contraseña</p>
                    <input type="password" name="password" required>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="botones">
                    <!-- Botón de enviar -->
                    <button id="btnSend" type="submit" style="border: none; background: none; position: relative;">
                        <img src="{{ asset('images/login/botón.png') }}" alt="Enviar"
                            style="width: 150px; height: auto;">
                        <span
                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(201, 82, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Enviar</span>
                    </button>

                    <!-- Botón de registrar -->
                    <a id="btnRegister" href="{{ route('registrar') }}"
                        style="border: none; background: none; position: relative; display: inline-block;">
                        <img src="{{ asset('images/login/botón.png') }}" alt="Registrar"
                            style="width: 150px; height: auto;">
                        <span
                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(201, 82, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Registrar</span>
                    </a>
                </div>
                <script src="src/login.js"></script>
            </form>

        </div>
    </div>
</body>

</html>
