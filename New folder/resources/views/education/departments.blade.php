@extends('layout')

@section('content')

<div class="container my-3">


    <x-back-btn-component title="Departments" />
    <div class="container shadow-sm bg-white mb-3 p-0 mt-5 animate-on-scroll" data-animation="fadeInRight">

        <div class="clearfix">
            <div class="img-container col-md-6 float-md-end mb-3 ms-md-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($departmentsData->departmentsImages as $key => $image)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($departmentsData->departmentsImages as $key => $image)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2500">
            <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="...">
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

                </div>
            <div class="text-justify">
                <div class="card-body p-3">
                    <h5 class="card-title">{{ $departmentsData->name }}</h5>
                    <p>{{ $departmentsData->description }}</p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores nostrum et sequi dolores esse cum repellendus temporibus deserunt pariatur praesentium quas voluptates, sint aperiam excepturi similique harum fugit? Asperiores, eveniet? Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima ad earum enim voluptatem qui laudantium sequi odit natus pariatur, porro maxime, possimus amet! Maxime cumque esse non vero, ipsa modi.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam hic accusantium fugit unde tempora quas magni nihil, maiores atque soluta tenetur assumenda voluptatem molestias aut tempore voluptatibus aliquid, voluptatum laborum.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam facilis amet quaerat perspiciatis cum. Enim recusandae temporibus excepturi officiis, repudiandae aspernatur deleniti vero expedita quos animi reprehenderit vel earum mollitia.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum similique molestias error suscipit aliquam, excepturi ad, possimus consectetur consequuntur necessitatibus debitis eligendi enim iste magnam rem officiis sapiente voluptatem atque?
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores nostrum et sequi dolores esse cum repellendus temporibus deserunt pariatur praesentium quas voluptates, sint aperiam excepturi similique harum fugit? Asperiores, eveniet? Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima ad earum enim voluptatem qui laudantium sequi odit natus pariatur, porro maxime, possimus amet! Maxime cumque esse non vero, ipsa modi.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam hic accusantium fugit unde tempora quas magni nihil, maiores atque soluta tenetur assumenda voluptatem molestias aut tempore voluptatibus aliquid, voluptatum laborum.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam facilis amet quaerat perspiciatis cum. Enim recusandae temporibus excepturi officiis, repudiandae aspernatur deleniti vero expedita quos animi reprehenderit vel earum mollitia.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum similique molestias error suscipit aliquam, excepturi ad, possimus consectetur consequuntur necessitatibus debitis eligendi enim iste magnam rem officiis sapiente voluptatem atque?
                </div>
            </div>
        </div>

    </div>

    <div class="container shadow-sm bg-white mb-3">
        <div class="row g-4">
            @foreach($departmentsData->faculties as $faculty)
            <div class="p-2 mb-3 col-lg-6">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $faculty->image_path) }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $faculty->name }}</h4>
                                <p class="fs-5">{{ $faculty->designation }}</p>
                                <p class="card-text">{{ $faculty->description }}</p>
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