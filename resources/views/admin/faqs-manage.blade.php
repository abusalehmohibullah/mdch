@extends('admin/layout')

@section('contents-active', 'active')
@section('faqs-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.faqs'), 'title' => 'FAQs'],
    ['route' => route('admin.faqs'), 'title' => $faqsData->id ? 'Edit' : 'Add'],
];
@endphp

@section('content')

<x-back-btn-component title="{{ $faqsData->id ? 'EDIT' : 'ADD' }} FAQS"/>



<form action="{{ route('admin.faqs.process', $faqsData->id) }}" method="POST" class="form-horizontal">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="question" class=" form-control-label">Question<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
        <div class="text-danger">
            @error('question')
            {{$message}}
            @enderror
        </div>
            <input type="text" class="form-control" id="question" name="question" placeholder="Type a frequently asked question..." value="{{ old('question') ? old('question') : $faqsData->question }}">
        </div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="answer" class=" form-control-label">Answer<span class="text-danger ml-1">*</span></label>
        </div>
        <div class="col-12 col-md-9">
        <div class="text-danger">
            @error('answer')
            {{$message}}
            @enderror
        </div>
            <textarea name="answer" id="answer" rows="9" placeholder="Answer of that question..." class="form-control">{{ old('answer') ? old('answer') : $faqsData->answer }}</textarea>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-info ms-auto">Submit</button>
    </div>

</form>



@endsection