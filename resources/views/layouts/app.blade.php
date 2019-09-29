<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if( file_exists('config/setup.php') )
        Login | {{$system->applicationName}}
        @else
        Application || Install
        @endif
    </title>
    

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app"> 
         @yield('content')
    </div>
    <script src="{{asset('public/frontEnd/js/vendor/sweetalert2.all.min.js')}}"></script> 

    @if(Session::has('success'))
    <script>
        Swal.fire({
            type: 'success',
            title: 'successfully',
            text: '{{Session::get("success")}}'
        });
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: '{{Session::get("error")}}'
        });
    </script>
    @endif
</body>
</html>
