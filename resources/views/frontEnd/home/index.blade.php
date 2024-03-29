@extends('frontEnd.masterPage')
@section('title')
<title>{{$system->titleName}}</title>
@stop
@section('seo')
    @if(isset($seo->seo))
        {!! $seo->seo !!}
    @endif
@endsection
@section('mainPart')

<!-- Hero banner -->
{{-- <div class="hero-banner hero-banner-bg-4">
    <div class="hero-banner-inside">
        <video autoplay muted loop id="myVideo" style="opacity:.5;">
            <source src="{{asset(isset($sliderVideo->video)?$sliderVideo->video:'')}}" type="video/mp4">
        </video>
        <h4 class="banner-title "> TRENDLINK BD LTD</h4>	
    </div>
</div> --}}
 
<!-- Image Slider --> 
@php $i=$j=0; @endphp
<div class="container-fluid px-0">
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $slider)
                    @if($i == 0 )
                        <li data-target="#carouselExampleCaptions" data-slide-to="{{$i++}}" class="active"></li>
                    @else
                        <li data-target="#carouselExampleCaptions" data-slide-to="{{$i++}}"></li>
                    @endif
                @endforeach	
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $slider)
                    @if($j == 0 )
                    <div class="carousel-item active">
                        <img src="{{asset($slider->image)}}" class="d-block w-100" style="max-height:500px;" alt="Slider Image">
                        <div class="carousel-caption d-none d-sm-block">
                            <p>{{$slider->text}}</p>
                        </div>
                    </div>                                
                    @else
                    <div class="carousel-item">
                        <img src="{{asset($slider->image)}}" class="d-block w-100" style="max-height:500px;" alt="Slider Image">
                        <div class="carousel-caption d-none d-sm-block">
                            <p>{{$slider->text}}</p>
                        </div>
                    </div>                               
                    @endif
                    @php $j++; @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div> 
        
 <!-- feature section start -->
 <div class="feature-section mt-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme owl-loaded">                    
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            @foreach($feature_products as $feature)
                                <div class="owl-item">
                                    <div style="padding:10px;">
                                        <div class="feature-item_content ">
                                            <img src="{{asset($feature->image)}}" class=" img-fluid" style="height:250px;">
                                            <h4 class="feature-title">{{$feature->heading}}</h4>
                                            <div class="feature-content">
                                                <p>{{$feature->text}}</p>
                                                <br>
                                                @if(!empty($feature->link))
                                                <a href="{{url($feature->link)}}">{{$feature->buttonText}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- feature section end -->
<!-- prodact category  section start -->
<div class="category-section" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title  ">
                    <h3 class=" text-black">PRODUCTS  </h3>
                    <p class="text-center text-black"> </p>
                </div>  
            </div>
        </div> <!-- end row -->
        <div class="row product-display-gird mb-40">
            @foreach($products as $product)
            <div class="mt-5 col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 ">
                <div class="product-show text-center">
                    <div>
                        <a href="{{url('view/product/'.$product->id.'/'.$product->productName)}}">
                            <center>
                                <img src="{{asset($product->image)}}" class=" img-fluid">
                            </center>
                        </a>
                    </div>
                    {{-- <div class="text-center product-overlap-icons">
                        <a href="#"> <i class="far fa-heart fa-lg"></i> </a> &nbsp; | &nbsp; 
                        <a href="{{url('view/product/'.$product->productName)}}" title="view details"> <i class="far fa-eye fa-lg"></i> </a>
                    </div>
                    <div class="text-center mt-10">
                        <a href="{{url('view/product/'.$product->productName)}}">{{$product->productName}} </a>
                    </div> --}}
                </div>                
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-right">
                {{$products->links()}}
            </div>
        </div>
    </div> 
</div>

<!--  prodact category  end -->

{{-- <div class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <div class="section-title mt-120">
                      <h3 class=" pb-60 ">Latest Product</h3>
                  </div>  
                </div>
            </div> <!-- end row -->
            <div class="row">
                        <div class="col-lg-4 text-center">
                            <div class="blog-img">
                                <img src="assets/images/post/1.png" alt="post img">
                            </div> <!-- blog-img end -->
                        <div class="post-content ">
                            <div class="post-content-date">
                                <h3>18</h3>
                                <p>April</p>
                            </div>
                            <div class="post-content-detail ">
                                <h3><a href="#">Give so other can live</a></h3>
                               
                            </div>
                        </div>
                        </div> <!-- col end -->
                        <div class="col-lg-4 text-center">
                            <div class="blog-img">
                                <img src="assets/images/post/2.png" alt="post img">
                            </div> <!-- blog-img end -->
                        <div class="post-content ">
                            <div class="post-content-date">
                                <h3>22</h3>
                                <p>April</p>
                            </div>
                            <div class="post-content-detail ">
                                <h3><a href="#">Lifting Up With Hands Of Help</a></h3>
                               
                            </div>
                        </div>
                        </div> <!-- col end -->
                        <div class="col-lg-4 text-center">
                            <div class="blog-img">
                                <img src="assets/images/post/3.png" alt="post img">
                            </div> <!-- blog-img end -->
                        <div class="post-content ">
                            <div class="post-content-date">
                                <h3>24</h3>
                                <p>April</p>
                            </div>
                            <div class="post-content-detail ">
                                <h3><a href="#">What Have You Given Today?</a></h3>
                               
                            </div>
                        </div>
                        </div> <!-- col end -->
    
                    
            </div><!-- end row -->
        </div> <!-- cont end -->
    
</div> --}}

<!-- we belive section start -->
<div class="donation-section pad-120 bg1 parallax overlay overlay--2">
   
    <div class="container ">
        <div class="row">
            <div class="col-12">
              <div class="section-title  ">
                  <h3 class=" text-white"> We belive </h3>
                  <p class="text-center text-white"> </p>
              </div>  
            </div>
        </div> <!-- end row -->
        <div class="row">
            <div class="col-lg-3">
                <div class="donation-box">
                    <h4>PEOPLE </h4>
                </div>
            </div> <!-- col end -->
            <div class="col-lg-3">
                <div class="donation-box">
                    <h4> PRODUCT </h4>
                </div>
            </div> <!-- col end -->
            <div class="col-lg-3">
                <div class="donation-box">
                    <h4> PERFORMANCE </h4>
                </div>
            </div> <!-- col end -->
            <div class="col-lg-3">
                <div class="donation-box">
                    <h4> Faith </h4>
                </div>
            </div> <!-- col end -->
        </div> <!-- row end -->

    </div> <!-- container end -->

</div>
<!-- we belive section end -->

<!-- goal section start -->
<div class="causes-section pad-30 mb-100" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-12">
              <div class="section-title pad-60">
                  <h3> {{isset($goals->id)?$goals->heading:null}} </h3>
              <p class="text-center">{{isset($goals->id)?$goals->text:null}}</p>
              </div>  
            </div>
        </div> <!-- end row -->
        <div class="row">
            @foreach($goals_content as $item)
            <div class=" col-lg-4">
                <div class="causes-item">
                    <img src="{{asset($item->image)}}" alt="Causes-Img">
                    <div class="causes-item-content position-relative">
                        <div class="progress ">
                        <div class="progress-bar wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.8s"  role="progressbar" style="width: {{$item->persent}}%;" aria-valuenow="{{$item->persent}}" aria-valuemin="0" aria-valuemax="100"  > <span> {{$item->persent}}%</span> </div>
                          </div>
                        <h5 class="causes-item-title"> {{$item->title}} </h5>
                        <p> {{$item->text}} </p>

                    </div>
                </div>
            </div> <!-- col end -->
            @endforeach
        </div> <!-- row end -->
    </div> 
</div>
<!-- goal section end  -->

<!-- care section strat -->

<div class="call-to-action bg3 parallax  overlay overlay--2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="care-pic ">
                    <img class="caring-img" src="{{url('public/frontEnd/care/1.png')}} "  alt="care img">
                </div>
            </div> <!-- col end -->
            <div class="col-lg-6">
                    <div class="care-catgory ">
                        <h5 class="text-white" > Give your share</h5>
                        <h3 class="text-white" >To show you care!</h3>
                        <p class="text-white" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim eveniet fugiat possimus eum tempora, deleniti neque! Est esse, in molestiae velit officiis nulla numquam libero, enim, ipsa non nisi ratione.</p>
                        <a href="{{url('contact-us')}}" class="donate-btn btn">click now</a>
                    </div>
            </div> <!-- col end -->

        </div> <!-- row end -->
    </div> <!-- conataier end -->

</div>
<!-- care section end -->

 <!-- client section start -->  
 <div class="client-section mar-120">
            <div class="container">
                <!-- row end -->
                <div class="row">
                    <div class="js-client owl-carousel client-item">
                        @foreach($brands as $brand)
                        <div class="item">
                            <a href="{{ url($brand->link) }}"><img src="{{ asset($brand->image) }}" alt="brand img" /></a>
                        </div> 
                        @endforeach                       
                    </div>
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
    </div> <!-- client section end -->
@stop
@section('script')
    <script>
        $('.carousel').carousel({
          interval: 3000,
          pause : false
        })
    </script>
@endsection
