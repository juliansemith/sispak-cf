<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h2 mb-4 text-gray-800"><?= $title; ?></h1>
                    <hr width="30%" color="black" style="margin-left: 0;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12 mr-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= count($jumlah_gejala) ?></h3>

                            <p>Total Gejala</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-keyboard"></i>
                        </div>
                        <a href="<?= base_url(); ?>gejala" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= count($jumlah_kerusakan) ?></h3>

                            <p>Total Kerusakan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-desktop"></i>
                        </div>
                        <a href="<?= base_url(); ?>kerusakan" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>