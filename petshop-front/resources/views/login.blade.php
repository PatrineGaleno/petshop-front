<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    
    <div class="container my-5">
        <h1>Login</h1> 
        <form action="{{ route("login.store") }}" method="post">
            @csrf
            <input class="form-control" type="text" name="username" required placeholder="Digite seu nome de usuário"> <br>
            <input class="form-control" type="password" name="password" required placeholder="Digite a sua senha"> <br>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>
        <a href="{{ route('register') }}">Ainda não possui cadastro?</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>