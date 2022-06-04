@extends('index')

@section('content')
    <h3>manufacturer #{{$manufacturer->id}}</h3>
    <h1>{{$manufacturer->title}}</h1>
    <h1>{{$manufacturer->link}}</h1>
    <br />
<hr>
@endsection
