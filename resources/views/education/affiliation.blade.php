@extends('layout')

@section('page-title', 'Affiliation')
@section('about-sub-active', 'active')
@section('affiliation-active', 'active')

@section('content')



<div class="container mb-3">
    <x-back-btn-component title="Afiiliation" />
    @if ($affiliation->isEmpty())
    <div class="text-center w-100">No data found.</div>
    @else
    @foreach ($affiliation as $index => $affiliationData)
<div class="container shadow-sm bg-white my-3">

    <div class="clearfix">
        <div class="col-md-6 {{ $index % 2 == 0 ? 'float-md-end ms-md-3' : 'float-md-start me-md-3' }} my-3">
            <img src="{{ asset('storage/default/' . $affiliationData->slug . '.jpg') }}" class="w-100" alt="...">
        </div>

        <div class="py-3">
            <h4>{!! nl2br(html_entity_decode($affiliationData->title)) !!}</h4>
            <p>{!! ($affiliationData->content) !!}</p>
        </div>
    </div>
</div>
@endforeach
@endif

</div>


@endsection