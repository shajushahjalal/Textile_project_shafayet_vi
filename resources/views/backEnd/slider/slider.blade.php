@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
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
                    <input type="text" name="test" value="{{isset($slider->id)?$slider->name:''}}" class="form-control" autocomplete="off" autofocus>
                </div>
                <div class="form-group">
                    <label>Link (URL)</label>
                    <input type="text" name="url" value="{{isset($slider->id)?$slider->link:''}}" class="form-control"  placeholder="https://something/something">                          
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <input type="number" name="position" value="{{isset($slider->id)?$slider->position:'0'}}" class="form-control"  placeholder="https://something/something">                          
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
                    <label>Slider Image</label><br>
                    @if(isset($slider->id))
                    <img src="{{asset($slider->image)}}" width="120" height="40"><br><br>
                    @endif
                    <input type="file" name="image" accept="image/*" />  
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
                        <th>Link</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php $i=1;?>
                    @foreach($sliders as $slider)
                        <tr>
                            <td>{{$i++}}</td>
                            <td> <img src="{{asset($slider->image)}}" width="120" height="40"></td>
                            <td>{{$slider->text}}</td>
                            <td>{{$slider->position}}</td>
                            <td><a href="{{$slider->url}}">{{$slider->url}}</a></td>
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

