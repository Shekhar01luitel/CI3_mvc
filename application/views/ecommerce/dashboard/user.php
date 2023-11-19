<div class="container" style="margin-top: 7rem !important">
    <div class="row">
        <div class="col-md-12 col-12 mx-auto">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center" colspan="2">Super Admin</th>
                        </th>
                    </thead>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($super_admin as $user) : ?>
                            <tr>
                                <td><a href="<?= base_url('ecommerce/profile') ?>/<?= $user->id ?>"><?= $user->name ?></a></td>
                                <td><a href="<?= base_url('ecommerce/profile') ?>/<?= $user->id ?>"><?= $user->email ?></a></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Admin Table -->
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center" colspan="2">Admin</th>
                    </thead>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admin as $user) : ?>
                            <tr>
                                <td><a href="<?= base_url('ecommerce/profile') ?>/<?= $user->id ?>"><?= $user->name ?></a></td>
                                <td><a href="<?= base_url('ecommerce/profile') ?>/<?= $user->id ?>"><?= $user->email ?></a></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- User Table -->
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center" colspan="2">User</th>
                    </thead>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><a href="<?= base_url('ecommerce/profile') ?>/<?= $user->id ?>"><?= $user->name ?></a></td>
                                <td><a href="<?= base_url('ecommerce/profile') ?>/<?= $user->id ?>"><?= $user->email ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>