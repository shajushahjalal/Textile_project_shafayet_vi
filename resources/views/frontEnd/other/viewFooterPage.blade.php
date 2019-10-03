@extends('frontEnd.masterPage')
@section('title')
<title>{{ $data->menuName .' || '}}  {{$system->titleName}}</title>
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
                                <li class="breadcrumb-item active" aria-current="page">{{$data->menuName}}</li>
                            </ol>
                        </nav>                 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about-details start  -->
    <div class=" container-fluid" style="background:#eee;color:#555;">
        <div class="row">
            <div class="col-10 offset-1 mt-40 mb-40">
                <div class="text-justify">
                    @if(file_exists($data->image))
                    <img src="{{asset($data->image)}}" class=" img-fluid mb-20" style="max-height:400px;">
                    @endif
                    {!! $data->content !!}
                </div>  
            </div>
        </div>
    </div>
    
@endsection