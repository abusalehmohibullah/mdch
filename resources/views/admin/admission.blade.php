
@extends('admin/layout')

@section('contents-active', 'active')
@section('admission-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.section_key', ['section_key' => 'admission']), 'title' => 'Admission'],
];
@endphp

@section('content')


@foreach($sections as $sectionsData)
<x-add-btn-component title="{!! $sectionsData->title !!}" route="admission/manage/{{ $sectionsData->id }}" icon="fas fa-pencil" type="Edit" />
<div class="row g-0 mb-5">

        <div class="card-body p-0">
            <p class="card-text">{!! ($sectionsData->content) !!}</p>
        </div>

</div>
@endforeach

@endsection
