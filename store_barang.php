<?php

    require('config/koneksi.php');

    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = 'INSERT INTO helm VALUES("", "'.$nama.'", "'.$merk.'", "'.$harga.'", "'.$stok.'")';

    if($db->query($query) === TRUE)
    {
        header('Location: barang.php');
    }