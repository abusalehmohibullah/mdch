@extends('admin/layout')

@section('content')


@foreach($sections as $sectionsData)
<x-add-btn-component title="{{ $sectionsData->title }}" route="about/manage/{{ $sectionsData->id }}" icon="fas fa-pencil" type="Edit" />
<div class="row g-0 mb-5">
    <div class="col-md-7">
        <div class="card-body p-0">
            <p class="card-text">{{ $sectionsData->content }}</p>
        </div>
    </div>

    <div class="col-md-5">
        <img src="{{ asset('assets/images/teeth.png') }}" class="img-fluid" alt="...">
    </div>

</div>
@endforeach

@endsection