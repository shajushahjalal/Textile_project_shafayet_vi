@extends('frontEnd.masterPage')
@section('title')
    @if(isset($client->id))
        <title>{{$client->pageTitle}}</title>
    @else
        <title>Certification || {{$system->titleName}}</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Certification</li>
                            </ol>
                        </nav>                 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Our Partner section start -->
    <div class="container mt-40 mb-20">
        <div class="row">
            <div class="col-12">
                <h5 class="text-uppercase">Certification</h5>
                <hr/>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-3">
                <img src="{{asset('storage/uploads/certificate/pic1.png')}}" class=" img-fluid">
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-3">
                <img src="{{asset('storage/uploads/certificate/pic2.png')}}" class=" img-fluid">
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-3">
                <img src="{{asset('storage/uploads/certificate/pic3.png')}}" class=" img-fluid">
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-3">
                <img src="{{asset('storage/uploads/certificate/pic4.png')}}" class=" img-fluid">
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-3">
                <img src="{{asset('storage/uploads/certificate/pic5.png')}}" class=" img-fluid">
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-3">
                <img src="{{asset('storage/uploads/certificate/pic6.png')}}" class=" img-fluid">
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-3">
                <img src="{{asset('storage/uploads/certificate/pic7.png')}}" class=" img-fluid">
            </div>
        </div>
    </div>
@endsection