<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Adoções</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div align="center" class="my-3">
        <a href="{{ route('pets') }}">Voltar para pets</a>
    </div>

    <div class="container">

        @forelse ($adoptions as $adoption)
            <div class="card my-3">
                <div class="card-body">
                    <div class="card-title">
                        <div>{{ $adoption['pet_name'] }}</div>
                    </div>
                    <div>{{ $adoption['solicitation_date'] }}</div>
                    <div>{{ $adoption['status'] }}</div>
                </div>
            </div>
        @empty
            <div>Não há adoções cadastradas.</div>
        @endforelse
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>