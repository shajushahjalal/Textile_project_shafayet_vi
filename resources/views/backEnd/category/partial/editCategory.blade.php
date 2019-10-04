<!-- Category Modal -->
<div class="modal fade" keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::Open(['url' => 'category/create','id'=>'ajax-form','class' =>'form-horizontal','method' => 'POST','files'=>true]) !!}
        <div class="modal-body row">
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="hidden" name="id" value="{{$data->id}}" >
                    <input type="text" name="categoryName" value="{{$data->categoryName}}" placeholder="Category Name" class="form-control" autocomplete="off" autofocus required>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Have Sub-Category</label>
                    <select name="haveSubCategory" class="form-control" required>
                        <option value="" selected> Select Yes or No </option>
                        <option value="1" {{ $data->haveSubCategory ==1?'selected':''}} > Yes </option>
                        <option value="0" {{ $data->haveSubCategory ==0?'selected':''}} > No </option>
                    </select>
                </div>
            </div>
            <!-- Seo Section -->
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Page Title</label>
                    <input type="text" name="pageTitle" value="{{$data->pageTitle}}" placeholder="Page Title" class="form-control" autocomplete="off" >
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Meta Tag</label>
                    <input type="text" name="metaTag" value="{{$data->metaTag}}" placeholder="Meta Tag" class="form-control" autocomplete="off" >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="metaDescription" placeholder="Meta Description" class="form-control">{{$data->metaDescription}}</textarea>
                </div>
            </div>
            <!-- End Seo Section -->
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Category Position</label>
                    <input type="number" value="{{$data->position}}" name="position" placeholder="Position Number" min="0" class="form-control" required autocomplete="off" >
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Publication Status</label>
                    <select name="publicationStatus" class="form-control" required>
                        <option value="1" {{ $data->publicationStatus ==1?'selected':''}} > Published </option>
                        <option value="0" {{ $data->publicationStatus ==0?'selected':''}} > Unpublished </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Category Image</label><br>
                    <input type="file" name="categoryImage" accept="image/*">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="submit" class="btn btn-primary">Update Category</button>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

