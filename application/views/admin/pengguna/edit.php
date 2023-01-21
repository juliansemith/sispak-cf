<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center bg-dark">
                            <h4><b>Edit Data Pengguna</b></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url() . 'pengguna'; ?>" class="btn btn-sm btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>Kembali</a><br>
                            <!-- form -->
                            <?php foreach ($pengguna as $row) { ?>
                                <form action="<?= base_url('pengguna/update'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="kode_user">Kode User</label>
                                        <input type="text" class="form-control" id="kode_user" name="kode_user" placeholder="masukkan kode kerusakan.." required="required" value="<?= $row['kode_user']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username.." required="required" value="<?= $row['username']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama.." required="required" value="<?= $row['nama']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="font-weight-bold">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">--Pilih Level--</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Pakar">Pakar</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>