<?php
$idpe = @$_GET['idpe'];
$perintah = $crud->eksekusiSQl("SELECT *FROM user_preneur 
                            INNER JOIN user ON user.id_user=user_preneur.id_user
                            INNER JOIN provinsi ON provinsi.id_provinsi=user_preneur.id_provinsi
                            WHERE user.id_user='$iduser'
                            AND user_preneur.id_userpreneur='$idpe'
                            ORDER BY user_preneur.id_userpreneur DESC");
    $no = 1;
    foreach ($perintah as $a) 
    {
        $idUneur = $a['id_userpreneur'];
        $namaBis   = $a['nama_bisnis'];
        $tahun  = $a['tahun_dirikan'];
        $bidang = $a['bidang_usaha'];
        //$email  = $a['email'];
        $user   = $a['nama_user'];
        //$foto   = $a['foto'];
        $hak    = $a['hak_akses'];

        $ius    = $a['id_user'];

        $ig     = $a['akun_instagram'];
        $fb     = $a['page_facebook'];

        $web    = $a['website_bisnis'];
        $omset  = $a['omset_bulanan'];
        $jumkar = $a['jumlah_karyawan'];
        $deskrip = $a['deskripsi_usaha'];

        $foto   = $a['foto_usaha'];


        $prov = $a['nama_provinsi'];


        $alamatBis = $a['alamat_bisnis'];
        $emailBis  = $a['email_bisnis'];

        $telpBis = $a['telp_bisnis'];

        $industri= $a['industri'];

        $badge = "-";


        if ($ig == NULL) {
            $ig = $badge;
          }
          if ($fb == NULL) {
            $fb = $badge;
          }
          if ($web == NULL) {
            $web = $badge;
          }

        if ($foto=="Kosong") 
        {
            $gambar = "<img src='img/nofoto.png' width='50' height='50'>";
            $imeg= "<img src='img/nofoto.png' width='100%' height='200'>";
        } 
        else 
        {
            $tujuan = "./foto/bisnismember/$foto";
            $gambar = 
            "  <a href='$tujuan' data-caption='$namaBis' data-fancybox>
                <img src='$tujuan' width='70' height='70'>
                </a>
            ";

            $imeg = "<img src='$tujuan' width='100%' height='200'>";
        }
    }
        
?>

<div class="container-content container-akun-bisnis-detail-non-res">
    <div class="akun-navbar">
        <a class="<?php echo $profil; ?>" href="?hal=akun-profile&mod=profil&tuj=profile">Akun Profile Anda</a>
        <a class="<?php echo $bisnis; ?>" href="?hal=akun-profile&mod=akun-bisnis&tuj=profile">Akun Bisnis Anda</a>
    </div>

    <div class="akun-bisnis">
        <div class="content-row-1">
            <div class="akun-data">
                <img src="<?php echo $tujuan; ?>" alt="">
                <h4><?php echo $namaBis; ?></h4>
                <h5>Deskripsi Singkat Bisnis Anda</h5>
                <div class="desc-bisnis">
                    <?php echo $deskrip;?>
                </div>
                <h5>Jumlah Karyawan</h5>
                <div class="container-data-profile"><?php echo $jumkar;?></div>
                <h5>Omset per Bulan</h5>
                <div class="container-data-profile"><?php echo $omset;?></div>
            </div>
        </div>
        
        <div class="content-row-2">
            <h2>Profil</h2>
            <h3>Nama bisnis Anda</h3>
            <div class="container-data-profile"><?php echo $namaBis;?></div>

            <h3>Tahun berapa bisnis Anda didirikan?</h3>
            <div class="container-data-profile"><?php echo $tahun;?></div>

            <h3>Bergerak di bidang apa bisnis anda?</h3>
            <div class="container-data-profile"><?php echo $bidang; ?></div>

            <h3>Industri</h3>
            <div class="container-data-profile industri"><?php echo $industri;?></div>

            <h3>Alamat Bisnis</h3>
            <div class="container-data-profile alamat"><?php echo $alamatBis;?></div>

            <h3>Email Bisnis</h3>
            <div class="container-data-profile"><?php echo $emailBis;?></div>

            <h3>No. Telp Bisnis</h3>
            <div class="container-data-profile"><?php echo $telpBis;?></div>

            <h3>Akun Instagram Bisnis Anda</h3>
            <div class="container-data-profile"><?php echo $ig;?></div>

            <h3>Page Facebook Bisnis Anda</h3>
            <div class="container-data-profile"><?php echo $fb;?></div>

            <h3>Website Bisnis anda</h3>
            <div class="container-data-profile"><?php echo $web;?></div>

            <a class="btn btn-edit" href="?hal=akun-profile&tuj=profile&mod=akun-bisnis&idpe=<?php echo $idUneur; ?>&mau=editbisnis">Ubah Profile Bisnis Anda</a>
            </div>
    </div>

</div>

<div class="container container-content container-akun-bisnis-detail-res">
    <div class="akun-navbar">
        <a class="<?php echo $profil; ?>" href="?hal=akun-profile&mod=profil&tuj=profile">Akun Profile Anda</a>
        <a class="<?php echo $bisnis; ?>" href="?hal=akun-profile&mod=akun-bisnis&tuj=profile">Akun Bisnis Anda</a>
    </div>
        
        <div class="card">
            <img src="<?php echo $tujuan; ?>" class="card-img-top" alt="">
            <div class="card-body">
                <h3>Nama bisnis Anda</h3>
                <div class="container-data-profile"><?php echo $namaBis;?></div>

                <h3>Tahun berapa bisnis Anda didirikan?</h3>
                <div class="container-data-profile"><?php echo $tahun;?></div>

                <h3>Bergerak di bidang apa bisnis anda?</h3>
                <div class="container-data-profile"><?php echo $bidang; ?></div>

                <h3>Industri</h3>
                <div class="container-data-profile industri"><?php echo $industri;?></div>

                <h3>Deskripsi Singkat Bisnis Anda</h3>
                <div class="container-data-profile desc-bisnis">
                    <?php echo $deskrip;?>
                </div>

                <h3>Jumlah Karyawan</h3>
                <div class="container-data-profile"><?php echo $jumkar;?></div>

                <h3>Omset per Bulan</h3>
                <div class="container-data-profile"><?php echo $omset;?></div>

                <h3>Alamat Bisnis</h3>
                <div class="container-data-profile alamat"><?php echo $alamatBis;?></div>

                <h3>Email Bisnis</h3>
                <div class="container-data-profile"><?php echo $emailBis;?></div>

                <h3>No. Telp Bisnis</h3>
                <div class="container-data-profile"><?php echo $telpBis;?></div>

                <h3>Akun Instagram Bisnis Anda</h3>
                <div class="container-data-profile"><?php echo $ig;?></div>

                <h3>Page Facebook Bisnis Anda</h3>
                <div class="container-data-profile"><?php echo $fb;?></div>

                <h3>Website Bisnis anda</h3>
                <div class="container-data-profile"><?php echo $web;?></div>

                <a class="btn btn-gold-pri-normal btn-edit" href="?hal=akun-profile&tuj=profile&mod=akun-bisnis&idpe=<?php echo $idUneur; ?>&mau=editbisnis">Ubah Profile Bisnis Anda</a>
            </div>
        </div>

</div>
