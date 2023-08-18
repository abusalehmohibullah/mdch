@extends('admin/layout')

@section('contents-active', 'active')
@section('departments-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.departments'), 'title' => 'Departments'],
    ['route' => route('admin.departments'), 'title' => $departmentsData->id ? 'Edit' : 'Add' ],
];
@endphp

@section('content')

<x-back-btn-component title="{{ $departmentsData->id ? 'EDIT' : 'ADD' }} DEPARTMENT" />
@if ($departmentsData->id)
<div class="mb-5">
    <a href="{{ route('admin.faculties', $departmentsData->id) }}" class="btn btn-info">Manage Faculties</a>
    <a href="{{ route('admin.departmentsImages', $departmentsData->id) }}" class="btn btn-info">Manage Images</a>
</div>
@endif
<form action="{{ route('admin.departments.process', $departmentsData->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name of the department..." value="{{ old('name') ? old('name') : $departmentsData->name }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="phase" class="form-control-label">Select Phase<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('phase')
                {{$message}}
                @enderror
            </div>
            <select class="custom-select" id="phase" name="phase">
                <option value="1" {{ (old('phase') == 1 || (isset($departmentsData) && $departmentsData->phase == 1)) ? 'selected' : '' }}>1st Phase</option>
                <option value="2" {{ (old('phase') == 2 || (isset($departmentsData) && $departmentsData->phase == 2)) ? 'selected' : '' }}>2nd Phase</option>
                <option value="3" {{ (old('phase') == 3 || (isset($departmentsData) && $departmentsData->phase == 3)) ? 'selected' : '' }}>3rd Phase</option>
                <option value="4" {{ (old('phase') == 4 || (isset($departmentsData) && $departmentsData->phase == 4)) ? 'selected' : '' }}>4th Phase</option>
            </select>
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
            <textarea name="description" id="description" rows="9" placeholder="Enter the description of the department..." class="form-control">{{ old('description') ? old('description') : $departmentsData->description }}</textarea>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection