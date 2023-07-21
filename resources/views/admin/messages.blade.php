@extends('admin/layout')

@section('title')

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">MESSAGES</h2>
            <a href="messages/manage" class="btn btn-info" role="button" data-bs-toggle="button">
                <i class="zmdi zmdi-plus"></i> ADD</a>
        </div>
    </div>
</div>

<div class="table-responsive px-0 pt-3">
    <table class="table" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <td>Message</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $messagesData)
            <tr class="{{ $messagesData->status == 0 ? 'bg-light' : '' }}">
            <td width="1%">
                    {{ $messages->firstItem() + $loop->index }}
                </td>
                <td>
                    <div class="table-data__info">
                        <h6>{{$messagesData->title}}</h6>
                        <span>
                            <a>{{$messagesData->message}}</a>
                        </span>
                    </div>
                </td>
                <td width="1%">
                    <div class="table-data__info">
                    <a>{{$messagesData->image}}</a>
                    </div>
                </td>
                <td width="1%">
                    <div class="d-flex overview-wrap">
                        <form action="{{ route('messages.status', $messagesData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="switch switch-text switch-success">
                                <input type="checkbox" class="switch-input" name="status" value="1" onchange="this.form.submit()" {{ $messagesData->status == 1 ? 'checked' : '' }}>
                                <span data-on="Showed" data-off="Hidden" class="switch-label bg-secondary border-0"></span>
                                <span class="switch-handle border-0"></span>
                            </label>
                        </form>


                        <a href="messages/manage/{{$messagesData->id}}" type="button" class="btn btn-info text-white ml-2"><i class="fas fa-pencil"></i></a>

                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#confirmDeleteModal{{ $messagesData->id }}"><i class="fas fa-trash-o"></i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $messagesData->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $messagesData->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-title">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $messagesData->id }}">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this messages?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('messages.delete', ['id' => $messagesData->id]) }}" method="POST">
                                            @csrf
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
<div class="d-flex justify-title-between overview-wrap">
    <form action="{{ route('messages') }}" method="GET">
        <label for="perPage">Show Per Page:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request()->input('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request()->input('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="100" {{ request()->input('perPage') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>

    <div class="d-flex overview-wrap pagination-info mb-2">
        <div>
            Showing {{ $messages->firstItem() }} - {{ $messages->lastItem() }} of {{ $messages->total() }}
        </div>

        <div class="ml-2">
            {{$messages->links('pagination::bootstrap-4')}}

        </div>
    </div>

</div>

@endsection