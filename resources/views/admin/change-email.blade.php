@extends('admin/layout')

@section('setting-active', 'active')
@section('change-email-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => '', 'title' => 'Change Email'],
];
@endphp

@section('content')

<x-back-btn-component title="Change Email Address" />


<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">

    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="new-email" class=" form-control-label">New Email Address</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('new-email')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" placeholder="Enter a new email address" value="{{ old('new-email') }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="confirm-email" class=" form-control-label">Confirm Email Address</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('confirm-email')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" placeholder="Enter a confirm email address" value="{{ old('confirm-email') }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="password" class=" form-control-label">Password</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('password')
                {{$message}}
                @enderror
            </div>
            <input type="password" class="form-control" placeholder="Enter password" value="{{ old('password') }}">
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection