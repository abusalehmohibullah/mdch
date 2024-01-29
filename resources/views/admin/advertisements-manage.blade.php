@extends('admin/layout')

@section('page-title', 'Manage Ads')

@section('contents-active', 'active')
@section('advertisements-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.advertisements'), 'title' => 'Advertisements'],
    ['route' => route('admin.advertisements'), 'title' => $advertisementsData->id ? 'Edit' : 'Add' ],
];
@endphp

@section('content')


    <x-back-btn-component title="{{ $advertisementsData->id ? 'Edit' : 'Add' }} Ads" />

    <form action="{{ route('admin.advertisements.process', $advertisementsData->id) }}" method="POST" enctype="multipart/form-data">
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
                <label for="file" class=" form-control-label">File<span class="text-danger ml-1">*</span></label>
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