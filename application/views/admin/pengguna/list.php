<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengguna</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Halaman Pengguna</h3>

                <div class="btn-group float-right">
                    <button type="button" class="btn float-right btn-xs btn btn-primary" data-toggle="modal" data-target="#FormModal"><i class="fas fa-plus-circle mr-1"></i>Tambah Pengguna</button>
                </div>
            </div>
            <div class="card-body">
                <?php if (empty($pengguna)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan!
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari pengguna.." name="keyword" id="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari</button>
                                    <a href="<?= base_url('pengguna') ?>" class="btn btn-outline-danger">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Kode User</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pengguna as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['kode_user']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['level']; ?></td>
                                    <td>
                                        <a href="<?= base_url('pengguna/edit/') ?><?= $row['kode_user'] ?>" class="badge badge-info">Edit</a>
                                        <a href="<?= base_url('pengguna/hapus/') ?><?= $row['kode_user'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
        
        </div> -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="JudulModal">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pengguna/tambah_aksi') ?>" method="post">
                    <div class="form-group">
                        <label for="kode_admin">Kode User</label>
                        <input type="text" class="form-control" id="kode_user" name="kode_user" placeholder="masukkan kode user.." required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text " class="form-control" id="nama" name="nama" placeholder="masukkan nama lengkap.." required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text " class="form-control" id="username" name="username" placeholder="masukkan username.." required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text " class="form-control" id="password" name="password" placeholder="masukkan password.." required>
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="">--Pilih Level--</option>
                            <option value="Admin">Admin</option>
                            <option value="Pakar">Pakar</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>