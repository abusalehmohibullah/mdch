@extends('admin/layout')

@section('content')


    <x-back-btn-component title="{{ $advertisementsData->id ? 'Edit' : 'Add' }} Ads" />

    <form action="{{ route('advertisements.process', $advertisementsData->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="title" class=" form-control-label">Title<span class="text-danger ml-1">*</span></label>
            </div>
            <div class="col-12 col-md-9">
                <div class="text-danger">
                    @error('title')
                    {{$message}}
                    @enderror
                </div>
                <input type="text" class="form-control" id="title" name="title" placeholder="Give a title" value="{{ old('title') ? old('title') : $advertisementsData->title }}">
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="file" class=" form-control-label">File</label>
            </div>
            <div class="col-12 col-md-9">
                <div class="text-danger">
                    @error('advertisements')
                    {{$message}}
                    @enderror
                </div>
                <input type="file" name="advertisements" accept="image/*,video/*">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

@endsection