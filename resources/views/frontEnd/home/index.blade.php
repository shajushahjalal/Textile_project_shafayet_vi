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
<div class="hero-banner hero-banner-bg-4">
    <div class="hero-banner-inside">
        <video autoplay muted loop id="myVideo">
            <source src="{{asset(isset($sliderVideo->video)?$sliderVideo->video:'')}}" type="video/mp4">
        </video>
        <h4 class="banner-title "> TRENDLINK BD LTD</h4>	
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
                                    <div class="feature-item position-relative" style="background:url('{{$feature->image}}')">
                                        <div class="feature-item_content ">
                                            <h4 class="feature-title">{{$feature->heading}}</h4>
                                            <div class="feature-content">
                                                <p>{{$feature->text}}</p>
                                                <br>
                                                <a href="{{url($feature->link)}}">{{$feature->buttonText}}</a>
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
                <div class="product-show">
                    <div>
                        <a href="{{url('view/product/'.$product->productName)}}">
                            <img src="{{asset($product->image)}}" class=" img-fluid">
                        </a>
                    </div>
                    <div class="text-center product-overlap-icons">
                        <a href="#"> <i class="far fa-heart fa-lg"></i> </a> &nbsp; | &nbsp; 
                        <a href="{{url('view/product/'.$product->productName)}}" title="view details"> <i class="far fa-eye fa-lg"></i> </a>
                    </div>
                    <div class="text-center mt-10">
                        <a href="{{url('view/product/'.$product->productName)}}">{{$product->productName}} </a>
                    </div>
                </div>                
            </div>
            @endforeach
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
                  <h3 class="" > our Goal </h3>
                  <p class="text-center">  Meliore electram sapientem sit eu, eam ex vero laudem ornatus. Nec an <br> adipisci nominati consetetur,</p>
              </div>  
            </div>
        </div> <!-- end row -->
        <div class="row">
            <div class=" col-lg-4">
                <div class="causes-item">
                    <img src="assets/images/causes/1.png" alt="Causes-Img">
                    <div class="causes-item-content position-relative">
                        <div class="progress ">
                            <div class="progress-bar wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.8s"  role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"  > <span> 65%</span> </div>
                          </div>
                        <h5 class="causes-item-title"> Goal Name  </h5>
                        <p> Lorem ipsum dolor sit amet consectetur adipisi </p>

                    </div>
                </div>
            </div> <!-- col end -->
            <div class=" col-lg-4">
                <div class="causes-item">
                    <img src="assets/images/causes/2.png" alt="Causes-Img">
                    <div class="causes-item-content position-relative">
                        <div class="progress ">
                            <div class="progress-bar wow fadeInLeftBig " data-wow-duration="1s" data-wow-delay="0.8s" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"> <span> 75%</span> </div>
                          </div>
                        <h5 class="causes-item-title">Goal Name </h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisi </p>

                    </div>
                </div>
            </div> <!-- col end -->
            <div class=" col-lg-4">
                <div class="causes-item">
                    <img src="assets/images/causes/3.png" alt="Causes-Img">
                    <div class="causes-item-content position-relative">
                        <div class="progress ">
                            <div class="progress-bar wow fadeInLeftBig " data-wow-duration="1s" data-wow-delay="0.8s" role="progressbar" style="width: 68%;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"> <span> 68%</span> </div>
                          </div>
                        <h5 class="causes-item-title"> Goal name </h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisi . </p>

                    </div>
                </div>
            </div> <!-- col end -->
           
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
@endsection
