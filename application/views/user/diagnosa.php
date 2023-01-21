<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Diagnosa</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Silahkan pilih gejala yang dialami.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <?php
                            $this->load->model(array('M_data'));
                            $listGejala = $this->M_data->getgejala();
                            foreach ($listGejala->result() as $value2) : ?>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="gejala[]" value="<?= $value2->id; ?>">
                                    <label for="" class="form-check-label"><?= $value2->kode_gejala . " - " . $value2->nama_gejala ?></label><br>
                                </div>
                            <?php endforeach; ?>

                            <button type="submit" name="submit" class="btn btn-primary">Proses</button>
                        </div>

                    </div>
                </form>


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