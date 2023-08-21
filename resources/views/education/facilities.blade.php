@extends('layout')

@section('page-title', 'Facilities')
@section('about-sub-active', 'active')
@section($facilitiesData->slug . '-active', 'active')

@section('content')

<div class="container my-3">


<div class="container shadow-sm bg-white mb-3 p-0 mt-5 animate-on-scroll" data-animation="fadeInRight">
    <div class="clearfix">
        <div class="img-container col-md-6 float-md-end mb-3 ms-md-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                @if(count($facilitiesImages) > 1)
                <div class="carousel-indicators">
                    @foreach($facilitiesImages as $key => $image)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                @endif
                <div class="carousel-inner">
                    @foreach($facilitiesImages as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2500">
                        <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block semitrans-bg">
                            <h5>{{ $image->caption }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if(count($facilitiesImages) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @endif
            </div>
        </div>
        <div class="text-justify">
            <div class="card-body p-3">   
                <h4 class="card-title">{{ $facilitiesData->title }}</h4>
                <p>{{ $facilitiesData->content }}</p>
            </div>
        </div>
    </div>
</div>




</div>

@endsection