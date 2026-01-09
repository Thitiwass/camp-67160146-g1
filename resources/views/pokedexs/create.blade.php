<!DOCTYPE html>
<html>
<head>
    <title>Create Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><h4>Add New Pokemon</h4></div>
        <div class="card-body">
            <form action="{{ route('pokedexs.store') }}" method="POST">
                @csrf {{-- *** สำคัญมาก: แก้ Error 419 *** --}}
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Type</label>
                        <input type="text" name="type" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Species</label>
                        <input type="text" name="species" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Height</label>
                        <input type="number" step="0.01" name="height" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Weight</label>
                        <input type="number" step="0.01" name="weight" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>HP</label>
                        <input type="number" name="hp" class="form-control" value="0">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Attack</label>
                        <input type="number" name="attack" class="form-control" value="0">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Defense</label>
                        <input type="number" name="defense" class="form-control" value="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Image (URL or Base64 String)</label>
                    <textarea name="image_url" class="form-control" rows="3" placeholder="Paste your image string here..."></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pokedexs.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success px-5">Save Pokemon</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>