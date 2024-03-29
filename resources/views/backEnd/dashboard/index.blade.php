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
                        <h4 class="text-white">{{$today_visitor->visitor}}</h4>
                        <h6 class="text-white m-b-0">Today Visit</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1" __idm_frm__="10737418263"></iframe>
                        <canvas id="update-chart-1" height="50" style="display: block; width: 45px; height: 50px;" width="45"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : {{Carbon\Carbon::now()->format('d-M-Y')}}</p>
            </div>
        </div>
    </div>
    <!-- first Block End-->
    <!-- Second Block Start-->
    
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card bg-c-pink update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{$today_visitor->total_page_visit}}</h4>
                        <h6 class="text-white m-b-0">Today Page Visit</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1" __idm_frm__="10737418265"></iframe>
                        <canvas id="update-chart-2" height="50" style="display: block; width: 45px; height: 50px;" width="45"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : {{Carbon\Carbon::now()->format('d-M-Y')}}</p>
            </div>
        </div>
    </div>
    
    <!-- Third Block End-->
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card update-card bg-c-lite-green">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{$yesterday_visitor->visitor}}</h4>
                        <h6 class="text-white m-b-0">Yesterday Visit</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1" __idm_frm__="10737418265"></iframe>
                        <canvas id="update-chart-2" height="50" style="display: block; width: 45px; height: 50px;" width="45"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : {{Carbon\Carbon::now()->subdays(1)->format('d-M-Y')}}</p>
            </div>
        </div>
    </div>

    <!-- Fourth Block Start-->
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card update-card bg-c-lite-green">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{$yesterday_visitor->total_page_visit}}</h4>
                        <h6 class="text-white m-b-0">Yesterday Page Visit</h6>
                    </div>
                    <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1" __idm_frm__="10737418265"></iframe>
                        <canvas id="update-chart-2" height="50" style="display: block; width: 45px; height: 50px;" width="45"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : {{Carbon\Carbon::now()->subdays(1)->format('d-M-Y')}}</p>
            </div>
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-12">
        <h3>Website Visit History</h3><br>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-striped" id="table">
            <thead>
                <th>Sn</th>
                <th>IP</th>
                <th>Device</th>
                <th>OS</th>
                <th>Country</th>
                <th>Page Visit</th>
                <th>Date</th>
            </thead>
        </table>
    </div>
</div>
<script>
    $(function() {        
        // Load Data via datatable
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! URL::current() !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'ip', name: 'ip' },
                { data: 'device', name: 'device' },
                { data: 'os', name: 'os' },
                { data: 'countryCode', name: 'countryCode' },                
                { data: 'visit_count', name: 'visit_count' },
                { data: 'date', name: 'date' }
            ],
            "lengthMenu": [[50, 100, 500,1000, -1], [50, 100, 500,1000, "All"]],
            "order": [[ 0, "ASC" ]] 
        }); 
    });
</script>

@endsection
