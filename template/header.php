<?php
    ob_start();
    session_start();

    require_once('config/koneksi.php');

    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }
    $user = $_SESSION['user'];

    $url = str_replace(".php","",basename($_SERVER['REQUEST_URI']));
    
?>
<html>
<head>
    <title>Aplikasi Penjualan Helm</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="style.css">
    <?php include('tema.php') ?>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand light">
                Selamat Datang <?php echo $user->name ?> ( <?php echo $user->role ?> )
            </a>
            <ul class="navbar-nav">
                <li class="nav-item <?php echo $url == 'index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item <?php echo $url == 'penjualan' ? 'active' : '' ?>">
                    <a class="nav-link" href="penjualan.php">Penjualan</a>
                </li>
                <li class="nav-item <?php echo $url == 'barang' ? 'active' : '' ?>">
                    <a class="nav-link" href="barang.php">Stok Barang</a>
                </li>
                <li class="nav-item <?php echo $url == 'customer' ? 'active' : '' ?>">
                    <a class="nav-link" href="customer.php">Customer</a>
                </li>
                <li class="nav-item <?php echo $url == 'laporan' ? 'active' : '' ?>">
                    <a class="nav-link" href="laporan.php">Laporan Penjualan</a>
                </li>
                <li class="nav-item <?php echo $url == 'user' ? 'active' : '' ?>">
                    <a class="nav-link" href="user.php">User</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>