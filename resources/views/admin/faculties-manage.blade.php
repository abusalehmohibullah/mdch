@extends('admin/layout')

@section('page-title', 'Manage Faculties')

@section('contents-active', 'active')
@section('departments-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.departments'), 'title' => 'Departments'],
    ['route' => route('admin.faculties', $departmentsId), 'title' => 'Faculties'],
    ['route' => route('admin.faculties', $departmentsId), 'title' => $facultiesData->id ? 'Edit' : 'Add' ],
];
@endphp

@section('content')

<x-back-btn-component title="{{ $facultiesData->id ? 'EDIT' : 'ADD' }} FACULTIES" />

<form action="{{ route('admin.faculties.process', ['departmentsId' => $departmentsId, 'facultiesId' => $facultiesData->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="name" class=" form-control-label">Name<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('name')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name of the faculty..." value="{{ old('name') ? old('name') : $facultiesData->name }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="designation" class=" form-control-label">Designation<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('designation')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter a designation of the faculty..." value="{{ old('designation') ? old('designation') : $facultiesData->designation }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="description" class=" form-control-label">Description<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('description')
                {{$message}}
                @enderror
            </div>
            <textarea name="description" id="editor" rows="9" placeholder="Enter the description of the faculty..." class="form-control">{{ old('description') ? old('description') : $facultiesData->description }}</textarea>
        </div>
    </div>

    <div class="row form-group">
            <div class="col col-md-3">
                <label for="file" class=" form-control-label">File</label>
            </div>
            <div class="col-12 col-md-9">
                <div class="text-danger">
                    @error('image')
                    {{$message}}
                    @enderror
                </div>
                <input type="file" name="image" accept="image/*,video/*">
            </div>
        </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection