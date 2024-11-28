<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/registroStyle.css') }}">
</head>
<body>
    <div class="container">
        <div id="contenido">


        <form action="{{ route('processRegister') }}" method="POST">
            @csrf

                    <div class="usuario">
                    <p>Nombre de usuario:</p>
                    <input type="text" name="name" required>
                    </div>
                    <p>Email:</p>
                    <input type="text" name="email" required>
                    <p>Contraseña:</p>
                    <input type="text" name="password" required>
                    <p>Repite la contraseña:</p>
                    <input type="text" name="password_confirmation" required>
                    <div class="buttons-container"style="border: none; background: none; position: relative;">
                        <img src="{{ asset('images/login/botón.png') }}" alt="Registrar" style="width: 150px; height: auto;">
                        <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgb(201, 82, 13); font-weight: bold; font-size: 16px; font-family:GreekFont;">Resgistrar</span>
                    </div>
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

                    <div class="success">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                    </div>

            </div>
        </div>
    </form>


</body>
</html>





