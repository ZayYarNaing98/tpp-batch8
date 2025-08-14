<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<body>
    <div>
        <h1>Category List</h1>
        <a href="{{ route('categories.create') }}">+Create</a>
        @foreach ($categories as $data)
            <p>{{ $data['id'] }} : {{ $data['name'] }}</p>
            <a href="{{ route('categories.edit', ['id' => $data->id]) }}">edit</a>
            <form action="{{ route('categories.delete', ['id' => $data->id]) }}" method="POST">
                @csrf
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </div>
</body>

</html>
