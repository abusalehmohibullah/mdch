@extends('admin/layout')

@section('page-title', 'Manage Messages')

@section('contents-active', 'active')
@section('about-active', 'active')
@section('messages-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.section_key', ['section_key' => 'messages']), 'title' => 'Messages'],
];
@endphp

@section('content')


@foreach($sections as $sectionsData)
<x-add-btn-component title="{!! $sectionsData->title !!}" route="messages/manage/{{ $sectionsData->id }}" icon="fas fa-pencil" type="Edit" />
<div class="row g-0 mb-5">
    <div class="col-md-7">
        <div class="card-body p-0">
            <p class="card-text">{!! nl2br(e($sectionsData->content)) !!}</p>
        </div>
    </div>

    <div class="col-md-5">
    <img src="{{ asset('storage/default/' . $sectionsData->slug . '.jpg') }}" class="img-fluid" alt="...">

    </div>

</div>
@endforeach

@endsection
