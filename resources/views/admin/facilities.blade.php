@extends('admin/layout')

@section('content')


@foreach($sections as $sectionsData)
<x-add-btn-component title="{{ $sectionsData->title }}" route="facilities/manage/{{ $sectionsData->id }}" icon="fas fa-pencil" type="Edit" />
<div class="row g-0 mb-5">


        <div class="card-body p-3">
            
            <p class="card-text">{!! nl2br(e($sectionsData->content)) !!}</p>
        </div>

</div>
@endforeach

@endsection
