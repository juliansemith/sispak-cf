<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center bg-dark">
                            <h4><b>Edit Data Kerusakan</b></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url() . 'kerusakan'; ?>" class="btn btn-sm btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>Kembali</a><br>
                            <!-- form -->
                            <?php foreach ($kerusakan as $row) { ?>
                                <form action="<?= base_url('kerusakan/update'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="kode_kerusakan">Kode Kerusakan</label>
                                        <input type="hidden" value="<?= $row['id']; ?>" name="id">
                                        <input type="text" class="form-control" id="kode_kerusakan" name="kode_kerusakan" placeholder="masukkan kode kerusakan.." required="required" value="<?= $row['kode_kerusakan']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kerusakan">Nama Kerusakan</label>
                                        <input type="text" class="form-control" id="nama_kerusakan" name="nama_kerusakan" placeholder="masukkan nama kerusakan.." required="required" value="<?= $row['nama_kerusakan']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="masukkan keterangan.." required="required" value="<?= $row['keterangan']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="solusi">Solusi</label>
                                        <input type="text" class="form-control" id="solusi" name="solusi" placeholder="masukkan solusi.." required="required" value="<?= $row['solusi']; ?>">
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