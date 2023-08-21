@extends('admin/layout')

@section('page-title', 'Manage Facilities Images')

@section('contents-active', 'active')
@section('about-active', 'active')
@section('facilities-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.section_key', ['section_key' => 'facilities']), 'title' => 'Facilities'],
    ['route' => route('admin.facilitiesImages'), 'title' => 'Images' ],
    ['route' => route('admin.facilitiesImages.manage', $facilitiesImagesData->id), 'title' => $facilitiesImagesData->id ? 'Edit' : 'Add' ],
];
@endphp

@section('content')


    <x-back-btn-component title="{{ $facilitiesImagesData->id ? 'Edit' : 'Add' }} Image" />

    <form action="{{ route('admin.facilitiesImages.process', $facilitiesImagesData->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="caption" class=" form-control-label">Caption<span class="text-danger ml-1">*</span></label>
            </div>
            <div class="col-12 col-md-9">
                <div class="text-danger">
                    @error('caption')
                    {{$message}}
                    @enderror
                </div>
                <input type="text" class="form-control" id="caption" name="caption" placeholder="Give a caption" value="{{ old('caption') ? old('caption') : $facilitiesImagesData->caption }}">
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="file" class=" form-control-label">File</label>
            </div>
            <div class="col-12 col-md-9">
                <div class="text-danger">
                    @error('facilitiesImages')
                    {{$message}}
                    @enderror
                </div>
                <input type="file" name="facilitiesImages" accept="image/*,video/*">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

@endsection