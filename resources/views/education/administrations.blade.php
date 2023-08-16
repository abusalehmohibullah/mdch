@extends('layout')

@section('page-title', 'MDCH: Administrations')
@section('about-sub-active', 'active')
@section('administrations-active', 'active')

@section('content')

<div class="container my-3">


    <x-back-btn-component title="Administrations"/>
    <div class="container shadow-sm bg-white mb-3 mt-5">

        <div class="row g-4">
            @foreach($administrations as $administrationsData)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3  m-0 p-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0">
                <div class="h-100 p-4 bg-light shadow">
                    <div class="p-4 ratio ratio-1x1 mb-3">
                        <img src="{{ asset('storage/' . $administrationsData->image) }}" class="card-img-top rounded rounded-circle object-fit-cover" alt="...">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center fw-bold deep-color">{{$administrationsData->designation}}</h4>
                        <p class="card-text text-center fs-5 fw-semibold">{{$administrationsData->name}}</p>
                        <p class="card-text text-center fs-6">{{$administrationsData->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>


</div>

@endsection