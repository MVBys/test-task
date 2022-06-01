@extends('index')

@section('content')
    <h1>Substances</h1>
    @foreach ($substances as $substance)
        {{ $substance->id }} -
        {{ $substance->title }} <br />
        <hr>
    @endforeach

    {{ $substances->links('vendor.pagination.tailwind') }}
@endsection
