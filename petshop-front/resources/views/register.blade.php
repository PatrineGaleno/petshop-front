<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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

    
    <div class="container my-5">
        <h1>Cadastro</h1>
        <form action="{{ route("register.store") }}" method="post">
            @csrf
            <input class="form-control" type="text" name="username" required placeholder="Digite seu nome de usuário"> <br>
            <input class="form-control" type="password" name="password" required placeholder="Digite a sua senha"> <br>
            <input class="form-control" type="email" name="email" required placeholder="Digite o seu email"> <br>
            <input class="form-control" type="text" name="firstName" required placeholder="Digite o seu primeiro nome"> <br>
            <input class="form-control" type="text" name="lastName" required placeholder="Digite o seu último nome"> <br>
            <input class="form-control" type="text" name="phone" required placeholder="Digite o seu telefone"> <br>
            <input class="form-control" type="text" name="address" required placeholder="Digite o seu endereço"> <br>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>
        <a href="{{ route('login') }}">Já possui uma conta?</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>