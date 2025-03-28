<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
    <style>
        /* Pastikan tinggi halaman penuh dan tata letak fleksibel */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding-top: 100px; /* Agar tidak bertumpuk dengan gambar */
        }

        .title {
            font-size: 26px;
            font-weight: bold;
            color: black;
            background-color: rgba(255, 255, 255, 0.7); /* Tambahkan latar belakang transparan */
            padding: 10px 20px;
            border-radius: 5px;
        }

        /* Kontainer utama agar konten mendorong footer ke bawah */
        .container {
            flex: 1; /* Mengisi ruang kosong agar footer tetap di bawah */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Pastikan footer tetap di bagian bawah */
        footer {
            margin-top: auto;
        }

        /* CSS untuk menengahkan elemen card */
        .card {
            width: 300px;
        }

        .card-header {
            text-align: center;
            background-color: rgb(193, 239, 255);
            color: black;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <span class="title">DAIKIN CYCLOPS (Cycle Loading Part System)</span>
    </div>

    <?php if($this->session->flashdata('message_login_error')): ?>
        <div class="invalid-feedback">
                <?= $this->session->flashdata('message_login_error') ?>
        </div>
    <?php endif ?>

	<div class="container mt-5">
        <div class="card" style="width: 300px; margin-top: -200px;">
            <div class="card-header">
                <h4 class="card-title">Login</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="mb-3">
                            <label for="name">Email/Username*</label>
                            <input type="text" name="username" class="form-control"
                                placeholder="Your username or email" value="<?= set_value('username') ?>" required />
                            <div class="invalid-feedback">
                                <?= form_error('username') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password*</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Enter your password" value="<?= set_value('password') ?>" required />
                            <div class="invalid-feedback">
                                <?= form_error('password') ?>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-primary me-2" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
    <?php $this->load->view("admin/_partials/footer.php") ?>
</body>

</html>