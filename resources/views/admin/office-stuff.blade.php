@extends('admin/layout')

@section('page-title', 'Office Stuff')

@section('contents-active', 'active')
@section('about-active', 'active')
@section('office-stuff-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.section_key', ['section_key' => 'office-stuff']), 'title' => 'Office Stuff'],
];
@endphp

@section('content')


@foreach($sections as $sectionsData)
<x-add-btn-component title="{{ $sectionsData->title }}" route="office-stuff/manage/{{ $sectionsData->id }}" icon="fas fa-pencil" type="Edit" />
<div class="row g-0 mb-5">
<div class="col-md-7">
    <div class="card-body p-0">
        {!! ($sectionsData->content) !!}
    </div>
</div>


    <div class="col-md-5">
        <img src="{{ asset('storage/default/' . $sectionsData->slug . '.jpg') }}" class="img-fluid" alt="...">
    </div>

</div>
@endforeach

@endsection