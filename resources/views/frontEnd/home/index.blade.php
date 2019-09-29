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
            <source src="{{asset('public/frontEnd/1.mp4')}}" type="video/mp4">
        </video>
        <h3 class=" banner-title "> TRENDLINK BD LTD</h3>	
    </div>
</div>
        
 <!-- feature section start -->
 <div class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="feature-item position-relative ">
                    <div class="feature-item_content ">
                        <h4 class="feature-title">Feature Name</h4>
                        <div class="feature-content">
                            <p>Wy can’t grow. We help communities inpumps.</p>
                            <br>
                            <a class="" href="#">See More</a>
                        </div>
                    </div>
                </div>
            </div> <!-- col end -->
            <div class="col-lg-4">
                <div class="feature-item-2 position-relative ">
                    <div class="feature-item_content ">
                        <h4 class="feature-title">Feature Name </h4>
                        <div class="feature-content ">
                            <p>Without water, help communities install hand pumps.</p>
                            <br>
                            <a class="" href="#">See More</a>
                        </div>
                    </div>
                </div>
            </div> <!-- col end -->
            <div class="col-lg-4">
                <div class="feature-item-3 position-relative ">
                    <div class="feature-item_content ">
                        <h4 class="feature-title">Feature Name</h4>
                        <div class="feature-content ">
                            <p>Without wathelp communities install hand pumps. </p>
                            <br>
                            <a class="" href="#">See More</a>
                        </div>
                    </div>
                </div>
            </div> <!-- col end -->
        </div>
    </div>
</div>
<!-- feature section end -->
<!-- prodact category  section start -->
<div class="category-section pad-120  bg2 parallax overlay overlay--2 ">
    <div class="container">
            <div class="row">
                    <div class="col-12">
                      <div class="section-title  ">
                          <h3 class=" text-black">PRODUCT CATEGORY </h3>
                          <p class="text-center text-black">  Meliore electram sapientem sit eu, eam ex vero laudem ornatus. Nec an <br> adipisci nominati consetetur,</p>
                      </div>  
                    </div>
            </div> <!-- end row -->
    </div>
 
    <!-- Swiper -->
    <div class="swiper-container ">
            <div class="swiper-wrapper">
            
            <div class="swiper-slide">  <a  href="#">  <img src="assets/img/2.jpg" alt="">  </a> <h3> Name  </h3> </div>
            <div class="swiper-slide">  <a  href="#">  <img src="assets/img/1.jpg" alt="">  </a> <h3> Name  </h3> </div>
            <div class="swiper-slide">  <a  href="#">  <img src="assets/img/3.jpg" alt="">  </a> <h3> Name  </h3></div>
            <div class="swiper-slide">  <a  href="#">  <img src="assets/img/4.jpg" alt="">  </a><h3> Name  </h3> </div>
            <div class="swiper-slide">  <a  href="#">  <img src="assets/img/5.jpg" alt="">  </a> <h3> Name  </h3></div>
            <div class="swiper-slide">  <a  href="#">  <img src="assets/img/6.jpg" alt="">  </a><h3> Name  </h3> </div>
            </div>
            
    </div>

</div>

<!--  prodact category  end -->
<!-- last product start -->

<div class="blog-section">
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
    
</div>
    
    
    <!-- last product post End -->




<!-- we belive section start -->
<div class="donation-section pad-120 bg1 parallax overlay overlay--2">
   
    <div class="container ">
        <div class="row">
            <div class="col-12">
              <div class="section-title  ">
                  <h3 class=" text-white"> We belive </h3>
                  <p class="text-center text-white">  Meliore electram sapientem sit eu, eam ex vero laudem ornatus. Nec an <br> adipisci nominati consetetur,</p>
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
<div class="causes-section pad-30 mb-100">
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
                    <img class="caring-img" src="assets/images/care/1.png "  alt="care img">
                </div>
            </div> <!-- col end -->
            <div class="col-lg-6">
                    <div class="care-catgory ">
                       <h5 class="text-white" > Give your share</h5>
                       <h3 class="text-white" >To show you care!</h3>
                       <p class="text-white" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim eveniet fugiat possimus eum tempora, deleniti neque! Est esse, in molestiae velit officiis nulla numquam libero, enim, ipsa non nisi ratione.</p>
                       <a href="#" class="donate-btn btn">click now</a>
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
                        <div class="item">
                            <a href="#"><img src="assets/images/client/1.1.png" alt="brand img" /></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="assets/images/client/2.1.png" alt="brand img" /></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="assets/images/client/3.1.png" alt="brand img" /></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="assets/images/client/4.1.png" alt="brand img" /></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="assets/images/client/5.png" alt="brand img" /></a>
                        </div>
                    </div>
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
    </div> <!-- client section end -->
@endsection
