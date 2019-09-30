<?php

    require('config/koneksi.php');

    $id = $_GET['id'];

    $query = 'DELETE FROM customer WHERE id="'. $id .'"';

    if($db->query($query) === TRUE)
    {
        header('Location: customer.php');
    }