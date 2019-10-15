<div class="modal fade" role="dialog" keyboard="false" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{!isset($data->id)?'Add Service List':'Update Service List'}}</h5>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(['url'=>'about/service/create','id'=>'ajax-form','method'=>'post','files' => true]) !!}
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-12 col-md-4">
                    <label>Heading <span class="text-danger">*</span></label>   
                    <input type="hidden" name="id" required class=" form-control" value="{{isset($data->id)?$data->id:0}}">                                     
                    <input type="text" name="heading" required class=" form-control" value="{{isset($data->id)?$data->heading:null}}">                    
                </div>                
                <div class="col-12 col-md-4">
                    <label>Link </label>
                    <input type="text" name="link" required class=" form-control" value="{{isset($data->id)?$data->link:null}}">                    
                </div>
                <div class="col-12 col-md-4">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" {{isset($data->id)?'null':'required'}} accept="image/*" ><br><br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-success progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                    </div>
                </div>
            </div> 
            <div class="form-group row">
                <div class="col-12">
                    <label>Text </label>
                    <textarea  class="form-control" name="text">{{isset($data->id)?$data->text:null}}</textarea>                        
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

    