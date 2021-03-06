<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>乐购后台</title>
        <link rel="stylesheet" href="{{ URL::asset('static/css/pintuer.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('static/css/admin.css') }}">
        <script src="{{ URL::asset('static/js/jquery.js') }}"></script>
        <script src="{{ URL::asset('static/js/pintuer.js') }}"></script>
       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/admin.css') }}"> --}}
    </head>
    <body>
        @yield('content')
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/admin.js') }}"></script> --}}
    </body>
</html>
