<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('products') }}">Petshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('products') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pets') }}">Pets</a>
                    </li>
                </ul>
                <a class="btn btn-outline-danger" href="">Logout</a>
            </div>
        </div>
    </nav>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <p align="center" class="my-3">
        <a href="{{ route('adoptions.history') }}">Histórico de Adoções</a>
    </p>

    <div class="container">
        @forelse ($pets as $pet)
            <div class="card">
                <div class="card-body">
                    <div>{{ $pet['name'] }}</div>
                    <div>{{ $pet['species_name'] }}</div>
                    <div>{{ $pet['race'] }}</div>
                    <div>{{ $pet['description'] }}</div>
                    <div>{{ $pet['weight'] }} Kg</div>
                    <a href="{{ route('adoptions.create', ['petId' => $pet['id']]) }}">Adotar pet</a>
                </div>
            </div>
        @empty
            <div>Não há pets disponíveis</div>
        @endforelse
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>