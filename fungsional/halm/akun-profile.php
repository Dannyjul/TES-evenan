<link rel="stylesheet" href="./css/profile.css">

<?php
    include './fungsional/konfig/headerUdahLogin.php';
?>

<div class="container container-profile">
    <?php
        include './fungsional/data/membership.php';
    ?>

    <?php

        $mau = @$_GET['mod'];

        $ekse= @$_GET['mau'];


        if ($ekse=='tambah') 
        {
        
            $bisnis = "active";
            $profil = "";
        ?>

        <div class="container-content"> 
            <div class="akun-navbar">
                <a class="<?php echo $profil; ?>" href="?hal=akun-profile&mod=profil&tuj=profile">Akun Profile Anda</a>
                <a class="<?php echo $bisnis; ?>" href="?hal=akun-profile&mod=akun-bisnis&tuj=profile">Akun Bisnis Anda</a>
            </div>

                <?php
                    include './fungsional/halm/akun-bisnis-tambah.php';
                ?>
            </div>

        </div>
    <?php
        }
        elseif ($ekse=='editbisnis') 
        {
            $bisnis = "active";
            $profil = "";
    ?>

    <div class="container container-content"> 
        <div class="akun-navbar">
            <a class="<?php echo $profil; ?>" href="?hal=akun-profile&mod=profil&tuj=profile">Akun Profile Anda</a>
            <a class="<?php echo $bisnis; ?>" href="?hal=akun-profile&mod=akun-bisnis&tuj=profile">Akun Bisnis Anda</a>
        </div>

        <?php
            include './fungsional/halm/akun-bisnis-edit.php';
        ?>


    </div>

    <?php
    }
    elseif ($ekse=='detailbisnis') 
    {
        $bisnis = "active";
        $profil = "";
        include './fungsional/halm/akun-bisnis-detail.php';
    }
    else 
    {
        # code...
    if ($mau == 'akun-bisnis') {
        $bisnis = "active";
        $profil = "";

        //bersambung
    ?>

        <div class="container-content">
            <div class="akun-navbar">
                <a class="<?php echo $profil; ?>" href="?hal=akun-profile&mod=profil&tuj=profile">Akun Profile Anda</a>
                <a class="<?php echo $bisnis; ?>" href="?hal=akun-profile&mod=akun-bisnis&tuj=profile">Akun Bisnis Anda</a>
            </div>

            <div class="akun-bisnis-list">
                <h1 class="bisnis-list-title">Bisnis Aktif Anda</h1>
                
                <?php
                    include './fungsional/halm/akun-bisnis-data.php';
                ?>
            </div>

        </div>

    <?php
        //sambungan
    } else {
        $profil = "active";
        $bisnis = "";

        //bersambung

    ?>

        <div class="container-content">
            <div class="akun-navbar">
                <a class="<?php echo $profil; ?>" href="?hal=akun-profile&mod=profil&tuj=profile">Akun Profile Anda</a>
                <a class="<?php echo $bisnis; ?>" href="?hal=akun-profile&mod=akun-bisnis&tuj=profile">Akun Bisnis Anda</a>
            </div>

            <div class="akun-profil">
                <div class="content-row-1">
                    <div class="akun-data">
                        <img src="<?php echo $gambar; ?>" alt="">
                        <a data-fancybox data-src="#fotoan" href="javascript:;" style="padding: 2px; margin-top:8px" class="btn btn-danger btn-sm"><?php echo $kataTombolFoto; ?></a><br><br>
                        <h4><?php echo $namauser; ?></h4>
                        <h4><?php echo "ID $noUser"; ?></h4>
                    </div>

                    <?php

                    /*$tgl = date('Y-m-d');

                        $tglPost = "2020-02-10";

                        $berlaku = date('Y-m-d',strtotime('+30 days', strtotime($tglPost)));

                        $tglExp = date("Y-m-d", $berlaku);

                        $tgl1    = "2018-12-16"; // menentukan tanggal awal
                        $tgl2    = date('Y-m-d', strtotime('+ 1 years', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
                    // echo $tgl2; // cetak tanggal

                    if ($tgl==$tgl2) 
                    {
                        $pesan = "Habis";
                    }
                    

                        echo
                        "
                        <div style='margin-top:100px;'>
                            $tgl <br>
                            $tglPost <br>
                            $berlaku <br>
                            $tglExp <br>
                            $tgl2 $pesan
                        </div>
                        ";
                    */
                    $statuser = $crud->eksekusiSQl("SELECT *FROM user_status
                                                                        INNER JOIN paket_member
                                                                        ON user_status.id_paket = paket_member.id_paket
                                                                        WHERE id_user='$userId'");

                    foreach ($statuser as $e) {
                        $jumlahKelas = $e['jumlah_kelas'];
                        $idPaket     = $e['id_paket'];
                        $namaPaket   = $e['nama_paket'];
                        $fotoPaket   = $e['foto_paket'];

                        $tujuanPaket = "./foto/paket/$fotoPaket";

                        $cekPaket = $crud->eksekusiSQL("SELECT *FROM paket_member
                                                        WHERE id_paket>$idPaket ORDER BY id_paket ASC 
                                                        LIMIT 1
                                                        ");
                        $hitCekPaket = $crud->hitungData($cekPaket);

                        if ($hitCekPaket==0) 
                        {
                            $classTombol = "disabled";
                        } 
                        else 
                        {
                            $classTombol = "";
                        }
                        
                    }

                    ?>

                    <div class="status-membership">
                        <h6>Status Membership</h6>
                        <h3><?php echo $namaPaket; ?></h3>
                        <img src="<?php echo $tujuanPaket; ?>" alt="<?php echo $namaPaket; ?>">
                        <a class="btn <?php echo $classTombol; ?>" href="?hal=akun-membership">UPGRADE KELAS</a>
                    </div>
                </div>

                <div class="content-row-2">
                    <h2>Atur Profile</h2>
                    <h3>Nama Lengkap</h3>
                    <div class="container-data-profile"><?php echo $namauser; ?></div>

                    <h3>Alamat Lengkap</h3>
                    <div class="container-data-profile alamat"><?php echo $alamat; ?></div>

                    <h3>Tanggal Lahir</h3>
                    <div class="container-data-profile"><?php echo $lahir; ?></div>

                    <h3>Jenis Kelamin</h3>
                    <div class="container-data-profile"><?php echo $jekel; ?></div>

                    <h3>Nomor Handphone</h3>
                    <div class="container-data-profile"><?php echo $nohp; ?></div>

                    <h3>Email</h3>
                    <div class="container-data-profile"><?php echo $email; ?></div>

                    <a class="btn btn-non-edit" href="?hal=akun-profil-edit&tuj=profile&mod=profil">Ubah Profile Anda</a>
                </div>
            </div>

        </div>

    <?php
        //sambungan

    }
    }
    ?>
</div>