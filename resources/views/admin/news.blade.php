@extends('admin/layout')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">News</h2>
            <a href="news/manage" class="btn btn-info" role="button" data-bs-toggle="button">
                <i class="zmdi zmdi-plus"></i> ADD NEWS</a>
        </div>
    </div>
</div>

<div class="table-responsive px-0 pt-3">
    <table class="table" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <td>Content</td>
                <td>Attachment</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $newsData)
            <tr class="{{ $newsData->status == 0 ? 'bg-light' : '' }}">
            <td width="1%">
                    {{ $news->firstItem() + $loop->index }}
                </td>
                <td>
                    <div class="table-data__info">
                        <h6>{{$newsData->heading}}</h6>
                        <span>
                            <a>{{$newsData->content}}</a>
                        </span>
                    </div>
                </td>
                <td width="1%">
                    <div class="table-data__info">
                    <a>{{$newsData->attachment}}</a>
                    </div>
                </td>
                <td width="1%">
                    <div class="d-flex overview-wrap">
                        <form action="{{ route('news.status', $newsData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="switch switch-text switch-success">
                                <input type="checkbox" class="switch-input" name="status" value="1" onchange="this.form.submit()" {{ $newsData->status == 1 ? 'checked' : '' }}>
                                <span data-on="Showed" data-off="Hidden" class="switch-label bg-secondary border-0"></span>
                                <span class="switch-handle border-0"></span>
                            </label>
                        </form>


                        <a href="news/manage/{{$newsData->id}}" type="button" class="btn btn-info text-white ml-2"><i class="fas fa-pencil"></i></a>

                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#confirmDeleteModal{{ $newsData->id }}"><i class="fas fa-trash-o"></i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $newsData->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $newsData->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $newsData->id }}">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this NEWS?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('news.delete', ['id' => $newsData->id]) }}" method="POST">
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
<div class="d-flex justify-content-between overview-wrap">
    <form action="{{ route('news') }}" method="GET">
        <label for="perPage">Show Per Page:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request()->input('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request()->input('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="100" {{ request()->input('perPage') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>

    <div class="d-flex overview-wrap pagination-info mb-2">
        <div>
            Showing {{ $news->firstItem() }} - {{ $news->lastItem() }} of {{ $news->total() }}
        </div>

        <div class="ml-2">
            {{$news->links('pagination::bootstrap-4')}}

        </div>
    </div>

</div>

@endsection