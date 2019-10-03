<div class="modal fade" role="dialog" keyboard="false" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{isset($data->id)?'Create Galary Menu':'Update Galary Menu'}}</h5>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(['url'=>'galary/menu/create','id'=>'ajax-form','method'=>'post','files' => true]) !!}
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-12 col-md-4">
                    <label>Menu Name <span class="text-danger">*</span></label>
                    <input type="hidden" name="id" value="{{isset($data->id)?$data->id:0}}">
                    <input type="text" name="menuName" class=" form-control" value="{{isset($data->id)?$data->menuName:null}}" required placeholder="menu Name">
                </div>
                <div class="col-12 col-md-4">
                    <label>Position <span class="text-danger">*</span></label>
                    <input name="position" class=" form-control" value="{{isset($data->id)?$data->position:1}}" type="number" min="1" required>
                </div>
                <div class="col-12 col-md-4">
                    <label>Publication Status <span class="text-danger">*</span></label>
                    <select class=" form-control" name="publicationStatus">
                        <option value="">Select Status</option>
                        <option value="1" selected >Published</option>
                        <option value="0" {{isset($data->id) && $data->publicationStatus == 0?'selected':null}}>Unpublished</option>
                    </select>
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