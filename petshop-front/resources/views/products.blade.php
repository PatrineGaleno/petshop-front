<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
                <a class="btn btn-outline-danger" href="{{ route("login.destroy") }}">Logout</a>
            </div>
        </div>
    </nav>

    <p align="center" class="my-3">
        <a href="{{ route('sales.history') }}">Histórico de Compras</a>
    </p>

    <div class="container">
        @forelse ($products as $product)
            <div class="card">
                <div class="card-body">
                    <div>{{ $product['name'] }}</div>
                    <div>R$ {{ $product['price'] }}</div>
                    <div>{{ $product['current_quantity'] }} itens restantes</div>
                    <a href="{{ route('sales.create', ['productId' => $product['id']]) }}">Comprar produto</a>
                </div>
            </div>
        @empty
            <div>Não há produtos cadastrados</div>
        @endforelse
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>