<div class="container-fluid" style="margin-top: 7rem !important">
    <?php include(APPPATH . 'views/ecommerce/partials/alertMsg.php') ?>
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .product-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <?php
    ?>
    <div class="container">
        <div class="row">
            <?php
            $counter = 0;

            foreach ($product_list as $key => $value) {

                if ($counter % 4 == 3) {
            ?>
                    <div class="col-md-12">
                        <div class="card product-card">
                            <div class="product-image">
                                <img src="<?= base_url('assets/product_image/') . $value->photo ?>" alt="Product Image" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $value->product_name ?></h5>
                                <p class="card-text"><?= $value->description ?></p>
                                <p class="card-text text-muted">Price: RS <?= $value->price ?></p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <!-- 1 product in this formate -->
                <?php
                } else { ?>
                    <div class="col-md-4">
                        <div class="card product-card">
                            <div class="product-image">
                                <img src="<?= base_url('assets/product_image/') . $value->photo ?>" alt="Product Image" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $value->product_name ?></h5>
                                <p class="card-text"><?= $value->description ?></p>
                                <p class="card-text text-muted">Price: RS <?= $value->price ?></p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
            <?php
                }

                $counter++;
            }
            ?>
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
    </div>
</div>