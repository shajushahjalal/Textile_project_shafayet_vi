@extends('frontEnd.masterPage')
@section('title')
    <title>Galary || {{$system->titleName}}</title>
@stop
@section('seo')
@stop
@section('mainPart')
<!--== Page Title Area Start ==-->
<section class="page-title-area overlay overlay--2" style="background: url('{{asset('public/frontEnd/images/bg/bg4.jpg')}}'); background-size:cover; background-position:  center; ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Gallery </h1>
                   
                    <a href="#bottom" class="btn btn-brand smoothScroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--== Page Title Area End ==-->
<nav class="text-center" aria-label="breadcrumb">
    <ol class="breadcrumb   ">
        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gallery </li>
    </ol>
</nav>


<!-- contact  section start -->
<div class="contact-section " id="bottom">
<!-- gallery  start -->
<div class="container " >    
    <div class="row">
        <div class="col-12 mt-4">
        <div class="portfolio_menu justify-content-center">
            <ul>
                <li class="active" data-filter="*">All</li>
                <li data-filter=".web">Woven</li>
                <li data-filter=".seo">Knit</li>
            </ul>
        </div>
        </div>
        <div class="portfolio_item ">
            <div class="row">               
                <div class="col-sm-6 col-md-3 col-xl-4 item web">
                <img class="img-fluid" src="https://placehold.it/150x150">
                </div>
                <div class="col-sm-6 col-md-3 col-xl-4 item seo">
                <img class="img-fluid" src="https://placehold.it/150x150">
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- gallery end -->
</div>

@endsection