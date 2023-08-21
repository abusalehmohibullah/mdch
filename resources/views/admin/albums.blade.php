@extends('admin/layout')

@section('page-title', 'Album')

@section('contents-active', 'active')
@section('albums-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.albums'), 'title' => 'Albums'],
];
@endphp

@section('content')

<x-add-btn-component title="Albums" route="albums/manage" icon="fas fa-plus" type="Add" />

<div class="row">


    @foreach ($albums as $album)
    <div class="col-12 col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 p-1">
        <a href="{{ route('admin.media', $album->id) }}" class="w-100">
            <div class="d-flex align-items-center position-relative">
                <div class="d-flex justify-content-center position-relative">
                    <div class="card m-2 mb-0">
                        <img class="w-100" src="{{ asset('assets/images/teeth.png') }}" alt="Card image cap">

                    </div>
                </div>
            </div>
        </a>

        <div class="card-body pt-0 p-2 pt-0">
            <div class="btn-group w-100">
                <button class="btn btn-outline-info dropdown-toggle w-100 d-flex justify-content-between align-items-center" type="button" data-toggle="dropdown" aria-expanded="false">
                    <div class="text-truncate">
                        {{ $album->name }}
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-right p-0">
                    <li>
                        <a class="dropdown-item p-3" href="{{ route('admin.media', $album->id) }}">Open</a>
                    </li>
                    <li>
                        <a class="dropdown-item p-3" href="{{ route('admin.albums.manage', $album->id) }}">Edit</a>
                    </li>
                    <li>
                        <div class="btn btn-outline-danger text-danger dropdown-item p-3" data-toggle="modal" data-target="#confirmDeleteModal{{ $album->id }}">Delete</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirmDeleteModal{{ $album->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $album->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $album->id }}">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Album?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.albums.delete', ['id' => $album->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>





@endsection