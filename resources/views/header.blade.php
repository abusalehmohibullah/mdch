<!-- resources/views/header.blade.php -->

<header>

    <!-- Top Nav -->
    <nav class="navbar navbar-expand semitrans-bg py-0">
        <div class="container">
            <!-- Contacts and Socials -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">

                    <a class="nav-link" href="#"><i class="bi bi-telephone-fill"></i> 01234567899</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="#"><i class="bi bi-envelope-fill"></i> knock.mdch@gmail.com</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-twitter"></i> <!-- Twitter icon -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-facebook"></i> <!-- Facebook icon -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-instagram"></i> <!-- Instagram icon -->
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Branding Nav -->
    <nav class="navbar bg-light bg-white sticky-top shadow-sm pb-0">
        <div class="container-fluid">
            <div class="container d-flex align-items-center gap-2">
                <div class="hstack gap-2 w-100 pe-2">
                    <!-- Logo and Full Name -->
                    <a class="navbar-brand fs-1 fw-semibold m-0" href="#">
                        <img src="{{ asset('assets/images/mandy.png') }}" alt="Logo" width="70px">
                        MDCH
                    </a>
                    <div class="vr"></div>
                    <div class="vstack gap-0 h-100 d-flex justify-content-center">
                        <div class="fs-4 fw-semibold text-nowrap">
                            MANDY DENTAL COLLEGE AND HOSPITAL
                        </div>
                        <div>
                            Institution for the study of dentistry.
                        </div>
                    </div>
                </div>
                <div>
                    <div class="btn btn-success text-nowrap">Patient Care</div>
                </div>
                <div>
                    <div class="btn btn-primary text-nowrap">Log In</div>
                </div>
                <div>
                    <div class="btn btn-danger text-nowrap">Apply Online</div>
                </div>
            </div>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg bg-danger bg-opacity-50 sticky-top shadow-sm ">
        <div class="container">
            <div class="d-flex justify-content-center w-100">

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
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">BDS Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">Admission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">Departments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">Our Faculties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">Student Life</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">Notice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">Career</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">Contact</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>

</header>