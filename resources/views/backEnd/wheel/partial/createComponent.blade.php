<div class="modal fade" keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{isset($data->id)?'Add':'Update'}} Configuration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::Open(['url' => 'wheel-component/create' ,'class' =>'form-horizontal','method' => 'POST', 'id' => 'ajax-from' ]) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Show Text <span class="text-danger">*</span></label>
                                <input type="hidden" name="id" value="{{isset($data->id)?$data->id:0}}" >
                                <input type="text" name="text" value="{{ isset($data->id)?$data->text:null }}" placeholder="Show Text" class="form-control text-uppercase" autocomplete="off" autofocus required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Discount Value<span class="text-danger">*</span></label>
                                <input type="number" name="value" value="{{ isset($data->id)?$data->value:1 }}" min="1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Discount Type<span class="text-danger">*</span></label>
                                <select name="discountType" required class="form-control">
                                    <option value=""> Select Discount Type</option>
                                    <option value="1" {{isset($data->id) && $data->discountType == 1 ? 'selected':null }} >Fixed Amount</option>
                                    <option value="0" {{isset($data->id) && $data->discountType == 0 ? 'selected':null }} >Persent(%) Amount</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Message<span class="text-danger">*</span></label>
                                <input type="text" value="{{ isset($data->id)?$data->message:null }}" name="message" class="form-control" required >
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Publication Status <span class="text-danger">*</span></label>
                                <select name="publicationStatus" class="form-control" required>
                                    <option value="1" selected > Published </option>
                                    <option value="0" {{ isset($data->id) && $data->publicationStatus == 0?'selected':null }} > Unpublished </option>
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-primary">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>