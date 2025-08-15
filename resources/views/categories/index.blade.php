<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Category List</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-outline-success my-4 btn-sm">+Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary text-white">ID</th>
                    <th class="bg-secondary text-white">NAME</th>
                    <th class="bg-secondary text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td> {{ $category['id'] }} </td>
                        <td> {{ $category['name'] }} </td>
                        <td class="d-flex">
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-outline-secondary btn-sm">edit</a>
                            <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger ms-2 btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
