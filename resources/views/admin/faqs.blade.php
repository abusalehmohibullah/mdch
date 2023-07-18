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

<div class="table-responsive px-0 py-3">
    <table class="table" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <td>QnA</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $faqs)
            <tr>
                <td>
                {{ $loop->iteration }}
                </td>
                <td width="99%">
                    <div class="table-data__info">
                        <h6>{{$faqs->question}}</h6>
                        <span>
                            <a>{{$faqs->answer}}</a>
                        </span>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-nowrap">
                        <label class="switch switch-text switch-success">
                      <input type="checkbox" class="switch-input" checked="true">
                      <span data-on="Showed" data-off="Hidden" class="switch-label bg-secondary border-0"></span>
                      <span class="switch-handle border-0"></span>
                    </label>
                        <a type="button" class="btn btn-info text-white ml-2"><i class="fas fa-pencil"></i></a>
                        <a href="faqs/delete/{{$faqs->id}}" type="button" class="btn btn-danger text-white ml-2"><i class="fas fa-trash-o"></i></a>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection