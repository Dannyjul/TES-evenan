<style>
  #pesanAwal, #pesanUpgrade, #setujuan
  {
    display: none;
    width: 700px;
    background-color: black;
    color: white;
  }

  #pesanAwal img, #pesanUpgrade img, #setujuan img
  {
    display: block;
    margin: auto;
  }

  #pesanAwal a, #pesanUpgrade a, #setujuan a
  {
    width: 100%;
  }

  #setujuan
  {
    width: 500px;
  }

  #setujuan p
  {
    margin-top: 25px;
  }
</style>

<!-- Button trigger modal -->

<div id="pesanAwal">
	
    <img src="./img/Lock.png" width="25%">
    <h2 align="center">Maaf</h2>
    <p align="center">Anda harus melakukan pendaftaran terlebih dahulu...</p>
 
  <a href='#' id="tombolAwal" class="btn btn-warning text-white"><h4>Daftar</h4></a>
</div>

<div id="pesanUpgrade">
	
    <img src="./img/Lock.png" width="25%">
    <h2 align="center">Upgrade Status Membership</h2>
    <p align="center">Anda harus Upgrade Status terlebih dahulu...</p>
 
  <a href='?hal=akun-membership&tuj=profile' id="tombolUpg" class="btn btn-warning text-white"><h4>Upgrade</h4></a>
</div>

<div class="modal modal-daftar">
  <div class="row">
    <div class="col col-gambar">
      <img src="./img/Side_Logo.png" alt="">
    </div>
    <div class="col col-login">
      <div class="container-form">
        <img class="close close-login" src="./img/Cancel_Icon.png" alt="">
        <h1>SELAMAT DATANG DI<span>TE SOCIETY</span></h1>
        <p>Daftar Akun Elites Kamu!</p>

        <form action="?hal=daftar-respon" method="post">
          <label class="nama" for="nama">Nama Lengkap</label>
          <input type="text" name="nama" id="nama" class="text-input" placeholder="Masukan nama lengkap anda" required>

          <label class="alamat" for="alamat">Alamat Lengkap</label>
          <textarea class="text-input input-alamat" name="alamat" id="alamat" required></textarea>

          <label class="tgl-lahir" for="tgl-lahir">Tanggal Lahir</label>
          <input type="date" name="tglahir" id="tgl-lahir" class="text-input" required>

          <label class="gender" for="gender">Jenis Kelamin</label>
          <select class="text-input" id="gender" name="jekel" required>
            <option selected="true" disabled="disabled">Pilih</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>

          <label class="no-hp" for="no-hp">Nomor Handphone</label>
          <input type="number" name="nohp" id="no-hp" class="text-input" placeholder="Tuliskan nomor handphone aktif anda" required>

          <label class="email" for="email">E-mail</label>
          <input type="email" name="email" id="no-hp" class="text-input" placeholder="Masukkan E-mail" required>

          <label class="pass" for="pass">Kata Sandi</label>
          <input type="password" name="password" id="pass" class="text-input tampilinPass" style="margin-bottom: 5px;" placeholder="Masukan kata sandi yang terdaftar" required>
          
          &nbsp;<input type="checkbox" class="tampilPassword"> <small style="color: black;">Tampilkan Password</small> <br>
                <small class="text-danger passTaksama">Password yang diketikkan tidak sama</small>

          <label class="pass" for="pass-conf">Konfirmasi Kata Sandi</label>
          <input type="password" name="pass-conf" id="pass2" class="text-input" placeholder="Tuliskan ulang kata sandi yang terdaftar" required>
          <small class="text-danger passTaksama">Password yang diketikkan tidak sama</small>

          <input type="checkbox" name="setujuan" id="tc" required>
          <label class="tc" for="tc">Saya telah membaca dan menyetujui<span><a data-fancybox data-src='#setujuan' href='javascript:;'>Syarat dan Ketentuan</a></span></label>
          <button type="submit" class="btn">Daftar</button>
        </form>

        
        <p>Sudah punya akun Elites?<span><a class="modal-trigger-login" href="#">Login</a></span></p>
      </div>
    </div>
  </div>
</div>

<!--MODAL-->
<div class="modal modal-login">
    <div class="row">
        <div class="col col-gambar">
            <img src="./img/Side_Logo.png" alt="">
        </div>
        <div class="col col-login">
            <div class="container-form">
                <img class="close close-login" src="./img/Cancel_Icon.png" alt="">
                <h1>SELAMAT DATANG DI<span>TE SOCIETY</span></h1>
                <p>Masuk ke Akun Elites Kamu!</p>

                <form action="?hal=login-respon" method="post">
                    <label class="email" for="email">Alamat Email</label>
                    <input type="email" name="email" id="email" class="text-input" placeholder="Masukan alamat email yang terdaftar">
                    <label class="pass" for="pass">Kata Sandi</label>
                    <input type="password" name="password" id="pass" class="text-input" placeholder="Masukan kata sandi yang terdaftar">
                    <!--<input type="checkbox" name="remember" id="remember">
                    <label class="remember" for="remember">Ingatkan Saya</label>
                    -->
                    <!--<a href="#">Lupa Kata Sandi?</a>-->
                   
                    <button type="submit" class="btn">Login</button>
                    <p>Belum punya akun Elites?<span><a class="modal-trigger-daftar" href="#">Daftar</a></span></p>
                </form>

                
            </div>
        </div>
    </div>
</div>


<?php

    $perintah = $crud->eksekusiSQl("SELECT *FROM info 
                                    INNER JOIN user
                                        ON user.id_user= info.id_user
                                    WHERE info.jenis_info='Term and Condition'
                                    ");
    $hitung   = $crud->hitungData($perintah);


    foreach($perintah as $a)
    {
        $idinfo= $a['id_info'];
        $jenis = $a['jenis_info'];
        $foto  = $a['foto_info'];
        $tgl   = $a['tgl_info'];
        $desk  = $a['deskripsi'];
        

        $nus    = $a['nama_user'];

        if ($foto=='Kosong') 
        {
            //$gambar = "<img class='rounded-circle' src='./img/nofoto.png' width='50' height='50'>";
            $box = "";
        } 
        else 
        {
            $tujuan = "./foto/info/$foto";
           /* $gambar = 
            "   <a data-fancybox='gallery' href='$tujuan' data-caption='$jenis'>
                    <img src='$tujuan' width='50' height='50'>
                </a>
            ";*/
            $box = 
            "
                <center>
                <img src='$tujuan' width='70%' height='200'>
                </center>
            ";
        }
    }
                                
                 
                                

?>
<div id="setujuan">

  <center>
    <h4><?php echo $jenis; ?></h4>
  </center>
	
  <?php
      echo
      "
          $box
          $desk
      ";
  ?>
</div>

