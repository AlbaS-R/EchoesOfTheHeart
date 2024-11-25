<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <p>
            User data:<br>
            id: {{ Auth::user()->id }}<br>
            name: {{ Auth::user()->name }}<br>
            email: {{ Auth::user()->email }}<br>
        </p>

        <p>
            Raw:<br>
            {{ Auth::user() }}
        </p>

    </div>
</body>

</html>
