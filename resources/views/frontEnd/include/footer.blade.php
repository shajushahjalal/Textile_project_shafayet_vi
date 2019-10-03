    <footer> <!-- footer section start -->
        <!-- Subscripe-part -->
        <div class="container-fluid newslater">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6 offset-md-1 offset-lg-2 offset-xl-3">
                    {!! Form::open(['url' => 'subscribe','method' => 'post','id' => 'ajax-form']) !!}
                    <div class="row">
                        <div class="col-3 col-lg-2">
                            <img src="{{asset($system->logo)}}" class="img-fluid" style="max-height:40px;">
                        </div>
                        <div class="col-9 col-lg-10">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control no-radious" placeholder="Enter Your Email" required>
                                <div class="input-group-append">
                                    <button type="submit" id="submit" class="input-group-text no-radious btn-black">Become a Member</button>
                                </div>
                            </div>                                        
                        </div>
                    </div>                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- End-->
        <div class="footer-section pad-120 bg4 parallax overlay overlay--2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-box">
                            <h4 class="footer-title">Company</h4>
                            <div class="footer-box_content mt-40">                            
                                <ul class="footer-contact mt-40">
                                    @foreach($footerMenus as $menu)
                                        @if($menu->show == 1)
                                        <li> <a href="{{url('open-footer/'.$menu->id.'/'.$menu->menuName)}}">{{$menu->menuName}}</a></li>
                                        @endif
                                    @endforeach                                    
                                </ul>
                            </div>
                        </div>  <!-- footer-box end -->
                    </div> <!-- col end -->
                    <div class="col-lg-4">
                        <div class="footer-box">
                            <h4 class="footer-title">Company</h4>
                            <div class="footer-box_content mt-40">                            
                                <ul class="footer-contact mt-40">
                                    @foreach($footerMenus as $menu)
                                        @if($menu->show == 2)
                                        <li> <a href="{{url('open-footer/'.$menu->id.'/'.$menu->menuName)}}">{{$menu->menuName}}</a></li>
                                        @endif
                                    @endforeach                                    
                                </ul>
                            </div>
                        </div>  <!-- footer-box end -->
                    </div> <!-- col  end -->
                    <div class="col-lg-4">
                        <div class="footer-box">
                            <h4 class="footer-title">Company</h4>
                            <div class="footer-box_content mt-40">                            
                                <ul class="footer-contact mt-40">
                                    @foreach($footerMenus as $menu)
                                        @if($menu->show == 3)
                                        <li> <a href="{{url('open-footer/'.$menu->id.'/'.$menu->menuName)}}">{{$menu->menuName}}</a></li>
                                        @endif
                                    @endforeach                                    
                                </ul>
                            </div>
                        </div>  <!-- footer-box end -->
                    </div> <!-- col end -->
                
                </div> <!-- row end -->
            </div>
        </div>

        <!-- Footer Last Part Start -->
        <div class="container-fluid bg-black">
            <div class="row">
                <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2 mt-20 mb-20">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{url('/')}}">
                                <img src="{{$system->logo}}" class=" img-fluid" >
                            </a>
                        </div>                        
                        <div class="col-6 col-md-3 text-center mt-10">
                            <div> <i class="far fa-address-book fa-2x"></i> </div>
                            <h6 class=" text-uppercase mt-2 text-ccc">Address</h6>
                            <div class="font-size-10  text-aaa"> <address>{{$system->address}} , {{$system->city}} - {{$system->zipCode}}, {{$system->country}} </address> </div>
                        </div>
                        <div class="col-6 col-md-3 text-center mt-10">
                            <div> <i class="far fa-envelope fa-2x"></i> </div>
                            <h6 class=" text-uppercase mt-2 text-ccc">Email</h6>
                            <div class="font-size-10  text-aaa">{{$system->email}} </div>
                        </div>
                        <div class="col-6 col-md-3 text-center mt-10">
                            <div> <i class="fas fa-mobile-alt fa-2x"></i> </div>
                            <h6 class=" text-uppercase mt-2 text-ccc">Phone</h6>
                            <div class="font-size-10  text-aaa">{{$system->phoneNo}} </div>
                        </div>
                        <div class="col-6 col-md-3 text-center mt-10">
                            <div> <i class="far fa-clock fa-2x"></i> </div>
                            <h6 class=" text-uppercase mt-2 text-ccc">Working Time</h6>
                            <div class="font-size-10  text-aaa">SUN - THU <br> 09:00 AM - 05:00 PM</div>
                        </div>
                    </div>
                    <!-- social media & copyright -->
                    <div class="row">
                        <div class="col-12">
                            <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #555;"/>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul class="nav footer-icon">
                                @foreach($socialIcons as $icon)
                                <li class="nav-item">
                                    <a class="nav-link text-aaa" href="{{url($icon->link)}}" target="_blank"> <i class="{{$icon->icon}}"></i> </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 text-center text-aaa font-size-10">
                                Copy Right &copy; {{Carbon\Carbon::now()->format('Y')}}. All Rights Reserved. Developed By Shahjalal
                        </div>
                    </div>
                    <!-- social media & copyright End-->
                </div>
            </div>
        </div>

        <!-- Footer Last Part End -->
    </footer> <!-- footer section end -->    
</div>
    <!-- main-container -->

    
    <!-- back to to btn start -->
    <div id="back-to-top"></div>
    <!-- back to to btn end -->

    <!-- jquery latest version -->
    <script src="{{asset('public/frontEnd/js/vendor/jquery-3.3.1.min.js')}}"></script>
     <!-- swiper js  -->
     <script src="{{asset('public/frontEnd/js/vendor/swiper.js')}}"></script>
    <!-- Bootstrap Js -->
    <script src="{{asset('public/frontEnd/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontEnd/js/vendor/nav.js')}}" > </script>
    <!-- Owl-Carousel Js -->
    <script src="{{asset('public/frontEnd/js/vendor/owl.carousel.min.js')}}"></script>
      <!-- isotop Js -->
      <script src="{{asset('public/frontEnd/js/vendor/isotop.js')}}"></script>
    <!-- counter Js -->
    <script src="{{asset('public/frontEnd/js/vendor/jquery.countTo.js')}}"></script>
    <script src="{{asset('public/frontEnd/js/vendor/jquery.appear.js')}}"></script>
    <!-- Jquery Ui Js -->
    <script src="{{asset('public/frontEnd/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <!-- Jquery Ui Js -->
    <script src="{{asset('public/frontEnd/js/vendor/jquery-ui.min.js')}}"></script>
    <!--contact form Js-->
    <script src="{{asset('public/frontEnd/js/vendor/contact.js')}}"></script>
    <script src="{{asset('public/frontEnd/js/vendor/validator.min.js')}}"></script>
    <!-- Wow Js -->
    <script src="{{asset('public/frontEnd/js/vendor/wow.min.js')}}"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf64CyWpOBCEocXjocJL_wZiW82hNtbTA&callback=initMap" async defer></script>
    <!-- template main js file -->
    <script src="{{asset('public/frontEnd/js/main.js')}}"></script>
    @yield('script')
</body>

</html>