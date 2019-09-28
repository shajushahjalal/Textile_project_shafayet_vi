@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col">
                        Product Details
                    </div>
                    <div class="col text-right">
                        <a href="{{url('product')}}" class="btn btn-sm btn-info"> &larr; Products</a>
                    </div>
                </div>
            </div>            
            <div class="card-body">
                <table class="table table-responsive">
                    <tr class="table-borderless">
                        <th>Product Name</th>
                        <td>:</td>
                        <td>{{$product->productName}}</td>  
                        
                        <th>Category Name</th>
                        <td>:</td>
                        <td>{{$product->categoryName}}</td>     
                        
                        <th>Sub-Category</th>
                        <td>:</td>
                        <td>{{$product->subCategoryName}}</td>
                    </tr>
                    <tr class="table-borderless">
                        <th>Buy Price </th>
                        <td>:</td>
                        <td>{{$product->buyPrice}} {{$system->currency}} </td>
                        
                        <th>Selling Price</th>
                        <td>:</td>
                        <td>{{$product->sellingPrice}} {{$system->currency}} </td>
                        
                        <th>Selling Price with Discount</th>
                        <td>:</td>
                        <td>{{$product->sellingPriceWithDiscount}} {{$system->currency}} </td>
                    </tr>
                    <tr class="table-borderless">
                        <th>Description</th>
                        <td colspan="8">{!! $product->description !!} </td>
                    </tr>
                    <tr class="table-borderless">
                        <th>Image </th>
                        <td>:</td>
                        <td><img src="{{asset($product->image)}}" width="60" height="45"></td>
                        
                        @if(file_exists($product->image1))
                        <th>Image1</th>
                        <td>:</td>
                        <td><img src="{{asset($product->image1)}}" width="60" height="45"></td>
                        @endif
                        
                        @if(file_exists($product->image2))
                        <th>Image2</th>
                        <td>:</td>
                        <td><img src="{{asset($product->image2)}}" width="60" height="45"></td>
                        @endif
                    </tr>
                    
                    <tr class="table-borderless">
                        @if(file_exists($product->image3))
                        <th>Image3</th>
                        <td>:</td>
                        <td><img src="{{asset($product->image3)}}" width="60" height="45"></td>
                        @endif
                        
                        @if(file_exists($product->image4))
                        <th>Image4</th>
                        <td>:</td>
                        <td><img src="{{asset($product->image4)}}" width="60" height="45"></td>
                        @endif  
                    </tr>
                    @if(!empty($product->video))
                    <tr class="table-borderless">
                        <th>Video</th>
                        <td>:</td>
                        <td colspan="8">{!! $product->video !!}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection