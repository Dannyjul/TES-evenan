<link rel="stylesheet" href="./css/profile.css">
<link rel="stylesheet" href="./css/transaksi.css">

<?php
include './fungsional/konfig/headerUdahLogin.php';
?>

<div class="container container-transaksi">
    <?php

    include './fungsional/data/membership.php';

    ?>
    
    <div class="container-content">
        <!-- AKUN NAVBAR -->
        <div class="akun-navbar">
            <a id="profil" class="active" href="">Akun Member Anda</a>
        </div>

        <div class="container-card">

        <?php

            $sql   = "SELECT *FROM 
                        transaksi
                        WHERE id_user='$userId'
                        ORDER BY id_transaksi DESC
                    ";
            $trans = $crud->eksekusiSQL($sql);
            $hitung = $crud->hitungData($trans);

            if ($hitung == 0) {
                echo
                    "
                    <div class='card'>
                        <div class='card-body'> 
                            <h4 align='center'>Belum ada transaksi</h4>
                        </div>
                    </div>
                ";
            } else {
                $no = 1;
                foreach ($trans as $key) {
                    $idTran    = $key['id_transaksi'];
                    $namatrans = $key['nama_transaksi'];
                    $harga     = $key['biaya_transaksi'];
                    $norek     = $key['no_rek'];
                    $narek     = $key['nama_rekening'];
                    $tgl       = $key['tgl_transaksi'];
                    $akhir     = $key['tgl_berakhir'];
                    $bank      = $key['bank_asal'];

                    $baca      = $key['baca_member'];

                    $ket       = $key['keterangan'];

                    $fotoS     = $key['foto_struk'];

                    if ($fotoS == 'Kosong') {
                        $gambarS = "./img/nofoto.png";
                        //$acakGambar = md5($gambar);
                        //$kataTombolFoto = "Upload Foto";
                    } elseif ($fotoS == '') {
                        $gambarS = "./img/nofoto.png";
                    } else {
                        $gambarS = "./foto/struk/$fotoS";
                        // $kataTombolFoto = "Ganti Foto";
                    }

                    if ($ket == "Ok") {
                        $isiKet = "<span class='badge badge-success'>$ket</span>";
                    } elseif ($ket == 'Sedang diproses') {
                        $isiKet = "<span class='badge badge-warning'>$ket</span>";
                    } else {
                        $isiKet = "<span class='badge badge-danger'>$ket</span>";
                    }

                    if ($baca=='Sudah dibaca') 
                    {
                        $ketBaca = "<span class='badge badge-success'>$baca</span>";
                        $amplop  = "./img/Envelope-Open.png";
                        $tandaiBaca  = "#";
                        $merahNotif = "";
                    } else {
                        $ketBaca = "<span class='badge badge-warning'>$baca</span>";
                        $amplop  = "./img/Envelope.png";
                        $tandaiBaca = "?hal=akun-respon&idT=$idTran&mode=udahbaca";
                        $merahNotif = "red-round";
                    }

                    if ($bank==NULL) 
                    {
                        $namaBank = "Belum Diisi";
        
                    }
                    else
                    {
                        $namaBank = $bank;
                    }
                    


                    $tanggal   = date("d F Y", strtotime($tgl));
                    $berakhir  = date("d F Y", strtotime($akhir));

                    $biaya = "Rp " . formatRupiah($harga) . ",00";

                    echo
                        "

                        <div class='card'>
                            <div class='card-body'>
                                <div class='envelope'>
                                    <a href='?hal=akun-respon&idT=$idTran&mode=udahbaca'><img src='$amplop' alt='Notif'></a>
                                </div>
                                <div class='$merahNotif'></div>
                                <h5 class='card-title'>$namatrans</h5>
                                <p class='card-text'>$biaya</p>
                                <p class='card-text'>Tanggal Transaksi: $tanggal</p>
                                <p class='card-text'>Tanggal Berakhir: $berakhir</p>
                                <a class='btn btn-transaksi' data-fancybox data-src='#transaksi$idTran' href='javascript:;'>Lihat</a>
                            </div>
                        </div>
                    
                    ";

                    echo
                    "
                    <!-- Modal InfoTrab -->
                    <!--
                    <div id='transaksi$idTran' style='font-size: 16px; width:1000px; display:none;' class='bg-dark text-white'>
                    
                        <div class='row'>
                            <div class='col-md'>
                                <center>
                                    <img src='$gambarS' width='100%' height='500' alt='$namatrans'>
                                </center>
                            </div>
                    
                            <div class='col-md'>
                                <h3>$namatrans</h3>
                                <h4>Rincian:</h4>
                    
                                <p>Biaya <span class='text-warning'><b>$biaya</b></span></p>
                                
                                <p>
                                    Bank yang digunakan : <span class='text-warning'>$namaBank</span>
                                </p>
                                
                                <p>
                                    No. Rekening yang digunakan <span class='text-warning'>$norek</span>
                                </p>
                                <p>
                                    Atas nama <span class='text-warning'>$narek</span>
                                </p>
                                <p>
                                    Dibayar pada <span class='text-warning'>$tanggal</span>
                                </p>
                    
                                <hr>
                    
                                <h4>Keterangan</h4>
                                <h5><span class='text-warning'>$isiKet</span></h5>
                            </div>
                        </div>
                    </div>
                    -->
                    <div id='transaksi$idTran' class='modal-transaksi'>
                        <img class='bukti-trans' src='$gambarS' alt=''>
                        <div class='detail-transaksi'>
                            
                            <h2 class='trans-title'>$namatrans</h2>
                            <h3 class='detail-trans-title'>Biaya</h3>
                            <h3 class='detail-trans'>$biaya</h3>
                
                            <h3 class='detail-trans-title'>No. Rekening yang digunakan</h3>
                            <h3 class='detail-trans'>$norek</h3>
                
                            <h3 class='detail-trans-title'>Nama Rekening</h3>
                            <h3 class='detail-trans'>$narek</h3>
                
                            <h3 class='detail-trans-title'>Bank</h3>
                            <h3 class='detail-trans'>BCA</h3>
                
                            <h3 class='detail-trans-title'>Dibayarkan Pada</h3>
                            <h3 class='detail-trans'>$tanggal</h3>
                
                            <h3 class='detail-trans-title'>Status</h3>
                            <h3 class='detail-trans-status'>$isiKet</h3>
                        </div>
                        <!--<a class='btn btn-modal-close' href='#'>Tutup</a>-->
                    </div>
                    ";
                    $no++;
                }
            }


            ?>
 
        </div>
    </div>

</div>
</div>

<?php

include './fungsional/konfig/footer.php';

?>