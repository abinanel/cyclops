<style>
    .bg-custom-color {
        background: linear-gradient(135deg,rgb(179, 226, 245),rgb(79, 195, 249)); /* warna biru gradasi */
    }

    .color-font {
        color: black;
    }
</style>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-custom-color" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Home
                </a> -->
                
                <?php
                    // Ambil informasi pengguna yang sedang login dari sesi
                    $loggedInUser = $this->session->userdata('logged_in_user');
                    $departmentId = isset($loggedInUser['department_id']) ? $loggedInUser['department_id'] : $loggedInUser['role'];
                ?>

                <div class="sb-sidenav-menu-heading">MENU</div>
                <a class="nav-link color-font" href="<?php echo site_url('admin') ?>">
                    <div class="sb-nav-link-icon"></div>
                    Home
                </a>
                <?php if ($departmentId == '5'): ?>
                    <!-- Menu khusus untuk departemen A -->
                    <a class="nav-link color-font" href="<?php echo site_url('admin/purchase-requests') ?>">
                        <div class="sb-nav-link-icon"></div>
                        Purchase Requests
                    </a>
                    <a class="nav-link color-font" href="<?php echo site_url('admin/receive-orders/list') ?>">
                        <div class="sb-nav-link-icon"></div>
                        Receiving Split Purchase Orders
                    </a>
                    <a class="nav-link collapsed color-font" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"></div>
                        Inventory Stock
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link color-font" href="<?php echo site_url('admin/cuti') ?>">Sample Page 2</a>
                        </nav>
                    </div>
                <?php elseif ($departmentId == '6'): ?>
                    <a class="nav-link color-font" href="<?php echo site_url('admin/approval-purchase-request/list') ?>">
                        <div class="sb-nav-link-icon"></div>
                        Approval Purchase Requests
                    </a>
                <?php elseif ($departmentId == 'supplier'): ?>
                    <a class="nav-link collapsed color-font" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsB" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"></div>
                        Transaction Incoming
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php
                // Ambil informasi pengguna yang sedang login dari sesi
                //$loggedInUser = $this->session->userdata('logged_in_user');

                // Tampilkan nama pengguna yang sedang login
                echo $loggedInUser['username']; // Anda perlu menyesuaikan ini dengan atribut yang sesuai dari pengguna
            ?>
        </div>
    </nav>
</div>