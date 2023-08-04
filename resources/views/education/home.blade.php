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
            <iframe width="560" height="315" src="https://www.youtube.com/embed/RLN99JcdvVk?playlist=RLN99JcdvVk&loop=1&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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


<!-- catagories Section -->
<!-- <section id="about-us-section">
        <div class="container d-flex justify-content-around">
            <div class="border border-light rounded bg-info fs-3 fw-semibold px-5 py-3">
                Admission
            </div>
            <div class="border border-light rounded bg-info fs-3 fw-semibold px-5 py-3">
                Treatement
            </div>
            <div class="border border-light rounded bg-info fs-3 fw-semibold px-5 py-3">
                Treatement
            </div>
        </div>
    </section> -->


<!-- About Us Section -->
<!-- <section id="about-us-section">
    <div class="container shadow-sm bg-white mb-3 p-0">
        <div class="float-end ms-3" style="width: 40%;">
            <img src="{{ asset('assets/images/college-image.jpg') }}" class="img-fluid" alt="...">
        </div>

        <div class="card-body p-3">
            <h3 class="card-title deep-color">About</h3>
            <p class="card-text text-justify">Our esteemed faculty comprises accomplished educators and experienced dental professionals who are passionate about sharing their knowledge and expertise. They foster a culture of innovation and critical thinking, challenging our students to explore new horizons in dental science and patient care. By integrating the latest advancements in dentistry into our teaching methodologies, we ensure that our graduates are equipped with the skills and knowledge necessary to thrive in an ever-evolving healthcare landscape.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, facere! Vel labore officia aliquam, voluptatibus saepe impedit quis recusandae necessitatibus beatae ratione, architecto ipsum corrupti modi suscipit eveniet nobis dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem ea hic nobis odit aut odio eveniet quia quis impedit tenetur vitae vel, totam ex earum. Vel cupiditate itaque quod molestias!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, facere! Vel labore officia aliquam, voluptatibus saepe impedit quis recusandae necessitatibus beatae ratione, architecto ipsum corrupti modi suscipit eveniet nobis dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem ea hic nobis odit aut odio eveniet quia quis impedit tenetur vitae vel, totam ex earum. Vel cupiditate itaque quod molestias!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, facere! Vel labore officia aliquam, voluptatibus saepe impedit quis recusandae necessitatibus beatae ratione, architecto ipsum corrupti modi suscipit eveniet nobis dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem ea hic nobis odit aut odio eveniet quia quis impedit tenetur vitae vel, totam ex earum. Vel cupiditate itaque quod molestias!
                One of the hallmarks of our institution is our state-of-the-art dental clinic, where our students gain invaluable practical experience under the supervision of faculty and staff. This real-world exposure enables them to apply their theoretical knowledge to diagnose, treat, and prevent various oral health conditions. We prioritize patient-centered care, ensuring that each individual receives personalized treatment while maintaining the highest standards of professionalism, ethics, and safety.</p>
        </div>

    </div>
</section> -->
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
                    <h3 class="card-title deep-color">About</h3>
                    <p class="card-text">Our esteemed faculty comprises accomplished educators and experienced dental professionals who are passionate about sharing their knowledge and expertise. They foster a culture of innovation and critical thinking, challenging our students to explore new horizons in dental science and patient care. By integrating the latest advancements in dentistry into our teaching methodologies, we ensure that our graduates are equipped with the skills and knowledge necessary to thrive in an ever-evolving healthcare landscape.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, facere! Vel labore officia aliquam, voluptatibus saepe impedit quis recusandae necessitatibus beatae ratione, architecto ipsum corrupti modi suscipit eveniet nobis dignissimos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem ea hic nobis odit aut odio eveniet quia quis impedit tenetur vitae vel, totam ex earum. Vel cupiditate itaque quod molestias!
                        One of the hallmarks of our institution is our state-of-the-art dental clinic, where our students gain invaluable practical experience under the supervision of faculty and staff. This real-world exposure enables them to apply their theoretical knowledge to diagnose, treat, and prevent various oral health conditions. We prioritize patient-centered care, ensuring that each individual receives personalized treatment while maintaining the highest standards of professionalism, ethics, and safety.</p>
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
                    <h3 class="card-title deep-color">Our Faculties</h3>
                    <p class="card-text">Our esteemed faculty comprises accomplished educators and experienced dental professionals who are passionate about sharing their knowledge and expertise. They foster a culture of innovation and critical thinking, challenging our students to explore new horizons in dental science and patient care. By integrating the latest advancements in dentistry into our teaching methodologies, we ensure that our graduates are equipped with the skills and knowledge necessary to thrive in an ever-evolving healthcare landscape.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi qui veritatis molestias facere aliquam laborum dolores illum illo quas? Exercitationem consequuntur recusandae fugit eligendi rem vitae odio sequi facilis deserunt.
                        Lorem ipsu
                        One of the hallmarks of our institution is our state-of-the-art dental clinic, where our students gain invaluable practical experience under the supervision of faculty and staff. This real-world exposure enables them to apply their theoretical knowledge to diagnose, treat, and prevent various oral health conditions. We prioritize patient-centered care, ensuring that each individual receives personalized treatment while maintaining the highest standards of professionalism, ethics, and safety.</p>
                </div>
                <a href="#" class="btn btn-primary read-more-btn">Read More</a>
            </div>
        </div>
    </div>
