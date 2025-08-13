<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Show</title>
</head>
<body>
    <div>
        <h1>Category Show</h1>
        {{-- {{ $category }} --}}
        <div>
            <p>{{ $category['id'] }} : {{ $category['name'] }}</p>
            <a href="{{ route('categories.index') }}">Back</a>
        </div>
    </div>
</body>
</html>