<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Produto</title>
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

    <h1>Comprar {{ $product['name'] }}</h1>

    <form action="{{ route("sales.store") }}" method="post">
        @csrf
        <input type="number" name="boughtQuantity" step="1" required placeholder="Quantidade do produto"> <br>
        
        <select name="paymentForm">
            <option value="P">PIX</option>
            <option value="C">Cartão</option>
        </select>

        <input type="hidden" name="productId" required value="{{ $product['id'] }}"> <br>
        
        <input type="submit" value="Enviar">
    </form>
</body>

</html>