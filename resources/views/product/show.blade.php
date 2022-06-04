@extends('index')

@section('content')
    <h3>Substance #{{$product->id}}</h3>
    <h1>{{$product->title}}</h1>
    <h1>{{$product->substance->title}}</h1>
    <h1>{{$product->manufacturer->title}}</h1>
    <h1>{{$product->cost}}</h1>
    <br />
<hr>



@endsection
