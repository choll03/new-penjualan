<?php
    include('template/header.php');

    $id = $_GET['id'];

    $query = 'SELECT faktur.*, CONCAT("(",customer.kode, ") ",customer.nama) AS nama FROM faktur INNER JOIN customer ON faktur.customer_id = customer.id WHERE faktur.id="'. $id .'"';
    $query_detail = 'SELECT * FROM faktur_detail WHERE faktur_id="'. $id .'"';

    $data = $db->query($query)->fetch_object();

    $data_detail = $db->query($query_detail);

    $diskon = round(($data->diskon / $data->total)*100);

    $harga_diskon = $data->diskon;

    $total_bayar = $data->total - $harga_diskon;
?>

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="penjualan.php">Penjualan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</nav>
<div class="text-center">
<h3>Detail Data Penjualan</h3>
</div>
<table class="table">
    <tr>
        <td>No Transaksi</td>
        <td><?php echo $data->no_transaksi ?></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td><?php echo $data->tanggal ?></td>
    </tr>
    <tr>
        <td>Customer</td>
        <td><?php echo $data->nama ?></td>
    </tr>
</table>

<br><br>

<table class="table" style="text-align: center">
    <tr>
        <th>No</th>
        <th>Nama(Merk)</th>
        <th>jumlah</th>
        <th>Harga Satuan</th>
        <th>Harga</th>
    </tr>
    <?php 
        $i=1;
        while($row_detail = $data_detail->fetch_object()){
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row_detail->nama . " ( ". $row_detail->merk . " )" ?></td>
            <td><?php echo $row_detail->jumlah ?></td>
            <td align="right"><?php echo $row_detail->harga ?></td>
            <td align="right"><?php echo $row_detail->harga * $row_detail->jumlah ?></td>
        </tr>
    <?php 
            $i++;
        } 
    ?>
    <tr>
        <td colspan="4" align="right">Total</td>
        <td align="right"><?php echo $data->total ?></td>
    </tr>
    <tr>
        <td colspan="4" align="right">Diskon <?php echo $diskon ?> %</td>
        <td align="right"><?php echo $harga_diskon ?></td>
    </tr>
    <tr>
        <td colspan="4" align="right">Total Bayar</td>
        <td align="right"><?php echo $total_bayar ?></td>
    </tr>
</table>
</div>