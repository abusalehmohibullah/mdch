@extends('layout')

@section('page-title', 'MDCH: Albums')
@section('albums-active', 'active')

@section('content')


<div class="container my-3">


    <x-back-btn-component title="Student's Life" />

    <div class="row shadow-sm bg-white g-0">
        @foreach($albums as $albumsData)
        @php
        $id = $loop->index;
        @endphp
        @if(isset($albumsData->media) && count($albumsData->media) > 0)
        <div id="album-container-{{$id}}" class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-xxl-2 mb-2" onclick="openAlbum(<?php echo $id ?>)">
            <div class="d-flex align-items-center position-relative w-100">

                <div class="show-first-child card m-2 w-100 hover-deep position-relative">
                    @foreach($albumsData->media as $mediaData)
                    <a data-fancybox="album-{{$id}}" href="{{ asset('storage/' . $mediaData->path) }}" class="child stretched-link" data-caption="{{ $mediaData->caption }}"></a>
                    @endforeach
                    <div class="w-100">

                        <div class="w-100 ratio ratio-4x3 overflow-hidden">
                            <img src="{{ asset('storage/' . $albumsData->media[0]->path) }}" />
                        </div>


                        <div class="card-body p-2">
                            <div class="card-title m-0 text-truncate mini-text"><small>{{$albumsData->name}}</small></div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        @endif
        @endforeach
    </div>
</div>


@endsection