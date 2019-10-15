
<div class="modal fade" role="dialog" keyboard="false" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{isset($data->id)?'Add Galary Content':'Update Galary Content'}}</h5>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(['url'=>'galary/content/create','id'=>'ajax-form','method'=>'post','files' => true]) !!}
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-12 col-md-6">
                    <label>Select Menu <span class="text-danger">*</span></label>
                    <input type="hidden" name="id" value="{{isset($data->id)?$data->id:0}}">
                    <select class=" form-control" name="galary_id" required>
                        <option value="" selected >Select Menu</option>
                        @foreach($galaryMenus as $menu)
                        <option value="{{$menu->id}}" {{isset($data->id) && $menu->id == $data->galary_id ? 'selected':null }}>{{$menu->menuName}}</option>
                        @endforeach
                    </select>                    
                </div>
                <div class="col-12 col-md-6">
                    <label>Link </label>
                    <input type="text" name="link" class=" form-control" value="{{isset($data->id)?$data->link:null}}">                    
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-md-6">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" {{isset($data->id)?'null':'required'}} accept="image/*" ><br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-success progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="submit" class="btn btn-primary">Save Change</button>
        </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>