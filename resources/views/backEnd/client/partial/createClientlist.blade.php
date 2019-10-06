
<div class="modal fade" role="dialog" keyboard="false" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{isset($data->id)?'Add Client List':'Update Client List'}}</h5>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(['url'=>'client/list/create','id'=>'ajax-form','method'=>'post','files' => true]) !!}
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-12 col-md-4">
                    <label>Client Name <span class="text-danger">*</span></label>                    
                    <input type="text" name="name" required class=" form-control" value="{{isset($data->id)?$data->name:null}}">                    
                </div> 
                <div class="col-12 col-md-4">
                    <label>Link </label>
                    <input type="text" name="link" class=" form-control" value="{{isset($data->id)?$data->link:null}}">
                    <input type="hidden" name="id" required class=" form-control" value="{{isset($data->id)?$data->id:0}}">                    
                </div>  
                <div class="col-12 col-md-4">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" {{isset($data->id)?'null':'required'}} accept="image/*" >
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