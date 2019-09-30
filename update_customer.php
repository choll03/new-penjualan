<?php

    require('config/koneksi.php');

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $query = 'UPDATE customer SET nama="'.$nama.'", alamat="'.$alamat.'" WHERE id="'.$id.'"';
    echo $query;
    if($db->query($query) === TRUE)
    {
        header('Location: customer.php');
    }