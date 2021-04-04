<?php

$perintah = $crud->eksekusiSQl("SELECT *FROM user_preneur 
                            INNER JOIN user ON user.id_user=user_preneur.id_user
                            INNER JOIN provinsi ON provinsi.id_provinsi=user_preneur.id_provinsi
                            WHERE user.id_user='$iduser'
                            ORDER BY user_preneur.id_userpreneur DESC");
$hitung   = $crud->hitungData($perintah);

//$mau = @$_GET['mau'];


if ($hitung == 0) {
//pesanKosong();
include 'akun-bisnis-tambah.php';
} else {





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



//$jumset = formatRupiah($omset);

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


  echo
  "
                
  <div class='card'>
      <img class='img-card' src='$tujuan' alt='$namaBis'>
      <div class='card-body'>
          <h5 class='card-title'>$namaBis</h5>
          <p class='card-text'>Didirikan Tahun 2021</p>
          <p class='card-text'>Bergerak di Bidang $bidang</p>
          <p class='card-text'>$industri</p>
          <a href='?hal=akun-profile&tuj=profile&mod=akun-bisnis&idpe=$idUneur&mau=detailbisnis' class='btn btn-card'>Lihat</a>
          <a href='?hal=akun-profile&tuj=profile&mod=akun-bisnis&idpe=$idUneur&mau=editbisnis' class='btn-edit'><img src='./img/Pencil.png' alt='Edit'></a>
      </div>
  </div>      
  ";

  echo
  "
  <div id='bisnis$idUneur' class='bg-dark text-white' style='font-size: 16px; width:700px; display:none;'>
      <div class='row'>
          <div class='col-md'>
                  <center>
                      $imeg
                  </center>
          </div>
      
          <div class='col-md' style='padding: 20px;'>
              <h2>$namaBis</h2>
              
              <br>
              
          
              
                  <h5>Deskripsi Usaha:</h5>
      
                  <p>
                  $deskrip
                  </p>
              
      
          </div>
      </div>
  ";


    $badge = 
    "
      <span class='badge badge-warning'>Belum diisi</span>
    ";

    if ($ig == NULL) {
      $ig = $badge;
    }
    if ($fb == NULL) {
      $fb = $badge;
    }
    if ($web == NULL) {
      $web = $badge;
    }





    
    echo"
      <hr>
      <h5>Profil Bisnis:</h5>
      <p>Bergerak di Bidang $bidang</p>
      <p>Industri : $industri</p>
      <p>Berdiri sejak $tahun</p>
      
      <hr>
      <h5>Kontak Bisnis:</h5>
      
      <p>
        Alamat Bisnis: $alamatBis
      </p>
      <p>
        Provinsi : $prov
      </p>
      <p>
        No. Telp: $telpBis
      </p>
      <p>
          Akun Instagram: $ig
      </p>
      <p>
          Page Facebook : $fb
      </p>
      <p>
          Website : $web
      </p>
    
      
  </div>
  ";
  }

  echo
  "
  <center>
  <a class='btn btn-tambah btn-edit' href='?hal=akun-profile&mod=akun-bisnis&mau=tambah&tuj=profile'> + Tambah Bisnis Baru</a>
  </center>
  ";

}

        
?>
