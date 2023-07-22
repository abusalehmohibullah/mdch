@extends('admin/layout')

@section('content')

<x-back-btn-component title="{{ $departmentsData->id ? 'EDIT' : 'ADD' }} DEPARTMENT" />


<form action="{{ route('departments.process', $departmentsData->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="department_name" class=" form-control-label">Department Name<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('department_name')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Enter a department_name of the department..." value="{{ old('department_name') ? old('department_name') : $departmentsData->department_name }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="department_head" class=" form-control-label">Department Head<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('department_head')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" id="department_head" name="department_head" placeholder="Enter a department_name of the department..." value="{{ old('department_head') ? old('department_head') : $departmentsData->department_head }}">
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