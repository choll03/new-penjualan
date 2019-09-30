<?php 
    include('template/header.php') ;

?>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="barang.php">Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<div class="text-center">
<h3>Tambah Data Helm</h3>
</div>
<div class="col-md-6 offset-md-3">
<form action="store_barang.php" method="post">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Merk</label>
        <select name="merk" class="form-control">
            <option value="KYT">KYT</option>
            <option value="MDS">MDS</option>
            <option value="NHK">NHK</option>
            <option value="GM">GM</option>
            <option value="VOG">VOG</option>
            <option value="GAG">GAG</option>
        </select>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" class="form-control">
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="text" name="stok" class="form-control">
    </div>
    <input type="submit" value="Simpan" class="btn btn-primary btn-block">
</form>
</div>
</div>