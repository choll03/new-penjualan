<?php 
    include('template/header.php');

    $query = 'SELECT 
            faktur.*,
            (faktur.total - faktur.diskon) AS harga, 
            CONCAT("(",customer.kode, ") ",customer.nama) AS nama 
            FROM faktur 
            INNER JOIN customer ON faktur.customer_id = customer.id 
            ORDER BY tanggal DESC';

    $result = $db->query($query);

    $i = 1;

?>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
    </ol>
</nav>
<div class="text-center">
    <h3>Data Penjualan Helm</h3>
</div>
<a href="create_faktur.php" class="btn btn-primary">Tambah Data</a>

<br>
<br>
<table class="table">
    <tr>
        <th>No</th>
        <th>No transaksi</th>
        <th>Tanggal</th>
        <th>Customer</th>
        <th>Total</th>
        <th>Status Bayar</th>
        <th>Action</th>
    </tr>
    <?php while($data = $result->fetch_object()){ ?>

        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><?php echo $data->no_transaksi ?></td>
            <td><?php echo $data->tanggal ?></td>
            <td><?php echo $data->nama ?></td>
            <td align="right"><?php echo $data->harga ?></td>
            <td align="center"><?php echo $data->status_bayar ?></td>
            <td align="center">
                <a href="detail_faktur.php?id=<?php echo $data->id ?>">Lihat</a>
            </td>
        </tr>
    
    <?php } ?>
</table>
</div>
<?php include('template/footer.php') ?>