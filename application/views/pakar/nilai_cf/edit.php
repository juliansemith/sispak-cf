<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center bg-dark">
                            <h4><b>Edit Nilai CF</b></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url() . 'nilai_cf'; ?>" class="btn btn-sm btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>Kembali</a><br>
                            <!-- form -->

                            <form action="<?= base_url('nilai_cf/update'); ?>" method="post">
                                <div class="form-group">
                                    <label for="gejala">Gejala</label>
                                    <input type="hidden" value="<?= $nilai_cf['ncid']; ?>" name="id">
                                    <select name="gejala_id" id="" class="form-control">
                                        <?php
                                        foreach ($gejala as $g) : ?>
                                            <option value="<?= $g['id'];
                                                            $nilai_cf['gejala_id'] == $g['id'] ? 'selected' : ''; ?>"><?= $g['nama_gejala']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kerusakan">Kerusakan</label>
                                    <select name="kerusakan_id" id="" class="form-control">
                                        <?php
                                        foreach ($kerusakan as $k) : ?>
                                            <option value="<?= $k['id'];
                                                            $nilai_cf['kerusakan_id'] == $k['id'] ? 'selected' : ''; ?>"><?= $k['nama_kerusakan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="md">Nilai MD</label>
                                    <input type="text " class="form-control" id="md" name="md" value="<?= $nilai_cf['md']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="mb">Nilai MB</label>
                                    <input type="text " class="form-control" id="mb" name="mb" value="<?= $nilai_cf['mb']; ?>">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>