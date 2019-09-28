@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col">Edit Product</div>
                    <div class="col text-right">
                        <a href="{{url('/product')}}" class="btn btn-primary btn-sm"> &larr; Back </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            {!! Form::Open(['url' => 'product/create','id' =>'add-product-form' ,'class' =>'form-horizontal','method' => 'PUT','files'=>true]) !!}
                <div class="row">
                    <!-- First row --> 
                    <div class="col-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Product Name*</label>
                            <input type="hidden" value="{{$data->id}}" name="id">
                            <input type="text" value="{{$data->productName}}" name="productName" placeholder="Product Name" class="form-control" autocomplete="off" autofocus required>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Category*</label>
                            <select name="categoryId" id="category" class="form-control" required>
                                <option value="" selected> Select Category </option>
                                @foreach($allCategories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $data->categoryId?'selected':''}} > {{$category->categoryName}} </option>
                                @endforeach
                            </select>
                        </div>                
                    </div>
                    <div class="col-6 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Sub-Category</label>
                            <select name="subCategoryId" id="sub-category" class="form-control" >
                                <option value="" selected> Select Sub-Category </option>
                            </select>
                        </div>                
                    </div>
                    
                    <!-- second row --> 
                    <div class="col-6 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label>Buy Price*</label>
                            <input type="text" name="buyPrice" value="{{$data->buyPrice}}" class="form-control" required >
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label>Selling Price*</label>
                            <input type="text"  name="sellingPrice" value="{{$data->sellingPrice}}" class="form-control" required  >
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label>Discount selling Price*</label>
                            <input type="text" name="sellingPriceWithDiscount" value="{{$data->sellingPriceWithDiscount}}" class="form-control" required  >
                        </div>
                    </div> 
                    <div class="col-sm-3 col-6">
                        <div class="form-group">
                            <label>Page Title</label>
                            <input type="text" name="pageTitle" value="{{$data->pageTitle}}" placeholder="Page Title" class="form-control" autocomplete="off" >
                        </div>
                    </div>

                    <!-- Third row --> 
                    <div class="col-sm-4 col-md-4 col-6">
                        <div class="form-group">
                            <label>Meta Tag</label>
                            <input type="text" name="metaTag"  value="{{$data->metaTag}}" placeholder="Meta Tag" class="form-control" autocomplete="off" >
                        </div>
                    </div>                    
                    <div class="col-12 col-sm-5 col-md-5">
                        <div class="form-group">
                            <label>Video(Use Ifrem Src)</label>
                            <input type="text" name="video" value="{{$data->video}}" class="form-control" placeholder="video source">
                        </div>            
                    </div>
                    <div class="col-6 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label>Publication Status*</label>
                            <select name="publicationStatus" class="form-control" required>
                                <option value="1" selected > Published </option>
                                <option value="0" {{$data->publicationStatus ==0 ?'selected':''}} > Unpublished </option>
                            </select>
                        </div>                
                    </div>                     
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea name="metaDescription" placeholder="Meta Description" class="form-control">{{$data->metaDescription}}</textarea>
                        </div>
                    </div>
                </div>                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <textarea name="description" id="editor" class="form-control" placeholder="Product Description">{{$data->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <label>Product Image</label><br>
                            <input type="file" name="image" accept="image/*" >                                
                        </div>
                        <div class="col-6 col-sm-4">
                            <label>Product Image1</label><br>
                            <input type="file" name="image1" accept="image/*" >
                        </div>
                        <div class="col-6 col-sm-4">
                            <label>Product Image2</label><br>
                            <input type="file" name="image2" accept="image/*" >
                        </div>  
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <label>Product Image3*</label><br>
                            <input type="file" name="image3" accept="image/*" >
                        </div>
                        <div class="col-6 col-sm-4">
                            <label>Product Image4*</label><br>
                            <input type="file" name="image4" accept="image/*" >
                        </div> 
                        <div class="col-6 col-sm-4">
                            <br><button type="button" class="d-none btn btn-danger btn-sm" id="img-clr">Clear All Img</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <button type="submit" class="btn btn-info form-control">Save Information</button>
                        </div>
            {!! Form::close() !!}
            </div>                
        </div>
            
    </div>
</div>

<script>
    $(function(){        
       $('input[type = "file"]').change(function(){
           $('#img-clr').removeClass('d-none');
       });
       $('#img-clr').click(function(){
           $('input[type = "file"]').val("");  
           $('#img-clr').addClass('d-none');
       });
       $('#category').change(function(){
           $.ajax({
               url:'{{url('get/sub-category')}}'+'/'+$('#category').val(),
               methid: 'GET',
               dataType:'json',
               success:function(option){
                $('#sub-category').html(option);
               }
           });
       });	
    });
</script>
@endsection