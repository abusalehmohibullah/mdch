@extends('layout')

@section('content')


     
    <div class="container shadow-sm bg-white mb-3">
        
        <x-shared-sections title="{{ $sections->title }}" content="{{ $sections->content }}" slug="{{ $sections->slug }}" />
        
    </div>


@endsection