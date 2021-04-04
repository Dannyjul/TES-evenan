<link rel="stylesheet" href="./css/payment.css">
<?php
    include './fungsional/konfig/header.php';
?>

<?php
    $mau = @$_GET['mau'];
    $i = @$_GET['k'];

    if ($mau=='paket') 
    {
       $tampil = $crud->tampilId("paket_member", "id_paket", $i);
       foreach ($tampil as $key) 
       {
           $nama = $key['nama_paket'];
           $harga= $key['harga_member'];
       }

       $transaksi = "Upgrade Membership ke-".$nama;
    }
    else
    {
       $tampil = $crud->tampilId('event', 'id_event', $i);
       foreach ($tampil as $key) 
       {
           $nama = $key['nama_event'];
           $harga= $key['harga_event'];

       }
       $transaksi = "Mengikuti Event ".$nama;
    }


    $biaya = "Rp ".formatRupiah($harga).",00";
?>
<div class="container container-payment">

    <div class="desc-trans">
        <h2>Transaksi: <?php echo $transaksi; ?> </h2>
    </div>

    <div class="container-card">
        <div class="card">
            <div class="card-header">
            BAYAR SEBELUM 16 FEBRUARI 2021 11:32PM
            </div>
            <div class="card-body">
            <h5 class="card-title harga"><?php echo $biaya; ?></h5>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                TRANSFER BANK
            </div>
            <div class="card-body">
                <img class="logo-bca" src="./img/logo-bca.png" alt="">
                <p class="card-text">No. Rekening: 012 043 3075</p>
                <p class="card-text">a.n. Klement Bonaventura Rahardja</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                KONFIRMASI
            </div>
            <div class="card-body">
                <h5 class="title-warning">Mohon Diperhatikan!</h5>

                <div class="warning">
                    <p>Pengiriman bukti transfer <span class="bold">WAJIB</span> dilakukan setelah <span class="bold">anda melakukan transfer</span>. Kami menyarankan untuk menyimpan / screenshot bukti transfer anda.</p>
                </div>

                <form action="?hal=konfirmasi-upload" method="post">
                    <input type="hidden" name="k" value="<?php echo $i; ?>"> 
                    <input type="hidden" name="mau" value="<?php echo $mau; ?>">
                    <input type="hidden" name="harga" value="<?php echo $harga; ?>">
                    <input type="hidden" name="transaksi" value="<?php echo $transaksi; ?>">

                    
                    <label for="">Nama Pemilik Rekening</label>
                    <input class ="input-box" type="text" name="nama" placeholder="Atas Nama" required>

                    <label for="">Nomor Rekening</label>
                    <input class ="input-box" type="number" name="norek" placeholder="No. Rekening" required>
                    
                    <button type="submit" class="confirm-pay" href="">Konfirmasi Pembayaran </button>

                </form>

            </div>

        </div>

    </div>

</div>


<?php
        include './fungsional/konfig/footer.php';
?>

