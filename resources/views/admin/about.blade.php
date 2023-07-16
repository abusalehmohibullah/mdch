@extends('admin/layout')

@section('content')

    <div class="row g-0 mb-5">
        <div class="col-md-7">
            <div class="card-body p-0">
                <h3 class="card-title">About</h3>
                <p class="card-text">Our esteemed faculty comprises accomplished educators and experienced dental professionals who are passionate about sharing their knowledge and expertise. They foster a culture of innovation and critical thinking, challenging our students to explore new horizons in dental science and patient care. By integrating the latest advancements in dentistry into our teaching methodologies, we ensure that our graduates are equipped with the skills and knowledge necessary to thrive in an ever-evolving healthcare landscape.

                    One of the hallmarks of our institution is our state-of-the-art dental clinic, where our students gain invaluable practical experience under the supervision of faculty and staff. This real-world exposure enables them to apply their theoretical knowledge to diagnose, treat, and prevent various oral health conditions. We prioritize patient-centered care, ensuring that each individual receives personalized treatment while maintaining the highest standards of professionalism, ethics, and safety.</p>
            </div>
        </div>

        <div class="col-md-5">
            <img src="{{ asset('assets/images/teeth.png') }}" class="img-fluid" alt="...">
        </div>

    </div>

    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="file-input" class=" form-control-label">File input</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="file" id="file-input" name="file-input" class="form-control-file">
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="textarea-input" class=" form-control-label">Textarea</label>
            </div>
            <div class="col-12 col-md-9">
                <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
            </div>
        </div>
<div class="d-flex justify-content-end">

    <button type="button" class="btn btn-success ms-auto">Submit</button>
</div>

    </form>






@endsection