@extends('admin/layout')

@section('page-title', 'Manage Administrations')

@section('contents-active', 'active')
@section('about-active', 'active')
@section('administrations-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.section_key', ['section_key' => 'administrations']), 'title' => 'Administrations'],
    ['route' => route('admin.section_key', ['section_key' => 'administrations', 'slug' => $administrationsData->slug]), 'title' => $administrationsData->id ? 'Edit' : 'Add' ],
];
@endphp

@section('content')

<x-back-btn-component title="{{ $administrationsData->id ? 'EDIT' : 'ADD' }}    ADMINISTRATIONS" />


<form action="{{ route('admin.administrations.process', $administrationsData->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name..." value="{{ old('name') ? old('name') : $administrationsData->name }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="designation" class=" form-control-label">Department Head<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('designation')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter a designation..." value="{{ old( 'designation') ? old('designation') : $administrationsData->designation }}">
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
            <textarea name="description" id="editor" rows="9" placeholder="Enter a description..." class="form-control">{{ old('description') ? old('description') : $administrationsData->description }}</textarea>
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="image" class=" form-control-label">Image<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('image')
                {{$message}}
                @enderror
            </div>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection