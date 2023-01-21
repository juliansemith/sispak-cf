<?php error_reporting(0); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hasil Analisis</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
            </div>
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gejala yang dipilih</h3>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                                <th style="width: 50px; background: #67CDFF; color:white">No</th>
                                <th style="background: #67CDFF; color:white">Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($listGejala->result() as $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->kode_gejala . " - " . $value->nama_gejala ?></td>
                                </tr>
                            <?php
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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hasil Diagnosa</h3>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                                <th style="width: 50px; background: #67CDFF; color:white">No</th>
                                <th style="background: #67CDFF; color:white">Kerusakan</th>
                                <th style="background: #67CDFF; color:white">Tingkat Kepercayaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($listKerusakan as $value) { ?>
                                <tr>
                                    <td width="30px"><?php echo $i++ ?></td>
                                    <td><?php echo $value['kode_kerusakan'] . " - " . $value['nama_kerusakan'] ?></td>
                                    <td><?php echo $value['kepercayaan'] ?> %</td>
                                </tr>
                            <?php } ?>
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

        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="font-size: 25px;"><b>Kesimpulan</b></h2>

            </div>
            <div class="card-body">
                <?php if (sizeof($listKerusakan) > 0) { ?>
                    <p>
                        Berdasarkan gejalanya, anda diprediksi mengalami kerusakan <b><?= $listKerusakan[0]['nama_kerusakan']; ?></b> dengan tingkat kepercayaan <b><?= $listKerusakan[0]['kepercayaan']; ?> %</b><br>
                        Keterangan : <b><?= $listKerusakan[0]['keterangan']; ?></b><br>
                        Solusi 1: <b><?= $listKerusakan[0]['solusi']; ?></b>. <br>
                        Solusi 2: <b><?= $listKerusakan[1]['solusi']; ?></b>. <br>
                        Solusi 3: <b><?= $listKerusakan[2]['solusi']; ?></b>. <br>
                        Solusi 4: <b><?= $listKerusakan[3]['solusi']; ?></b>. <br>
                    <p style="font-style: bold; color: red; font-size: 13px;">*Hasil diagnosa ini masih belum 100% akurat, silahkan datangi toko komputer untuk mendapatkan hasil yang lebih akurat.</p>
                    </p>
                <?php } else { ?>
                    <p>
                        Kerusakan ini tidak dapat diprediksi karena tingkat kepercayaan gejala terlalu rendah
                    </p>

                <?php } ?>
                <a class="btn btn-sm btn-primary" href="<?php echo site_url() ?>/user/diagnosa">Deteksi Ulang</a>

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