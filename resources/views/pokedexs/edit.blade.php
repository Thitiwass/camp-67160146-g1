<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow border-warning">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Pokemon: {{ $pokedex->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pokedexs.update', $pokedex->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- สำคัญมากสำหรับการ Update --}}

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $pokedex->name }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" name="type" class="form-control" value="{{ $pokedex->type }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Species</label>
                        <input type="text" name="species" class="form-control" value="{{ $pokedex->species }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">HP</label>
                        <input type="number" name="hp" class="form-control" value="{{ $pokedex->hp }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Attack</label>
                        <input type="number" name="attack" class="form-control" value="{{ $pokedex->attack }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Defense</label>
                        <input type="number" name="defense" class="form-control" value="{{ $pokedex->defense }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Image URL (Support Base64)</label>
                        <textarea name="image_url" class="form-control" rows="3">{{ $pokedex->image_url }}</textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-warning px-4">Update Pokemon</button>
                    <a href="{{ route('pokedexs.index') }}" class="btn btn-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>