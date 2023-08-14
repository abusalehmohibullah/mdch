<!-- resources/views/home.blade.php -->

@extends('layout')

@section('content')

<!-- Video Section -->
<section id="video-section">
    <div class="container p-0 shadow-sm animate-on-load animate__zoomIn animate__delay-1s">
        <!-- Replace traditional slider with a video -->
        <div class="embed-responsive embed-responsive-16by9 w-100 ratio ratio-16x9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ config('informations.video-id') }}?playlist={{ config('informations.video-id') }}&loop=1&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- Notice Section -->
<section>
    <div class="container notice-container light-bg d-flex my-3 p-0 shadow-sm animate-on-load animate__backInUp animate__delay-1s">
        <div class="title deep-bg d-flex align-items-center py-1 px-3">
            <a href="{{ route('news.all') }}" class="text-decoration-none text-dark mini-text">Notice</a>
        </div>

        <ul class="d-flex align-items-center text-nowrap">
            @foreach($latestNews as $latestNewsData)
            <li><a href="{{ route('news.preview', $latestNewsData->slug) }}" class="text-reset text-decoration-none mini-text">{{$latestNewsData->heading}}</a></li>
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
                    <img src="{{ asset('storage/default/' . $about->slug . '.jpg') }}" class="img-fluid" alt="...">
                </div>
            </div>

            <div class="col-md-7 order-md-1 text-container text-justify">
                <div class="card-body p-3">
                    <h3 class="card-title deep-color large-text">{{$about->title}}</h3>
                    <p class="card-text mini-text">{!! nl2br(e($about->content)) !!}</p>
                </div>
                <a href="/education/about/{{$about->slug}}" class="btn btn-primary read-more-btn">Read More</a>
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
            </div>
            <div class="col-md-5 text-container text-justify">
                <div class="card-body p-3">
                    <h3 class="card-title deep-color large-text">{{$facilities->title}}</h3>
                    <p class="card-text mini-text">{!! nl2br(e($facilities->content)) !!}</p>
                </div>
                <a href="/education/about/{{$facilities->slug}}" class="btn btn-primary read-more-btn">Read More</a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq-section">
    <div class="container shadow-sm bg-white mb-3 py-2">
        <div class="accordion accordion-flush" id="faqs-accordion">
            <div class="h2 p-2 deep-color large-text">Why you choose us?</div>
            <hr class="m-0">
            @foreach($faqs as $faqsData)
            <div class="accordion-item animate-on-scroll" data-animation="fadeInDown">
                <h2 class="accordion-header" id="flush-heading-{{ $loop->iteration }}">
                    <button class="accordion-button collapsed mini-text" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $loop->iteration }}" aria-expanded="false" aria-controls="flush-collapse-{{ $loop->iteration }}">
                        {{$faqsData->question}}
                    </button>
                </h2>
                <div id="flush-collapse-{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="flush-heading-{{ $loop->iteration }}" data-bs-parent="#faqs-accordion">
                    <div class="accordion-body mini-text">{{$faqsData->answer}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Logo Section -->
<section id="logo-section">
    <div class="container shadow-sm bg-white mb-3 mt-5">

        <div class="row g-4">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3 m-0 p-1 p-sm-2 p-md-2 p-lg-3 p-xl-3 p-xxl-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0">
                <div class="h-100 p-2 p-md-4 light-bg shadow">
                    <h3 class="card-title medium-text text-center fw-bold deep-color">APPROVED<br>BY</h3>
                    <div class="p-2 p-sm-3 p-md-4">

                        <img src="{{ asset('assets/images/bd.png') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-text micro-text text-center fw-semibold"> Ministry of Health and Family Welfare, <br>Government of the People's Republic of Bangladesh</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3 m-0 p-1 p-sm-2 p-md-2 p-lg-3 p-xl-3 p-xxl-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0.2">
                <div class="h-100 p-2 p-md-4 light-bg shadow">
                    <h3 class="card-title medium-text text-center fw-bold deep-color">AFFILIATED<br>WITH</h3>
                    <div class="p-2 p-sm-3 p-md-4">
                        <img src="{{ asset('assets/images/du.png') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-text micro-text text-center fw-semibold">University of Dhaka (DU) <br>Bangladesh</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-3 m-0 p-1 p-sm-2 p-md-2 p-lg-3 p-xl-3 p-xxl-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0.4">
                <div class="h-100 p-2 p-md-4 light-bg shadow">
                    <h3 class="card-title medium-text text-center fw-bold deep-color">RECOGNIZED<br>BY</h3>
                    <div class="p-2 p-sm-3 p-md-4">
                        <img src="{{ asset('assets/images/bmdc.png') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-text micro-text text-center fw-semibold">Bangladesh Medical and Dental Council (BM&DC)</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 m-0 p-1 p-sm-2 p-md-2 p-lg-3 p-xl-3 p-xxl-4 animate-on-scroll" data-animation="fadeInLeft" data-animation-delay="0.6">
                <a href="/education/about/affiliation" class="btn rounded-0 h-100 p-2 light-bg shadow d-flex justify-content-center align-items-center flex-column position-relative">
                    <h3 class="card-title medium-text text-center fw-bold deep-color">Learn More</h3>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Message Section -->
<section id="message-section">
    <div class="container mb-3 p-0">

        <div class="row row-cols-1 row-cols-lg-3 g-4">
            @foreach($messages as $messageData)
            <div class="col">
                <div class="shadow-sm bg-white h-100">
                    @php
                    $delay = $loop->index * 0.2;
                    @endphp
                    <h4 class="card-title deep-color large-text p-3 animate-on-scroll" data-animation="fadeInUp" data-animation-delay='{{ $delay }}'>{!! nl2br(e($messageData->title)) !!}</h4>
                    <div class="img-container animate-on-scroll px-3" data-animation="fadeInUp" data-animation-delay='{{ $delay }}'>
                        <img src="{{ asset('storage/default/' . $messageData->slug . '.jpg') }}" class="card-img-top" alt="...">
                        <div class="py-1">
                            <div class="mini-text">
                                @if ($messageData->slug === 'chairmans-message')
                                {{ config('informations.chairman') }}
                                @elseif ($messageData->slug === 'directors-message')
                                {{ config('informations.director') }}
                                @elseif ($messageData->slug === 'principals-message')
                                {{ config('informations.principal') }}
                                @else
                                {{-- Default content if none of the conditions match --}}
                                No name found.
                                @endif
                            </div>
                            <div class="mini-text"><small>@firstword($messageData->title)</small></div>
                            <div class="mini-text"><small>Mandy Dental College and Hospital</small></div>
                        </div>
                    </div>
                    <div class="card-body p-3 text-container text-justify animate-on-scroll" data-animation="fadeInUp" data-animation-delay='{{ $delay }}'>
                        <p class="card-text mini-text">{!! $messageData->content !!}</p>
                        <a href="/education/about/{{$messageData->slug}}" class="btn btn-primary read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- advertisement Section -->
<section id="advertisement-section">
    <div class="container mb-3 p-0 shadow-sm">
        <div id="carouselExampleIndicators-2" class="carousel slide" data-bs-ride="carousel">
            @if(count($advertisements) > 1)
            <div class="carousel-indicators">
                @foreach($advertisements as $key => $image)
                <button type="button" data-bs-target="#carouselExampleIndicators-2" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            @endif
            <div class="carousel-inner">
                @foreach($advertisements as $key => $image)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2500">
                    <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="...">
                </div>
                @endforeach
            </div>
            @if(count($advertisements) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators-2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators-2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>

    </div>
</section>

<!-- albums Section -->
<section id="albums-section">
    <div class="container mb-3 py-2 animate-on-scroll" data-animation="fadeIn">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 shadow-sm bg-white">
                <div class="h3 p-2 deep-color large-text">Student's Life</div>
                <div class="row g-0">
                    @foreach($albums as $albumsData)
                    @php
                    $id = $loop->index;
                    @endphp
                    <div id="album-container-{{$id}}" class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-3  mb-2" onclick="openAlbum(<?php echo $id ?>)">
                        <div class="d-flex align-items-center position-relative w-100">

                            <div class="card m-2 w-100">
                                <div class="show-first-child w-100">

                                    @foreach($albumsData->media as $mediaData)
                                    <a data-fancybox="album-{{$id}}" href="{{ asset('storage/' . $mediaData->path) }}" class="child w-100 ratio ratio-4x3 overflow-hidden">
                                        <img src="{{ asset('storage/' . $mediaData->path) }}" />
                                    </a>
                                    @endforeach

                                    <div class="card-body p-2">
                                        <div class="card-title m-0 text-truncate mini-text"><small>{{$albumsData->name}}</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>

            </div>

            <div class="col-12 col-md-6 col-lg-4 p-0 ps-md-2">
                <div class="notice-box shadow-sm bg-white p-3">
                    <div class="d-flex jusify-content-center align-items-center">
                        <h3 class="alert-heading deep-color mt-2 large-text">MDCH News</h3>
                        <div class="ms-auto"><a href="{{ route('news.all') }}">See All</a></div>
                    </div>
                    <hr>
                    <div class="notices">
                        <ul>
                            @foreach($news as $newsData)
                            <li class="animate-on-scroll" data-animation="fadeInDown">
                                <a href="{{ route('news.preview', $newsData->slug) }}" class="text-reset text-decoration-none text-nowrap">
                                    <div class="text-truncate mini-text">
                                        {{$newsData->heading}}
                                    </div>
                                    <div class="text-end mb-2 text-muted"><small>{{ \Carbon\Carbon::parse($newsData->published_at)->format('d F, Y') }}</small></div>
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
        <h3 class="deep-color fw-semibold large-text">Out Patient Department (OPD)</h3>
        <div class="fs-6">Service Hour (9:00 am - 2:30 pm - Saturday - Thursday)</div>
        <div class="row my-3">
            <div class="col-md-6 my-2">
                <div class="d-flex align-items-start justify-content-start p-4 gap-3 semitrans-bg shadow-sm h-100">
                    <div class="btn btn-primary deep-bg border-0 rounded-circle py-2 d-inline"><i class="fa-solid fa-phone-volume animate__animated animate__swing animate__infinite infinite"></i></div>
                    <div class="d-inline text-start">
                        <div class="h2 deep-color fw-semibold d-inline">Recieption</div>
                        <div class="fs-4">{{ config('informations.recieption') }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <div class="d-flex align-items-start justify-content-start p-4 gap-3 semitrans-bg shadow-sm h-100">
                    <div class="btn btn-primary deep-bg border-0 rounded-circle py-1 d-inline fs-5 fw-bold"><i class="fa-solid fa-mobile-screen animate__animated animate__heartBeat animate__infinite	infinite"></i></div>
                    <div class="d-inline text-start">
                        <div class="h2 deep-color fw-semibold d-inline">Patient Query</div>
                        <div class="fs-5">{{ config('informations.opd-in-charge') }}</div>
                        <div class="fs-6">OPD In-charge</div>
                        <div class="fs-4">{{ config('informations.patient-query') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn btn-primary deep-bg border-0">Read Me <i class="fa-solid fa-arrow-right"></i></div>
    </div>
</section>



@if(request()->is('/*'))
@include('education.modal')
@endif



@endsection