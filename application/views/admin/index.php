<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <div class="col-sm-8 mx-auto">
                    <h1>Selamat Datang, <b><?= $user['nama']; ?>!</b></h1>
                    <p>Sistem Pakar Mendiagnosa Kerusakan Komputer Berbasis Web</p>
                    <p>STMIK Horizon Karawang</p>

                    Anda telah login sebagai <b><?= $this->session->userdata('username'); ?></b> [Pakar].
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>