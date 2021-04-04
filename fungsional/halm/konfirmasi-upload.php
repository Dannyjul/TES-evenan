<link rel="stylesheet" href="./css/payment.css">
<?php

include './fungsional/konfig/header.php';

$id = $_POST['k'];
$mau = $_POST['mau'];

$norek = $_POST['norek'];
$nama  = $_POST['nama'];
$harga = $_POST['harga'];
$trans = $_POST['transaksi'];

$hargaRp = "Rp " . formatRupiah($harga) . ",00";

?>
<div class="container container-payment">

        <div class="desc-trans">
        <h2>Transaksi: <?php echo $trans; ?></h2>
        </div>

        <div class="container-card">
        <div class="card">
            <div class="card-header">
            BAYAR SEBELUM 16 FEBRUARI 2021 11:32PM
            </div>
            <div class="card-body">
            <h5 class="card-title harga"><?php echo $hargaRp; ?></h5>
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
            UNGGAH BUKTI TRANSFER
            </div>
            <div class="card-body">
            <h5 class="title-warning">Mohon Diperhatikan!</h5>

            <div class="warning">
                <p>Pengiriman bukti transfer <span class="bold">WAJIB</span> dilakukan setelah <span class="bold">anda melakukan transfer</span>. Kami menyarankan untuk menyimpan / screenshot bukti transfer anda.</p>
            </div>

            <form action="?hal=konfirmasi-respon" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="k" value="<?php echo $id; ?>">
                <input type="hidden" name="mau" value="<?php echo $mau; ?>">
                <input type="hidden" name="harga" value="<?php echo $harga; ?>">
                <input type="hidden" name="transaksi" value="<?php echo $trans; ?>">
                

                <label for="">Bank Asal</label>
                <select class ="input-box" name="bank" required>
                <option value="">Bank Asal</option>
                <option value="Bank Mandiri">Bank Mandiri</option>
                <option value="Bank Bukopin">Bank Bukopin</option>
                <option value="Bank Danamon">Bank Danamon</option>
                <option value="Bank Mega">Bank Mega</option>
                <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                <option value="Bank Permata">Bank Permata</option>
                <option value="Bank Sinarmas">Bank Sinarmas</option>
                <option value="Bank QNB">Bank QNB</option>
                <option value="Bank Lippo">Bank Lippo</option>
                <option value="Bank UOB">Bank UOB</option>
                <option value="Panin Bank">Panin Bank</option>
                <option value="Citibank">Citibank</option>
                <option value="Bank ANZ">Bank ANZ</option>
                <option value="Bank Commonwealth">Bank Commonwealth</option>
                <option value="Bank Maybank">Bank Maybank</option>
                <option value="Bank Maspion">Bank Maspion</option>
                <option value="Bank J Trust">Bank J Trust</option>
                <option value="Bank QNB">Bank QNB</option>
                <option value="Bank KEB Hana">Bank KEB Hana</option>
                <option value="Bank Artha Graha">Bank Artha Graha</option>
                <option value="Bank OCBC NISP">Bank OCBC NISP</option>
                <option value="Bank MNC">Bank MNC</option>
                <option value="Bank DBS">Bank DBS</option>
                <option value="BCA">BCA</option>
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
                <option value="BTN">BTN</option>
                <option value="Bank DKI">Bank DKI</option>
                <option value="Bank BJB">Bank BJB</option>
                <option value="Bank BPD DIY">Bank BPD DIY</option>
                <option value="Bank Jateng">Bank Jateng</option>
                <option value="Bank Jatim">Bank Jatim</option>
                <option value="Bank BPD Bali">Bank BPD Bali</option>
                <option value="Bank Sumut">Bank Sumut</option>
                <option value="Bank Nagari">Bank Nagari</option>
                <option value="Bank Riau Kepri">Bank Riau Kepri</option>
                <option value="Bank Sumsel Babel">Bank Sumsel Babel</option>
                <option value="Bank Lampung">Bank Lampung</option>
                <option value="Bank Jambi">Bank Jambi</option>
                <option value="Bank Kalbar">Bank Kalbar</option>
                <option value="Bank Kalteng">Bank Kalteng</option>
                <option value="Bank Kalsel">Bank Kalsel</option>
                <option value="Bank Kaltim">Bank Kaltim</option>
                <option value="Bank Sulsel">Bank Sulsel</option>
                <option value="Bank Sultra">Bank Sultra</option>
                <option value="Bank BPD Sulteng">Bank BPD Sulteng</option>
                <option value="Bank Sulut">Bank Sulut</option>
                <option value="Bank NTB">Bank NTB</option>
                <option value="Bank NTT">Bank NTT</option>
                <option value="Bank Maluku">Bank Maluku</option>
                <option value="Bank Papua">Bank Papua</option>
                </select>

                <!--<input value="<?php //echo $norek; ?>" class="form-control" type="hidden" name="norek" placeholder="No. Rekening" required>
                <input value="<?php //echo $nama; ?>" class="form-control" type="hidden" name="nama" placeholder="Atas Nama" required>
                    -->
                <label for="">Nama Pemilik Rekening</label>
                <input name="nama" placeholder="Atas Nama" class ="input-box" type="text" value="<?php echo $nama; ?>">
                

                <label for="">Nomor Rekening</label>
                <input name="norek" placeholder="No. Rekening" class ="input-box" type="number" value="<?php echo $norek; ?>">

                <!--
                <label for="">Nominal Transaksi</label>
                <input class ="input-box" type="text">
                -->

                <label for="">Upload Bukti Pembayaran</label>
                <input type="file" name="foto" id="gambarAmbil" required>
                <br><br>

                <center>
                    <img class="upload-gambar" id="gambarTampil" src="./img/nofoto.png" alt="Gambar">
                    <button type="submit" class="confirm-pay">
                        Konfirmasi Pembayaran
                    </button>
                </center>
            
            </form>

            </div>
        </div>


        </div>

</div>

<?php
        include './fungsional/konfig/footer.php';
?>
