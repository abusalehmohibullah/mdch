@extends('admin/layout')

@section('content')

    <form action="" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Album</button>
    </form>
@endsection
