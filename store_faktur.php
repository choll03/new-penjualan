<?php

    require('config/koneksi.php');

    if(isset($_POST['nama'])){
        $customer = $_POST['customer'];
        $stok = $_POST['stok'];
        $nama = $_POST['nama'];
        $qty = $_POST['qty'];
        $harga = $_POST['harga_real'];
        $merk = $_POST['merk'];
        $total = $_POST['total'];
        $diskon = $_POST['diskon'];

        $faktur_query = "SELECT * FROM faktur ORDER BY no_transaksi desc LIMIT 1";

        $faktur = $db->query($faktur_query);

        $kode = date("Ym") . "001";
        $tanggal = date("Y-m-d H:i:s");

        if($faktur->num_rows > 0) {
            $no_transaksi = $faktur->fetch_object()->no_transaksi;
            $kode_faktur = substr($no_transaksi, 0, 6);

            if(date("Ym") == $kode_faktur){
                $kode = $no_transaksi + 1;
            }
        }

        $faktur_insert_query = 'INSERT INTO faktur VALUES("", "'. $kode .'", "'. $tanggal .'", "'. $customer .'", "'. $total .'", "'. $diskon .'", "Lunas")';

        
        echo $faktur_insert_query;
        if($db->query($faktur_insert_query) === TRUE)
        {
            $faktur_id = $db->insert_id;

            foreach($nama as $id_barang => $value){

                $query_detail = 'INSERT INTO faktur_detail (`faktur_id`, `helm_id`, `nama`, `jumlah`, `harga`, `merk`) VALUES("'. $faktur_id .'", "'. $id_barang .'", "'. $value .'", "'. $qty[$id_barang] .'", "'. $harga[$id_barang] .'", "'. $merk[$id_barang] .'")';
                $db->query($query_detail);
                
                $query_barang = 'UPDATE helm SET stok="'. $stok[$id_barang] .'" WHERE id="' .$id_barang. '"';
                $db->query($query_barang);

            }

            header('Location: detail_faktur.php?id='. $faktur_id);
        }


    }else {
        header('Location: create_faktur.php');
    }
?>