<?php
    include('template/header.php');

    $id = $_GET['id'];

    $query = 'SELECT * FROM helm WHERE id="'. $id .'"';

    $data = $db->query($query)->fetch_object();
?>

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="barang.php">Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
<div class="text-center">
<h3>Ubah Data Helm</h3>
</div>
<div class="col-md-6 offset-md-3">
<form action="update_barang.php" method="post">

    <div class="form-group">
        <label>Nama</label>
        <input type="hidden" name="id" value="<?php echo $data->id ?>">
        <input type="text" name="nama" value="<?php echo $data->nama ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Merk</label>
        <select name="merk" value="<?php echo $data->merk ?>" class="form-control">
            <option value="KYT" <?php echo $data->merk == "KYT" ? 'selected' : '' ?>>KYT</option>
            <option value="MDS" <?php echo $data->merk == "MDS" ? 'selected' : '' ?>>MDS</option>
            <option value="NHK" <?php echo $data->merk == "NHK" ? 'selected' : '' ?>>NHK</option>
            <option value="GM" <?php echo $data->merk == "GM" ? 'selected' : '' ?>>GM</option>
            <option value="VOG" <?php echo $data->merk == "VOG" ? 'selected' : '' ?>>VOG</option>
            <option value="GAG" <?php echo $data->merk == "GAG" ? 'selected' : '' ?>>GAG</option>
        </select>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" value="<?php echo $data->harga ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="text" name="stok" value="<?php echo $data->stok ?>" class="form-control">
    </div>
    <input type="submit" value="Simpan" class="btn btn-primary btn-block">
</form>
</div>
</div>