<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="stylesheet" href="<?= base_url('public/dist/css/style.css') ?>">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- ICON -->
    <link rel="icon" href="<?= base_url('public/dist/img/computer.jpg') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.css') ?>" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Overlayy Scrollbars -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.css') ?>">

    <style type="text/css">
        @media print and (width: 8.5in) and (height: 11in) {
            @page {
                margin: 0cm;

            }
        }

        .justify {
            text-align: justify;
        }

        .table {
            border-collapse: collapse;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            text-align: center;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }

        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -20px;
        }

        #lead {
            width: auto;
            position: relative;
            margin: 15px 0 0 55%;
        }
    </style>
    <style>
        @page {
            /* size: portrait; */
            size: auto;
            margin: 0mm;
        }

        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body class="A4 potrait">
    <img src="<?= base_url(); ?>public/dist/img/computer.jpg" style="position: absolute; width:85px; height:auto; margin-top:30px; margin-left:20px;">
    <center>
        <font size="5px"><b>ALFA COMPUTER CIKAMPEK</b></font><br />
        <font size="5px"><b>KABUPATEN KARAWANG</b></font><br />
        <font size="4px"><b>Alamat : Sarimulya, Kec. Kotabaru., Kabupaten Karawang, Jawa Barat 41314. </b></font><br />
    </center>
    <hr size="1px" color="black">
    <center>
        <font size="5px"><b>LAPORAN DATA GEJALA</b></font>
        <hr width="400px">
        <div>
            Berikut dibawah ini adalah hasil rekapitulasi dari Data Gejala.
        </div>
    </center>

    <br>
    <table class="table table-hovered">
        <tr>
            <th>No</th>
            <th>Kode Gejala</th>
            <th>Nama Gejala</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($gejala as $row) : ?>
            <tr>
                <td class="text-center" width="20"><?= $no; ?></td>
                <td><?= $row['kode_gejala']; ?></td>
                <td><?= $row['nama_gejala']; ?></td>
            </tr>
        <?php
            $no++;
        endforeach; ?>
    </table>
    <div class="ttd" style="margin-top: 30%;">
        <div style="width: 50%; text-align:center; float:right;">Karawang, 29 Juni 2022</div><br>
        <div style="width: 50%; text-align:center; float:right;"><b>TEKNISI</b></div><br><br><br><br>
        <div style="width: 50%; text-align:center; float:right; text-decoration:underline"><b>ALFAN SAEPULLOH</b></div><br>
    </div>

    <script type="text/javascript">
        window.print();

        var dt = new Date();
        document.getElementById("tanggal").innerHTML = dt.toLocaleDateString();
    </script>


</body>

</html>