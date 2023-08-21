@extends('layout')

@section('page-title', $sections->title)
@section(
    in_array($sections->section_key, ['about', 'facilities', 'office-stuff', 'messages']) ? 'about-sub-active' : $sections->section_key . '-active',
    'active'
)
@section($sections->slug . '-active', 'active')

@section('content')


     
    <div class="container shadow-sm bg-white mb-3">
        
        <x-shared-sections title="{{ $sections->title }}" content="{{ $sections->content }}" slug="{{ $sections->slug }}" />
        
    </div>


@endsection