@extends('frontEnd.masterPage')
@section('title')
    @if(isset($client->id))
        <title>{{$client->pageTitle}}</title>
    @else
        <title>Our Clients || {{$system->titleName}}</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Clients</li>
                            </ol>
                        </nav>                 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-section mb-15  " id="bottom">
        <div class="container-fluid">                 
            <div class="row pb-15">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-md-8 mt-5">
                            <div class="grid row">
                                @foreach($client_lists as $item)
                                    <div class="col-6 col-sm-4 col-mg-3 col-lg-2">
                                        <img src="{{$item->image}}" class=" img-fluid"> 
                                    </div>
                                @endforeach                                                                 
                            </div>
                        </div>
                        <div class="col-md-4 mt-5">
                            <div class="card position-relative" style=" border: none; ">
                                <i class="fas fa-quote-left fa-3x position-absolute" style=" top:-20px; "></i>
                                <div class="card-body" style=" height: 160px; border: none; ">
                                    {!! isset($client->text)?$client->text:null !!} 
                                </div>                                
                                <i class="fas fa-user fa-5x position-absolute" style="bottom: -10px; right:0;"></i>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>   
    </div>


@endsection