<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>
    @forelse ($products as $product)
        <div>
            <div>{{ $product['name'] }}</div>
            <div>{{ $product['current_quantity'] }}</div>
            <div>{{ $product['price'] }}</div>
            <a href="{{ route('sales.create', ['productId' => $product['id']]) }}">Comprar produto</a>
        </div>
    @empty
        <div>Não há produtos cadastrados</div>
    @endforelse
</body>

</html>