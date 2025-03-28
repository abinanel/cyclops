<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_partials/head.php") ?>
    </head>
    <body class="sb-nav-fixed">
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <div id="layoutSidenav">
            <?php $this->load->view("admin/_partials/sidebar.php") ?>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">SELAMAT DATANG DI DAIKIN CYCLOPS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Cycle Loading Part System</li>
                        </ol>
                    </div>
                </main>
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
            
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <script src="https://unpkg.com/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('js/scripts.js') ?>"></script>
    </body>
</html>
