<div class="container my-3">
    <x-back-btn-component title="{{$title}}" />

    <div class="clearfix">
        <div class="col-md-6 float-md-end my-3 ms-md-3">
            @if ($slug !== 'local-students' && $slug !== 'international-students')
            <img src="{{ asset('storage/default/' . $slug . '.jpg') }}" class="w-100" alt="...">
            @endif
        </div>


        <div class="py-3">

            <p>{!! nl2br(html_entity_decode($content)) !!}</p>

        </div>
    </div>
</div>