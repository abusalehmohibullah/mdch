<div class="container my-3">
    <x-back-btn-component title="{{$title}}" />

    <div class="clearfix">
        <div class="col-md-6 float-md-end my-3 ms-md-3">
            @if ($slug !== 'local-students' && $slug !== 'international-students')
            <img src="{{ asset('storage/default/' . $slug . '.jpg') }}" class="w-100" alt="...">
            @endif
            @if ($slug == 'chairmans-message' || $slug == 'principals-message' || $slug == 'directors-message')

            <div class="mini-text text-center fs-4">{{ explode("&#039;", $title)[0] }}</div>
            <div class="mini-text text-center">Mandy Dental College and Hospital</div>
            @endif
        </div>


        <div class="py-3">

            <p>{!! nl2br(html_entity_decode($content)) !!}</p>

        </div>
    </div>
</div>