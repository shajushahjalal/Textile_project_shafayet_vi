<div class="modal fade" keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::Open(['url' => 'coupon/create' ,'class' =>'form-horizontal','method' => 'POST','files'=>true]) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Coupon Code <span class="text-danger">*</span></label>
                                <input type="hidden" name="id" value="{{isset($data->id)?$data->id:null}}" >
                                <input type="text" name="couponCode" value="{{ isset($data->id)?$data->couponCode:null }}" placeholder="Coupon Code" class="form-control text-uppercase" autocomplete="off" autofocus required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Coupon Price <span class="text-danger">*</span></label>
                                <input type="number" name="couponPrice" value="{{ isset($data->id)?$data->couponPrice:1 }}" min="1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Start Date<span class="text-danger">*</span></label>
                                <input type="date" value="{{ isset($data->id)?$data->startDate:null }}" name="startDate" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Expire Date<span class="text-danger">*</span></label>
                                <input type="date" value="{{ isset($data->id)?$data->expireDate:null }}" name="expireDate" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="active" selected > Active </option>
                                    <option value="deactive" {{ isset($data->id) && $data->status == 'deactive'?'selected':null }} > Deactive </option>
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