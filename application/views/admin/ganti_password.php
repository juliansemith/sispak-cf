<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><b>Ganti Password</b></h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == "sukses") {
                                    echo '<div class="alert alert-success">Password  Berhasil diganti.</div>';
                                }
                            }
                            ?>

                            <?= validation_errors(); ?>
                            <form action="<?= base_url('pakar/ganti_password_aksi'); ?>" method="post">
                                <div class="form-group">
                                    <label for="password_baru" class="font-weight-bold">Password Baru</label>
                                    <input type="password" class="form-control" name="password_baru" placeholder="Masukkan password baru">
                                </div>
                                <div class="form-group">
                                    <label for="password_ulang" class="font-weight-bold" for="password_ulang">Ulangi Password</label>
                                    <input type="password" class="form-control" name="password_ulang" placeholder="Ulangi password baru">
                                </div>

                                <input type="submit" class="btn btn-primary" value="Ubah Password">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>