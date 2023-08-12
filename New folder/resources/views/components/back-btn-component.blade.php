<div class="row py-3 mb-5">
    <div class="col-md-12 d-flex">
        <a href="{{ redirect()->back()->getTargetUrl() }}" type="button" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back</a>
        <div class="ml-2 ms-2 overview-wrap">
            <h2 class="title-1 m-0">{!! nl2br(html_entity_decode($title)) !!}</h2>
        </div>
    </div>
</div>