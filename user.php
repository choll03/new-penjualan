<?php 
    include('template/header.php') ;

    $query = 'SELECT * FROM user';

    $result = $db->query($query);

    $i = 1;
?>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
</nav>
<div class="text-center">
    <h3>Data User</h3>
</div>
<a href="tambah_user.php" class="btn btn-primary">Tambah Data</a>
<br>
<br>
<table class="table text-center">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Divisi</th>
        <th>Action</th>
    </tr>
    <?php while($data = $result->fetch_object()){ ?>

        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $data->name ?></td>
            <td><?php echo $data->username ?></td>
            <td><?php echo $data->role ?></td>
            <td>
                <a href="edit_user.php?id=<?php echo $data->id ?>" class="btn btn-sm btn-warning">Ubah</a>
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
            window.location.href = 'hapus_user.php?id=' + id;
        }
    }
</script>