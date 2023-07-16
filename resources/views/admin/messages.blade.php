@extends('admin/layout')

@section('content')

    <div class="row g-0 mb-5">
    <div class="col">
                <div class="shadow-sm bg-white  h-100">
                    <img src="{{ asset('assets/images/cm.png') }}" class="card-img-top" alt="...">
                    <div class="card-body p-3">
                        <h3 class="card-title">Chairman's Message</h3>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore voluptatibus non qui? Alias dolore vel quos unde, incidunt earum iusto quasi aut libero aliquam officia veniam consequatur laborum itaque et! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi obcaecati labore veniam, tempora eum atque rem libero architecto quas. Tempore a placeat minima ab neque officia dicta quaerat hic eligendi.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="shadow-sm bg-white  h-100">
                    <img src="{{ asset('assets/images/cm.png') }}" class="card-img-top" alt="...">
                    <div class="card-body p-3">
                        <h3 class="card-title">Principal's Message</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum suscipit sequi dolor beatae voluptatem voluptatum minima corporis consequatur maxime debitis dolorum, quae officia nesciunt rem nostrum omnis optio minus iure. Lorem ipsum, dolor sit amet consectetur adipisicing elit. In, ratione, quos ipsum ex sequi, voluptatibus fugiat error atque magnam mollitia laudantium quaerat quia adipisci optio odit fuga inventore delectus ab.</p>
                    </div>
                </div>
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