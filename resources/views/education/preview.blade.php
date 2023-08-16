@extends('layout') 

@section('page_title', 'MDCH: Notice Details')
@section('notice-active', 'active')

@section('content')
    <div class="container bg-white mt-3">
        
    <a href="{{ redirect()->back()->getTargetUrl() }}" type="button" class="btn btn-outline-secondary my-2"><i class="fas fa-arrow-left"></i> Back</a>
    
    <h3>{{ $newsData->heading }}</h3>
        <p>{{ $newsData->content }}</p>
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
