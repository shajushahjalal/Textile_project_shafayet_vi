
    <!-- preloader -->
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
    <!-- preloader -->

    <!-- main-container -->
    <div class="main-container">
        <!-- header start -->
    
      <!-- Header -->
        <div class="navik-header header-opacity header-shadow">
            <div class="container">

                <!-- Navik header -->
                <div class="navik-header-container">
                    
                    <!--Logo-->
                    <div class="logo" data-mobile-logo="{{ asset($system->logo) }}" data-sticky-logo="{{ asset($system->logo) }}">
                        <a href="{{url('/')}}"> <img class="img-fluid"  src="{{asset($system->logo) }}" alt="Logo"> </a>
                    </div>
                    
                    <!-- Burger menu -->
                    <div class="burger-menu">
                        <div class="line-menu line-half first-line"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu line-half last-line"></div>
                    </div>

                    <!--Navigation menu-->
                    <nav class="navik-menu separate-line submenu-top-border submenu-scale">
                        <ul class="list-unstyled">
                            <li class="current-menu"><a href="{{url('/')}}"> Home </a></li>
                            @foreach($categories as $category)
                                @if($category->haveSubCategory == 1)
                                <li class=""><a href="{{url('view-category/'.$category->categoryName)}}"> {{$category->categoryName}} </a>
                                    <ul class="list-unstyled" >
                                    @foreach($category->subCategory as $subCategory)
                                    <li><a href="{{url('view-category/'.$category->categoryName.'/'.$subCategory->subCategoryName)}}"> {{$subCategory->subCategoryName}} </a></li>
                                    @endforeach
                                    </ul>
                                </li>
                                @else
                                    <li><a href="{{url('view-category/'.$category->categoryName)}}"> {{$category->categoryName}} </a></li>
                                @endif   
                            @endforeach
                            <li><a href="{{url('gallery')}}"> Gallery </a></li>                            
                            <li><a href="{{url('about-us')}}" >About Us</a></li>
                            <li><a href="{{url('our-clients')}}">Clients</a></li>
                            <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                        </ul>
                    </nav>

                </div>

            </div>
        </div>