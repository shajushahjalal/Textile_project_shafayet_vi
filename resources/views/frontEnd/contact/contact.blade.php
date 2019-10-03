@extends('frontEnd.masterPage')
@section('title')
    <title>Contact || {{$system->titleName}}</title>
@stop
@section('seo')
@stop
@section('mainPart')
<!--== Page Title Area Start ==-->
<section class="page-title-area overlay overlay--2" style="padding:20px 0px 0px 0px; ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Contact US</h1> 
                    <!--== Page Title Area End ==-->
                    <nav class="text-center" aria-label="breadcrumb">
                        <ol class="breadcrumb" style="display: inline-flex;">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact </li>
                        </ol>
                    </nav>                
                </div>
            </div>
        </div>
    </div>
</section>

<!--== Page Title Area End ==-->


<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12 text-center text-uppercase black-text mt-20 mb-40"><h4>Contact Information</h4></div>
                    <div class="col-12 col-sm-10 col-md-8 offset-sm-1 offset-md-2 black-text">
                        <div class="mt-2"> <span class="fas fa-map-marker-alt fa-lg"></span> {{$system->address}}</div>
                        <div class="mt-2"> <span class="fa fa-location-arrow fa-lg"></span>{{$system->city}} {{$system->zipCode}} {{$system->country}}</div>
                        <div class="mt-2"> <span class="fa fa-envelope fa-lg"></span> <a href="mailto:{{$system->email}}">{{$system->email}}</a> </div>
                        <div class="mt-2"> <span class="fa fa-mobile fa-lg"></span> <a href="tel:{{$system->phoneNo}}">{{$system->phoneNo}}</a></div>
                    </div>
                </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12 text-center text-uppercase black-text mt-20 mb-20"><h4>Get In Touch</h4></div>
                <div class="col-12">
                    {!! Form::open(['route'=>'contact_message_send','class'=> 'form-horizontal','method'=>'post','files'=>true]) !!}
                    <div class="form-group row">
                        <div class="col-12 col-sm-6">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control no-radious" placeholder="Name" required >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control no-radious" placeholder="example@google.com" required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-sm-6">
                            <label>Subject <span class="text-danger">*</span></label>
                            <input type="text" name="subject" class="form-control no-radious" placeholder="Subject" required >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Contact Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control no-radious" placeholder="Your Phone Number" required >
                        </div>                        
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                                <label>Message <span class="text-danger">*</span></label>
                            <textarea name="message" class="form-control no-radious" placeholder="Your Message Here" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary text-uppercase">Send</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection