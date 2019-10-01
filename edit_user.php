<?php
    include('template/header.php');

    $id = $_GET['id'];

    $query = 'SELECT * FROM user WHERE id="'. $id .'"';

    $data = $db->query($query)->fetch_object();
?>

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="user.php">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
<div class="text-center">
<h3>Ubah Data User</h3>
</div>
<div class="col-md-6 offset-md-3">
<form action="update_user.php" method="post">

    <div class="form-group">
        <label>Nama</label>
        <input type="hidden" name="id" value="<?php echo $data->id ?>">
        <input type="text" name="nama" value="<?php echo $data->name ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Divisi</label>
        <select name="divisi" value="<?php echo $data->role ?>" class="form-control">
            <option value="KYT" <?php echo $data->role == "Administator" ? 'selected' : '' ?>>Administator</option>
            <option value="MDS" <?php echo $data->role == "Produksi" ? 'selected' : '' ?>>Produksi</option>
            <option value="NHK" <?php echo $data->role == "Staff" ? 'selected' : '' ?>>Staff</option>
        </select>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $data->username ?>" class="form-control" disabled>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>Ulang Passwod</label>
        <input type="text" name="password_confirm" value="" class="form-control">
    </div>
    <input type="submit" value="Simpan" class="btn btn-primary btn-block">
</form>
</div>
</div>