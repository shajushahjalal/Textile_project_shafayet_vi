@extends('frontEnd.masterPage')
@section('title')
    @if(isset($product) && !empty($product->pageTitle) )
    <title> {{ $product->pageTitle }} </title>
    @else
        <title> {{ $title }} || {{$system->titleName}} </title>
    @endif
@stop
@section('seo')
    @if(isset($seo_data) && !empty($seo_data->metaTag) )
        <meta name="keywords" content="{{$seo_data->metaTag}}" >
        <meta name="description" content="{{$seo_data->metaDescription}}" >
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
                    <h1 class="h2">What We Do</h1> 
                    <!--== Page Title Area End ==-->
                    <nav class="text-center">
                        <ol class="breadcrumb" style="display: inline-flex;">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{isset($seo_data->categoryName)?$seo_data->categoryName:$seo_data->subCategoryName}} </li>
                        </ol>
                    </nav>                  
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Section -->
<section class="mb-30">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="row">
                    <div class="col-md-8 col-lg-9">
                        <div class="row">
                            <div class="col-12 mt-3 mb-3 text-black">
                                <span class="grid-show btn btn-default"><i class="fas fa-th-large"></i></span>
                                <span class="list-show btn btn-default"><i class="fas fa-list"></i></span>
                                <hr>
                            </div>
                        </div>
                        <div class="row product-display-gird">
                            @foreach($products as $product)
                            <div class="mt-2 col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="product-show text-center">
                                    <a href="{{url('view/product/'.$product->id.'/'.$product->productName)}}">
                                        <img src="{{asset($product->image)}}" class=" img-fluid">
                                    </a>
                                </div>
                                {{-- <div class="text-center product-overlap-icons">
                                    <a href="#"> <i class="far fa-heart fa-lg"></i> </a> &nbsp; | &nbsp; 
                                    <a href="{{url('view/product/'.$product->productName)}}" title="view details"> <i class="far fa-eye fa-lg"></i> </a>
                                </div>
                                <div class="text-center">
                                    <a href="{{url('view/product/'.$product->productName)}}">{{$product->productName}} </a>
                                </div> --}}
                            </div>
                            @endforeach
                        </div>
                        <div class="row product-display-list d-none">
                            <div class="mt-2 col-12">
                                <div class="row">
                                    @foreach($products as $product)                                
                                    <div class="col-6 mt-2">
                                        <a href="{{url('view/product/'.$product->id.'/'.$product->productName)}}">
                                            <img src="{{asset($product->image)}}" class=" img-fluid">
                                        </a>
                                    </div>                                
                                    @endforeach
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Bar -->
                    <div class="col-md-4 col-lg-3">
                        <div class="row">
                            <div class="col-12 mt-4 mb-4 text-black">
                                <h4 class=" text-uppercase">Category</h4>
                                <hr/>
                            </div>
                            <div class="col-12 text-black">
                                <nav class="nav flex-column">  
                                    @foreach($categories as $category)
                                        @if($category->haveSubCategory == 1)
                                        @foreach($category->subCategory as $subCategory)
                                        <a class="nav-link" href="{{url('view-category/'.$category->categoryName.'/'.$subCategory->subCategoryName)}}"> {{$subCategory->subCategoryName}} </a>
                                        @endforeach
                                        @else
                                        <a class="nav-link" href="{{url('view-category/'.$category->categoryName)}}"">{{$category->categoryName}}</a>
                                        @endif
                                    @endforeach
                                </nav>                                
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-12 mt-4 mb-4 text-black">
                                <h4 class=" text-uppercase">Recent Uploaded</h4>
                                <hr/>
                            </div>
                        </div>
                        <div class="col-12 text-black">
                            @foreach($recentProducts as $product)
                            <div class="row mt-2">                                
                                <div class="col-4">
                                    <a href="{{url('view/product/'.$product->id.'/'.$product->productName)}}"><img src="{{asset($product->image)}}" class=" img-fluid"></a>
                                </div>
                                <div class="col-8">
                                    <a href="{{url('view/product/'.$product->id.'/'.$product->productName)}}" >{{$product->productName}}</a>
                                </div>                               
                            </div>
                            @endforeach                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
@section('script')
<script>
    $(function(){
        $('.list-show').on('click',function(){
            $('.product-display-gird').addClass('d-none');
            $('.product-display-list').removeClass('d-none');
        });
        $('.grid-show').on('click',function(){
            $('.product-display-gird').removeClass('d-none');
            $('.product-display-list').addClass('d-none');
        });
    });
    </script>
@endsection