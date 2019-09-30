<?php
    ob_start();
    session_start();
    require('config/koneksi.php');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = 'SELECT * FROM user WHERE username="'. $username .'"';

    if($db->query($user)->num_rows == 0){
        $query = 'INSERT INTO user VALUES("", "'.$name.'", "'.$username.'", "'.$password.'")';

        if ($db->query($query) === TRUE) 
        {
            $result = $db->query($user);
            $_SESSION['user'] = $result->fetch_object();
            $_SESSION['login'] = TRUE;
            header('Location: index.php');
        }
    }
    else
    {
        $_SESSION['error'] = 'Username sudah dipakai';
        header('Location: register.php');
    }