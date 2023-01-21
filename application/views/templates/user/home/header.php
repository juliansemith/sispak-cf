<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- CSS Native -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/style.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- ICON -->
    <link rel="icon" href="<?= base_url('public/dist/img/computer.jpg') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.css') ?>" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/sweetalert2/sweetalert2.min.css') ?>">
    <!-- Overlayy Scrollbars -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.css') ?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <h4 style="font-size: 17px; font-weight: bold;"><a href="<?= base_url('login') ?>"><i class="nav-icon fas fa-fw fa-sign-out-alt"></i>Masuk</a></h4>
            </ul>
        </nav>
        <!-- /.navbar -->