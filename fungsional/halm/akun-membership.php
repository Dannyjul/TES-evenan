<link rel="stylesheet" href="./css/profile.css">
<link rel="stylesheet" href="./css/membership.css">

<?php
include './fungsional/konfig/headerUdahLogin.php';
?>

<div class="container container-membership">
    <?php

    include './fungsional/data/membership.php';

    ?>

    <div class="container-content">
        <!-- AKUN NAVBAR -->
        <div class="akun-navbar">
            <a id="profil" class="active" href="">Akun Member Anda</a>
        </div>

        <!-- INI PAKE CARD DECK BOOTSTRAP -->
        <!-- CARD UNTUK MEMBERSHIP-->
        <div>
            <div class="card-deck card-deck-membership">

                <?php

                $perintah = $crud->eksekusiSQl("SELECT *FROM paket_member WHERE kondisi='POSTING'");
                $hitung   = $crud->hitungData($perintah);

                if ($hitung == 0) {
                    pesanKosong();
                } else {

                    $no = 1;
                    foreach ($perintah as $a) {
                        //$idpk   = $a['id_paket'];
                        $nama   = $a['nama_paket'];
                        $harga  = $a['harga_member'];
                        //$kondisi= $a['kondisi'];
                        $deskrip = $a['deskripsi_paket'];
                        $jumkel = $a['jumlah_kelas'];


                        $rpHarga = "Rp " . formatRupiah($harga) . ",-";

                        if ($harga == 0) {
                            $rpHarga = "Free";
                        }

                        $foto = $a['foto_paket'];

                        $idpaket = $a['id_paket'];

                        if ($foto == "Kosong") {
                            $gambar = "<img class='card-img-top' src='img/nofoto.png' width='50' height='50'>";
                        } else {
                            $tujuan = "foto/paket/$foto";
                            $gambar =
                                "  
                                        <img class='card-img-top' src='$tujuan' width='100%' height='100'>
                                    
                                ";
                        }

                        // $jumket = $jumkel;

                        $statuser = $crud->eksekusiSQL("SELECT *FROM user_status WHERE id_user='$userId'");
                        $hitungUs = $crud->hitungData($statuser);

                        foreach ($statuser as $st) {
                            $paketNow = $st['id_paket'];
                        }


                        if ($hitungUs > 0) {
                            //$class='btn disabled';
                            //$kataTombol ='Anda sedang di Paket Ini';


                            if ($paketNow == $idpaket) {
                                $class = 'btn disabled';
                                $kataTombol = "Anda sedang di Paket Ini";
                            } else {
                                if ($paketNow > $idpaket) {
                                    $class = 'btn disabled';
                                    $kataTombol = "Default";
                                } else {
                                    $class = 'btn';
                                    $kataTombol = "Upgrade";
                                }
                            }
                        }

                        if ($no == 1) {
                            $warnaPaket = "free";
                        } elseif ($no == 2) {
                            $warnaPaket = "self-employ";
                        } elseif ($no == 3) {
                            $warnaPaket = "entr";
                        } else {

                            $warnaPaket = "-";
                        }

                        echo
                        "

                            <div class='card $warnaPaket'>
                                <div class='card-header'>
                                    <h3>$nama</h3>
                                </div>
                                <img src='$tujuan' class='card-img-top' alt='$nama'>
                                <div class='card-body'>
                                    <h3 class='card-title'>$rpHarga</h3>
                                    <div class='card-text'>
                                        $deskrip
                                    </div>
                                    <a href='?hal=konfirmasi-pembayaran&k=$idpaket&mau=paket' class='$class'>$kataTombol</a>
                                </div>
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
</div>