<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url() ?>"><img src="<?= base_url() ?>public/dist/img/computer.jpg" alt="" class="img-fluid" width="125px;"></a>
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>SIPMKK</b>|STMIK Horizon</a>
        </div>
    </div>
    <?php
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "gagal") {
            echo '<div class="alert alert-danger" role="alert">Login Gagal!.</div>';
        } else if ($_GET['alert'] == "belum_login") {
            echo '<div class="alert alert-danger" role="alert">Silahkan Login terlebih dahulu!</div>';
        } else if ($_GET['alert'] == "logout") {
            echo '<div class="alert alert-success" role="alert">Anda berhasil Logout!</div>';
        }
    }
    ?>
    <!-- login logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silahkan login terlebih dahulu</p>
            <?= validation_errors(); ?>
            <form action="<?= base_url('login/login_aksi'); ?>" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <label for="sebagai">Login sebagai :</label>
                    <select name="sebagai" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="pakar">Pakar</option>
                    </select>
                </div>

                <div class="row">
                    <!-- col -->
                    <div class="col-lg">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                    </div>
                    <!-- col -->
                </div>

            </form>
        </div>
        <!-- login card body -->
    </div>
    <div class="row">
        <div class="col-sm-12">

        </div>
    </div>
</div>