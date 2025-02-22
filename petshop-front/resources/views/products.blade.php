<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    @forelse ($products as $product)
        <div>{{ $product['name'] }}</div>
    @empty
        <div>Não há produtos cadastrados</div>
    @endforelse
</body>
</html>