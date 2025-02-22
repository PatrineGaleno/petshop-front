<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adotar Pet</title>
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

    <h1>Adotar {{ $pet['name'] }}</h1>

    <form action="{{ route("adoptions.store") }}" method="post">
        @csrf
        <input type="hidden" name="petId" required value="{{ $pet['id'] }}"> <br>
        
        <input type="submit" value="Adotar">
    </form>
</body>

</html>