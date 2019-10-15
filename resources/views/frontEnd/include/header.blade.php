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
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/bootstrap.min.css')}}?v=0610" />
    <!-- Font-Awesome Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/fontawesome-all.min.css')}}?v=0610" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/nav.css')}}?v=0610">
    <!-- Owl-Carousel Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/owl.carousel.min.css')}}?v=0610" />
    <!-- Owl-Carousel Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/swiper.css')}}?v=0610" />
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/animate.css')}}?v=0610" />
    <!-- magnific-popup Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/magnific-popup.css')}}?v=0610" />
    <!-- Jquery Ui Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/jquery-ui.min.css')}}?v=0610" />
    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css')}}?v=0610" />
    <!-- Responsive Css -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/responsive.css')}}?v=0610" />
    @yield('style') 

</head>
<body>