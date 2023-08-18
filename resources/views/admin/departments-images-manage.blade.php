@extends('admin/layout')

@section('contents-active', 'active')
@section('departments-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.departments'), 'title' => 'Departments'],
    ['route' => route('admin.departmentsImages', $departmentsData->id), 'title' => 'Images'],
    ['route' => route('admin.departmentsImages'), 'title' => $departmentsImagesData->id ? 'Edit' : 'Add' ],
];
@endphp

@section('content')


    <x-back-btn-component title="{{ $departmentsImagesData->id ? 'Edit' : 'Add' }} Image" />

    <form action="{{ route('admin.departmentsImages.process', ['departmentsId' => $departmentsData->id, 'departmentsImagesId' => $departmentsImagesData->id]) }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="caption" name="caption" placeholder="Give a caption" value="{{ old('caption') ? old('caption') : $departmentsImagesData->caption }}">
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="file" class=" form-control-label">File</label>
            </div>
            <div class="col-12 col-md-9">
                <div class="text-danger">
                    @error('departmentsImages')
                    {{$message}}
                    @enderror
                </div>
                <input type="file" name="departmentsImages" accept="image/*,video/*">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

@endsection