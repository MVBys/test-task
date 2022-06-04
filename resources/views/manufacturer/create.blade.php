@extends('index')

@section('content')
    <h1>manufacturer
        @if (isset($manufacturer))
            update
        @else
            create
        @endif
    </h1>

    <form method="POST" action="{{ isset($manufacturer) ? route('manufacturer.update', $manufacturer->id) : route('manufacturer.store') }}">
        @csrf
        @isset($manufacturer)
            @method('PATCH')
        @endisset

        <h3>Title manufacturer</h3>
        <input type="text" name="title" value="{{ isset($manufacturer) ? $manufacturer->title : old('title') }}">
        <h3>Link manufacturer</h3>
        <input type="text" name="link" value="{{ isset($manufacturer) ? $manufacturer->link : old('link') }}">

        <x-button class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 w-1/6">update</x-button>
        {{-- <button type="submit">ok</button> --}}
    </form>
    <br>
    <hr>
@endsection
