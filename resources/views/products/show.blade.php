<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Show</title>
</head>
<body>
    <div>
        <h1>Product Show</h1>
        <div>{{ $product['id'] }} => {{ $product ['name']}} &nbsp;&nbsp;&nbsp; {{ $product['description'] }} &nbsp;&nbsp;&nbsp; {{ $product['price'] }}</div>
        <a href="{{ route('products.index') }}">Back</a>
    </div>
</body>
</html>