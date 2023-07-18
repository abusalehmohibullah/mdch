@extends('admin/layout')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">FAQS</h2>
            <a href="faqs/manage" class="btn btn-info" role="button" data-bs-toggle="button">
                <i class="zmdi zmdi-plus"></i> ADD FAQ</a>
        </div>
    </div>
</div>
@if(session('success'))
<div class="alert alert-success my-2" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive px-0 pt-3">
    <table class="table" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <td>QnA</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
            <tr>
                <td>
                    {{ $faqs->firstItem() + $loop->index }}
                </td>
                <td width="99%">
                    <div class="table-data__info">
                        <h6>{{$faq->question}}</h6>
                        <span>
                            <a>{{$faq->answer}}</a>
                        </span>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-nowrap">
                        <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="switch switch-text switch-success">
                                <input type="checkbox" class="switch-input" name="status" value="1" onchange="this.form.submit()" {{ $faq->status == 1 ? 'checked' : '' }}>
                                <span data-on="Showed" data-off="Hidden" class="switch-label bg-secondary border-0"></span>
                                <span class="switch-handle border-0"></span>
                            </label>
                        </form>


                        <a type="button" class="btn btn-info text-white ml-2"><i class="fas fa-pencil"></i></a>
                        <a href="faqs/delete/{{$faq->id}}" type="button" class="btn btn-danger text-white ml-2"><i class="fas fa-trash-o"></i></a>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr class="mt-0">
<div class="d-flex justify-content-between overview-wrap">
    <form action="{{ route('faqs') }}" method="GET">
        <label for="perPage">Show Per Page:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request()->input('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request()->input('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="100" {{ request()->input('perPage') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>

    <div class="d-flex overview-wrap pagination-info mb-2">
        <div>
            Showing {{ $faqs->firstItem() }} - {{ $faqs->lastItem() }} of {{ $faqs->total() }}
        </div>

        <div class="ml-2">
            {{$faqs->links('pagination::bootstrap-4')}}

        </div>
    </div>

</div>

@endsection