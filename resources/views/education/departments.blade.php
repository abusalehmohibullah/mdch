@extends('layout')

@section('page-title', 'Departments')
@section('departments-active', 'active')
@section($departmentsData->slug . '-active', 'active')

@section('content')

<div class="container my-3">


    <div class="container shadow-sm bg-white mb-3 p-0 mt-5 animate-on-scroll" data-animation="fadeInRight">
        <div class="clearfix">
            <div class="img-container col-md-6 float-md-end mb-3 ms-md-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    @if(count($departmentsData->departmentsImages) > 1)
                    <div class="carousel-indicators">
                        @foreach($departmentsData->departmentsImages as $key => $image)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                        @endforeach
                    </div>
                    @endif
                    <div class="carousel-inner">
                        @foreach($departmentsData->departmentsImages as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2500">
                            <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block semitrans-bg">
                                    <h5>{{ $image->caption }}</h5>
                                </div>
                        </div>
                        @endforeach
                    </div>
                    @if(count($departmentsData->departmentsImages) > 1)
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
                    <h4 class="card-title mb-3">{{ $departmentsData->name }}</h4>
                    <p>{!! ( $departmentsData->description ) !!}</p>
                </div>
            </div>
        </div>

    </div>

    <div class="container shadow-sm bg-white mb-3 w-100">
        <div class="row g-4 w-100">
            @foreach($departmentsData->faculties as $faculty)
            <div class="p-2 mb-3 col-lg-6">
                <div class="card h-100 border-0 bg-light rounded shadow-sm">
                <div class="position-absolute top-0 start-0 text-white fw-bold fs-4 px-2 z-3 translate-middle-y" style="background-color: navy;">{{$faculty->designation}}</div>

                    <div class="row g-0">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $faculty->image_path) }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $faculty->name }}</h4>
                                <p class="card-text">{!! ($faculty->description) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</div>

@endsection