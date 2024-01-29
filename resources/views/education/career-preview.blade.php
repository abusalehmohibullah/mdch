@extends('layout') 

@section('page-title', 'Notice Details')
@section('notice-active', 'active')

@section('content')
    <div class="container bg-white mt-3">
           
    <h3>{{ $careerData->heading }}</h3>
        <p>{!! ($careerData->content) !!}</p>
        @if ($careerData->attachment)
            @if (Str::endsWith($careerData->attachment, ['.jpg', '.jpeg', '.png', '.gif']))
            <div class="h-100 d-flex justify-content-center align-items-center preview-container">
                <img src="{{ asset('storage/' . $careerData->attachment) }}" alt="$careerData->heading">
            </div>
            @elseif (Str::endsWith($careerData->attachment, ['.pdf']))
            <iframe src="{{ asset('storage/' . $careerData->attachment) }}" width="100%" height="700px"></iframe>
            @endif
        @endif
    </div>
@endsection
