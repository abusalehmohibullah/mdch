@extends('layout')

@section('page-title', 'Career')
@section('career-active', 'active')

@section('content')

<div class="container my-3">


<x-back-btn-component title="Career" />

<div class="table-responsive px-3 bg-white mt-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Content</td>
                <td>Published</td>
                <td>Deadline</td>
                <td>Attachment</td>
            </tr>
        </thead>
        <tbody>
        @if($career->isEmpty())
            <tr>
                <td colspan="5" class="text-center">No data found.</td>
            </tr>
            @else
            @foreach ($career as $careerData)
            <tr class="{{ $careerData->status == 0 ? 'bg-light' : '' }}">
                <td>
                    {{ $career->firstItem() + $loop->index }}
                </td>
                <td class="position-relative">
                <a href="{{ route('career.preview', $careerData->slug) }}" class="text-decoration-none text-dark stretched-link">{{$careerData->heading}}</a>
                </td>
                <td width="1%">
                        <div class="text-nowrap">{{ \Carbon\Carbon::parse($careerData->published_at)->format('d F, Y') }}<div>
                </td>
                <td width="1%">
                        <div class="text-nowrap">{{ \Carbon\Carbon::parse($careerData->deadline)->format('d F, Y') }}<div>
                </td>
                <td width="1%">
                    <div class="table-data__info d-flex justify-content-center align-items-center">
                        @if ($careerData->attachment)
                        <a href="{{ asset('storage/' . $careerData->attachment) }}" target="_blank"><i class="fa-solid fa-eye fa-lg p-2 text-dark"></i></a>
                        <a href="{{ route('career.download', $careerData->id) }}"><i class="fa-solid fa-download fa-lg p-2 text-dark"></i></a>
                        @else
                        -
                        @endif
                    </div>

                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<hr class="mt-0">
<div class="d-flex justify-content-between overview-wrap">
    <form action="{{ route('career.all') }}" method="GET">
        <label for="perPage">Show Per Page:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request()->input('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request()->input('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="100" {{ request()->input('perPage') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>

    <div class="d-flex overview-wrap pagination-info mb-2">
        <div>
            Showing {{ $career->firstItem() }} - {{ $career->lastItem() }} of {{ $career->total() }}
        </div>

        <div class="ml-2 ms-2">
            {{$career->links('pagination::bootstrap-4')}}

        </div>
    </div>

</div>
    
</div>

@endsection