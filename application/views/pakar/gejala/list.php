<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Gejala</h1>
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
                <h3 class="card-title">Halaman Gejala</h3>

                <div class="btn-group float-right">
                    <button type="button" class="btn float-right btn-xs btn btn-primary" data-toggle="modal" data-target="#FormModal"><i class="fas fa-plus-circle mr-1"></i>Tambah Gejala</button>
                </div>
            </div>
            <div class="card-body">
                <?php if (empty($gejala)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan!
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari gejala.." name="keyword" id="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari</button>
                                    <a href="<?= base_url('gejala') ?>" class="btn btn-outline-danger">Reset</a>
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
                                <th>Kode Gejala</th>
                                <th>Gejala</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($gejala as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['kode_gejala']; ?></td>
                                    <td><?= $row['nama_gejala']; ?></td>
                                    <td>
                                        <a href="<?= base_url('gejala/edit/') ?><?= $row['id'] ?>" class="badge badge-info">Edit</a>
                                        <a href="<?= base_url('gejala/hapus/') ?><?= $row['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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
                <h5 class="modal-title" id="JudulModal">Tambah Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('gejala/tambah_aksi') ?>" method="post">
                    <div class="form-group">
                        <label for="kode_admin">Kode Gejala</label>
                        <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" placeholder="masukkan kode gejala.." required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Gejala</label>
                        <input type="text " class="form-control" id="nama_gejala" name="nama_gejala" placeholder="masukkan nama gejala.." required>
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