@extends('layout')

@section('page-title', 'Notices')
@section('notice-active', 'active')

@section('content')

<div class="container my-3">


<x-back-btn-component title="MDC News" />

<div class="table-responsive px-3 bg-white mt-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Content</td>
                <td>Published</td>
                <td>Attachment</td>
            </tr>
        </thead>
        <tbody>
        @if($news->isEmpty())
            <tr>
                <td colspan="4" class="text-center">No data found.</td>
            </tr>
            @else
            @foreach ($news as $newsData)
            <tr class="{{ $newsData->status == 0 ? 'bg-light' : '' }}">
                <td>
                    {{ $news->firstItem() + $loop->index }}
                </td>
                <td class="position-relative">
                <a href="{{ route('news.preview', $newsData->slug) }}" class="text-decoration-none text-dark stretched-link">{{$newsData->heading}}</a>
                </td>
                <td width="1%">
                        <div class="text-nowrap">{{ \Carbon\Carbon::parse($newsData->published_at)->format('d F, Y') }}<div>
                </td>
                <td width="1%">
                    <div class="table-data__info d-flex justify-content-center align-items-center">
                        @if ($newsData->attachment)
                        <a href="{{ asset('storage/' . $newsData->attachment) }}" target="_blank"><i class="fa-solid fa-eye fa-lg p-2 text-dark"></i></a>
                        <a href="{{ route('news.download', $newsData->id) }}"><i class="fa-solid fa-download fa-lg p-2 text-dark"></i></a>
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
    <form action="{{ route('news.all') }}" method="GET">
        <label for="perPage">Show Per Page:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request()->input('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request()->input('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="100" {{ request()->input('perPage') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>

    <div class="d-flex overview-wrap pagination-info mb-2">
        <div>
            Showing {{ $news->firstItem() }} - {{ $news->lastItem() }} of {{ $news->total() }}
        </div>

        <div class="ml-2 ms-2">
            {{$news->links('pagination::bootstrap-4')}}

        </div>
    </div>

</div>
    
</div>

@endsection