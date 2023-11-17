<div class="container" style="margin-top: 7rem !important">
    <h2 class="text-center">LOGIN</h2>
    <div class="card">
        <?php include(APPPATH . 'views/ecommerce/partials/alertMsg.php') ?>
        <div class="card-body p-5">
            <form action="<?= base_url('ecommerce/login/Sign_in/process_login') ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
