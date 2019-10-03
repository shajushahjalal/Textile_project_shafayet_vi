@extends('frontEnd.masterPage')
@section('title')
<title>{{ $data->menuName .' || '}}  {{$system->titleName}}</title>
@stop
@section('seo')
{!! isset($seo->id)?$seo->seo:'' !!} 
@stop
@section('mainPart')
    <!-- about start -->
    <div style="background:url({{asset($data->image)}}); background-size: cover;">
        <h2 class="about-title" > {{ $data->menuName }} </h2>    
    </div>
    <!-- about end -->

    <!-- about-details start  -->
    <div class=" container-fluid" style="background:#AC3E3D;color:#fff;">
        <div class="row">
            <div class="col-10 offset-1 mt-40 mb-40">
                <div class="text-justify">
                    {!! $data->content !!}
                </div>  
            </div>
        </div>
    </div>
    
@endsection