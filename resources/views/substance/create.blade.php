@extends('index')

@section('content')
    <h1>Substance
        @if (isset($substance))
            update
        @else
            create
        @endif
    </h1>

    <form method="POST" action="{{ isset($substance) ? route('substance.update', $substance->id) : route('substance.store') }}">
        @csrf
        @isset($substance)
            @method('PATCH')
        @endisset

        <h3>Title substance</h3>
        <input type="text" name="title" value="{{ isset($substance) ? $substance->title : "" }}">

        <button type="submit">ok</button>
    </form>
    <hr>
@endsection
