@extends('frontEnd.masterPage')
@section('title')
    @if(isset($client->id))
        <title>{{$client->pageTitle}}</title>
    @else
        <title>Farseeing Knit Composite || {{$system->titleName}}</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Farseeing Knit Composite</li>
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
                <h5 class="text-uppercase">PRODUCTION CAPACITY</h5>
                <hr/>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-xl-5 mb-20">
                <img src="{{asset('public/frontEnd/images/pic1.png')}}" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 col-xl-7 text-black">            
                Farseeing Knit Composite Ltd. is a full service knit composite unit located in the district of Gazipur, 
                Just One hour driving distance from Dhaka air port. We are 100% export oriented both knit and woven garments 
                manufacturer and fully affiliated with export promotion bureau(EPB). Our productivity and skills lead us to meet 
                buyer’s requirements at a competitive price, quality products and prompt delivery in every shipment.
            </div>
            <div class="col-12 col-md-6 mt-20">
                <h5>DESCRIPTION OF FACTORY</h5>
                <hr/>
                <table class="table table-striped text-black table-responsive table-bordered">                    
                    <tbody>
                        <tr>
                            <td >FACTORY MEASUREMENT</td>
                            
                            <td >30,000 sft</td>
                        </tr>
                                                        
                        <tr>
                            <td >PRODUCTION CAPACITY</td>
                            
                            <td >KNIT-2,50,000 pcs ,WOVEN -1,80,000 pcs PM</td>
                        </tr>
                                                        
                        <tr>
                            <td >BGMEA MEMBERSHIP NO</td>
                            
                            <td >4954</td>
                        </tr>
                                                        
                        <tr>
                            <td >BUSINESS IDENTIFICATION NO</td>
                            
                            <td >18091013170</td>
                        </tr>
                                                        
                        <tr>
                            <td >PERCENTAGE OF WORKERS</td>
                            
                            <td >MALE 40%, FEMALE 60% (Total-900)</td>
                        </tr>
                                                        
                        <tr>
                            <td >TOTAL QUALITY PERSONNELS</td>
                            
                            <td >48</td>
                        </tr>
                                                        
                        <tr>
                            <td >WORKING HOURS</td>
                            
                            <td >8 hours (8.00-16.00)</td>
                        </tr>
                                                        
                        <tr>
                            <td >WEEKLY HOLIDAY</td>
                            
                            <td >FRIDAY</td>
                        </tr>
                                                        
                        <tr>
                            <td >LEAD TIME (FOR DELIVERY)</td>
                            
                            <td >60-120 DAYS</td>
                        </tr>
                                                        
                        <tr>
                            <td >SEWING LINE</td>
                            
                            <td >07 (SEVEN)</td>
                        </tr>
                                                        
                        <tr>
                            <td >PRODUCTS</td>
                            
                            <td >BASIC ROUND NECK T-SHIRT,POLO<br> SHIRT,TANKTOP,JERSEYSHORTS,RUGBY&nbsp; &nbsp;<br> SHIRTS,SWIM SHORTS ETC.&nbsp;&nbsp;&nbsp; &nbsp;<br> WOVEN SHIRTS (MEN, WOMEN, BOY’S &amp; KIDS),&nbsp; &nbsp;<br> BLOUSE,&nbsp; PAJAMA SET,BOXER ETC.</td>
                        </tr>
                                                        
                        <tr>
                            <td >FACTORY ADDRESS</td>
                            
                            <td >VILL-FARIDPUR NAYANPUR,<br>P.O:TELIHATI, SREEPUR,<br> DIST: GAZIPUR, BANGLADESH<br>PHONE:88-02 8917890, 8922572</td>
                        </tr>
                                                        
                        <tr>
                            <td > EMAIL</td>
                            
                            <td >farseeing@shangugroup.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-6 mt-20">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-uppercase">FARSEEING Galary</h5>
                        <hr/>
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/farcing1.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/farcing2.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/farcing3.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/farcing4.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/farcing5.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/farcing6.jpg')}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-40 mb-20">
        <div class="row">
            <div class="col-12">
                <h5 class="text-uppercase">Strenghth</h5>
                <hr/>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-black">
                All Types of light woven products as Formal Shirt | Casual  Shirt | Blouse | Dress | Pajama For men's , Lady's and Kid's.
            </div>
        </div>
    </div>
@endsection