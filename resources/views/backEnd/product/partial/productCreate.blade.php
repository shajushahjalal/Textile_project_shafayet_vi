@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col">Add Product</div>
                    <div class="col text-right">
                        <a href="{{url('/product')}}" class="btn btn-primary btn-sm"> &larr; Back </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! Form::Open(['url' => 'product/create' ,'class' =>'form-horizontal','method' => 'POST','files'=>true]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <label>Product Name<span class="text-danger">*</span></label>
                                <input type="text" name="productName" placeholder="Product Name" class="form-control" autocomplete="off" autofocus required>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label>Category<span class="text-danger">*</span></label>
                                <select name="categoryId" id="category" class="form-control" required>
                                    <option value="" selected> Select Category </option>
                                    @foreach($allCategories as $category)
                                        <option value="{{$category->id}}" > {{$category->categoryName}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label>Sub-Category</label>
                                <select name="subCategoryId" id="sub-category" class="form-control" >
                                    
                                </select>
                            </div>
                        </div>                
                    </div>
                    <div class="form-group">
                        <div class="row">                    
                            <div class="col-6 col-sm-3">
                                <div class="form-group">
                                    <label>Buy Price <span class="text-danger">*</span></label>
                                    <input type="text" name="buyPrice" value="0" class="form-control" required >
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="form-group">
                                    <label>Selling Price <span class="text-danger">*</span></label>
                                    <input type="text" name="sellingPrice" value="0" class="form-control" required  >
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="form-group">
                                    <label>Discount selling Price <span class="text-danger">*</span></label>
                                    <input type="text" name="sellingPriceWithDiscount" value="0" class="form-control" required  >
                                </div>
                            </div> 
                            <div class="col-sm-3 col-6">
                                <div class="form-group">
                                    <label>Page Title</label>
                                    <input type="text" name="pageTitle" placeholder="Page Title" class="form-control" autocomplete="off" >
                                </div>
                            </div>                                      
                        </div>
                    </div>                          
                         
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-6">
                                <div class="form-group">
                                    <label>Meta Tag</label>
                                    <input type="text" name="metaTag" placeholder="Meta Tag" class="form-control" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                 <div class="form-group">
                                    <label>Video(Use Ifrem Src)</label>
                                    <input type="text" name="video" class="form-control" placeholder="video source">
                                </div>            
                            </div> 
                            <div class="col-12 col-sm-3">
                                 <div class="form-group">
                                    <label>Position <span class="text-danger">*</span></label>
                                    <input type="number" name="position" class="form-control" value="1" min="1" required >
                                </div>            
                            </div> 
                            <div class="col-6 col-sm-3">
                                <label>Publication Status <span class="text-danger">*</span></label>
                                <select name="publicationStatus" class="form-control" required>
                                    <option value="1" selected > Published </option>
                                    <option value="0" > Unpublished </option>
                                </select>
                            </div>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="metaDescription" placeholder="Meta Description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-12">
                                <label>Description</label>
                                <textarea name="description" id="editor" class="form-control" placeholder="Product Deccription"></textarea>
                            </div>                    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6 col-sm-4">
                                <label>Product Image <span class="text-danger">*</span></label><br>
                                <input type="file" name="image" accept="image/*" required>   
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror                           
                            </div>
                            <div class="col-6 col-sm-4">
                                <label>Product Image1 </label><br>
                                <input type="file" name="image1" accept="image/*" >
                            </div>
                            <div class="col-6 col-sm-4">
                                <label>Product Image2 </label><br>
                                <input type="file" name="image2" accept="image/*" >
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6 col-sm-4">
                                <label>Product Image3</label><br>
                                <input type="file" name="image3" accept="image/*" >
                            </div>
                            <div class="col-6 col-sm-4">
                                <label>Product Image4</label><br>
                                <input type="file" name="image4" accept="image/*" >
                            </div> 
                            <div class="col-6 col-sm-4">
                                <br>
                                <button type="button" class="d-none btn btn-danger btn-sm" id="img-clr">Clear All Img</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-info form-control">Add Product</button>
                        </div>
                    </div>
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