<!-- resources/views/home.blade.php -->

@extends('layout')

@section('content')

<!-- Include the modal -->
@include('education/modal')


<!-- Video Section -->
<section id="video-section">
    <div class="container p-0 shadow-sm animate-on-load animate__zoomIn animate__delay-1s">
        <!-- Replace traditional slider with a video -->
        <div class="embed-responsive embed-responsive-16by9 w-100 ratio ratio-16x9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/K4TOrB7at0Y?playlist=K4TOrB7at0Y&loop=1&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- Notice Section -->
<section>
    <div class="container notice-container light-bg d-flex my-3 p-0 shadow-sm animate-on-load animate__backInUp animate__delay-1s">
        <div class="title deep-bg d-flex align-items-center py-1 px-3">
            <a href="{{ route('news.all') }}" class="text-decoration-none text-dark">Notice</a>
        </div>

        <ul class="d-flex align-items-center text-nowrap">
            @foreach($latestNews as $latestNewsData)
            <li><a href="{{ route('news.preview', $latestNewsData->slug) }}" class="text-reset text-decoration-none">{{$latestNewsData->heading}}</a></li>
            @endforeach
        </ul>

    </div>
</section>


<!-- About Us Section -->
<section id="about-us-section">
    <div class="container shadow-sm bg-white mb-3 p-0 animate-on-scroll" data-animation="fadeInLeft">
        <div class="row g-0">

            <div class="col-md-5 order-md-2">
                <div class="img-container">
                    <img src="{{ asset('storage/default/about.jpg') }}" class="img-fluid" alt="...">
                </div>
            </div>

            <div class="col-md-7 order-md-1 text-container text-justify">
                <div class="card-body p-3">
                    <h3 class="card-title deep-color">{{$about->title}}</h3>
                    <p class="card-text">{!! nl2br(e($about->content)) !!}</p>
                </div>
                <a href="#" class="btn btn-primary read-more-btn">Read More</a>
            </div>

        </div>
    </div>
</section>



