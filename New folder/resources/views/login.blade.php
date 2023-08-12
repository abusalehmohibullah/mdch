@extends('layout')

@section('content')

<div class="h1 text-center deep-color my-2">Log In As</div>
<div class="container shadow-sm bg-white mb-3 mt-5">

    <div class="row g-4">
        <div class="col-md-4 m-0 p-4 animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0">
            <a href="#" class="btn h-100 p-4 light-bg shadow">
                <div class="p-4">
                    
                    <img src="{{ asset('assets/images/student.png') }}" class="card-img-top rounded rounded-circle" alt="...">
                </div>
                <h3 class="card-title text-center fw-bold">Student</h3>
            </a>
        </div>
        <div class="col-md-4  m-0 p-4 animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0.2">
            <a href="#" class="btn h-100 p-4 light-bg shadow">
                
                <div class="p-4">
                    <img src="{{ asset('assets/images/teacher.png') }}" class="card-img-top rounded rounded-circle" alt="...">
                </div>
                <h3 class="card-title text-center fw-bold">Teacher</h3>

            </a>
        </div>
        <div class="col-md-4  m-0 p-4 animate-on-scroll" data-animation="fadeInUp" data-animation-delay="0.4">
            <a href="../admin" class="btn h-100 p-4 light-bg shadow">
                
                <div class="p-4">
                    <img src="{{ asset('assets/images/admin.png') }}" class="card-img-top rounded rounded-circle" alt="...">
                </div>
                <h3 class="card-title text-center fw-bold">Admin</h3>

            </a>
        </div>
    </div>

</div>

@endsection