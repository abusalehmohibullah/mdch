@extends('layout')

@section('page-title', 'MDCH: Login')
@section('login-active', 'active')

@section('content')

<div class="container shadow-sm bg-white mb-3 position-relative">
    <div class="h1 text-center deep-color my-2">Log In As</div>

<div class="dropdown position-absolute top-0 end-0">
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="../admin">Admin Control</a></li>
        </ul>
    </div>

    <div class="row g-4 mt-3">
        <div class="d-none d-md-block col-md-1 col-lg-2 col-xl-3 m-0 p-4 animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0">
        </div>
        <div class="col-6 col-md-5 col-lg-4 col-xl-3 m-0 p-4 animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0">
            <a href="#" class="btn h-100 p-4 light-bg shadow">
                <div class="p-1 p-md-3 p-lg-4">

                    <img src="{{ asset('assets/images/student.png') }}" class="card-img-top rounded rounded-circle" alt="...">
                </div>
                <h3 class="card-title text-center fw-bold">Student</h3>
            </a>
        </div>
        <div class="col-6 col-md-5 col-lg-4 col-xl-3 m-0 p-4 animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0.2">
            <a href="#" class="btn h-100 p-4 light-bg shadow">

                <div class="p-1 p-md-3 p-lg-4">
                    <img src="{{ asset('assets/images/teacher.png') }}" class="card-img-top rounded rounded-circle" alt="...">
                </div>
                <h3 class="card-title text-center fw-bold">Teacher</h3>

            </a>
        </div>
        <div class="d-none d-md-block col-md-1 col-lg-2 col-xl-3 m-0 p-4 animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0.4">
        </div>
    </div>

</div>

@endsection