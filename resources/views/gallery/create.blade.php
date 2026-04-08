<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .upload-card {
            max-width: 500px;
            margin: auto;
            border-radius: 15px;
            padding: 25px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="upload-card">

        <h4 class="text-center mb-4">📤 Upload Image</h4>

        <a href="{{ route('gallery.index') }}" class="btn btn-secondary mb-3 w-100">
            Back to Gallery
        </a>

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Upload</button>
        </form>

    </div>

</div>

</body>
</html>