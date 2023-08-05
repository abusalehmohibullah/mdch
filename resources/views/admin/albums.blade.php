@extends('admin/layout')

@section('content')

<x-add-btn-component  title="Albums" route="albums/manage" icon="fas fa-plus" type="Add" />

<div class="row">


    @foreach ($albums as $album)
    <a href="{{ route('media', $album->id) }}" class="col-12 col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2 p-1">
        <div class="mb-2 w-100">
            <div class="d-flex align-items-center position-relative">
                <div class="d-flex justify-content-center position-relative">
                    <div class="card m-2">
                        <img class="w-100" src="{{ asset('assets/images/teeth.png') }}" alt="Card image cap">
                        <div class="card-body p-2">
                            <div class="fs-6 card-title text-dark m-0">{{ $album->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    @endforeach
</div>





@endsection