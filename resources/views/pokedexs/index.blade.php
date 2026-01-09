<!DOCTYPE html>
<html>
<head>
    <title>Pokedex List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>Pokedex System</h2>
        <a href="{{ route('pokedexs.create') }}" class="btn btn-primary">Add New Pokemon</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-white table-striped border shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>Stats (HP/Atk/Def)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokedexs as $item)
            <tr>
                <td><img src="{{ $item->image_url }}" width="60" class="img-thumbnail" onerror="this.src='https://via.placeholder.com/60'"></td>
                <td><strong>{{ $item->name }}</strong></td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->hp }} / {{ $item->attack }} / {{ $item->defense }}</td>
                <td>
                    <form action="{{ route('pokedexs.destroy', $item->id) }}" method="POST">
                        <a href="{{ route('pokedexs.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>