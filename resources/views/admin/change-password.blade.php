@extends('admin/layout')

@section('page-title', 'Change Password')

@section('setting-active', 'active')
@section('change-password-active', 'active')

@php
$breadcrumbs = [
['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
['route' => '', 'title' => 'Change Password'],
];
@endphp

@section('content')

<x-back-btn-component title="Change Password" />


<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">

    @csrf

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="current-password" class="form-control-label">Current Password</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('current-password')
                {{$message}}
                @enderror
            </div>
            <input type="password" class="form-control" placeholder="Enter your current password" value="{{ old('current-password') }}">
            <div class="mt-2">
                <a class="btn m-0 p-0" href="#" data-toggle="modal" data-target="#confirmModal">Forgotten Password?</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="new-password" class=" form-control-label">New Password</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('new-password')
                {{$message}}
                @enderror
            </div>
            <input type="password" class="form-control" placeholder="Enter a new password" value="{{ old('new-password') }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="conform-password" class=" form-control-label">Confirm Password</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('conform-password')
                {{$message}}
                @enderror
            </div>
            <input type="password" class="form-control" placeholder="Conform your new password" value="{{ old('conform-password') }}">
        </div>
    </div>


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>


                
                <!-- Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Confirm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                A link will be sent to your email. Do you want to continue?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Send Link</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection