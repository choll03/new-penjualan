<?php 
    include('template/header.php') ;

    $query = 'SELECT * FROM customer';

    $result = $db->query($query);

    $i = 1;
?>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item active" aria-current="page">Customer</li>
    </ol>
</nav>
<div class="text-center">
    <h3>Data Customer</h3>
</div>
<a href="tambah_customer.php" class="btn btn-primary">Tambah Data</a>
<br>
<br>
<table class="table text-center">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Action</th>
    </tr>
    <?php while($data = $result->fetch_object()){ ?>

        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $data->kode ?></td>
            <td><?php echo $data->nama ?></td>
            <td><?php echo $data->alamat ?></td>
            <td>
                <a href="edit_customer.php?id=<?php echo $data->id ?>" class="btn btn-sm btn-warning">Ubah</a>
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
            window.location.href = 'hapus_customer.php?id=' + id;
        }
    }
</script>