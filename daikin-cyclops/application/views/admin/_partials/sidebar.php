<style>
    .bg-custom-color {
        background-color:rgb(193, 239, 255); /* Warna oranye dengan kodergb(135, 228, 242) */
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
                <div class="sb-sidenav-menu-heading">MENU</div>
                <a class="nav-link color-font" href="<?php echo site_url('admin') ?>">
                    <div class="sb-nav-link-icon"></div>
                    Home
                </a>
                <a class="nav-link collapsed color-font" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"></div>
                    Sample menu 1
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link color-font" href="<?php echo site_url('admin/cuti') ?>">Sample Page 1</a>
                    </nav>
                </div>
                <!-- <a class="nav-link color-font" href="<?php echo site_url('admin/penyedia') ?>">
                    <div class="sb-nav-link-icon"></div>
                    Data Penyedia (Kontrak)
                </a> -->
                <a class="nav-link collapsed color-font" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"></div>
                    Sample Menu 2
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <!-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link color-font" href="<?php echo site_url('admin/progres') ?>">Laporan Prestasi Pekerjaan</a>
                        <a class="nav-link color-font" href="<?php echo site_url('admin/monitoring') ?>">Laporan Monitoring</a>
                    </nav>
                </div> -->
                <!-- <a class="nav-link color-font" href="<?php echo site_url('admin/progres') ?>">
                    <div class="sb-nav-link-icon"></div>
                    Laporan Prestasi Pekerjaan
                </a>
                <a class="nav-link color-font" href="<?php echo site_url('admin/monitoring') ?>">
                    <div class="sb-nav-link-icon"></div>
                    Laporan Monitoring
                </a>
                <a class="nav-link collapsed color-font" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed color-font" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link color-font" href="login.html">Login</a>
                                <a class="nav-link color-font" href="register.html">Register</a>
                                <a class="nav-link color-font" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed color-font" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link color-font" href="401.html">401 Page</a>
                                <a class="nav-link color-font" href="404.html">404 Page</a>
                                <a class="nav-link color-font" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> -->
                <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> -->
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php
                // Ambil informasi pengguna yang sedang login dari sesi
                $loggedInUser = $this->session->userdata('logged_in_user');

                // Tampilkan nama pengguna yang sedang login
                echo $loggedInUser['username']; // Anda perlu menyesuaikan ini dengan atribut yang sesuai dari pengguna
            ?>
        </div>
    </nav>
</div>