<?php
    ob_start();
    session_start();
    require('config/koneksi.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM user WHERE username="'. $username .'" AND password="'. $password .'" LIMIT 1';

    $result = $db->query($query);

    if($result->num_rows == 1)
    {
        $_SESSION['login'] = TRUE;
        $_SESSION['user'] = $result->fetch_object();

        header('Location: index.php');
    }
    else
    {
        $_SESSION['error'] = 'Username dan password salah';
        header('Location: login.php');
    }