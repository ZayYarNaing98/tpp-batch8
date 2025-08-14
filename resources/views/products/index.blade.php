<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
</head>
<body>
    <div>
        <h1>Product List</h1>
        @foreach ($products as $data)
            <div>{{ $data['id'] }} => {{ $data ['name']}} &nbsp;&nbsp;&nbsp; {{ $data['description'] }} &nbsp;&nbsp;&nbsp; {{ $data['price'] }}</div>
            <a href="{{ route('products.show', [$data->id]) }}">Show</a>
        @endforeach
    </div>
</body>
</html>