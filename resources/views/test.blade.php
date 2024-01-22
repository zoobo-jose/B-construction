<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
       <style>
        img{
            width:500px;
        }
       </style>
    </head>
    <body class="antialiased" >
       <div>
            <a href="{{ route('home') }}">App</a>
            @if(isset($url_file))
                <a href="{{$url_file}}"> file </a>
            @endif
       </div>
       <p>ma page de test</p>
       <form class="register-form" method="POST" action="{{ route('test.post') }}" enctype="multipart/form-data">
        <h4> mes testes</h4>
        @csrf
        <input class="form-control" type="file" 
        id="file" name="file" required autofocus>
        <button>
            confirm
        </button>
        </form>
        @if(isset($url_file))
        url= {{$url_file}}
        <img src="{{asset($url_file)}}" alt="">
        @endif
    </body>
</html>
