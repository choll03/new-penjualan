<?php

    require('config/koneksi.php');

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $query_select = 'SELECT * FROM customer ORDER BY id desc LIMIT 1';

    $kode = "CS-001";

    $customer = $db->query($query_select)->fetch_object();

    if(count($customer) > 0){
        $kode = explode("-", $customer->kode);
    
        $kode = $kode[0] . "-" . str_pad($kode[1] + 1, 3, '0', STR_PAD_LEFT);
    }


    $query = 'INSERT INTO customer VALUES("", "'.$nama.'", "'.$alamat.'", "'.$kode.'")';

    if($db->query($query) === TRUE)
    {
        header('Location: customer.php');
    }