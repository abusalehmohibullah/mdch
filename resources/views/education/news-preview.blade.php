@extends('layout') 

@section('page-title', 'Notice Details')
@section('notice-active', 'active')

@section('content')
    <div class="container bg-white mt-3">
            
    <h3>{{ $newsData->heading }}</h3>
        <p>{!! ($newsData->content ) !!}</p>
        @if ($newsData->attachment)
            @if (Str::endsWith($newsData->attachment, ['.jpg', '.jpeg', '.png', '.gif']))
            <div class="h-100 d-flex justify-content-center align-items-center preview-container">
                <img src="{{ asset('storage/' . $newsData->attachment) }}" alt="$newsData->heading">
            </div>
            @elseif (Str::endsWith($newsData->attachment, ['.pdf']))
            <iframe src="{{ asset('storage/' . $newsData->attachment) }}" width="100%" height="700px"></iframe>
            @endif
        @endif
    </div>
@endsection
