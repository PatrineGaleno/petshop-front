<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    @if ($errors && $errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    Login

    <form action="{{ route("login.store") }}" method="post">
        @csrf
        <input type="text" name="username" required placeholder="Digite seu nome de usuário"> <br>
        <input type="password" name="password" required placeholder="Digite a sua senha"> <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>