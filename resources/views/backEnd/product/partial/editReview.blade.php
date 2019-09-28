<!-- Modal -->
<div class="modal fade" id="review-modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Product Review</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(['url'=>'product/review/update','method' => 'post']) !!}
        <div class="modal-body">
            <div class="row form-group">
                <div class="col-12 col-sm-6">
                    <input type="hidden" value="{{$review->id}}" name="id">
                    <label>Rating</label>
                    <select name="rating" class="form-control">
                        <option value="1" {{$review->rating == 1 ? 'selected':null}} > 1 Star </option>
                        <option value="2" {{$review->rating == 2 ? 'selected':null}} > 2 Star </option>
                        <option value="3" {{$review->rating == 3 ? 'selected':null}} > 3 Star </option>
                        <option value="4" {{$review->rating == 4 ? 'selected':null}} > 4 Star </option>
                        <option value="5" {{$review->rating == 5 ? 'selected':null}} > 5 Star </option>
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label>Publication Status</label>
                    <select name="publicationStatus" class="form-control">
                        <option value="1" {{$review->publicationStatus == 1 ? 'selected':null}} > Published </option>
                        <option value="0" {{$review->publicationStatus == 0 ? 'selected':null}} > Unpublished </option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <textarea class="form-control" name="review" placeholder="Empty Review Text">{!! $review->review !!}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" id="submit" class="btn btn-primary  btn-sm">Save changes</button>
        </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>