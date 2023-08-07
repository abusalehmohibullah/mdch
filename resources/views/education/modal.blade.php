<!-- modal.blade.php -->

<div class="modal fade" id="sectionModal" aria-hidden="true" aria-labelledby="sectionModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">

        <div class="modal-content light-bg d-flex align-items-center p-3 animate-on-load animate__fadeIn animate__faster">
            <div class="row tooth-bg my-3">
                <div class="col-md-8 py-2">
                    <div class="h2 text-uppercase text-center animate-on-load animate__fadeInUp">Welcome!</div>
                    <div class="full-name h1 text-uppercase text-center deep-color mb-3 fw-bold animate-on-load animate__fadeIn">
                        Mandy Dental College and Hospital
                    </div>

                    <div class="text-center my-2 h5 animate-on-load animate__zoomIn">Our Services</div>
                    <div class="buttons d-grid gap-2">
                        <a class="btn deep-bg text-white btn-lg p-0 shadow-sm animate-on-load animate__fadeInLeft" id="educationBtn" href="/education">
                            <img src="{{ asset('assets/images/dental-education.png') }}" alt="" srcset="" height="50px">
                            Dental Education
                        </a>
                        <a class="btn pink-bg text-white btn-lg p-0 shadow-sm animate-on-load animate__fadeInRight" id="patientBtn" href="/parient-care">
                            <img src="{{ asset('assets/images/patient-care.png') }}" alt="" srcset="" height="50px">
                            Patient Care
                        </a>
                        <div class="text-center my-2 h5 animate-on-load animate__fadeInDown">Or</div>
                        <a class="btn btn-primary btn-lg p-0 shadow-sm animate-on-load animate__zoomIn" id="loginBtn" href="/login">
                            <img src="{{ asset('assets/images/login.png') }}" alt="" srcset="" height="50px">
                            Log In
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <img src="{{ asset('assets/images/tooth.png') }}" class="w-100" alt="" srcset=""> -->
                </div>
            </div>

        </div>
    </div>
</div>



<!-- <div class="modal fade" id="sectionModal" aria-hidden="true" aria-labelledby="sectionModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">

        <div class="modal-content login-bg d-flex align-items-center p-3">
            <h1>Welcome</h1>
            <h3>to</h3>
            <h1>Mandy Dental College and Hospital</h1>
            <p>Our Services</p>
            <div class="buttons">
                <div class="btn btn-dark btn-lg" id="educationBtn">Dental Education</div>
                <div class="btn btn-dark btn-lg" id="entertainmentBtn" onclick="handleSelection('entertainment')">Patient Care</div>
            </div>
        </div>
    </div>
</div> -->