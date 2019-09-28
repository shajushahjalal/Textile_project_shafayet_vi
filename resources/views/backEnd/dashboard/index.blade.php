@extends('backEnd.masterPage')
@section('mainPart')
<!-- task, page, download counter  start -->
<div class="row">
    <!-- first Block Start-->
    <div class="col-xl-3 col-md-3 col-sm-6 ">
        <div class="card bg-c-yellow update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">$30200</h4>
                        <h6 class="text-white m-b-0">Today Sale</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1" __idm_frm__="10737418263"></iframe>
                        <canvas id="update-chart-1" height="50" style="display: block; width: 45px; height: 50px;" width="45"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{url('/')}}"> All Sales</a>
            </div>
        </div>
    </div>
    <!-- first Block End-->
    <!-- Second Block Start-->
     
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">290+</h4>
                        <h6 class="text-white m-b-0">Today Place Order</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1" __idm_frm__="10737418265"></iframe>
                        <canvas id="update-chart-2" height="50" style="display: block; width: 45px; height: 50px;" width="45"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{url('/')}}"> All Orders</a>
            </div>
        </div>
    </div>
    
    <!-- Second Block End-->
    <!-- Third Block End-->
    
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card bg-c-pink update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">190+</h4>
                        <h6 class="text-white m-b-0">Delivery Complete</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1" __idm_frm__="10737418265"></iframe>
                        <canvas id="update-chart-2" height="50" style="display: block; width: 45px; height: 50px;" width="45"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{url('/')}}"> Delivery Report</a>
            </div>
        </div>
    </div>
    
    <!-- Third Block End-->
    <!-- Fourth Block Start-->
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card update-card bg-c-lite-green">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">790+</h4>
                        <h6 class="text-white m-b-0">Today Page Views</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1" __idm_frm__="10737418265"></iframe>
                        <canvas id="update-chart-2" height="50" style="display: block; width: 45px; height: 50px;" width="45"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
            </div>
        </div>
    </div>
    
</div>                                            
@endsection
