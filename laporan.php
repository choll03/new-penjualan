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
<div class="container mt50">
<div class="text-center">
<h3>Laporan Penjualan Helm</h3>
</div>
<br>
<br>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>No transaksi</th>
        <th>Tanggal</th>
        <th>Customer</th>
        <th>Total</th>
    </tr>
    <tbody>
    <?php
        $total = 0;
        while($data = $result->fetch_object()){ 
            $total += $data->harga;   
        ?>

        <tr>
            <td><?php echo $i;$i++; ?></td>
            <td><a href="detail_faktur.php?id=<?php echo $data->id ?>"><?php echo $data->no_transaksi ?></a></td>
            <td><?php echo $data->tanggal ?></td>
            <td><?php echo $data->nama ?></td>
            <td align="right"><?php echo $data->harga ?></td>
        </tr>
    
    <?php } ?>
    </tbody>
    <tfoot class="bg-secondary">
        <tr>
            <td colspan="4" align="center">TOTAL</td>
            <td align="right"><?php echo $total ?></td>
        </tr>
    </tfoot>
</table>
</div>
<?php include('template/footer.php') ?>