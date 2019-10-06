<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header" style="background:#404E67;color:#fff;">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{url('/')}}">
                            <img src="{{asset($system->logo)}}" class=" img-fluid" alt="Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn text-white"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" data-cf-modified-0825fa4f27dc602956ba7c8c-="">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right"> 
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ file_exists(Auth::user()->image)? asset(Auth::user()->image):asset('public/frontEnd/img/dummy_user.jpg') }}" class="img-radius" alt="User-Image">
                                        <span>{{Auth::user()->name}}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="{{url('user/profile')}}"><i class="feather icon-user"></i> Profile</a>
                                        </li>                                        
                                        <li>
                                            <a href="{{url('logout')}}"><i class="feather icon-log-out"></i> Logout</a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Top Navigation End -->
            
            <!-- Left Sidebar start -->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">{{$system->applicationName}}</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <!-- Dashboard -->
                                <li class="">
                                    <a href="{{url('/home')}}">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <!-- Admin Section -->
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-user"></i></span>
                                        <span class="pcoded-mtext" >Admin</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('website/setting')}}"><i class="fas fa-cogs"></i> Website Settings </a>
                                        </li>
                                        <li>
                                            <a href="{{url('user/manage')}}"><i class="fas fa-user-cog"></i> Manage Users </a>
                                        </li>
                                        <li>
                                            <a href="{{url('user/create')}}"><i class="fas fa-user-plus"></i> Add Users</a>
                                        </li>
                                        <li>
                                            <a href="{{url('user/history')}}"><i class="fas fa-user-tag"></i> User History</a>
                                        </li>
                                    </ul>
                                </li>
                                        
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('manage/seo')}}">
                                        <span class="pcoded-micon"><i class="fas fa-chart-line"></i></span>
                                        <span class="pcoded-mtext">SEO</span>
                                    </a>
                                </li>
                                <!-- Category Section -->
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-bars"></i></span>
                                        <span class="pcoded-mtext" >Category</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('category/show')}}"><i class="fas fa-list-alt"></i> Category </a>
                                        </li>
                                        <li>
                                            <a href="{{url('sub-category/show')}}"><i class="fas fa-list-ul"></i> Sub Category</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Slider -->
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('slider')}}">
                                        <span class="pcoded-micon"><i class="fas fa-stream"></i></span>
                                        <span class="pcoded-mtext">Slider</span>
                                    </a>
                                </li>
                                <!-- Slider -->
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('branding')}}">
                                        <span class="pcoded-micon"><i class="fab fa-bandcamp"></i></span>
                                        <span class="pcoded-mtext">Branding</span>
                                    </a>
                                </li>
                                <!-- Product Section -->
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-box"></i></span>
                                        <span class="pcoded-mtext" >Product</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('product/')}}"><i class="fas fa-list"></i> All Products </a>
                                        </li>
                                        <li>
                                            <a href="{{url('product/product-stock')}}"><i class="fas fa-plus-circle"></i> Add Product Stock</a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Galary -->
                                <!-- Product Section -->
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-star-half-alt"></i></span>
                                        <span class="pcoded-mtext" > Galary</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('galary/menu')}}"><i class="fas fa-list"></i>Galary Menu </a>
                                        </li>
                                        <li>
                                            <a href="{{url('galary/content')}}"><i class="fas fa-plus-circle"></i> Add Galary Content</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <!--Clients -->
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('client/')}}">
                                        <span class="pcoded-micon"><i class="fas fa-users"></i></span>
                                        <span class="pcoded-mtext">Clients</span>
                                    </a>
                                </li>

                                <!-- Goals-->
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('goals/')}}">
                                        <span class="pcoded-micon"><i class="fas fa-star-half-alt"></i></span>
                                        <span class="pcoded-mtext">Goals</span>
                                    </a>
                                </li>
                                
                                <!-- product Review 
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('product/review')}}">
                                        <span class="pcoded-micon"><i class="fas fa-star-half-alt"></i></span>
                                        <span class="pcoded-mtext">Product Review</span>
                                    </a>
                                </li>
                            -->
                               <!-- Feature Product -->
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('/feature-products')}}">
                                        <span class="pcoded-micon"><i class="fas fa-cogs"></i></span>
                                        <span class="pcoded-mtext">Feature Products</span>
                                    </a>
                                </li>
                                <!-- Coupons -->
                                <!--
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fab fa-discourse"></i></span>
                                        <span class="pcoded-mtext" >Coupons</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('coupon/')}}"><i class="fas fa-comments-dollar"></i> Manage Coupon</a>
                                        </li>
                                        <li>
                                            <a href="{{url('coupon/used')}}"><i class="fas fa-atlas"></i> Used Coupon</a>
                                        </li>
                                    </ul>
                                </li>
                            -->
                                <!-- Coupons -->
                                <!--
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-compact-disc"></i></span>
                                        <span class="pcoded-mtext" >Discount Wheel</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('wheel/')}}"><i class="fas fa-cogs"></i> Configure Wheel</a>
                                        </li>
                                        {{-- <li>
                                            <a href="{{url('coupon/used')}}"><i class="fas fa-atlas"></i> Used Coupon</a>
                                        </li> --}}
                                    </ul>
                                </li>
                            -->

                                <!-- Social Media -->
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('/social-media')}}">
                                        <span class="pcoded-micon"><i class="fas fa-users"></i></span>
                                        <span class="pcoded-mtext">Social Media</span>
                                    </a>
                                </li>
                                <!-- Newsletter Section -->                    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-newspaper"></i></span>
                                        <span class="pcoded-mtext" >Newslater</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('newslatter/subscribe')}}"><i class="fas fa-list"></i> Subscribe List</a>
                                        </li>
                                        <li>
                                            <a href="{{url('newslatter/subscribe/send-message')}}"><i class="fas fa-envelope"></i> Send Group Message</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Footer Menu Section -->
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-bars"></i></span>
                                        <span class="pcoded-mtext" >Footer Menu</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('footer-menu/')}}"><i class="fas fa-list-alt"></i> Footer Manu </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Order Section -->  
                                <!--                              
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fab fa-first-order"></i></span>
                                        <span class="pcoded-mtext" >Order</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('order/new')}}"><i class="fas fa-box-open"></i> New Order </a>
                                        </li>
                                        <li>
                                            <a href="{{url('order/shipping')}}"> <i class="fas fa-shipping-fast"></i> On Shipping</a>
                                        </li>
                                        <li>
                                            <a href="{{url('order/delivered')}}"><i class="fas fa-store-alt"></i> Delivered Order</a>
                                        </li>
                                    </ul>
                                </li>
                            -->
                                <!-- Report Section -->
                                <!--
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-chart-line"></i></span>
                                        <span class="pcoded-mtext" >Report</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{url('report/stock')}}"><i class="fas fa-layer-group"></i> Stock Report </a>
                                        </li> 
                                        <li>
                                            <a href="{{url('report/sale')}}"><i class="far fa-chart-bar"></i> Sale Report </a>
                                        </li>                                       
                                    </ul>
                                </li>
                                -->
                            </ul>                            
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                    