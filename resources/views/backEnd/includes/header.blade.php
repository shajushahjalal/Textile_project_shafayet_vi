<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | {{$system->applicationName}}</title>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="author" content="{{$system->applicationName}}">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset($system->favicon)}}" type="image/x-icon">
    <!-- Google font-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <!-- Yazra Datatable-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Required Fremwork -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/components/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
    
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/assets/icon/feather/css/feather.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/assets/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/style.css')}}" media="all">
    
    
</head>
