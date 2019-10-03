@extends('frontEnd.masterPage')
@section('title')
    @if(isset($product) && !empty($product->pageTitle) )
    <title> {{ $product->pageTitle }} </title>
    @else
        <title> {{$system->titleName}} </title>
    @endif
@stop
@section('seo')
    @if(!empty($product->metaTag) )
        <meta name="keywords" content="{{$product->metaTag}}" >
        <meta name="description" content="{{$product->metaDescription}}" >
    @else
    {!! isset($seo->id)?$seo->seo:'' !!} 
    @endif
@stop
@section('mainPart')
    <!--== Page Title Area Start ==-->
    <section class="page-title-area overlay overlay--2" style="padding:20px 0px 0px 0px; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">Product Information</h1> 
                        <!--== Page Title Area End ==-->
                        <nav class="text-center">
                            <ol class="breadcrumb" style="display: inline-flex;">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->productName}} </li>
                            </ol>
                        </nav>                  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-30 mt-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-2 col-sm-3 col-3">
                            <div class="pro-thum">
                                @if(file_exists($product->image))
                                <div class="column">
                                    <img class="demo cursor img-fluid" src="{{asset($product->image)}}"  onclick="currentSlide(1)" alt="{{$product->productName}}">
                                </div>
                                @endif
                                @if(file_exists($product->image1))
                                <div class="column"> 
                                    <img class="demo cursor img-fluid" src="{{ asset($product->image1) }}" onclick="currentSlide(2)" alt="{{$product->productName}}">
                                </div>
                                @endif
                                @if(file_exists($product->image2))
                                <div class="column">
                                    <img class="demo cursor img-fluid" src="{{asset($product->image2)}}"  onclick="currentSlide(3)" alt="{{$product->productName}}">
                                </div>
                                @endif
                                @if(file_exists($product->image3))
                                <div class="column">
                                    <img class="demo cursor img-fluid" src="{{asset($product->image3)}}" onclick="currentSlide(4)" alt="{{$product->productName}}">
                                </div>
                                @endif
                                @if(file_exists($product->image4))
                                <div class="column">
                                    <img class="demo cursor img-fluid" src="{{asset($product->image4)}}" onclick="currentSlide(5)" alt="{{$product->productName}}">
                                </div> 
                                @endif
                                @if(!empty($product->video))
                                <div class="column video">
                                    <img class="demo cursor img-fluid" src="{{asset('public/frontEnd/img/vdo.png')}}" onclick="playVideo(6)" alt="{{$product->productName}}">                            
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-9 col-9">
                            <div class="pro-view text-center">
                                <!-- Full-width images with number text -->
                                <div class="mySlides">
                                    <a href="{{ asset($product->image) }}" class="thumbnail">
                                        <img src="{{ asset($product->image) }}" class="img-fluid">
                                    </a>
                                </div>
                            
                                <div class="mySlides">
                                    <a href="{{ asset($product->image1) }}" class="thumbnail">
                                        <img src="{{ asset($product->image1) }}" class="img-fluid">
                                    </a>
                                </div>
                            
                                <div class="mySlides">
                                    <a href="{{ asset($product->image2) }}" class="thumbnail">
                                        <img src="{{ asset($product->image2) }}" class="img-fluid">
                                    </a>
                                </div>
                            
                                <div class="mySlides ">
                                    <a href="{{ asset($product->image3) }}" class="thumbnail">
                                        <img src="{{ asset($product->image3) }}" class="img-fluid">
                                    </a>
                                </div>
                            
                                <div class="mySlides ">
                                    <a href="{{ asset($product->image4) }}" class="thumbnail">
                                        <img src="{{ asset($product->image4) }}" class="img-fluid">
                                    </a>
                                </div>
                                <div class="mySlides video">
                                    {!! $product->video !!}
                                </div>                       

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pro-title"> <h5>{{$product->productName}}</h5></div>
                    <div class="mt-2 text-black">
                        <h5> Description</h5><br>
                        {!! $product->description !!}
                    </div>
                </div>                    
            </div>
            <!-- Related Product -->
            <div class="row product-display-gird mt-50">
                <div class="col-12">
                    <h5 class="text-uppercase">Related Products</h5>
                    <hr/>
                </div>
                @foreach($products as $product)
                <div class="mt-2 col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div>
                        <a href="{{url('view/product/'.$product->productName)}}">
                            <img src="{{asset($product->image)}}" class=" img-fluid">
                        </a>
                    </div>
                    <div class="text-center product-overlap-icons">
                        <a href="#"> <i class="far fa-heart fa-lg"></i> </a> &nbsp; | &nbsp; 
                        <a href="{{url('view/product/'.$product->productName)}}" title="view details"> <i class="far fa-eye fa-lg"></i> </a>
                    </div>
                    <div class="text-center">
                        <a href="{{url('view/product/'.$product->productName)}}">{{$product->productName}} </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
@section('script')
    <script src="{{asset('public/frontEnd/js/vendor/jquery.viewbox.min.js')}}"></script>
    <script>
        $(function(){
            
            $('.thumbnail').viewbox();
            $('.thumbnail-2').viewbox({fullscreenButton: true});

            (function(){
                var vb = $('.popup-link').viewbox();
                $('.popup-open-button').click(function(){
                    vb.trigger('viewbox.open');
                });
                $('.close-button').click(function(){
                    vb.trigger('viewbox.close');
                });
            })();
            
        });

        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
            
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }   
    
        function playVideo(n){
            showSlides(slideIndex = n);        
        }        
    </script>
@endsection