@extends('admin/layout')

@section('page-title', 'Career')

@section('contents-active', 'active')
@section('career-active', 'active')

@php
$breadcrumbs = [
['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
['route' => route('admin.career'), 'title' => 'Career'],
];
@endphp

@section('content')


<x-add-btn-component title="Career" route="career/manage" icon="fas fa-plus" type="Add" />

<div class="table-responsive px-0 pt-3">
    <table class="table" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <td>Content</td>
                <td>Published</td>
                <td>Deadline</td>
                <td>Attachment</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @if($career->isEmpty())
            <tr>
                <td colspan="6" class="text-center">No data found.</td>
            </tr>
            @else
            @foreach ($career as $careerData)
            <tr class="{{ $careerData->status == 0 ? 'bg-light' : '' }}">
                <td width="1%">
                    {{ $career->firstItem() + $loop->index }}
                </td>
                <td>
                    <div class="table-data__info">
                        <h6>{{$careerData->heading}}</h6>
                        <span>
                            <a>{{$careerData->content}}</a>
                        </span>
                    </div>
                </td>
                <td width="1%" class="text-nowrap">

                    {{$careerData->published_at}}

                </td>

                <td width="1%" class="text-nowrap">

                    {{$careerData->deadline}}

                </td>
                <td width="1%">
                    <div class="table-data__info d-flex justify-content-center align-items-center">
                        @if ($careerData->attachment)
                        <a href="{{ asset('storage/' . $careerData->attachment) }}" target="_blank"><i class="fa-solid fa-eye fa-lg p-2 text-dark"></i></a>
                        <a href="{{ route('admin.career.download', $careerData->id) }}"><i class="fa-solid fa-download fa-lg p-2 text-dark"></i></a>
                        @else
                        -
                        @endif
                    </div>

                </td>
                <td width="1%">
                    <div class="d-flex overview-wrap">
                        <form action="{{ route('admin.career.status', $careerData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="switch switch-text switch-success">
                                <input type="checkbox" class="switch-input" name="status" value="1" onchange="this.form.submit()" {{ $careerData->status == 1 ? 'checked' : '' }}>
                                <span data-on="Showed" data-off="Hidden" class="switch-label bg-secondary border-0"></span>
                                <span class="switch-handle border-0"></span>
                            </label>
                        </form>


                        <a href="career/manage/{{$careerData->id}}" type="button" class="btn btn-info text-white ml-2"><i class="fas fa-pencil"></i></a>

                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#confirmDeleteModal{{ $careerData->id }}"><i class="fas fa-trash-o"></i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $careerData->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $careerData->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $careerData->id }}">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this CAREER?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.career.delete', ['id' => $careerData->id]) }}" method="POST">
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
<hr class="mt-0">
<div class="d-flex justify-content-between overview-wrap">
    <form action="{{ route('admin.career') }}" method="GET">
        <label for="perPage">Show Per Page:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request()->input('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request()->input('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="100" {{ request()->input('perPage') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>

    <div class="d-flex overview-wrap pagination-info mb-2">
        <div>
            Showing {{ $career->firstItem() }} - {{ $career->lastItem() }} of {{ $career->total() }}
        </div>

        <div class="ml-2">
            {{$career->links('pagination::bootstrap-4')}}

        </div>
    </div>

</div>

@endsection