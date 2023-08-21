<footer class="bg-white my-2">

    <div class="container p-2">
        <div class="row">
            <div class="row col-md-12 col-lg-6">
            
                        <a class="navbar-brand fs-1 fw-semibold m-0" href="/">
                            <img src="{{ asset('assets/images/logo.png') }}" class="brand-logo" alt="Logo" width="70px">
                            MDCH
                        </a>
            <div class="col-8 col-lg-8">

                <div class="h5 mt-3">Contact</div>
                <div><small><strong>Address: </strong>{!! nl2br(e(config('informations.address'))) !!}</small></div>
                <div><small><strong>Cell: </strong> {{ config('informations.contact') }}</small></div>
                <div><small><strong>Hours: </strong> 09:00 - 14:30, Sat - Thu</small></div>

                <div class="follow">
                    <div class="h5 mt-3">Follow Us</div>
                    <div class="icon">
                        <a class="btn p-1" href="{{ config('informations.facebook') }}"><i class="footer-link fa-brands fa-facebook-f"></i></a>
                        <a class="btn p-1" href="{{ config('informations.instagram') }}"><i class="footer-link fa-brands fa-instagram"></i></a>
                        <a class="btn p-1" href="{{ config('informations.x') }}"><i class="footer-link fa-brands fa-x-twitter"></i></a>
                        <a class="btn p-1" href="{{ config('informations.linkedin') }}"><i class="footer-link fa-brands fa-linkedin-in"></i></a>
                        <a class="btn p-1" href="{{ config('informations.youtube') }}"><i class="footer-link fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-4">
                <div class="h5 mt-3">About</div>
                <div class="d-flex flex-column gap-2">
                    <a class="footer-link text-reset text-decoration-none" href="/education/about/about"><small>About Us</small></a>
                    <a class="footer-link text-reset text-decoration-none" href="/education/about/facilities"><small>Facilities</small></a>
                    <a class="footer-link text-reset text-decoration-none" href="/education/news"><small>Notices</small></a>
                    <a class="footer-link text-reset text-decoration-none" href="/education/career"><small>Career</small></a>
                    <a class="footer-link text-reset text-decoration-none" href="/education/contact"><small>Contact Us</small></a>
                </div>
            </div>
            </div>

            <div class="col-md-12 col-lg-6">
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1670274723533!2d90.35355131166826!3d23.74142248903066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf401141682b%3A0x5bfd35579e30adfd!2z4Kau4KeN4Kav4Ka-4Kao4KeN4Kah4Ka_IOCmoeCnh-CmqOCnjeCmn-CmvuCmsiDgppXgprLgp4fgppwg4KaTIOCmueCmuOCmquCmv-Cmn-CmvuCmsg!5e0!3m2!1sbn!2sbd!4v1688575005237!5m2!1sbn!2sbd" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="text-center medium-text mt-3">
                © {{ date("Y") }} Mandy Dental College and Hospital.
            </div>
            <div class="text-center mini-text mt-1">
                <small>
                    Developed by <a href="https://www.codingkori.com" class="text-decoration-none">codingKori</a>.
                </small>
            </div>
        </div>
    </div>


</footer>