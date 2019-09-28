<div class="modal fade" id="create-stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Product Stock</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open([ 'url' => 'product/product-stock/create','method' => 'post','files'=>true]) !!}
        <div class="modal-body">
            <div class="row">
                <!-- Product -->
                <div class="col-12 col-sm-6">
                    <div class=" form-group">
                        <label>Select Product <span class="text-danger">*<span> </label>
                        <select name="product_id" class=" form-control" required >
                            <option value = "" >Select Product</option>
                            @foreach($products as $product)
                            <option value = "{{$product->id}}" >{{$product->productName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Product Size -->
                <div class="col-12 col-sm-6">
                    <div class=" form-group">
                        <label>Product Size <span class="text-danger">*<span></label>
                        <input type="text" name="size" class="form-control" placeholder="product size">
                    </div>
                </div>

                <!-- Product Color -->
                <div class="col-12 col-sm-4">
                    <div class=" form-group">
                        <label>Product Color</label>
                        <input type="text" name="color" class="form-control" placeholder="product Color">
                    </div>
                </div>

                <!-- Product Srock -->
                <div class="col-12 col-sm-4">
                    <div class=" form-group">
                        <label>Available Stock <span class="text-danger">*<span></label>
                        <input type="number" min="1" max="10000" value="1" name="stock" class="form-control" placeholder="product Stock">
                    </div>
                </div>

                <!-- Product Image -->
                <div class="col-12 col-sm-4">
                    <div class=" form-group">
                        <label>Product Image <span class="text-danger">*<span></label>
                        <input type="file" name="image" accept="image/*" required >
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm submit">Add Stock</button>
        </div>
        {!! Form::close()!!}
        </div>
    </div>
</div>