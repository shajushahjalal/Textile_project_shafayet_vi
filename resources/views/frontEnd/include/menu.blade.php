<div class="preloader">
    <div class="loader">
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--text"></div>
    </div>
</div>
        <!-- preloader end -->
<!-- main-container -->
<div class="main-container">     
    <!-- header top start -->
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <div class="header-top">
                    @foreach($socialIcon as $icon)                        
                        <a href="{{$icon->link}}" target="_blank" class="text-white mr-3"> <i class="{{$icon->icon}}"></i> </a>                       
                    @endforeach
                    <div class="d-lg-none">
                        <a href="{{url('/my-account')}}" class="text-white mr-3 font-12 "> <i class="fas fa-user"></i> My Account </a>
                        <a href="{{url('cart/view')}}" class="text-white mr-3 font-12">  <i class="fas fa-cart-plus"></i> Cart  </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->        

    <!-- Navigation -->
    <div class="navik-header header-shadow">
        <div class="container-fluid bg-black">
            <div class="row">
                <!-- First Column  || logo and mobile toggle part -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                    <div class="row">
                        <div class="col-2 d-none-lg d-none-xl">
                            <!-- Burger menu -->
                            <div class="burger-menu text-center">                
                                <div class="line-menu line-half first-line"></div>
                                <div class="line-menu"></div>
                                <div class="line-menu line-half last-line"></div>                    
                            </div>
                        </div>
                        <div class="col-10 col-lg-12 text-left">
                            <div class="nav-logo">
                                <a href="{{url('/')}}"><img class="img-fluid" src="{{asset($system->logo)}}" alt="Logo"></a>
                            </div>
                        </div>                                    
                    </div>                        
                </div>

                <!-- Second Column  || Search Part -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 xs-search-bar">
                    {!! Form::open(['url'=>'search','class'=>'search','method' => 'GET']) !!}
                        <div class="input-group">                            
                            <input type="text" class="form-control" name="search" placeholder="Search For Products, Brand & More" required style="height:38px;" >
                            <div class="input-group-prepend">
                                <button type="submit" class="search-submit input-group-text" style="height:38px;">  <i class=" fa-2x fas fa-search"></i> </button>               
                            </div>
                        </div>                        
                    {!! Form::close() !!}                   
                </div>

                <!-- Third Column  || Mobile No , Account and cart part -->
                <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                    <div class="contact-header ">
                        <div class="row">
                            <div class="col-7">
                                <div class="flex mt-2 ml-3">
                                    <div><img src="{{asset('public/frontEnd/img/red-phone-icon-png-25.jpg')}}" class="img-fluid" ></div>
                                    <div class="text-white ">
                                        <p> {{$system->phoneNo}} </p>
                                        <small> Call 9 AM To 5 PM </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mt-2 ml-3"> 
                                    <div><a href="{{url('/my-account')}}" class="text-white font-13 "> <i class="fas fa-user"></i> My Account </a></div>
                                    @php
                                        $cart_qty = Session::has('cart')?Session::get('cart')->total_qty:0
                                    @endphp
                                    <div> <a href="{{url('cart/view')}}" class="text-white font-13 ">  <i class="fas fa-cart-plus"></i> Cart ({{ $cart_qty }})  </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navik header -->
        <div class="container-fluid mobile-menu" style="width:98%">
            <div class="row">
            <div class="navik-header-container ">                
                <!--Navigation menu-->                
                <nav class="navik-menu submenu-top-border submenu-scale">
                	<ul class="list-unstyled">
                        <li class="current-menu hidden visible-lg"><a href="#"> <i class="fas fa-list-alt"></i> Category</a>
                        	<ul  class="list-unstyled"> 
                                @php $position = 30; @endphp
                                @foreach($categories as $category)
                                    @if($category->haveSubCategory == 1 )
                                        <li><a class="category-list" href="{{url('view-category/'.$category->categoryName)}}">{{$category->categoryName}}</a>
                                            <ul  class="list-unstyled " style=" background-color: rgba(245, 245, 245, 0.98); width: 400%; top: -{{$position}}px;" >
                                                <div class="row">
                                                    <div class="col-md-8"> 
                                                        @php 
                                                            $subCategories = $category->subCategory;
                                                            $total = empty(count($subCategories))?0:count($subCategories);
                                                            $extra = $total % 3;
                                                            $loop = $total / 3;
                                                        @endphp
                                                        <div class="row">
                                                        @foreach($subCategories as $subcat)
                                                            @if($subcat->is_delete  != 1 )                                                            
                                                                <div class="col-md-4">
                                                                    <li><a href="{{url('view-category/'.$category->categoryName.'/'.$subcat->subCategoryName)}}"> {{$subcat->subCategoryName}}</a></li>                                                             
                                                                </div>                                               
                                                            @endif
                                                        @endforeach 
                                                        </div>                                                  
                                                    </div>                                                    
                                                    <div class="col-md-4">
                                                        <img src="{{file_exists($category->categoryImage)?$category->categoryImage:'https://placehold.it/200x200'}}" class="img-fluid" style="height: 200px; width:200px;">
                                                    </div>
                                                </div>
                                            </ul>
                                        </li>
                                    @php $position += 33; @endphp
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @foreach($categories as $category)
                            @if($category->haveSubCategory ==0 )
                            <li><a href="{{url('view-category/'.$category->categoryName)}}"> {{$category->categoryName}} </a></li>
                            @else
                            @php 
                                $subCategories = $category->subCategory;
                            @endphp
                            <li class="submenu-left"><a href="{{url('view-category/'.$category->categoryName)}}">{{$category->categoryName}}</a>
                                <ul  class="list-unstyled" >
                                    @foreach($subCategories as $subcat)
                                        @if($subcat->categoryId == $category->id)
                                        <li><a href="{{url('view-category/'.$category->categoryName.'/'.$subcat->subCategoryName)}}"> {{$subcat->subCategoryName}} </a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div>