<div class="container-fluid" style="margin-top: 7rem !important">
    <div>
        <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="productModal" data-bs-keyboard="false" data-bs-backdrop="false">
            <div class="offcanvas-header">
                <h2 class="mb-4">New Product Page</h2>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
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

                <script>
                    function toggleWeightInput() {
                        var weightSelector = document.getElementById("weightSelector");
                        var manualWeightInput = document.getElementById("manualWeightInput");

                        if (weightSelector.value === "manual") {
                            manualWeightInput.style.display = "block";
                        } else {
                            manualWeightInput.style.display = "none";
                        }
                    }

                    async function fetchCountries() {
                        try {
                            const response = await fetch('https://restcountries.com/v3.1/all');
                            const countries = await response.json();

                            const countryDropdown = document.getElementById('countryOfManufacture');
                            countries.forEach(country => {
                                const option = document.createElement('option');
                                option.value = country.name.common;
                                option.textContent = country.name.common;
                                countryDropdown.appendChild(option);
                            });
                        } catch (error) {
                            console.error('Error fetching countries:', error);
                        }
                    }
                    fetchCountries();
                </script>
            </div>
        </div>


        <div class="d-flex justify-content-end mb-3 ">
            <button type="button" class="btn btn-success" data-bs-toggle="offcanvas" data-bs-target="#productModal" data-product-id="0">+ Add New Product</button>
        </div>
        <table class="table table-striped" style="width:100%">
            <?php include(APPPATH . 'views/ecommerce/partials/alertMsg.php') ?>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Photo</th>
                    <th>Product Status</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>From</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($product_list as $value) {
                ?>
                    <tr>
                        <td><?= $value->product_name ?></td>
                        <td>
                            <img class="rounded-circle" name="showImage" id="showImage" style="width: 75px; height: 75px;" src="<?= base_url('assets/product_image/' . $value->photo) ?>" alt="">
                        </td>
                        <td><?= $value->enable_product ?></td>
                        <td>RS <?= $value->price ?></td>
                        <td><?= $value->quantity ?></td>
                        <td><?= $value->country_of_manufacture ?></td>
                        <td>
                            <div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#productModal<?= $value->id ?>">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                        </td>
                    </tr>
                    <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="productModal<?= $value->id ?>" data-bs-keyboard="false" data-bs-backdrop="false">
                        <div class="offcanvas-header">
                            <h2 class="mb-4">Edit Product Page</h2>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="container-fluid mt-5">
                                <form method="post" action="<?= base_url('ecommerce/product/product/edit_product/'.$value->id) ?>" enctype="multipart/form-data">
                                    <fieldset class="border p-4">
                                        <legend class="w-auto">Product Information:</legend>
                                        <div class="form-group row">
                                            <label for="enableProduct" class="col-sm-2 col-form-label">Enable Product</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" value="<?=$value->enable_product?>" id="enableProduct" name="enableProduct">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="attributeSet" class="col-sm-2 col-form-label">Attribute Set</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" <?=$value->attribute_set?> id="attributeSet" name="attributeSet">
                                                    <option value="Default">Default</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?=$value->product_name?>" class="form-control" id="productName" name="productName">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?=$value->sku?>" class="form-control" id="sku" name="sku">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?=$value->price?>" class="form-control" id="price" name="price">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?=$value->quantity?>" class="form-control" id="quantity" name="quantity">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="stockStatus" class="col-sm-2 col-form-label">Stock Status</label>
                                            <div class="col-sm-10">
                                                <select value="<?=$value->stock_status?>" class="form-control" id="stockStatus" name="stockStatus">
                                                    <option value="in_stock">In Stock</option>
                                                    <option value="out_of_stock">Out of Stock</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="weight" class="col-sm-2 col-form-label">Weight lbs</label>
                                            <div class="col-sm-10">
                                                <select value="<?=$value->weight?>" class="form-control" id="weightSelector" name="weightSelector" onchange="toggleWeightInput()">
                                                    <option>No Weight</option>
                                                    <option value="manual">Manual Input</option>
                                                </select>
                                                <input id="manualWeightInput" type="text" class="form-control" id="weight" name="weight" style="display:none;">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="categories" class="col-sm-2 col-form-label">Categories</label>
                                            <div class="col-sm-10">
                                                <select value="<?=$value->categories?>" class="form-control" id="categories" name="categories">
                                                    <option value="Default">Default</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                                            <div  value="<?=$value->description?>" class="col-sm-10">
                                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                                            <div class="col-sm-10">
                                                <input value="<?= $value->photo?>" type="file" name="photo" class="form-control" id="photo">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="countryOfManufacture" class="col-sm-2 col-form-label">Country of Manufacture</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" value=<?= $value->country_of_manufacture?> id="countryOfManufacture" name="countryOfManufacture">
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

                            <script>
                                function toggleWeightInput() {
                                    var weightSelector = document.getElementById("weightSelector");
                                    var manualWeightInput = document.getElementById("manualWeightInput");

                                    if (weightSelector.value === "manual") {
                                        manualWeightInput.style.display = "block";
                                    } else {
                                        manualWeightInput.style.display = "none";
                                    }
                                }

                                async function fetchCountries() {
                                    try {
                                        const response = await fetch('https://restcountries.com/v3.1/all');
                                        const countries = await response.json();

                                        const countryDropdown = document.getElementById('countryOfManufacture');
                                        countries.forEach(country => {
                                            const option = document.createElement('option');
                                            option.value = country.name.common;
                                            option.textContent = country.name.common;
                                            countryDropdown.appendChild(option);
                                        });
                                    } catch (error) {
                                        console.error('Error fetching countries:', error);
                                    }
                                }
                                fetchCountries();
                            </script>
                        </div>
                    </div>
                <?php
                }
                ?>
            </tbody>

        </table>

        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo @$this->pagination->create_links(); ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <style>
            .pagination {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }

            .pagination a {
                color: #007bff;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color 0.3s;
                border: 1px solid #007bff;
                margin: 0 5px;
                border-radius: 4px;
            }

            .pagination a:hover {
                background-color: #007bff;
                color: #fff;
            }

            b,
            strong {
                font-weight: bolder;
                color: #000;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color 0.3s;
                border: 1px solid #007bff;
                margin: 0 5px;
                border-radius: 4px;
                background-color: green;
                color: #fff;
            }

            strong:hover {
                background-color: white;
                color: #000;
            }

            .pagination .active {
                background-color: #007bff;
                color: #fff;
                border: 1px solid #007bff;
            }
        </style>
    </div>