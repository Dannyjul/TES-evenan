<?php

    $idpreneur = @$_GET['idpe'];

    $perintah = $crud->eksekusiSQl("SELECT *FROM user_preneur 
    INNER JOIN user ON user.id_user=user_preneur.id_user
    INNER JOIN provinsi ON provinsi.id_provinsi=user_preneur.id_provinsi
    WHERE user_preneur.id_userpreneur='$idpreneur'
    ");
    foreach ($perintah as $a) 
    {
    //$idUneur = $a['id_userpreneur'];
        $nama   = $a['nama_bisnis'];
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


        $nmpr = $a['nama_provinsi'];
        $idpr = $a['id_provinsi'];

        $alamatBis = $a['alamat_bisnis'];
        $emailBis  = $a['email_bisnis'];

        $telpBis = $a['telp_bisnis'];
        $industri= $a['industri'];



        if ($foto == "Kosong") 
        {
            $folder = "./img/nofoto.png";
        } 
        else 
        {
            $folder = "./foto/bisnismember/$foto";
            //$gambar = "<img id='gambarUsaha' src='$tujuan' width='100%' height='200'>";
        }
    }
?>
<form action="?hal=akun-respon&mode=preneur_edit" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idpe" value="<?php echo $idpreneur; ?>">
    <input type="hidden" name="fotolama" value="<?php echo $foto; ?>">
    <div class="akun-bisnis">
        <div class="content-row-1">
            <div class="akun-data">
                <img id="gambarUsaha" src="<?php echo $folder; ?>">
                <input type="file" name="foto" id="gambarAmbUsaha" onchange="return uploadUsaha(this)"/>
                
                <br><br><br>
                <h4><?php echo $nama;?></h4>

                <label for="">Deskripsi Singkat Bisnis Anda</label>
                <textarea class="input-data-profile" name="deskripsi" placeholder="Deskripsi Singkat" required><?php echo $deskrip; ?></textarea>

                <label for="">Jumlah Karyawan</label>
                <select class="input-data-profile" name="jumkar" required>
                    <?php
                        echo
                        "
                        <option value='$jumkar'>$jumkar</option>
                        ";
                    ?>
                    <option value="< 10 Orang">< 10 Orang</option>
                    <option value="10-50 Orang">10-50 Orang</option>
                    <option value="50-100 Orang">50-100 Orang</option>
                    <option value="500-1000 Orang">500-1000 Orang</option>
                    <option value=">1000 Orang">>1000 Orang</option>
                    
                </select>

                <label for="">Omset Per Bulan</label>
                <select class="input-data-profile" name="omset" required>
                    <?php
                        echo
                        "
                        <option value='$omset'>$omset</option>
                        ";
                    ?>
                    <option value="< Rp 10 Juta">< Rp 10 Juta</option>
                    <option value="Rp 10 Juta - Rp 20 Juta">Rp 10 Juta - Rp 20 Juta</option>
                    <option value="Rp 25 Juta - Rp 50 Juta">Rp 25 Juta - Rp 50 Juta</option>
                    <option value="Rp 50 Juta - Rp 100 Juta">Rp 50 Juta - Rp 100 Juta</option>
                    <option value="Rp 100 Juta - Rp 250 Juta">Rp 100 Juta - Rp 250 Juta</option>
                    <option value="Rp 250 Juta - Rp 1 Milyar">Rp 250 Juta - Rp 1 Milyar</option>
                    <option value="> Rp 1 Milyar">> Rp 1 Milyar</option>
                </select>

            </div>
        </div>

        <div class="content-row-2 editing">
            <h2>Atur Bisnis Anda</h2>

            <label for="nama-bisnis">Nama Bisnis Anda <font color="crimson" size='3'>*</font></label>
            <input value="<?php echo $nama; ?>" name="nama" required id="nama-bisnis" class="input-data-profile" type="text">

            <label for="tahun-bisnis">Tahun berapa bisnis anda didirikan? <font color="crimson" size='3'>*</font></label>
            <input value="<?php echo $tahun; ?>" type="number" name="tahun" required id="tahun-bisnis" class="input-data-profile">

            <label for="bidang-bisnis">Bergerak di bidang apa bisnis anda? <font color="crimson" size='3'>*</font></label>
            <select class="input-data-profile" name="bidang" required>
                <?php
                    echo
                    "
                    <option value='$bidang'>$bidang</option>
                    ";
                ?>
                <option value="Produk">Produk</option>
                <option value="Jasa">Jasa</option>
                <option value="Produk & Jasa">Produk & Jasa</option>
            </select>

            <label for="industri">Industri <font color="crimson" size='3'>*</font></label>
            <select name="industri" id="industri" class="input-data-profile" required>
                <?php
                    echo
                    "
                    <option value='$industri'>$industri</option>
                    ";
                ?>
                <option value="Makanan dan minuman">Makanan dan minuman</option>
                <option value="Tembakau">Tembakau</option>
                <option value="Tekstil">Tekstil</option>
                <option value="Pakaian Jadi">Pakaian Jadi</option>
                <option value="Kulit dan barang dari kulit">Kulit dan barang dari kulit</option>
                <option value="Kertas dan barang dari kertas">Kertas dan barang dari kertas</option>
                <option value="Penerbitan, percetakan, dan reproduksi">Penerbitan, percetakan, dan reproduksi</option>
                <option value="Batu bara, minyak, dan gas bumi, dan bahan bakar dari nuklir">Batu bara, minyak, dan gas bumi, dan bahan bakar dari nuklir</option>
                <option value="Kimia dan barang-barang dari bahan kimia">Kimia dan barang-barang dari bahan kimia</option>
                <option value="Karet, dan barang-barang dari plastik">Karet, dan barang-barang dari plastik</option>
                <option value="Barang galian dari logam">Barang galian dari logam</option>
                <option value="Logam dasar">Logam dasar</option>
                <option value="Barang-barang dari logam, dan peralatannya">Barang-barang dari logam, dan peralatannya</option>
                <option value="Mesin dan perlengkapannya">Mesin dan perlengkapannya</option>
                <option value="Peralatan kantor, akutansi, dan pengolahan data">Peralatan kantor, akutansi, dan pengolahan data</option>
                <option value="Mesin listrik lainnya dan perlengkapannya">Mesin listrik lainnya dan perlengkapannya</option>
                <option value="Radio, televisi, dan peralatan komunikasi">Radio, televisi, dan peralatan komunikasi</option>
                <option value="Peralatan kedokteran, alat ukur, navigasi, optik, dan jam">Peralatan kedokteran, alat ukur, navigasi, optik, dan jam</option>
                <option value="Kendaraan bermotor">Kendaraan bermotor</option>
                <option value="Alat angkutan lainnya">Alat angkutan lainnya</option>
                <option value="Furniture, peralatan rumah tangga dan industri pengolahan lainnya ">Furniture, peralatan rumah tangga dan industri pengolahan lainnya </option>
                <option value="Souvenir">Souvenir</option>
                <option value="Event, dan wedding organiser">Event, dan wedding organiser</option>
                <option value="Service peralatan elektronik ">Service peralatan elektronik </option>
                <option value="Jasa konsultasi">Jasa konsultasi</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Startup">Startup</option>
                <option value="Lainnya">Lainnya</option>
            </select>

            <label for="bidang-bisnis">Provinsi <font color="crimson" size='3'>*</font></label>
            <select class="input-data-profile" name="provinsi" required>
               
                    <?php

                        echo
                        "
                        <option value='$idpr'>$nmpr</option>
                        ";

                        $prov = $crud->eksekusiSQL("SELECT *FROM provinsi ORDER BY nama_provinsi ASC");

                        while ($p=mysqli_fetch_array($prov)) 
                        {
                            $idprov = $p['id_provinsi'];
                            $nmprov = $p['nama_provinsi'];
                            echo
                            "
                                <option value='$idprov'>$nmprov</option>
                            ";
                        }

                    ?>
            </select>

            <label for="alamat-bisnis">Alamat Bisnis <font color="crimson" size='3'>*</font></label>
            <textarea name="alamat" required id="alamat-bisnis" class="input-data-profile" type="text"><?php echo $alamatBis; ?></textarea>

            <label for="email-bisnis">Email Bisnis <font color="crimson" size='3'>*</font></label>
            <input value="<?php echo $emailBis; ?>" name="email" required id="email-bisnis" class="input-data-profile" type="email">

            <label for="no-tlp-bisnis">No. Telp Bisnis <font color="crimson" size='3'>*</font></label>
            <input value="<?php echo $telpBis; ?>" id="no-tlp-bisnis" class="input-data-profile" type="number" name="notelp" required>

            <label for="ig">Akun Instagram Bisnis</label>
            <input value="<?php echo $ig; ?>" name="ig" id="ig" class="input-data-profile" type="text">

            <label for="fb-page">Page Facebook Bisnis</label>
            <input value="<?php echo $fb; ?>" name="fb" id="fb-page" class="input-data-profile" type="text">

            <label for="website-bisnis">Website</label>
            <input value="<?php echo $web; ?>" name="web" id="website-bisnis" class="input-data-profile" type="text">

            <button style="width: 100%;" type="submit" class="btn btn-warning">Simpan Profile Bisnis</button>
        </div>

    </div>

</form>