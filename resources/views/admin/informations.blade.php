@extends('admin/layout')

@section('setting-active', 'active')
@section('informations-active', 'active')

@php
$breadcrumbs = [
    ['route' => route('admin.dashboard'), 'title' => 'Dashboard'],
    ['route' => route('admin.informations'), 'title' => 'Informations'],
];
@endphp

@section('content')


<div class="table-responsive px-0 pt-3">
    <table class="table" width="100%">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Content</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach($informations as $informationsData)
            <tr class="{{ $informationsData->status == 0 ? 'bg-light' : '' }}">
            <td width="1%">
            {{ $loop->index + 1 }}

                </td>
                <td>
                    <div class="table-data__info">
                    {!! nl2br(e($informationsData->slug)) !!}
                    </div>
                </td>
                <td>
                    <div class="table-data__info">
                    {!! nl2br(e($informationsData->content)) !!}
                    </div>
                </td>
                <td width="1%">
                    <div class="d-flex overview-wrap">

                        <a href="informations/manage/{{$informationsData->id}}" type="button" class="btn btn-info text-white ml-2"><i class="fas fa-pencil"></i></a>


                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection