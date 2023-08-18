<!-- BREADCRUMB-->
<section class="m-t-75">
    <div class="section__content section__content--p30 p-0">

        <nav aria-label="breadcrumb bg-light">
            <ol class="breadcrumb m-0">
                @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['title'] }}</li>
                @else
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['title'] }}</a>
                </li>
                @endif
                @endforeach

            </ol>
        </nav>

    </div>
</section>
<!-- END BREADCRUMB-->