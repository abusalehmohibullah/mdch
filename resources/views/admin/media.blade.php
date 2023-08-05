@extends('admin/layout')

@section('content')

<x-add-btn-component title="{{$album->name}}" route="{{$album->id}}/manage" icon="fas fa-plus" type="Add" />

<div class="row">

    <div class="media-list">
        @foreach ($mediaItems as $mediaItem)
        <div class="media-item">
            <img src="{{ asset('storage/' . $mediaItem->path) }}" alt="Image">
        </div>
        @endforeach
    </div>
</div>





@endsection