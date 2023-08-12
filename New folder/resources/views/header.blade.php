<!-- resources/views/header.blade.php -->

<header>

    <!-- Top Nav -->
    <nav class="navbar navbar-expand semitrans-bg py-0 animate-on-scroll" data-animation="fadeInDown" data-animation-delay="0">
        <div class="container">
            <!-- Contacts and Socials -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex flex-nowrap gap-2" href="#"><i class="bi bi-telephone-fill"></i> 01234567899</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-nowrap gap-2" href="#"><i class="bi bi-envelope-fill"></i> knock.mdch@gmail.com</a>
                </li>
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link" href="#">
                        <i class="bi bi-twitter"></i> <!-- Twitter icon -->
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link" href="#">
                        <i class="bi bi-facebook"></i> <!-- Facebook icon -->
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link" href="#">
                        <i class="bi bi-instagram"></i> <!-- Instagram icon -->
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
                            Institution for the study of dentistry.
                        </div>
                    </div>
                </div>
                <div>
                    <div class="btn pink-bg text-white text-nowrap d-none d-xl-block">Patient Care</div>
                </div>
                <div>
                    <a href="/login" class="btn btn-primary text-nowrap d-none d-xl-block">Log In</a>
                </div>
                <div>
                    <div class="btn btn-danger text-nowrap d-none d-xl-block animate__animated animate__headShake animate__delay-3s">Apply Online</div>
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
                        <a class="nav-link p-2" href="/education">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/education/sections/about">About</a></li>
                            <li><a class="dropdown-item" href="/education/administrations">Administration</a></li>
                            <li><a class="dropdown-item" href="/education/sections/office-stuff">Office Stuff</a></li>
                            <li><a class="dropdown-item" href="/education/sections/affiliation">Affiliation</a></li>
                            <li><a class="dropdown-item" href="/education/sections/chairman">Chairman's Message</a></li>
                            <li><a class="dropdown-item" href="/education/sections/director">Director's Message</a></li>
                            <li><a class="dropdown-item" href="/education/sections/principal">Principal's Message</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            BDS Course
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/education/sections/1st-phase">1st Phase</a></li>
                            <li><a class="dropdown-item" href="/education/sections/2nd-phase">2nd Phase</a></li>
                            <li><a class="dropdown-item" href="/education/sections/3rd-phase">3rd Phase</a></li>
                            <li><a class="dropdown-item" href="/education/sections/4th-phase">4th Phase</a></li>
                        </ul>
                    </li>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <!-- Menu items -->
                    <ul class="navbar-nav text-nowrap">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Departments
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach($departmentNames as $phase => $data)
                                <li><a class="dropdown-item disabled" href="#">{{ $data['phase_label'] }} Phase</a></li>
                                @foreach($data['departments'] as $department)
                                <li><a class="dropdown-item" href="/education/departments/{{ $department->slug }}">{{ $department->name }}</a></li>
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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admission
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Local Students</a></li>
                                <li><a class="dropdown-item" href="#">International Students</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="/education/albums">Student Life</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="/education/news">Notice</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link p-2" href="#">Career</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex flex-column gap-2">

                        <div>
                            <div class="btn pink-bg text-white text-nowrap d-block d-xl-none">Patient Care</div>
                        </div>
                        <div>
                            <a href="/login" class="btn btn-primary text-nowrap d-block d-xl-none">Log In</a>
                        </div>
                        <div>
                            <div class="btn btn-danger text-nowrap d-block d-xl-none animate__animated animate__headShake animate__delay-3s">Apply Online</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>

</header>