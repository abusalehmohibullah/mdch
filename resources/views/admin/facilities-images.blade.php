@extends('admin/layout')

@section('contents-active', 'active')
@section('about-active', 'active')
@section('facilities-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.section_key', ['section_key' => 'facilities']), 'title' => 'Facilities'],
    ['route' => route('admin.facilitiesImages'), 'title' => 'Images' ],
];
@endphp

@section('content')


<x-add-btn-component title="Manage Images" route="{{ route('admin.facilitiesImages.manage') }}" icon="fas fa-plus" type="Add" />



<div class="row">

    @foreach ($facilitiesImages as $imagesItem)
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 p-2">
        <div class="thumbnail">
            <div class="image-container" style="height : 200px;">
                <img src="{{ asset('storage/' . $imagesItem->path) }}" alt="Image" class="w-100" style="object-fit: cover; height: 100%">
            </div>

            <div class="btn-group w-100">
                <button class="btn btn-outline-info dropdown-toggle w-100 d-flex justify-content-between align-items-center" type="button" data-toggle="dropdown" aria-expanded="false">
                    <div class="text-truncate">

                        {{ $imagesItem->caption }}
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-right p-0">
                    <li>
                        <a class="dropdown-item p-3" href="{{ route('admin.facilitiesImages.manage', $imagesItem->id) }}">Edit</a>
                    </li>
                    <li>
                        <div class="btn btn-outline-danger text-danger dropdown-item p-3" data-toggle="modal" data-target="#confirmDeleteModal{{ $imagesItem->id }}">Delete</div>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal{{ $imagesItem->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $imagesItem->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $imagesItem->id }}">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Image?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.facilitiesImages.delete', $imagesItem->id) }}" method="POST">
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