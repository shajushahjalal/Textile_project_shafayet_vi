
<div class="modal fade" role="dialog" keyboard="false" data-backdrop="static" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{isset($data->id)?'Add Goals Content':'Update Goals Content'}}</h5>            
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url'=>'goals/content/create','id'=>'ajax-form','method'=>'post','files' => true]) !!}
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-12 col-md-6">
                        <label>Content Title <span class="text-danger">*</span> </label>
                        <input type="text" name="title" required class=" form-control" value="{{isset($data->id)?$data->title:null}}">
                        <input type="hidden" name="id" required class=" form-control" value="{{isset($data->id)?$data->id:0}}">                    
                    </div>
                    <div class="col-12 col-md-6">
                        <label>Content Text <span class="text-danger">*</span> </label>
                        <input type="text" name="text" required class=" form-control" value="{{isset($data->id)?$data->text:null}}">                                  
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-12 col-md-6">
                        <label>Persent <span class="text-danger">*</span> </label>
                        <input type="number" min="10" max="100" required name="persent" class=" form-control" value="{{isset($data->id)?$data->persent:'10'}}">                                  
                    </div>
                    <div class="col-12 col-md-6">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" {{isset($data->id)?'null':'required'}} accept="image/*" ><br><br>
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