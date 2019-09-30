<?php
    include('template/header.php');

    $id = $_GET['id'];

    $query = 'SELECT * FROM customer WHERE id="'. $id .'"';

    $data = $db->query($query)->fetch_object();
?>

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="customer.php">Customer</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
<div class="text-center">
<h3>Ubah Data Customer</h3>
</div>
<div class="col-md-6 offset-md-3">
<form action="update_customer.php" method="post">
    <div class="form-group">
        <label>Kode</label>
        <input type="hidden" name="id" class="form-control" value="<?php echo $data->id ?>">
        <input type="text" name="kode" class="form-control" disabled value="<?php echo $data->kode ?>">
    </div>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $data->nama ?>">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">
            <?php echo $data->alamat ?>
        </textarea>
    </div>
    <input type="submit" value="Simpan" class="btn btn-primary btn-block">
</form>
</div>
</div>
