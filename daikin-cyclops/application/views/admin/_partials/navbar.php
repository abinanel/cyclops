<head>
    <style>
        .bg-cyclops {
            background: linear-gradient(135deg,rgb(179, 226, 245),rgb(79, 195, 249)); /* warna biru gradasi */
            color: white;
        }
    </style>
</head>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-cyclops">
    <!-- Navbar Brand-->
    <!-- <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a> bg-dark-->
    <a class="navbar-brand ps-3" href="<?php echo site_url('admin') ?>">
        <img src="<?= base_url('assets/img/daikin_login_v2.png') ?>" alt="Logo" style="width: 100px; height: 50px; margin-bottom: -50px; margin-left: 0px;">
        <span style="display: flex; font-size: 17px; font-weight: bold; color:rgb(255, 255, 255); margin-bottom: 30px; margin-left: 100px;">CYCLOPS</span>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="margin-left: -30px;"><i class="fas fa-bars" style="color: black;"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <!-- <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div> -->
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>