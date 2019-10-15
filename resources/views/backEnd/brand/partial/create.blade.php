<div class="modal fade" keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::Open(['url' => 'branding/create' ,'class' =>'form-horizontal','method' => 'POST','files'=>true]) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label>Branding Name <span class="text-danger">*</span></label>
                    <input type="hidden" name="id" value="{{isset($data->id)?$data->id:null}}" >
                    <input type="text" name="name" value="{{ isset($data->id)?$data->name:null }}" placeholder="Branding Name" class="form-control" autocomplete="off" autofocus required>
                </div>
                <div class="form-group">
                    <label>Branding Name <span class="text-danger">*</span></label>
                    <input type="text" name="link" value="{{ isset($data->id)?$data->link:null }}" placeholder="Paste the link here" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Category Position <span class="text-danger">*</span></label>
                    <input type="number" value="{{ isset($data->id)?$data->position:1 }}" min="1" name="position" class="form-control" required >
                </div>
                <div class="form-group">
                    <label>Publication Status <span class="text-danger">*</span></label>
                    <select name="publicationStatus" class="form-control" required>
                        <option value="1" selected > Published </option>
                        <option value="0" {{ isset($data->id) && $data->publicationStatus == 0?'selected':null }} > Unpublished </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image <span class="text-danger">{{ isset($data->id)?null:'*'}}</span></label><br>
                    <input type="file" name="image" accept="image/*" {{ isset($data->id)?null:'required'}}><br><br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-success progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="submit" class="btn btn-primary">Add</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>