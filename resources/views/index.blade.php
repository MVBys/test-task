<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test task</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{asset('css/index.css')}}" rel="stylesheet">

</head>

<body class="antialiased">

    <style>
        .container {
            width: 800px;
            margin: 0 auto;
        }

    </style>
     <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1>
    <div class="nav">
        @php
            $instances = ['substance'];
            $resurces = ['index', 'create', 'show', 'edit'];
            $id = 1;
        @endphp
        @foreach ($instances as $instance)
            @foreach ($resurces as $recurce)
                <a href="{{ route($instance.'.'.$recurce, $id) }}">{{$instance.'.'.$recurce}} </a><br>
            @endforeach
        @endforeach

    </div>

    <div class="container">
        @yield('content')
    </div>


{{-- @include('test') --}}


</body>

</html>
