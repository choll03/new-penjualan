<?php 
    include('template/header.php') ;

    $query = 'SELECT * FROM helm';

    $result = $db->query($query);

    $i = 1;
?>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item active" aria-current="page">Barang</li>
    </ol>
</nav>
<div class="text-center">
    <h3>Data Stok Helm</h3>
</div>
<a href="tambah_barang.php" class="btn btn-primary">Tambah Data</a>
<br>
<br>
<table class="table text-center">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Merk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Action</th>
    </tr>
    <?php while($data = $result->fetch_object()){ ?>

        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $data->nama ?></td>
            <td><?php echo $data->merk ?></td>
            <td><?php echo $data->harga ?></td>
            <td><?php echo $data->stok ?></td>
            <td>
                <a href="edit_barang.php?id=<?php echo $data->id ?>" class="btn btn-sm btn-warning">Ubah</a>
                <a href="javascript:" onclick="deleteBarang(<?php echo $data->id ?>)" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
    
    <?php } ?>
</table>
</div>
<script>
    function deleteBarang(id){
        var ok = confirm("Anda yakin ingin menghapus data ini?");

        if(ok){
            window.location.href = 'hapus_barang.php?id=' + id;
        }
    }
</script>