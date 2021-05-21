<link rel="stylesheet" href="./css/profile.css">

<?php
include './fungsional/konfig/headerUdahLogin.php';
?>

<div class="container container-profile">
    <?php

        include './fungsional/data/membership.php';

    ?>

    <div class="container-content">
        <div class="akun-navbar d-flex justify-content-between ">
            <a class="<?php echo $profil; ?>" href="?hal=akun-profile&mod=profil&tuj=profile">Akun Profile Anda</a>
            <a class="title-light <?php echo $bisnis; ?>" href="?hal=akun-profile&mod=akun-bisnis&tuj=profile">Akun Bisnis Anda</a>
        </div>

        <div class="akun-profil">
            <div class="content-row-1">
                <div class="akun-data">
                    <img src="<?php echo $gambar;?>" alt="">
                    <a data-fancybox data-src="#fotoan" href="javascript:;" style="padding: 2px; margin-top:8px" class="btn btn-danger btn-sm"><?php echo $kataTombolFoto; ?></a> <br><br>
                    <h4><?php echo $namauser; ?></h4>
                    <h4><?php echo "ID $noUser"; ?></h4>
                </div>

                <?php
                    $statuser = $crud->eksekusiSQl("SELECT *FROM user_status
                                                                        INNER JOIN paket_member
                                                                        ON user_status.id_paket = paket_member.id_paket
                                                                        WHERE id_user='$userId'");

                    foreach ($statuser as $e) {
                    $jumlahKelas = $e['jumlah_kelas'];
                    $namaPaket   = $e['nama_paket'];
                    $fotoPaket   = $e['foto_paket'];

                    $tujuanPaket = "./foto/paket/$fotoPaket";
                    }

                    ?>

                <div class="status-membership">
                    <h6>Status Membership</h6>
                    <h3><?php echo $namaPaket; ?></h3>
                    <img src="<?php echo $tujuanPaket;?>" alt="<?php echo $namaPaket;?>">
                    <a class="btn" href="?hal=akun-membership">UPGRADE KELAS</a>
                </div>
            </div>

            <div class="content-row-2">
                <h2 class="headline-heavy">Atur Profile</h2>
                <form action="?hal=akun-respon&mode=edit" method="post">
                
                    <label for="nama">Nama Lengkap</label>
                    <input value="<?php echo $namauser; ?>" name = "nama" id="nama" class="input-data-profile" type="text" required>

                    <label for="alamat">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" class="input-data-profile alamat"><?php echo $alamat; ?></textarea>

                    <label for="gender">Jenis Kelamin</label>
                    <select name="jekel" id="gender" class="input-data-profile" required>
                        <option value="<?php echo $jekel; ?>"><?php echo $jekel; ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label for="no-hp">Nomor Handphone</label>
                    <input value="<?php echo $nohp; ?>" name = "nohp" id="no-hp" class="input-data-profile" type="text">

                    <label for="email">Alamat Email</label>
                    <input value="<?php echo $email; ?>" name = "email" id="email" class="input-data-profile" type="email">

                    <button type="submit" class="btn btn-edit">Simpan Profile</button>
                
                </form>
            </div>

            
        </div>

    </div>
</div>