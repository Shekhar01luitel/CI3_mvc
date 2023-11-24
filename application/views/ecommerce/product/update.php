<div class="container-fluid mt-5">
    <form method="post" action="<?= base_url('ecommerce/product/product/submit_product') ?>" enctype="multipart/form-data">
        <fieldset class="border p-4">
            <legend class="w-auto">Product Information:</legend>
            <div class="form-group row">
                <label for="enableProduct" class="col-sm-2 col-form-label">Enable Product</label>
                <div class="col-sm-10">
                    <select class="form-control" id="enableProduct" name="enableProduct">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="attributeSet" class="col-sm-2 col-form-label">Attribute Set</label>
                <div class="col-sm-10">
                    <select class="form-control" id="attributeSet" name="attributeSet">
                        <option value="Default">Default</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="productName" name="productName">
                </div>
            </div>

            <div class="form-group row">
                <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sku" name="sku">
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price">
                </div>
            </div>

            <div class="form-group row">
                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="quantity" name="quantity">
                </div>
            </div>

            <div class="form-group row">
                <label for="stockStatus" class="col-sm-2 col-form-label">Stock Status</label>
                <div class="col-sm-10">
                    <select class="form-control" id="stockStatus" name="stockStatus">
                        <option value="in_stock">In Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="weight" class="col-sm-2 col-form-label">Weight lbs</label>
                <div class="col-sm-10">
                    <select class="form-control" id="weightSelector" name="weightSelector" onchange="toggleWeightInput()">
                        <option>No Weight</option>
                        <option value="manual">Manual Input</option>
                    </select>
                    <input id="manualWeightInput" type="text" class="form-control" id="weight" name="weight" style="display:none;">
                </div>
            </div>

            <div class="form-group row">
                <label for="categories" class="col-sm-2 col-form-label">Categories</label>
                <div class="col-sm-10">
                    <select class="form-control" id="categories" name="categories">
                        <option value="Default">Default</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
            </div>

            <div class="form-group row">
                <label for="countryOfManufacture" class="col-sm-2 col-form-label">Country of Manufacture</label>
                <div class="col-sm-10">
                    <select class="form-control" id="countryOfManufacture" name="countryOfManufacture">
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>