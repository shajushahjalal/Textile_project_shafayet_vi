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

  <!--All Css Here-->
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/bootstrap.min.css')}}">  <!-- bootstrap min 4.3.1 -->
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/fontawesome-all.min.css')}}">     <!--Font-Awesome Css-->
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/animate.css')}}">      <!--Animate Css-->
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/vendor/nav.css')}}"> <!--Nav Css-->  
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/responsive.css')}}">
  @yield('style') 

</head>
<body>