<!-- Services Section -->
<section id="services-section">
    <div class="container shadow-sm bg-white mb-3 p-0 animate-on-scroll" data-animation="fadeInRight">
        <div class="row g-0">
            <div class="col-md-7">
                <div class="img-container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="2500">
                                <img src="{{ asset('assets/images/teeth.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="{{ asset('assets/images/teeth.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <img src="{{ asset('assets/images/teeth.png') }}" class="d-block w-100" alt="...">
                            </div>
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
            </div>
            <div class="col-md-5 text-container text-justify">
                <div class="card-body p-3">
                    <h3 class="card-title deep-color">{{$facilities->title}}</h3>
                    <p class="card-text">{!! nl2br(e($facilities->content)) !!}</p>
                </div>
                <a href="#" class="btn btn-primary read-more-btn">Read More</a>
            </div>
        </div>
    </div>
</section>

<!-- <section id="specialization">
    <div class="container shadow-sm bg-white mb-3 p-0 animate-on-scroll" data-animation="fadeIn">
        <div class="card border-light section_div text-center">
            <div class="card-body p-0">
                <h2 class="card-title section_title my-2 deep-color">Departments</h2>
                <div id="testimonial_area" class="section_padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <div class="specialization_slider_area text-center owl-carousel">
                                    @foreach($departments as $departmentsData)
                                    <div class="card p-2 box-area trans-bg border border-light">
                                        <div class="img-area d-flex justify-content-center">
                                            <img src="{{ asset('storage/' . $departmentsData->image) }}" alt="" class="rounded-circle border border-2 shadow w-75">
                                        </div>
                                        <div class="mt-2">
                                            <h5>{{$departmentsData->department_name}}</h5>
                                            <div>{{$departmentsData->department_head}}</div>
                                            <div>{{$departmentsData->description}}</div>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section> -->




<!-- FAQ Section -->
<section id="faq-section">
    <div class="container shadow-sm bg-white mb-3 py-2">
        <div class="accordion accordion-flush" id="faqs-accordion">
            <div class="h2 p-2 deep-color">Why you choose us?</div>
            <hr class="m-0">
            @foreach($faqs as $faqsData)
            <div class="accordion-item animate-on-scroll" data-animation="fadeInDown">
                <h2 class="accordion-header" id="flush-heading-{{ $loop->iteration }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $loop->iteration }}" aria-expanded="false" aria-controls="flush-collapse-{{ $loop->iteration }}">
                        {{$faqsData->question}}
                    </button>
                </h2>
                <div id="flush-collapse-{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="flush-heading-{{ $loop->iteration }}" data-bs-parent="#faqs-accordion">
                    <div class="accordion-body">{{$faqsData->answer}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Logo Section -->
<section id="logo-section">
    <div class="container shadow-sm bg-white mb-3 mt-5">

        <div class="row row-cols-4 g-4">
            <div class="col m-0 p-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0">
                <div class="h-100 p-4 light-bg shadow">
                    <h3 class="card-title text-center fw-bold deep-color">APPROVED</h3>
                    <h3 class="styled-text text-center fw-bold deep-color">BY</h3>
                    <div class="p-4">

                        <img src="{{ asset('assets/images/bd.png') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center fs-6 fw-semibold"> Ministry of Health and Family Welfare, Government of the People's Republic of Bangladesh</p>
                    </div>
                </div>
            </div>
            <div class="col m-0 p-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0.2">
                <div class="h-100 p-4 light-bg shadow">
                    <h3 class="card-title text-center fw-bold deep-color">AFFILIATED</h3>
                    <h3 class="styled-text text-center fw-bold deep-color">WITH</h3>
                    <div class="p-4">
                        <img src="{{ asset('assets/images/du.png') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center fs-6 fw-semibold">University of Dhaka (DU) <br>Bangladesh</p>
                    </div>
                </div>
            </div>
            <div class="col m-0 p-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0.4">
                <div class="h-100 p-4 light-bg shadow">
                    <h3 class="card-title text-center fw-bold deep-color">RECOGNIZED</h3>
                    <h3 class="styled-text text-center fw-bold deep-color">BY</h3>
                    <div class="p-4">
                        <img src="{{ asset('assets/images/bmdc.png') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center fs-6 fw-semibold">Bangladesh Medical and Dental Council (BM&DC)</p>
                    </div>
                </div>
            </div>
            <div class="col m-0 p-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0.6">
                <a href="#" class="btn h-100 p-4 light-bg shadow d-flex justify-content-center align-items-center flex-column position-relative">
                    <h3 class="card-title text-center fw-bold deep-color">Learn More</h3>
                    <h1 class="card-title text-center fw-bold deep-color fw-bold"><i class="bi bi-arrow-right"></i></h1>

                </a>
            </div>
        </div>

    </div>
</section>

<!-- Message Section -->
<section id="message-section">
    <div class="container mb-3 p-0">

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($messages as $messageData)
            <div class="col animate-on-scroll" data-animation="fadeInUp" data-animation-delay='{{ $loop->index * 0.2 }}'>
                <div class="shadow-sm bg-white h-100">
                    <div class="img-container">
                        <img src="{{ asset('storage/default/' . $messageData->slug . '.jpg') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body p-3 text-container text-justify">
                        <h4 class="card-title deep-color">{!! nl2br(e($messageData->title)) !!}</h4>
                        <p class="card-text">{!! nl2br(e($messageData->content)) !!}</p>
                        <a href="#" class="btn btn-primary read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


<!-- Services Section -->
<section id="services-section">
    <div class="container mb-3 py-2 animate-on-scroll" data-animation="fadeIn">
        <div class="row">
            <div class="col-md-8 shadow-sm bg-white">
                <div class="h3 p-2 deep-color">Student's Life</div>
                <div class="row g-0">
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

            <div class="col-md-4 p-0 ps-md-2">
                <div class="notice-box shadow-sm bg-white p-2">
                    <div class="d-flex jusify-content-center align-items-center">
                        <h3 class="alert-heading deep-color mt-2">MDC News</h3>
                        <div class="ms-auto"><a href="{{ route('news.all') }}">See All</a></div>
                    </div>
                    <hr>
                    <div class="notices">
                        <ul>
                            @foreach($news as $newsData)
                            <li class="animate-on-scroll" data-animation="fadeInDown">
                                <a href="{{ route('news.preview', $newsData->slug) }}" class="text-reset text-decoration-none text-nowrap">
                                    <div class="text-truncate">
                                        {{$newsData->heading}}
                                    </div>
                                    <div class="text-end mb-2">{{ \Carbon\Carbon::parse($newsData->published_at)->format('d F, Y') }}</div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section id="map-section">
    <div class="container p-0 bg-white shadow-sm text-center mb-3 p-4">
        <h3 class="deep-color fw-semibold">Out Patient Department (OPD)</h3>
        <div class="fs-6">Service Hour (9:00 am - 2:30 pm - Saturday - Thursday)</div>
        <div class="row my-3">
            <div class="col-md-6 my-2">
                <div class="d-flex align-items-start justify-content-start p-4 gap-3 semitrans-bg shadow-sm h-100">
                    <div class="btn btn-primary deep-bg border-0 rounded-circle py-2 d-inline"><i class="fa-solid fa-phone-volume animate__animated animate__swing animate__infinite infinite"></i></div>
                    <div class="d-inline text-start">
                        <div class="h2 deep-color fw-semibold d-inline">Recieption</div>
                        <div class="fs-4">0123456789</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <div class="d-flex align-items-start justify-content-start p-4 gap-3 semitrans-bg shadow-sm h-100">
                    <div class="btn btn-primary deep-bg border-0 rounded-circle py-1 d-inline fs-5 fw-bold"><i class="fa-solid fa-mobile-screen animate__animated animate__heartBeat animate__infinite	infinite"></i></div>
                    <div class="d-inline text-start">
                        <div class="h2 deep-color fw-semibold d-inline">Patient Query</div>
                        <div class="fs-5">Dr. Mohammad Arif Bin Fatah</div>
                        <div class="fs-6">ODP In-charge</div>
                        <div class="fs-4">0123456789</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn btn-primary deep-bg border-0">Read Me <i class="fa-solid fa-arrow-right"></i></div>
    </div>
</section>





@endsection