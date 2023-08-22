@extends('admin/layout')

@section('page-title', 'Affiliation')

@section('contents-active', 'active')
@section('about-active', 'active')
@section('affiliation-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.section_key', ['section_key' => 'affiliation']), 'title' => 'Affiliation'],
];
@endphp

@section('content')

<x-add-btn-component title="Affiliation" route="affiliation/manage" icon="fas fa-plus" type="Add" />

<div class="table-responsive px-0 pt-3">
    <table class="table" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Content</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @if($sections->isEmpty())
            <tr>
                <td colspan="5" class="text-center">No data found.</td>
            </tr>
            @else
        @foreach($sections as $sectionsData)
            <tr class="{{ $sectionsData->status == 0 ? 'bg-light' : '' }}">
            <td width="1%">
            {{ $loop->index + 1 }}

                </td>
                <td>
                    <div class="table-data__info">
                    {!! nl2br(e($sectionsData->title)) !!}
                    </div>
                </td>
                <td>
                    <div class="table-data__info">
                    {!! nl2br(e($sectionsData->content)) !!}
                    </div>
                </td>
                <td>
                    <div class="table-data__info d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/default/' . $sectionsData->slug . '.jpg') }}" alt="" srcset="">
                    </div>

                </td>
                <td width="1%">
                    <div class="d-flex overview-wrap">
                    <form action="{{ route('admin.sections.status', $sectionsData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="switch switch-text switch-success">
                                <input type="checkbox" class="switch-input" name="status" value="1" onchange="this.form.submit()" {{ $sectionsData->status == 1 ? 'checked' : '' }}>
                                <span data-on="Showed" data-off="Hidden" class="switch-label bg-secondary border-0"></span>
                                <span class="switch-handle border-0"></span>
                            </label>
                        </form>


                        <a href="affiliation/manage/{{$sectionsData->id}}" type="button" class="btn btn-info text-white ml-2"><i class="fas fa-pencil"></i></a>

                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#confirmDeleteModal{{ $sectionsData->id }}"><i class="fas fa-trash-o"></i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $sectionsData->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $sectionsData->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $sectionsData->id }}">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Section?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.sections.delete', ['id' => $sectionsData->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>



@endsection