<div class="offcanvas offcanvas-start w-70" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title d-none d-sm-block" id="offcanvas">Menu</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start text-uppercase" id="menu">
            <?php foreach ($menu as $key => $value) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('ecommerce/' . $key) ?>" class="nav-link text-truncate">
                        <i class="fs-5 bi-house"></i><span class="ms-1 "><?= $value[0] ?></span>
                    </a>
                    <?php if (count($value) > 1) : ?>
                        <ul class="submenu">
                            <?php foreach ($value['submenu1'] as $submenuItem) : ?>
                                <?php $submenuItem_url = str_replace(" ", "-", $submenuItem) ?>
                                <li><a href="<?= base_url('ecommerce/' . $key . '/' . $submenuItem_url) ?>"><?= $submenuItem ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<button class="btn float-start" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
    <i class="fas fa-bars ms-1"></i>
</button>