<?php

    require('config/koneksi.php');

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = 'UPDATE helm SET nama="'.$nama.'", merk="'.$merk.'", harga="'.$harga.'", stok="'.$stok.'" WHERE id="'.$id.'"';
    echo $query;
    if($db->query($query) === TRUE)
    {
        header('Location: barang.php');
    }