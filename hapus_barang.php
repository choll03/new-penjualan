<?php

    require('config/koneksi.php');

    $id = $_GET['id'];

    $query = 'DELETE FROM helm WHERE id="'. $id .'"';

    if($db->query($query) === TRUE)
    {
        header('Location: barang.php');
    }