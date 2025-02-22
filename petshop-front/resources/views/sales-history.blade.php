<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div align="center" class="my-3">
        <a href="{{ route('products') }}">Voltar para produtos</a>
    </div>

    <div class="container">

        @forelse ($sales as $sale)
            <div class="card my-3">
                <div class="card-body">
                    <div class="card-title">
                        <div>{{ $sale['product_name'] }}</div>
                    </div>
                    <div>{{ $sale['bought_quantity'] }}</div>
                    <div>{{ $sale['price_on_sale'] }}</div>
                    <div>{{ $sale['payment_form'] }}</div>
                    <div>{{ $sale['date'] }}</div>
                </div>
            </div>
        @empty
            <div>Não há compras cadastradas</div>
        @endforelse
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>