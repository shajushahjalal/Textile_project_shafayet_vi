@extends('frontEnd.masterPage')
@section('title')
    <title>Gallery || {{$system->titleName}}</title>
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
                    <h1 class="h2">Gallery</h1> 
                    <!--== Page Title Area End ==-->
                    <nav class="text-center" aria-label="breadcrumb">
                        <ol class="breadcrumb" style="display: inline-flex;">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery </li>
                        </ol>
                    </nav>                 
                </div>
            </div>
        </div>
    </div>
</section>

<!--== Page Title Area End ==-->



<!-- contact  section start -->
<div class="contact-section " id="bottom">
<!-- gallery  start -->
<div class="container " >    
    <div class="row">
        <div class="col-12 mt-4">
        <div class="portfolio_menu justify-content-center">
            <ul>
                <li class="active" onclick="hideMenu()" data-filter="*">All</li>
                @foreach($galaryMenus as $menu)
                <li data-filter=".{{str_replace([',','-',"''"],'',$menu->menuName)}}" onclick="showMenu('{{str_replace([',','-',"''"],'',$menu->menuName)}}')">{{$menu->menuName}}</li>
                @endforeach               
            </ul>
        </div>
        <div class="portfolio_menu justify-content-center">
            <ul class="sub-menu">
                @foreach($galaryMenus as $menu)
                    @foreach($menu->galarySubMenu as $subMenu)
                    <li data-filter=".{{str_replace([',','-',"''"],'',$subMenu->subMenuName)}}" class ="d-none {{str_replace([',','-',"''"],'',$menu->menuName)}}" >{{$subMenu->subMenuName}}</li>
                    @endforeach  
                @endforeach             
            </ul>
        </div>
        </div>
        <div class="portfolio_item ">
            <div class="row">   
                @foreach($galaryMenus as $menu)  
                    @foreach($menu->galaryContent as $items)    
                    <div class="col-sm-6 col-md-3 col-xl-4 item {{str_replace([',','-'],'',$items->subMenu->subMenuName)}} {{str_replace([',','-'],'',$items->galary->menuName)}}">
                        <img class="img-fluid" src="{{$items->image}}">
                    </div>
                    @endforeach
                @endforeach                
            </div>
        </div>
    </div>
</div>
<!-- gallery end -->
</div>


<script>
    function showMenu(menu_name){
        $('.sub-menu li').addClass('d-none');
        $('.'+menu_name).removeClass('d-none');
    }

    function hideMenu(){
        $('.sub-menu li').addClass('d-none');
    }
</script>

@endsection