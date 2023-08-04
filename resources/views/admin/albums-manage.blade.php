@extends('admin/layout')

@section('content')
<div class="container">
    <h1>Manage Photo Album</h1>

    <form action="{{ route('albums.destroy', $albumsData->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Album</button>
    </form>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h3>Add New Image</h3>
            <form action="{{ route('albums.images.store', $albumsData->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <h3>Album Images</h3>
            <div class="row">
                @foreach($albumsData->images as $image)
                <div class="col-md-3 mb-3">
                    <img src="{{ asset($image->path) }}" alt="Image" class="img-thumbnail">
                    <form action="{{ route('albums.images.destroy', ['album' => $albumsData->id, 'image' => $image->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection