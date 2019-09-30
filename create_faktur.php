<?php

    include('template/header.php');

    $query_customer = 'SELECT *, CONCAT("(", kode, ") ", nama) AS nama_customer FROM customer';
    $query_barang = "SELECT * FROM helm";

    $result_customer = $db->query($query_customer);
    $result_barang = $db->query($query_barang);

?>

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="penjualan.php">Penjualan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<div class="text-center">
<h3>Buat Faktur</h3>
</div>
<br>
<form action="store_faktur.php" method="post">
<div class="form-inline">
    <div class="form-group">
        <label>Pilih Customer</label>
        <select name="customer" class="form-control">
            <?php while($row_customer = $result_customer->fetch_object()){ ?>
                
                <option value="<?php echo $row_customer->id ?>"><?php echo $row_customer->nama_customer ?></option>

            <?php } ?>
        </select>
    </div>
</div>

<br>
<br>
<div class="row">
<div class="col-md-6">
<table class="table">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Merk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Action</th>
    </tr>
    <?php 
        $i =1;
        while($data = $result_barang->fetch_object()){ ?>

            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data->nama ?></td>
                <td><?php echo $data->merk ?></td>
                <td><?php echo $data->harga ?></td>
                <td>
                    <span id="view_stok_<?php echo $data->id ?>"><?php echo $data->stok ?></span>
                    <input type="hidden" name="stok[<?php echo $data->id ?>]" id="stok_<?php echo $data->id ?>" value="<?php echo $data->stok ?>">
                    <input type="hidden" name="harga_real[<?php echo $data->id ?>]" value="<?php echo $data->harga ?>">
                    <input type="hidden" name="merk[<?php echo $data->id ?>]" value="<?php echo $data->merk ?>">
                </td>
                <td>
                    <button type="button" onclick='increment(<?php echo json_encode($data) ?>)' class="btn btn-sm btn-success">+</button>
                    <button type="button" onclick='decrement(<?php echo json_encode($data) ?>)' class="btn btn-sm btn-danger">-</button>
                </td>
            </tr>
    
    <?php 
            $i++;
        } 
    ?>
</table>
</div>
<br><br>
<div class="col-md-6">

<table class="table">
    <thead>
        <tr>
            <td align="center">Nama</td>
            <td align="center">jumlah</td>
            <td align="center">Sub Total</td>
        </tr>
    </thead>
    <tbody id="cart">
    
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" align="right">Total</td>
            <td align="right">
                <span id="total">0</span>
                <input type="hidden" name="total" id="input_total" value="0">
            </td>
        </tr>
            <td colspan="2" align="right">
                Diskon <span id="diskon"></span>
            </td>
            <td align="right">
                <span id="diskon_harga">0</span>
                <input type="hidden" name="diskon" id="input_diskon_harga" value="0">
            </td>
        </tr>
        </tr>
            <td colspan="2" align="right">
                Total Bayar
            </td>
            <td align="right">
                <span id="total_bayar">0</span>
            </td>
        </tr>
    </tfoot>
</table>

    <input type="submit" value="Buat" class="btn btn-primary float-right">
</form>

</div>
</div>
</div>
<?php include('template/footer.php') ?>
<script>
    function increment(data){
        var exist = $("#cart").find('tr#barang_' + data.id);
        var stok = parseInt($("#stok_" + data.id).val()) -1;
        var total = parseInt($("#input_total").val());
        var diskon_harga = 0;
        var diskon = 0;

        if(stok < 0){
            alert("stok habis");
            return false;
        }

        $("#stok_"+data.id).val(stok);
        $("#view_stok_"+data.id).html(stok);

        total += parseInt(data.harga);
        
        $("#input_total").val(total);
        $("#total").html(total);

        if(total >= 1000000){
            diskon = 5;
        }else if(total >= 500000){
            diskon = 2;
        }

        diskon_harga = (total * diskon)/100;

        $("#input_diskon_harga").val(diskon_harga);
        $("#diskon_harga").html(diskon_harga);
        $("#diskon").html(diskon + " %");
        $("#total_bayar").html(total-diskon_harga);

        if(exist.length > 0){
            var qty = parseInt($("#input_qty_"+data.id).val()) + 1;
            var harga = parseInt(data.harga) * qty;


            $("#qty_"+data.id).html(qty);
            $("#input_qty_"+data.id).val(qty);

            $("#harga_"+data.id).html(harga);
            $("#input_harga_"+data.id).val(harga);


        }else{
            $("#cart").append("<tr id=\"barang_".concat(data.id, "\"><td>").concat(data.nama, "<input type=\"hidden\" value=\"").concat(data.nama, "\" name=\"nama[").concat(data.id, "]\"/></td><td align=\"right\"><span id=\"qty_").concat(data.id, "\">1</span><input type=\"hidden\" value=\"1\" id=\"input_qty_").concat(data.id, "\" name=\"qty[").concat(data.id, "]\"/></td><td align=\"right\"><span id=\"harga_").concat(data.id, "\">").concat(data.harga, "</span><input type=\"hidden\" value=\"").concat(data.harga, "\" id=\"input_harga_").concat(data.id, "\" name=\"harga[").concat(data.id, "]\"/></td></tr>"));

            // $("#cart").append(`
    
            //     <tr id="barang_${data.id}">
            //         <td>
            //             ${data.nama}
            //             <input type="hidden" value="${data.nama}" name="nama[${data.id}]"/>
            //         </td>
            //         <td align="right">
            //             <span id="qty_${data.id}">1</span>
            //             <input type="hidden" value="1" id="input_qty_${data.id}" name="qty[${data.id}]"/>
            //         </td>
            //         <td align="right">
            //             <span id="harga_${data.id}">${data.harga}</span>

            //             <input type="hidden" value="${data.harga}" id="input_harga_${data.id}" name="harga[${data.id}]"/>
            //         </td>
            //     </tr>
            
            // `);
        }
    }

    function decrement(data){
        var exist = $("#cart").find('tr#barang_' + data.id);

        if(exist.length <= 0){
            return false;
        }
        
        var stok = parseInt($("#stok_" + data.id).val()) +1;
        var total = parseInt($("#input_total").val());
        var diskon_harga = 0;
        var diskon = 0;

        $("#stok_"+data.id).val(stok);
        $("#view_stok_"+data.id).html(stok);

        total -= parseInt(data.harga);
        
        $("#input_total").val(total);
        $("#total").html(total);

        if(total >= 1000000){
            diskon = 5;
        }else if(total >= 500000){
            diskon = 2;
        }

        diskon_harga = (total * diskon)/100;

        $("#input_diskon_harga").val(diskon_harga);
        $("#diskon_harga").html(diskon_harga);
        $("#diskon").html(diskon + " %");
        $("#total_bayar").html(total-diskon_harga);

        if(exist.length > 0){
            var qty = parseInt($('#input_qty_' + data.id).val()) - 1;
            if(qty <= 0){
                $('#barang_' + data.id).remove();
            }else{
                var harga = parseInt(data.harga) * qty;
    
                $('#qty_' + data.id).html(qty);
                $('#input_qty_' + data.id).val(qty);
    
                $('#harga_' + data.id).html(harga);
                $('#input_harga_' + data.id).val(harga);
            }

        }
    }
</script>

