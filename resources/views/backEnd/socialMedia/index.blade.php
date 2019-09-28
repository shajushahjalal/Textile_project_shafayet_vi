@extends('backEnd.masterPage')
@section('mainPart')    
    <?php $i=0;?>
    <div class="row">
        <div class="col-sm-6">
            <div class="well">
                <table class="table table-light">
                    <tr class="bg-primary">
                        <td>Sn.</td>
                        <td>Icon</td>
                        <td>Position</td>
                        <td>Status</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        @foreach($icons as $icon)
                        <td>{{++$i}}</td>
                        <td><a href="{{url($icon->link)}}" target="_blank"><span class="{{$icon->icon}} fa-2x"></span></a></td>
                        <td>{{$icon->position}}</td>
                        <td>{{$icon->publicationStatus == 1?'Published':'Unpublisged'}}</td>
                        <td>
                            <a href="{{url('social-media/'.$icon->id.'/edit')}}" class="btn btn-info btn-sm" ><span class="fa fa-edit"></span></a>
                            <a href="{{url('social-media/'.$icon->id.'/delete')}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure???');"><span class="fa fa-trash"></span></a>
                        </td>                        
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="well">
                <h4 class="text-info">Add Social Media Icon</h4>
                <hr/>
                {!! Form::Open(['url'=>'social-media','method'=>'post','class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <label>Select Icon*</label>
                    <select class="form-control" name="icon" required>
                        <option value="" selected="">Select an Icon</option>
                        <option value="fab fa-facebook-f" {{isset($data->id) && $data->icon == 'fab fa-facebook-f'?'selected':''}} > Facebook </option>
                        <option value="fab fa-twitter" {{isset($data->id) && $data->icon == 'fab fa-twitter'?'selected':''}} > Twitter </option>
                        <option value="fab fa-youtube" {{isset($data->id) && $data->icon == 'fab fa-youtube'?'selected':''}} > Youtube </option>
                        <option value="fab fa-instagram" {{isset($data->id) && $data->icon == 'fab fa-instagram'?'selected':''}} > Instagram </option>
                        <option value="fab fa-pinterest-p" {{isset($data->id) && $data->icon == 'fab fa-pinterest-p'?'selected':''}} > Pinterest </option>
                        <option value="fab fa-google-plus-g" {{isset($data->id) && $data->icon == 'fab fa-google-plus-g'?'selected':''}} > Google-plus </option>
                        <option value="fab fa-linkedin-in" {{isset($data->id) && $data->icon == 'fab fa-linkedin-in'?'selected':''}} > linkedin </option>
                        <option value="fab fa-flickr" {{isset($data->id) && $data->icon == 'fab fa-flickr'?'selected':''}} > Flickr </option>
                        <option value="fab fa-vimeo-v" {{isset($data->id) && $data->icon == 'fab fa-vimeo-v'?'selected':''}} > Vimeo </option>
                        <option value="fab fa-tumblr" {{isset($data->id) && $data->icon == 'fab fa-tumblr'?'selected':''}} > Tumblr </option>
                        <option value="fab fa-spotify" {{isset($data->id) && $data->icon == 'fab fa-spotify'?'selected':''}} > Spotify </option>
                    </select>
                    @if($errors->has('icon'))
                    <div class="text-danger">
                        This Field is already exists.
                    </div>
                    @endif
                    </div>
                <div class="form-group">
                    <label>Icon Link*</label>
                    <input type="hidden" name="id" value="{{isset($data->id)?$data->id:'0'}}">
                    <input type="text" name="link" value="{{isset($data->id)?$data->link:''}}" required class="form-control" placeholder="https://www.facebook.com/Something">
                </div>
                <div class="form-group">
                    <label>Position*</label>
                    <input type="number" name="position" value="{{isset($data->id)?$data->position:''}}" required class="form-control" placeholder="View position">
                </div>
                <div class="form-group">
                    <label>Select Publication Status*</label>
                    <select class="form-control" name="publicationStatus" required>
                        <option value="">===== Select Publication Status ====== </option>
                        <option value="1" selected>Published</option>
                        <option value="0" {{isset($data->id) && $data->publicationStatus == 0?'selected':''}}>Unpublished</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Save Information</button>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
    
@endsection