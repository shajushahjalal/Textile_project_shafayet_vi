<footer> <!-- footer section start -->
    <div class="footer-section pad-30 bg-black">
        <div class="container-fluid" style="width:96%">
            <div class="row mt-2 mb-2">    
                <!-- First Column -->            
                <div class="col-lg-7 col-sm-12">
                    <div class="row footer-box">
                        <div class="col-6 col-sm-4 footer-service">
                            <div class="col-12 text-white mb-2">
                                <div style="border-bottom:1px solid red;">Company</div>
                            </div>
                            <div class="col-12">
                                @foreach($footerMenus as $menu)
                                    @if($menu->show == 1 )
                                    <ul>
                                        <li><a href="{{url('open-footer/'.$menu->id.'/'.$menu->menuName)}}"> {{$menu->menuName}} </a> </li>
                                    </ul>
                                    @endif
                                @endforeach
                            </div>
                        </div> 
                        <div class="col-6 col-sm-4 footer-service">
                            <div class="col-12 text-white mb-2">
                                <div style="border-bottom:1px solid red;">Media</div>
                            </div>
                            <div class="col-12">
                                @foreach($footerMenus as $menu)
                                    @if($menu->show == 2 )
                                    <ul>
                                        <li><a href="{{url('open-footer/'.$menu->id.'/'.$menu->menuName)}}"> {{$menu->menuName}} </a> </li>
                                    </ul>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 footer-service">
                            <div class="col-12 text-white mb-2">
                                <div style="border-bottom:1px solid red;">Customer Help</div>
                            </div>
                            <div class="col-12">
                                @foreach($footerMenus as $menu)
                                    @if($menu->show == 3 )
                                    <ul>
                                        <li><a href="{{url('open-footer/'.$menu->id.'/'.$menu->menuName)}}"> {{$menu->menuName}} </a> </li>
                                    </ul>
                                    @endif
                                @endforeach
                            </div>
                        </div>                        
                    </div>
                </div> <!-- col end -->

                <!-- Second Column --> 
                <div class="col-lg-5 col-sm-12 mt-sm-px-20 mt-md-px-20">
                    <div class="footer-box">
                        <h4 class="footer-title">become a part of the our family </h4>
                        <p>Join the member Club to be the first about our new product releases & Promotions. </p>
                        {!! Form::open(['url' => 'subscribe','method' => 'post','id' => 'ajax-form']) !!}
                             <div class="subscribe_mail ">
                                 <div class="row">
                                     <div class="col-12">
                                        <div class="input-group mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                                            <div class="input-group-append">
                                                <button type="submit" id="submit" class="input-group-text btn-theme">Subscribe</button>
                                            </div>
                                        </div>                                        
                                     </div>
                                 </div>
                             </div>
                        {!! Form::close() !!}
                    </div>  <!-- footer-box end -->
                </div> <!-- col end -->
            </div> <!-- row end -->
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="footer-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-12"> 
                        <div class=" text-center mt-3 mb-2">
                            @foreach($socialIcon as $icon)                        
                            <a href="{{$icon->link}}" target="_blank" class="text-white ml-4"> <i class="{{$icon->icon}}"></i> </a>                       
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 "> 
                        <div class=" text-center mt-3 mb-2">
                            <img class="img-fluid" src="{{asset('public/frontEnd/img/footer/1.png')}}" alt="image not found">
                            <img class="img-fluid" src="{{asset('public/frontEnd/img/footer/2.png')}}" alt="image not found">
                            <img class="img-fluid" src="{{asset('public/frontEnd/img/footer/3.png')}}" alt="image not found">
                            <img class="img-fluid" src="{{asset('public/frontEnd/img/footer/4.png')}}" alt="image not found">
                            <img class="img-fluid" src="{{asset('public/frontEnd/img/footer/5.png')}}" alt="image not found">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-12"> 
                        <div class="text-center mt-3 mb-2 text-white">
                            Copy Right &copy; Rimon. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</footer> 
    <!--All Js Here-->
    <script src="{{asset('public/frontEnd/js/vendor/jquery.min.js')}}"></script>         <!-- jquery latest version -->
    <script src="{{asset('public/frontEnd/js/vendor/nav.js')}}" ></script>
    <script src="{{asset('public/frontEnd/js/vendor/owl.carousel.min.js')}}" ></script>
    <script src="{{asset('public/frontEnd/js/vendor/popper.min.js')}}" ></script>    <!--Popper Js-->
    <script src="{{asset('public/frontEnd/js/vendor/bootstrap.min.js')}}"></script>  <!-- bootstrap min js  4.3.1 -->        
    <script src="{{asset('public/frontEnd/js/main.js')}}" > </script> 
    <script src="{{asset('public/frontEnd/js/vendor/sweetalert2.all.min.js')}}"></script> 
    @yield('script')

    @if(Session::has('error')) 
    <script>
        $(function(){
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: '{{Session::get("error")}}'
            });
        });        
    </script>
    @endif 

    {!! TawkTo::widgetCode() !!} 

    </body>
</html>  