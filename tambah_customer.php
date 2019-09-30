<?php 
    include('template/header.php') ;

?>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="customer.php">Customer</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<div class="text-center">
<h3>Tambah Data Customer</h3>
</div>
<div class="col-md-6 offset-md-3">
<form action="store_customer.php" method="post">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
    </div>
    <input type="submit" value="Simpan" class="btn btn-primary btn-block">
</form>
</div>
</div>