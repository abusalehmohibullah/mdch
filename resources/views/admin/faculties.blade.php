@extends('admin/layout')

@section('content')


<x-add-btn-component  title="Faculties" route="/admin/departments/{{$departments->id}}/faculties/manage" icon="fas fa-plus" type="Add" />

<div class="table-responsive px-0 pt-3">
    <table class="table" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Designation</td>
                <td>Description</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($facultiesItem as $facultiesData)
            <tr class="{{ $facultiesData->status == 0 ? 'bg-light' : '' }}">
                <td width="1%">
                    {{ $facultiesItem->firstItem() + $loop->index }}
                </td>
                <td>
                    <div class="table-data__info">
                        {{$facultiesData->name}}
                    </div>
                </td>
                <td>
                    <div class="table-data__info text-nowrap">
                    {{$facultiesData->designation}}
                    </div>
                </td>
                <td>
                    <div class="table-data__info">
                        {{$facultiesData->description}}
                    </div>
                </td>
                <td>
                    <div class="table-data__info">
                    <img src="{{ asset('storage/' . $facultiesData->image_path) }}" class="img-fluid" alt="..." width="100px">
                    </div>
                </td>
                <td width="1%">
                    <div class="d-flex overview-wrap">
                    <form action="{{ route('faculties.status', ['departmentsId' => $departments->id, 'facultiesId' => $facultiesData->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="switch switch-text switch-success">
                                <input type="checkbox" class="switch-input" name="status" value="1" onchange="this.form.submit()" {{ $facultiesData->status == 1 ? 'checked' : '' }}>
                                <span data-on="Showed" data-off="Hidden" class="switch-label bg-secondary border-0"></span>
                                <span class="switch-handle border-0"></span>
                            </label>
                        </form>


                        <a href="/admin/departments/{{$departments->id}}/faculties/manage/{{ $facultiesData->id }}" type="button" class="btn btn-info text-white ml-2"><i class="fas fa-pencil"></i></a>

                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#confirmDeleteModal{{ $facultiesData->id }}"><i class="fas fa-trash-o"></i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $facultiesData->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $facultiesData->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $facultiesData->id }}">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this FACULTIES?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('faculties.delete', ['departmentsId' => $departments->id, 'facultiesId' => $facultiesData->id]) }}" method="POST">
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
        </tbody>
    </table>
</div>
<hr class="mt-0">
<div class="d-flex justify-content-between overview-wrap">
    <form action="{{ route('faculties', $departments->id) }}" method="GET">
        <label for="perPage">Show Per Page:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request()->input('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request()->input('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="100" {{ request()->input('perPage') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>

    <div class="d-flex overview-wrap pagination-info mb-2">
        <div>
            Showing {{ $facultiesItem->firstItem() }} - {{ $facultiesItem->lastItem() }} of {{ $facultiesItem->total() }}
        </div>

        <div class="ml-2">
            {{$facultiesItem->links('pagination::bootstrap-4')}}

        </div>
    </div>

</div>

@endsection