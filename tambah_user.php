<?php 
    include('template/header.php') ;

?>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="user.php">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<div class="text-center">
<h3>Tambah Data User</h3>
</div>
<div class="col-md-6 offset-md-3">
<form action="store_user.php" method="post">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Divisi</label>
        <select name="divisi" class="form-control">
            <option value="Administator">Administator</option>
            <option value="Produksi">Produksi</option>
            <option value="Staff">Staff</option>
        </select>
    </div>

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <input type="submit" value="Simpan" class="btn btn-primary btn-block">
</form>
</div>
</div>