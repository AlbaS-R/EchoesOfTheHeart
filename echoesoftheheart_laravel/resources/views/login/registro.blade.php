<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/registroStyle.css') }}">
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

    <div class="success">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>


    <form action="{{ route('processRegister') }}" method="POST">
        @csrf
        <div class="container">
            <div id="contenido">
                <div class="usuario">
                <p>Nombre de usuario:</p>
                <input type="text" name="name" required>
                </div>
                <p>Email:</p>
                <input type="email" name="email" required>
                <p>Contraseña:</p>
                <input type="password" name="password" required>
                <p>Repite la contraseña:</p>
                <input type="password" name="password_confirmation" required>
                <div class="buttons-container">
                    <button id="btnSend" type="submit">Registrar</button>
                </div>
            </div>
        </div>
    </form>


</body>
</html>





