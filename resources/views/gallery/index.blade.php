<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">Laravel 12 Image Gallery</h2>

    <a href="{{ route('gallery.create') }}" class="btn btn-success mb-3">
        + Add New Image
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($images as $img)
            <div class="col-md-3 mb-4 text-center">
                <img src="{{ asset('images/'.$img->filename) }}"
                     class="img-fluid rounded mb-2"
                     style="height:180px; object-fit:cover;">

                <p class="fw-bold">{{ $img->title }}</p>

                <form action="{{ route('gallery.destroy', $img->id) }}" method="POST"    onsubmit="return confirm('Are you sure you want to delete this image?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
