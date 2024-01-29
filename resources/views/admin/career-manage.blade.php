@extends('admin/layout')

@section('page-title', 'Manage Career')

@section('contents-active', 'active')
@section('career-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.career'), 'title' => 'Career'],
    ['route' => route('admin.career'), 'title' => $careerData->id ? 'Edit' : 'Add'],
];
@endphp

@section('content')

<x-back-btn-component title="{{ $careerData->id ? 'EDIT' : 'ADD' }} CAREER" />


<form action="{{ route('admin.career.process', $careerData->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="heading" class=" form-control-label">Heading<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('heading')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" id="heading" name="heading" placeholder="Enter a heading of the career..." value="{{ old('heading') ? old('heading') : $careerData->heading }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="content" class=" form-control-label">Content</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('content')
                {{$message}}
                @enderror
            </div>
            <textarea name="content" id="editor" rows="9" placeholder="Enter the content of the career..." class="form-control">{{ old('content') ? old('content') : $careerData->content }}</textarea>
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="attachment" class=" form-control-label">Published on<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-3">
            <div class="input-group">
            <div class="text-danger">
                @error('published_at')
                {{$message}}
                @enderror
            </div>
            <input type="date" name="published_at" class="border border-secondary px-2" value="{{ old('published_at') ? old('published_at') : ($careerData->published_at ?? now()->toDateString()) }}">


            </div>
        </div>
        <div class="col col-md-3">
            <label class=" form-control-label">Deadline<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-3">
            <div class="input-group">
            <div class="text-danger">
                @error('deadline')
                {{$message}}
                @enderror
            </div>
            <input type="date" name="deadline" class="border border-secondary px-2" value="{{ old('deadline') ? old('deadline') : ($careerData->deadline ?? now()->toDateString()) }}">


            </div>
        </div>

    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="attachment" class=" form-control-label">Attachment</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('attachment')
                {{$message}}
                @enderror
            </div>
            <input type="file" id="attachment" name="attachment" class="form-control-file">
        </div>

    </div>


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection