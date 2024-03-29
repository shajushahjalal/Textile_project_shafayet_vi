@extends('backEnd.masterPage')
@section('mainPart') 
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <table class="table table-light">
                    <tr class="bg-primary">
                        <td>#</td>
                        <td>Image</td>
                        <td>Heading Text</td>
                        <td>Text</td>
                        <td>Button</td>
                        <td>Position</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    @foreach($fproducts as $product)
                    <tr>                        
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{asset($product->image)}}" width="60" >
                        </td>
                        <td>{{$product->heading}}</td>
                        <td>{{$product->text}}</td>
                        <td>{{$product->buttonText}}</td>
                        <td>{{$product->position}}</td>
                        <td>{{$product->publicationStatus == 1?'Published':'Unpublisged'}}</td>
                        <td>
                            <a href="{{url('feature-products/'.$product->id.'/edit')}}" class="btn btn-info btn-sm" ><span class="fa fa-edit"></span></a>
                            <a href="{{url('feature-products/'.$product->id.'/delete')}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure???');"><span class="fa fa-trash"></span></a>
                        </td>                        
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="well">
                <h4 class="text-info">Add Feature Product</h4>
                <hr/>
                {!! Form::Open(['url'=>'feature-products','method'=>'post','files'=>true,'class'=>'form-horizontal'])!!}
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Heading Text</label>
                        <input type="text" name="heading" value="{{isset($data->id)?$data->heading:''}}" placeholder="Display Heading Text" class="form-control" >
                    </div>
                    <div class="col-sm-6">
                        <label>Text</label>
                        <input type="text" name="text" value="{{isset($data->id)?$data->text:''}}" placeholder="Display Text" class="form-control" >
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>Button Text</label>
                        <input type="text" name="buttonText" value="{{isset($data->id)?$data->buttonText:''}}" placeholder="Display Button Text" class="form-control" >
                    </div>
                    <div class="col-sm-4">
                        <label>Button Link / URL</label>
                        <input type="hidden" name="id" value="{{isset($data->id)?$data->id:'0'}}">
                        <input type="text" name="link" value="{{isset($data->id)?$data->link:''}}" class="form-control" placeholder="https://www.facebook.com/Something">
                    </div>
                    <div class="col-sm-4">
                        <label>Position*</label>
                        <input type="number" name="position" value="{{isset($data->id)?$data->position:''}}" required class="form-control" placeholder="View position">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>Select Publication Status*</label>
                        <select class="form-control" name="publicationStatus" required>
                            <option value="">===== Select Publication Status ====== </option>
                            <option value="1" selected>Published</option>
                            <option value="0" {{isset($data->id) && $data->publicationStatus == 0?'selected':''}}>Unpublished</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" {{isset($data->id)?'':'required'}}>
                    </div>
                </div> 
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Save Information</button>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
    
@endsection