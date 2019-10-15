<!-- Sub Category Modal -->
<div class="modal fade" keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Sub-Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::Open(['url' => 'sub-category/create','id'=>'ajax-form','class' =>'form-horizontal','method' => 'POST','files'=>true]) !!}
        <div class="modal-body row">
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label> Sub-Category Name</label>
                    <input type="text" name="subCategoryName" placeholder="Sub-Category Name" class="form-control" autocomplete="off" autofocus required>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Category</label>
                    <select name="categoryId" class="form-control" required>
                        <option value="" selected> Select Category </option>
                        @foreach($allCategories as $category)
                        <option value="{{$category->id}}" > {{$category->categoryName}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Seo Section -->
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Page Title</label>
                    <input type="text" name="pageTitle"  placeholder="Page Title" class="form-control" autocomplete="off" >
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Meta Tag</label>
                    <input type="text" name="metaTag"  placeholder="Meta Tag" class="form-control" autocomplete="off" >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="metaDescription" placeholder="Meta Description" class="form-control"></textarea>
                </div>
            </div>
            <!-- Seo Part End -->

            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Category Position</label>
                    <input type="number" min="0" name="position" placeholder="Position Number" class="form-control" required autocomplete="off" >
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Publication Status</label>
                    <select name="publicationStatus" class="form-control" required>
                        <option value="1" selected > Published </option>
                        <option value="0" > Unpublished </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Image</label><br>
                    <input type="file" name="subCategoryImage" accept="image/*"><br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-success progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                    </div>
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

