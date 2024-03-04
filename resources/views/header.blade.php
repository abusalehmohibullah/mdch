<!-- resources/views/header.blade.php -->

<header>

    <!-- Top Nav -->
    <nav class="navbar navbar-expand semitrans-bg py-0 animate-on-scroll" data-animation="fadeInDown" data-animation-delay="0">
        <div class="container">
            <!-- Contacts and Socials -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item animate-on-scroll" data-animation="fadeInRight" data-animation-delay="0">
                    <a class="nav-link d-flex flex-nowrap gap-2 mini-text" href="#"><i class="bi bi-telephone-fill"></i> {{ config('informations.contact') }}</a>
                </li>
                <li class="nav-item animate-on-scroll" data-animation="fadeInRight" data-animation-delay="0.2">
                    <a class="nav-link d-flex flex-nowrap gap-2 mini-text" href="#"><i class="bi bi-envelope-fill"></i> {{ config('informations.email') }}</a>
                </li>
                <li class="nav-item d-none d-sm-block animate-on-scroll" data-animation="fadeInRight" data-animation-delay="0.8">
                    <a class="nav-link" href="{{ config('informations.facebook') }}">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block animate-on-scroll" data-animation="fadeInRight" data-animation-delay="0.9">
                    <a class="nav-link" href="{{ config('informations.instagram') }}">
                        <i class="fa-brands fa-instagram"></i> 
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block animate-on-scroll" data-animation="fadeInRight" data-animation-delay="1">
                    <a class="nav-link" href="{{ config('informations.x') }}">
                    <i class="fa-brands fa-x-twitter"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block animate-on-scroll" data-animation="fadeInRight" data-animation-delay="1.1">
                    <a class="nav-link" href="{{ config('informations.linkedin') }}">
                        <i class="fa-brands fa-linkedin-in"></i> 
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block animate-on-scroll" data-animation="fadeInRight" data-animation-delay="1.2">
                    <a class="nav-link" href="{{ config('informations.youtube') }}">
                        <i class="fa-brands fa-youtube"></i> 
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Branding Nav -->
    <nav class="navbar bg-light bg-white sticky-top shadow-sm pb-0 animate-on-scroll" data-animation="fadeInDown" data-animation-delay="0.2">
        <div class="container-fluid">
            <div class="container d-flex align-items-center gap-2">
                <div class="hstack gap-2 w-100 pe-2">
                    <!-- Logo and Full Name -->
                    <a class="navbar-brand fs-1 fw-semibold m-0" href="/">
                        <img src="{{ asset('assets/images/logo.png') }}" class="brand-logo" alt="Logo" width="70px">
                        <span class="d-none d-md-inline">MDCH</span>
                    </a>
                    <div class="vr"></div>
                    <div class="vstack gap-0 h-100 d-flex justify-content-center">
                        <div class="fs-4 fw-semibold text-nowrap deep-color brand-name">
                            MANDY DENTAL COLLEGE AND HOSPITAL
                        </div>
                        <div>
                        {{ config('informations.slogan') }}
                        </div>
                    </div>
                </div>
                <div>
                    <div class="btn custom-btn text-white text-nowrap d-none d-xl-block">Patient Care</div>
                </div>
                <div>
                    <a href="/login" class="btn custom-btn text-nowrap d-none d-xl-block">Log In</a>
                </div>
                <div>
                    <div class="btn custom-btn text-nowrap d-none d-xl-block animate__animated animate__headShake animate__delay-3s">Apply Online</div>
                </div>
            </div>
        </div>
    </nav>


    <!-- <nav class="navbar navbar-expand-lg light-bg shadow-sm animate-on-scroll" data-animation="fadeInDown" data-animation-delay="0.4"> -->
    <nav class="navbar navbar-expand-xl light-bg shadow-sm">
        <div class="container">
            <div class="d-flex justify-content-end w-100 gap-2">
                <ul class="navbar-nav d-flex flex-row gap-2 flex-nowrap text-nowrap">

                    <li class="nav-item">
                        <a class="nav-link p-2 @yield('home-active')" href="/education">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link p-2 dropdown-toggle @yield('about-sub-active')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu position-absolute">
                            <li><a class="dropdown-item @yield('about-active')" href="/education/about/about">About</a></li>
                            <li><a class="dropdown-item @yield('facilities-active')" href="/education/about/facilities">Facilities</a></li>
                            <li><a class="dropdown-item @yield('administrations-active')" href="/education/about/administrations">Administration</a></li>
                            <li><a class="dropdown-item @yield('office-stuff-active')" href="/education/about/office-stuff">Office Stuff</a></li>
                            <li><a class="dropdown-item @yield('affiliation-active')" href="/education/about/affiliation">Affiliation</a></li>
                            <li><a class="dropdown-item @yield('chairmans-message-active')" href="/education/about/chairmans-message">Chairman's Message</a></li>
                            <li><a class="dropdown-item @yield('directors-message-active')" href="/education/about/directors-message">Director's Message</a></li>
                            <li><a class="dropdown-item @yield('principals-message-active')" href="/education/about/principals-message">Academic Director's Message</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link p-2 dropdown-toggle @yield('bds-course-active')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            BDS Course
                        </a>
                        <ul class="dropdown-menu position-absolute">
                            <li><a class="dropdown-item @yield('1st-phase-active')" href="/education/bds-course/1st-phase">1st Phase</a></li>
                            <li><a class="dropdown-item @yield('2nd-phase-active')" href="/education/bds-course/2nd-phase">2nd Phase</a></li>
                            <li><a class="dropdown-item @yield('3rd-phase-active')" href="/education/bds-course/3rd-phase">3rd Phase</a></li>
                            <li><a class="dropdown-item @yield('4th-phase-active')" href="/education/bds-course/4th-phase">4th Phase</a></li>
                        </ul>
                    </li>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="offcanvas offcanvas-end light-bg" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header px-4">
                    <h5 class="offcanvas-title deep-color" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <!-- Menu items -->
                    <ul class="navbar-nav text-nowrap">
                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 dropdown-toggle @yield('departments-active')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Departments
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($departmentNames as $phase => $data)
                                <li><a class="dropdown-item disabled" href="#">{{ $data['phase_label'] }} Phase</a></li>
                                @foreach($data['departments'] as $department)
                                <li><a class="dropdown-item @yield($department->slug . '-active')" href="/education/departments/{{ $department->slug }}">{{ $department->name }}</a></li>
                                @endforeach
                                @if (!$loop->last) <!-- Check if it's not the last phase -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 dropdown-toggle @yield('admission-active')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admission
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item @yield('local-students-active')" href="/education/admission/local-students">Local Students</a></li>
                                <li><a class="dropdown-item @yield('international-students-active')" href="/education/admission/international-students">International Students</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 @yield('albums-active')" href="/education/albums">Student Life</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 @yield('notice-active')" href="/education/news">Notice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 @yield('career-active')" href="/education/career">Career</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="/education/contact">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex flex-column gap-2">

                        <div>
                            <div class="btn custom-btn text-white text-nowrap d-block d-xl-none">Patient Care</div>
                        </div>
                        <div>
                            <a href="/login" class="btn custom-btn text-nowrap d-block d-xl-none">Log In</a>
                        </div>
                        <div>
                            <div class="btn custom-btn text-nowrap d-block d-xl-none animate__animated animate__headShake animate__delay-3s">Apply Online</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>

</header>