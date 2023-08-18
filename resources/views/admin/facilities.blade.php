@extends('admin/layout')

@section('contents-active', 'active')
@section('about-active', 'active')
@section('facilities-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.section_key', ['section_key' => 'facilities']), 'title' => 'Facilities'],
];
@endphp

@section('content')


@foreach($sections as $sectionsData)
<x-add-btn-component title="{{ $sectionsData->title }}" route="facilities/manage/{{ $sectionsData->id }}" icon="fas fa-pencil" type="Edit" />
<div class="row g-0 mb-5">


        <div class="card-body p-3">
            
            <p class="card-text">{!! nl2br(e($sectionsData->content)) !!}</p>
        </div>

</div>


<div class="mb-5">
    <a href="/admin/facilities/images" class="btn btn-info">Manage Images</a>
</div>

@endforeach

@endsection