</section>

<section id="specialization">
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
</section>




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
            <div class="col animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0">
                <div class="shadow-sm bg-white h-100">
                    <div class="img-container">
                        <img src="{{ asset('storage/default/chairman.jpg') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body p-3 text-container text-justify">
                        <h4 class="card-title deep-color">Chairman's Message</h4>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore voluptatibus non qui? Alias dolore vel quos unde, incidunt earum iusto quasi aut libero aliquam officia veniam consequatur laborum itaque et! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi obcaecati labore veniam, tempora eum atque rem libero architecto quas. Tempore a placeat minima ab neque officia dicta quaerat hic eligendi.</p>
                        <a href="#" class="btn btn-primary read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0.2">
                <div class="shadow-sm bg-white h-100">
                    <div class="img-container">
                        <img src="{{ asset('storage/default/director.jpg') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body p-3 text-container text-justify">
                        <h4 class="card-title deep-color">Directors's Message</h4>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore voluptatibus non qui? Alias dolore vel quos unde, incidunt earum iusto quasi aut libero aliquam officia veniam consequatur laborum itaque et! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi obcaecati labore veniam, tempora eum atque rem libero architecto quas. Tempore a placeat minima ab neque officia dicta quaerat hic eligendi.</p>
                        <a href="#" class="btn btn-primary read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0.4">
                <div class="shadow-sm bg-white h-100">
                    <div class="img-container">
                        <img src="{{ asset('storage/default/principal.jpg') }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body p-3 text-container text-justify">
                        <h4 class="card-title deep-color">Principal's Message</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum suscipit sequi dolor beatae voluptatem voluptatum minima corporis consequatur maxime debitis dolorum, quae officia nesciunt rem nostrum omnis optio minus iure. Lorem ipsum, dolor sit amet consectetur adipisicing elit. In, ratione, quos ipsum ex sequi, voluptatibus fugiat error atque magnam mollitia laudantium quaerat quia adipisci optio odit fuga inventore delectus ab.</p>
                            <a href="#" class="btn btn-primary read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
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
                    <div id="album-container" class="col-3 mb-2">
                        <div class="d-flex align-items-center position-relative">
                            <div class="thumbnail-container d-flex justify-content-center position-relative">
                                <div class="card m-2 album-card">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/60/1600x1200" class="text-decoration-none text-dark">
                                        <img src="{{ asset('assets/images/teeth.png') }}" class="w-100" alt="" />

                                        <div class="card-body p-2">
                                            <div class="fs-6 card-title m-0">Students</div>
                                        </div>
                                    </a>

                                    <div style="display:none">
                                        <a data-fancybox="gallery" href="https://lipsum.app/id/61/1600x1200">
                                            <img src="https://lipsum.app/id/61/120x80" />
                                        </a>
                                        <a data-fancybox="gallery" href="https://lipsum.app/id/62/1600x1200">
                                            <img src="https://lipsum.app/id/62/120x80" />
                                        </a>
                                        <a data-fancybox="gallery" href="https://lipsum.app/id/63/1600x1200">
                                            <img src="https://lipsum.app/id/63/120x80" />
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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

<!-- Services Section -->
<!-- <section id="services-section">
    <div class="container shadow-sm bg-white  mb-3">
        <div class="row g-0">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="notice-box p-2">
                    <div class="d-flex jusify-content-center align-items-center">
                        <h4 class="alert-heading deep-color mt-2">MDC News</h4>
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
</section> -->



<!-- Map Section -->
<section id="map-section">
    <div class="container p-0 bg-white shadow-sm text-center mb-3 p-4">
        <h3 class="deep-color fw-semibold">Out Patient Department (OPD)</h3>
        <div class="fs-6">Service Hour (9:00 am - 2:30 pm - Saturday - Thursday)</div>
        <div class="row my-3">
            <div class="col-md-6 my-2">
                <div class="d-flex align-items-start justify-content-start p-4 gap-3 semitrans-bg shadow-sm h-100">
                    <div class="btn btn-primary deep-bg border-0 rounded-circle py-2 d-inline"><i class="fa-solid fa-phone-volume"></i></div>
                    <div class="d-inline text-start">
                        <div class="h2 deep-color fw-semibold d-inline">Recieption</div>
                        <div class="fs-4">0123456789</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <div class="d-flex align-items-start justify-content-start p-4 gap-3 semitrans-bg shadow-sm h-100">
                    <div class="btn btn-primary deep-bg border-0 rounded-circle py-1 d-inline fs-5 fw-bold"><i class="fa-solid fa-mobile-screen"></i></div>
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