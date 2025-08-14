<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Edit</title>
</head>
<body>
    <div>
        <h1>Category Edit</h1>
        <form action="{{ route('categories.update', [$category->id]) }}" method="POST">
            @csrf
            <input type="text" name="name" value="{{ $category->name }}"/>
            <button type="submit">
                Update
            </button>
            <a href="{{route('categories.index')}}">Back</a>
        </form>
    </div>
</body>
</html>