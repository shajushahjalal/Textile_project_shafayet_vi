@extends('frontEnd.masterPage')
@section('title')
    @if(isset($client->id))
        <title>{{$client->pageTitle}}</title>
    @else
        <title>About US || {{$system->titleName}}</title>
    @endif
@stop

@section('seo')
    {!! isset($seo->id)?$seo->seo:'' !!} 
@stop

@section('mainPart')

    <!--== Page Title Area Start ==-->
    <section class="page-title-area overlay overlay--2" style="padding:20px 0px 0px 0px; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <!--== Page Title Area End ==-->
                        <nav class="text-center" aria-label="breadcrumb">
                            <ol class="breadcrumb" style="display: inline-flex;">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About US</li>
                            </ol>
                        </nav>                 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Our Partner section start -->
<div class="contact-section mb-15 pb-15  " id="bottom">
    <div class="container">             
        <div class="row ">
            <div class="col-lg-9 col-md-7 col-sm-12 pt-1 mt-5 mb-5">
                <div>
                    {!! isset($about->id)?$about->text:null !!}
                </div>
                @if($about->id)
                    <img class="mt-30" src="{{$about->image}}" alt="signatrure">
                @endif 
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 pt-1 mt-5 mb-5 ">
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
    <div class="container pt-10">
        <div class="row">
            <div class=" col-md-12">
                <i class="fas fa-cut fa-2x"></i> 
                <h5> Service</h5>
                <hr/>
                <div class="row">
                    @foreach($services as $service)
                    <div class="grid mt-30 col-sm-6" style=" display: flex">
                        <div style="display: flex;"> 
                        <img src="{{url($service->image)}}" width="50" height="50"> 
                            <div class="ml-2">
                                <h6 class="mb-2">{{$service->heading}} </h6> 
                                <p style="line-height: 30px;" >
                                    {!! $service->text !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <section style="background: #dedede; min-height: 200px; margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="" style="margin-top: 60px;">
                        <i class=" d-flex justify-content-center  fas fa-heart fa-3x"> 1320</i>
                        <br> <p class="text-center"> Coustomers</p> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="" style="margin-top: 60px;">
                            <i class=" d-flex justify-content-center  fas fa-users fa-3x"> 15</i>
                            <br> <p class="text-center"> Development</p> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="" style="margin-top: 60px;">
                            <i class=" d-flex justify-content-center  far fa-gem fa-3x"> 12 </i>
                            <br> <p class="text-center"> Experience of year</p> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="" style="margin-top: 60px;">
                            <i class=" d-flex justify-content-center  fas fa-trophy fa-3x"> 15</i>
                            <br> <p class="text-center"> Award</p> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-30">
        <div class="container">
            <div class="owl-carousel owl-theme owl-loaded">                    
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @foreach($managements as $item)
                            <div class="owl-item">
                                <div class="row">
                                    <div class="col-12 col-sm-6 text-center">
                                        <img src="{{$item->image}}" class=" img-fluid text-center" style="max-height:400px;">
                                    </div>
                                    <div class="col-12 col-sm-6 pt-2 pb-2">
                                        <h3 class="pb-4">{{$item->name}}</h3>
                                        {!! $item->text !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-carousel-button">
                    <div class="left">
                        <a href="javascript:," class="btn-left" title="Previous" > <i class="fas fa-chevron-left fa-3x"></i> </a>
                    </div>
                    <div class="right">
                        <a href="javascript:," class="btn-right"  title="Next"  ><i class="fas fa-chevron-right fa-3x"></i> </a>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
</div>
@stop
@section('style')
<style>
    .owl-carousel-button{
        position: absolute;
        top:200px;  
        width:100%;      
    }
    .owl-carousel-button .btn-right{
        position: absolute;        
        right: 0px;
        color:000;
    }
    .owl-carousel-button .btn-left{
        position: absolute;
        left: 0px;
        color:#000;
    }
    .owl-carousel-button .fas{
        color:#000;
    }
</style>
@stop
@section('script')
<script>
    // Feature Product
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:4000,
        responsiveClass:true,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
            }
        }
    });

    $('.owl-carousel-button .btn-left').click(function(){
        $('.owl-prev').click();
    });

    $('.owl-carousel-button .btn-right').click(function(){
        $('.owl-next').click();
    });

</script>
@endsection