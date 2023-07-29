@extends('admin/layout')

@section('content')

<x-back-btn-component title="{{ $newsData->id ? 'EDIT' : 'ADD' }} NEWS" />


<form action="{{ route('news.process', $newsData->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="heading" class=" form-control-label">Heading<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('heading')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" id="heading" name="heading" placeholder="Enter a heading of the news..." value="{{ old('heading') ? old('heading') : $newsData->heading }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="content" class=" form-control-label">Content</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('content')
                {{$message}}
                @enderror
            </div>
            <textarea name="content" id="content" rows="9" placeholder="Enter the content of the news..." class="form-control">{{ old('content') ? old('content') : $newsData->content }}</textarea>
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="attachment" class=" form-control-label">Published on<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-3">
            <div class="input-group">
            <div class="text-danger">
                @error('published_at')
                {{$message}}
                @enderror
            </div>
            <input type="date" name="published_at" class="border border-secondary px-2" value="{{ old('published_at') ? old('published_at') : ($newsData->published_at ?? now()->toDateString()) }}">


            </div>
        </div>
        <div class="col col-md-3">
            <label class=" form-control-label">Latest news?<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-3">
            <div class="text-danger">
                @error('latest_news')
                {{$message}}
                @enderror
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="latest_news" id="latestNewsYes" value="1" {{ ($newsData->latest_news === 1 && $newsData->latest_news !== null) ? 'checked' : '' }}>
                <label class="form-check-label" for="latestNewsYes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="latest_news" id="latestNewsNo" value="0" {{ ($newsData->latest_news === 0 && $newsData->latest_news !== null) ? 'checked' : '' }}>
                <label class="form-check-label" for="latestNewsNo">No</label>
            </div>

        </div>

    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="attachment" class=" form-control-label">Attachment</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('attachment')
                {{$message}}
                @enderror
            </div>
            <input type="file" id="attachment" name="attachment" class="form-control-file">
        </div>

    </div>


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection