<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Produto</title>
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
        <h1>Comprar {{ $product['name'] }}</h1>
        <form action="{{ route("sales.store") }}" method="post">
            @csrf
            <input class="form-control" type="number" name="boughtQuantity" step="1" required placeholder="Quantidade do produto"> <br>
            
            <select class="form-control" name="paymentForm">
                <option value="P">PIX</option>
                <option value="C">Cartão</option>
            </selec>
    
            <input type="hidden" name="productId" required value="{{ $product['id'] }}"> <br>
            
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>