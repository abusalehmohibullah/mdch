@extends('layout')

@section('content')


<div class="container my-3">


    <x-back-btn-component title="Student's Life" />


    <div class="row shadow-sm bg-white g-0">
        @foreach($albums as $albumsData)
        @php
        $id = $loop->index;
        @endphp
        <div id="album-container-{{$id}}" class="col-3 mb-2" onclick="openAlbum(<?php echo $id ?>)">
            <div class="d-flex align-items-center position-relative w-100">

                <div class="card m-2 w-100">
                    <div class="show-first-child w-100">

                        @foreach($albumsData->media as $mediaData)
                        <a data-fancybox="album-{{$id}}" href="{{ asset('storage/' . $mediaData->path) }}" class="child w-100 ratio ratio-4x3 overflow-hidden">
                            <img src="{{ asset('storage/' . $mediaData->path) }}" />
                        </a>
                        @endforeach

                        <div class="card-body p-2">
                            <div class="fs-6 card-title m-0">{{$albumsData->name}}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>


@endsection