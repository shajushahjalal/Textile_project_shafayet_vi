@extends('frontEnd.masterPage')
@section('title')
    @if(isset($client->id))
        <title>{{$client->pageTitle}}</title>
    @else
        <title>Voyager Apparels LTD || {{$system->titleName}}</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Voyager Apparels LTD</li>
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
                VAL is established in 2002.located at chowdhury Para Malibag, Dhaka.
                It is a world class garments manufacturing factory having all kinds of production
                facilities with a nice outlook. It is situated on a space of more than 34,000 sqft
                with high quality machineries from Germany, Korea and China. It is about 08 kilometer 
                away from Shah Jalal International Airport, Dhaka. A team of well trained and experienced 
                professionals runs the factory with proven track record for custom made services to ensure 
                supreme quality.<br><br>

                We are trying to be an expert leader as a dependable and trend setter supplier of RMG in
                global fashion business world by producing top quality ready made garments with advance
                technology through its different production units to achieve customer’s faith and maximum
                satisfaction. With the mission of providing top quality services to its customers Shamgu
                Group always aims to improve efficiency of production process using the latest technologies.
            </div>
            <div class="col-12 mt-20">
                <table class="table table-striped text-black table-bordered">
                    <thead class="bg-black text-white">
                        <tr>
                            <th>SN.</th>
                            <th>Units</th>
                            <th>Production Lines</th>
                            <th>Capacity Per Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>FARSEEING KNIT COM. LTD.</td>
                                <td>7</td>
                                <td>210,000 PCS</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>VOYAGER APPARELS LTD.</td>
                                <td>7</td>
                                <td>210,000 PCS</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>GOOD DAY APPARELS LTD.</td>
                                <td>8</td>
                                <td>240,000 PCS</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>SHANGU DRESSES LTD.</td>
                                <td>28</td>
                                <td>700,000 PCS</td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mt-20">
                <h5 class="text-uppercase">DESCRIPTION OF FACTORY</h5>
                <hr/>
                <table class="table table-striped text-black table-responsive table-bordered">                    
                    <tbody>
                        <tr>
                            <td >FACTORY MEASUREMENT</td>
                            <td >34000 sft</td>
                        </tr>
                        <tr>
                            <td >PRODUCTION CAPACITY</td>
                            <td >2, 01,000 pcs per month</td>
                        </tr>
                        <tr>
                            <td >BGMEA MEMBERSHIP NO</td>
                            <td >3634</td>
                        </tr>
                        <tr>
                            <td >BUSINESS IDENTIFICATION NO</td>
                            <td >19061067576</td>
                        </tr>
                        <tr>
                            <td >PERCENTAGE OF WORKERS</td>
                            <td >MALE 30%, FEMALE 70% (Total-1000)</td>
                        </tr>
                        <tr>                        
                            <td >TOTAL QUALITY PERSONNELS</td>
                            <td >47</td>
                        </tr>                                                    
                        <tr>
                            <td >WORKING HOURS</td>                            
                            <td >8 hours (8.00-16.00)</td>
                        </tr>
                                                        
                        <tr>
                            <td >WEEKLY HOLIDAY</td>                            
                            <td >Sunday</td>
                        </tr>
                                                        
                        <tr>
                            <td >LEAD TIME (FOR DELIVERY)</td>                            
                            <td >60-120 DAYS</td>
                        </tr>
                                                        
                        <tr>
                            <td >SEWING LINE</td>                            
                            <td >06 (SIX)</td>
                        </tr>
                                                        
                        <tr>
                            <td >PRODUCTS</td>                            
                            <td >WOVEN SHIRTS (MEN, WOMEN, BOY’S &amp; KIDS), BLOUSE,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br>PAJAMA&nbsp; SET,BOXER ETC.</td>
                        </tr>
                                                        
                        <tr>
                            <td>FACTORY ADDRESS</td>                            
                            <td >08 MALIBAG CHOWDHURY PARA<br>DHAKA-1219,BANGLADESH<br>PHONE:88-02 8917890, 8922572</td>
                        </tr>
                                                        
                        <tr>
                            <td> EMAIL</td>                            
                            <td >val@shangugroup.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-6 mt-20">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-uppercase">GALLERY OF FACTORY</h5>
                        <hr/>
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/pic10.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/pic11.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/pic13.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 mt-10">
                        <img src="{{asset('public/frontEnd/images/pic14.jpg')}}" class="img-fluid">
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