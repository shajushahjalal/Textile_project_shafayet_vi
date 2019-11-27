@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Add or Edit Video Part
            </div>
            <div class="card-body">
                {!! Form::Open(['url' => 'slider/video','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}
                <div class="row">
                    <div class="col-12 col-sm-6 pull-right">
                        <video width="320" height="240" controls>
                            <source src="{{isset($sliderVideo->id)?$sliderVideo->video:null}}" type="video/mp4">
                        </video> 
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Select Video *</label>
                            <input type="hidden" name="id" value="{{isset($sliderVideo->id)?$sliderVideo->id:0}}">
                            <input type="file" name="video" required accept="video/mp4">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" onclick="desabled">Add Video</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Slider Text Part -->
    <div class="col-12 col-sm-4">
        <div class="card">
            <div class="card-header">
                Add or Edit Slider
            </div>
            <div class="card-body">
                {!! Form::Open(['url' => 'slider','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}
                <div class="form-group">
                    <label>Slider Text</label>
                    <input type="hidden" name="id" value="{{isset($slider->id)?$slider->id:'0'}}">
                    <input type="text" name="text" value="{{isset($slider->id)?$slider->text:''}}" class="form-control" autocomplete="off" autofocus>
                </div>
                
                <div class="form-group">
                    <label>Position</label>
                    <input type="number" name="position" value="{{isset($slider->id)?$slider->position:'0'}}" class="form-control"  placeholder="https://something/something" required>                          
                </div>
                <div class="form-group">
                    <label>Publication Status</label>
                    <select name="publicationStatus" class="form-control" required >
                        <option value="">Select Status</option>
                        <option value="1" selected >Published</option>
                        <option value="0" {{isset($slider->publicationStatus) && $slider->publicationStatus ==0?'selected':''}}>Unpublished</option>
                    </select>                       
                </div>  
                <div class="form-group">
                    <label>Position</label>
                    <input type="file" name="image"  class="form-control" {{ !isset($slider->id) ? 'required' : null }} >                          
                </div>              
                <div class="form-group">
                    <button type="submit" name="btn" class="btn btn-primary form-control"> Save </button>             
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-8">
        <div class="card">
            <div class="card-header card-default">                
                 All Slider  
            </div>        
            <div class="card-body table-responsive">           
                <table class="table table-responsive table-striped">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Text</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> <img src="{{ asset($slider->image) }}" height="70"> </td>
                            <td>{{$slider->text}}</td>
                            <td>{{$slider->position}}</td>
                            <td>{{$slider->publicationStatus ==1 ? 'Published':'Unpublished'}}</td>                        
                            <td>
                                <a href="{{ url('slider/'.$slider->id.'/edit')}}" class="btn btn-info btn-sm" title="Edit Information" ><span class="fa fa-edit"></span></a>                
                                <a href="{{ url('slider/'.$slider->id.'/delete')}}" class="btn btn-danger btn-sm" title="Delete Item" onclick="return confirm('Are you Sure to Delete Ihis Category')" ><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach            
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

