<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">Upload New Image</h2>

    <a href="{{ route('gallery.index') }}" class="btn btn-secondary mb-3">
        Back to Gallery
    </a>

    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Image Title</label>
            <input type="text" name="title" class="form-control">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Upload Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">
            Upload Image
        </button>
    </form>

</div>

</body>
</html>
