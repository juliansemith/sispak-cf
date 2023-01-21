<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center bg-dark">
                            <h4><b>Edit Data Gejala</b></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url() . 'gejala'; ?>" class="btn btn-sm btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>Kembali</a><br>
                            <!-- form -->
                            <?php foreach ($gejala as $row) { ?>
                                <form action="<?= base_url('gejala/update'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="kode_gejala">Kode Gejala</label>
                                        <input type="hidden" value="<?= $row['id']; ?>" name="id">
                                        <input type="text " class="form-control" id="kode_gejala" name="kode_gejala" placeholder="masukkan kode gejala.." required="required" value="<?= $row['kode_gejala']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_gejala">Nama Gejala</label>
                                        <input type="text " class="form-control" id="nama_gejala" name="nama_gejala" placeholder="masukkan nama gejala.." required="required" value="<?= $row['nama_gejala']; ?>">
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