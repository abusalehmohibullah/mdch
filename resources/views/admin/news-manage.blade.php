@extends('admin/layout')

@section('content')

<x-back-btn-component title="{{ $id ? 'EDIT' : 'ADD' }} NEWS"/>


<form action="{{ route('news.process', $id) }}" method="POST" class="form-horizontal">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="heading" class=" form-control-label">Heading</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="text-danger">
                @error('heading')
                {{$message}}
                @enderror
            </div>
            <input type="text" class="form-control" id="heading" name="heading" placeholder="Type a frequently asked heading..." value="{{ old('heading') ? old('heading') : $heading }}">
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
            <textarea name="content" id="content" rows="9" placeholder="content of that heading..." class="form-control">{{ old('content') ? old('content') : $content }}</textarea>
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="attachment" class=" form-control-label">Attachment</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="file" id="attachment" name="attachment" class="form-control-file">
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection