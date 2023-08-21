@extends('layout')

@section('page-title', 'Contact')
@section('contact-active', 'active')

@section('content')

<div class="container my-3">


    <x-back-btn-component title="Contact" />

    <div class="row">
        <div class="col-xl-4">
            <div class="d-flex align-items-start justify-content-start p-4 gap-3 light-bg shadow-sm m-2">
                <div class="btn deep-bg border-0 rounded-circle py-2 d-inline text-white"><i class="fa-solid fa-phone-volume animate__animated animate__swing animate__infinite infinite"></i></div>
                <div class="d-inline text-start">
                    <div class="h4 deep-color fw-semibold d-inline">Address</div>
                    <div class="fs-5">{{ config('informations.address') }}</div>
                </div>
            </div>
            <div class="d-flex align-items-start justify-content-start p-4 gap-3 light-bg shadow-sm m-2">
                <div class="btn deep-bg border-0 rounded-circle py-2 d-inline text-white"><i class="fa-solid fa-phone-volume animate__animated animate__swing animate__infinite infinite"></i></div>
                <div class="d-inline text-start">
                    <div class="h4 deep-color fw-semibold d-inline">Contact</div>
                    <div class="fs-5">{{ config('informations.contact') }}</div>
                    <div class="fs-5">{{ config('informations.email') }}</div>
                </div>
            </div>
            <div class="d-flex align-items-start justify-content-start p-4 gap-3 light-bg shadow-sm m-2">
                <div class="btn deep-bg border-0 rounded-circle py-2 d-inline text-white"><i class="fa-solid fa-phone-volume animate__animated animate__swing animate__infinite infinite"></i></div>
                <div class="d-inline text-start">
                    <div class="h4 deep-color fw-semibold d-inline">Recieption</div>
                    <div class="fs-5">{{ config('informations.recieption') }}</div>
                </div>
            </div>
            <div class="d-flex align-items-start justify-content-start p-4 gap-3 light-bg shadow-sm m-2">
                <div class="btn deep-bg border-0 rounded-circle py-2 d-inline text-white"><i class="fa-solid fa-phone-volume animate__animated animate__swing animate__infinite infinite"></i></div>
                <div class="d-inline text-start">
                    <div class="h4 deep-color fw-semibold d-inline">College Hour</div>
                    <div class="fs-5">09:00 - 14:30, Sat - Thu</div>
                </div>
            </div>
            <div class="d-flex align-items-start justify-content-start p-4 gap-3 light-bg shadow-sm m-2">
                <div class="btn deep-bg border-0 rounded-circle py-2 d-inline text-white"><i class="fa-solid fa-phone-volume animate__animated animate__swing animate__infinite infinite"></i></div>
                <div class="d-inline text-start">
                    <div class="h4 deep-color fw-semibold d-inline">OPD Hour</div>
                    <div class="fs-5">09:00 - 14:30, Sat - Thu</div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1670274723533!2d90.35355131166826!3d23.74142248903066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf401141682b%3A0x5bfd35579e30adfd!2z4Kau4KeN4Kav4Ka-4Kao4KeN4Kah4Ka_IOCmoeCnh-CmqOCnjeCmn-CmvuCmsiDgppXgprLgp4fgppwg4KaTIOCmueCmuOCmquCmv-Cmn-CmvuCmsg!5e0!3m2!1sbn!2sbd!4v1688575005237!5m2!1sbn!2sbd" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="follow d-flex flex-column justify-content-center align-items-center mt-5">
                    <div class="h3 mt-3">Stay Connected</div>
                    <div class="icon d-flex gap-4">
                        <a class="btn p-1" href="{{ config('informations.facebook') }}"><i class="h1 footer-link fa-brands fa-facebook-f"></i></a>
                        <a class="btn p-1" href="{{ config('informations.instagram') }}"><i class="h1 footer-link fa-brands fa-instagram"></i></a>
                        <a class="btn p-1" href="{{ config('informations.x') }}"><i class="h1 footer-link fa-brands fa-x-twitter"></i></a>
                        <a class="btn p-1" href="{{ config('informations.linkedin') }}"><i class="h1 footer-link fa-brands fa-linkedin-in"></i></a>
                        <a class="btn p-1" href="{{ config('informations.youtube') }}"><i class="h1 footer-link fa-brands fa-youtube"></i></a>
                    </div>
                </div>
        </div>
    </div>

</div>

@endsection