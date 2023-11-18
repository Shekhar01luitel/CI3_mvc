<div class="container" style="margin-top: 7rem !important">
    <h2 class="text-center">Registration</h2>
    <div class="card">
        <?php include(APPPATH . 'views/ecommerce/partials/alertMsg.php') ?>
        <div class="card-body p-5">
            <form action="<?= base_url('ecommerce/login/registration/process_registration') ?>" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" id="terms" name="terms" class="form-check-input" required>
                    <label for="terms" class="form-check-label">I agree to the <a href="#">Terms of Service</a></label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registration</button>
                </div>
            </form>
        </div>
    </div>
</div>