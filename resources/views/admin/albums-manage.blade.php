@extends('admin/layout')

@section('contents-active', 'active')
@section('albums-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.albums'), 'title' => 'Albums'],
    ['route' => route('admin.albums.manage'), 'title' => $albumsData->id ? 'Edit' : 'Add' ],
];
@endphp

@section('content')

<x-back-btn-component title="{{ $albumsData->id ? 'Edit' : 'Add' }} Album" />

    <form action="{{ route('admin.albums.process', $albumsData->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">

        @csrf
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="name" class=" form-control-label">Album Name<span class="text-danger ml-1">*</span></label>
            </div>
            <div class="col-12 col-md-9">
                <div class="text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Give it a name" value="{{ old('name') ? old('name') : $albumsData->name }}">
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="content" class=" form-control-label">Description</label>
            </div>
            <div class="col-12 col-md-9">
                <div class="text-danger">
                    @error('description')
                    {{$message}}
                    @enderror
                </div>
                <textarea name="description" id="description" rows="9" placeholder="Describe this album" class="form-control">{{ old('description') ? old('description') : $albumsData->description }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-info ms-auto">Submit</button>
        </div>

    </form>


@endsection