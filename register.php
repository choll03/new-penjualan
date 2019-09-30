<?php
    ob_start();
    session_start();

    if(isset($_SESSION['login'])){
        header("Location: index.php");
    }else{
        session_destroy();
    }
?>
<html>
<head>
    <title>Aplikasi Penjualan Helm</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <?php include('template/tema.php') ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="proses_register.php" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <input type="submit" value="Register" class="btn btn-outline-primary btn-block">
                </form>

                <a href="login.php">Login</a>

                </div>
        </div>
    </div>

    <?php if(isset($_SESSION['error'])){ ?>
        <p><?php echo $_SESSION['error'] ?></p>
    <?php } ?>
</body>
</html>