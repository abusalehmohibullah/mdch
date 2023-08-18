@extends('admin/layout')

@section('setting-active', 'active')
@section('informations-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.informations'), 'title' => 'Informations'],
    ['route' => route('admin.informations'), 'title' => $informationsData->id ? 'Edit' : 'Add'],
];
@endphp

@section('content')

<x-back-btn-component title="{{ $informationsData->id ? 'Edit' : 'Add' }} Informations" />


<form action="{{ route('admin.informations.process', $informationsData->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">

    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="title" class=" form-control-label">Title</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('title')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" placeholder="Enter a title" value="{{ old('slug') ? old('slug') : $informationsData->slug }}" disabled>
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="content" class=" form-control-label">Content<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('content')
                {{$message}}
                @enderror
            </div>
            <textarea name="content" id="content" rows="9" placeholder="Enter the content" class="form-control">{{ old('content') ? old('content') : $informationsData->content }}</textarea>
        </div>
    </div>


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection