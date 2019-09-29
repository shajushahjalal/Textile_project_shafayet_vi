<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    @yield('seo')
    <link rel="shortcut icon" href="{{isset($system->favicon)?asset($system->favicon):''}}">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/bootstrap.min.css')}}" />
    <!-- Font-Awesome Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/fontawesome-all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/nav.css')}}">
    <!-- Owl-Carousel Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/owl.carousel.min.css')}}" />
    <!-- Owl-Carousel Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/swiper.css')}}" />
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/animate.css')}}" />
    <!-- magnific-popup Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/magnific-popup.css')}}" />
    <!-- Jquery Ui Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/jquery-ui.min.css')}}" />
    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css')}}" />
    <!-- Responsive Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/responsive.css')}}" />
    @yield('style') 

</head>
<body>