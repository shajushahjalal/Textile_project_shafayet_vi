<!-- Category Modal -->
<div class="modal fade" id="edit-subcategory-modal" keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Sub-Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::Open(['url' => 'sub-category/create', 'id'=>'edit-category-form' ,'class' =>'form-horizontal','method' => 'POST','files'=>true]) !!}
        <div class="modal-body row">
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label> Sub-Category Name</label>
                    <input type="hidden" name="id" value="{{ $subCategories->id }}">
                    <input type="text" name="subCategoryName" value="{{ $subCategories->subCategoryName }}" placeholder="Sub-Category Name" class="form-control" autocomplete="off" autofocus required>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Category</label>
                    <select name="categoryId" class="form-control" required>
                        <option value="" selected> Select Category </option>
                        @foreach($allCategories as $category)
                        <option value="{{$category->id}}"{{ $subCategories->categoryId == $category->id?'selected':''}} > {{$category->categoryName}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Seo Section -->
            <div class="col-sm-6 col-12">
                    <div class="form-group">
                        <label>Page Title</label>
                        <input type="text" name="pageTitle"  value="{{ $subCategories->pageTitle }}" placeholder="Page Title" class="form-control" autocomplete="off" >
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="form-group">
                        <label>Meta Tag</label>
                        <input type="text" name="metaTag"  value="{{ $subCategories->metaTag }}" placeholder="Meta Tag" class="form-control" autocomplete="off" >
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea name="metaDescription" placeholder="Meta Description" class="form-control">{{ $subCategories->metaDescription }}</textarea>
                    </div>
                </div>
                <!-- Seo Part End -->

            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Category Position</label>
                    <input type="number" min="0" name="position" value="{{ $subCategories->position }}" placeholder="Position Number" class="form-control" required autocomplete="off" >
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Publication Status</label>
                    <select name="publicationStatus" class="form-control" required>
                        <option value="1" selected > Published </option>
                        <option value="0" {{$subCategories->publicationStatus ==0?'selected':''}} > Unpublished </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group">
                    <label>Image</label><br>
                    <input type="file" name="subCategoryImage" accept="image/*">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"> Update </button>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<script>
    $(function(){
        //Submit Edit Category Modal
        $('form#edit-category-form').on('submit', function (e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                method: "POST",
                url: $(this).attr("action"),
                dataType: "json",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                success: function (message) {
                    if(message === 'success') {
                        Swal.fire({
                            type: 'success',
                            title: 'Information Update Successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $("#edit-category-form").trigger("reset");
                        $('#edit-subcategory-modal').modal('hide');
                        SubcategoryTable.ajax.reload();
                    }else {
                        $('#edit-subcategory-modal').modal('hide');
                        Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                      });
                    }
                }
            });
        });
    });
</script>
