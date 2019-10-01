<?php

    require('config/koneksi.php');

    if($_POST['username']){
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $divisi = $_POST['divisi'];
        $password = $_POST['password'];

        $query = 'INSERT INTO user VALUES("", "'. $nama .'", "'. $username .'", "'. $password .'", "'. $divisi .'")';
        $query_user = 'SELECT * FROM user WHERE username="'. $username .'"';
        $result = $db->query($query_user);

        if($result->num_rows == 0){
            $db->query($query);
            header('Location: user.php');
        }
        else{
            echo "Username sudah digunakan<br>";
            echo "<a href='tambah_user.php'>Kembali</a>";
        }
    }
    else {
        header('Location: user.php');
    }