<link rel="stylesheet" href="./css/home.css">

<?php
include './fungsional/konfig/header.php';

$event = $crud->eksekusiSQl("SELECT * FROM info WHERE jenis_info='EliTES Membership'");

foreach ($event as $ev) {

  $foto  = $ev['foto_info'];
  $tujuanHeader = "./foto/$foto";
  $jenis = $ev['jenis_info'];
  $desk = $ev['deskripsi'];
}

include './fungsional/konfig/slider.php';

?>


<!-- NON RESPONSIVE FREE -->
<div class="container container-home container-card-non-res">
  <h1 class="display-heavy title-class-status">Kelas Gratis</h1>
  <div class="container-grid container-grid-free">
    <!--Pake Grid System-->
    <div class="row">
      <!-- INI UNTUK TITLE -->
      <div class="col col-title">
        <img class="title-icon" src="./img/Icon.png" alt="icon">
        <?php
        $kelasFree = $crud->eksekusiSQl("SELECT * FROM `kursus` 
                                                                      INNER JOIN paket_member ON paket_member.id_paket = kursus.id_paket
                                                                      INNER JOIN pilar ON pilar.id_pilar = kursus.id_pilar
                                                                      INNER JOIN kelas ON kelas.id_kelas = pilar.id_kelas
                                                                  WHERE paket_member.nama_paket LIKE '%FREE USER%' 
                                                                  ORDER BY kelas.id_kelas LIMIT 1
                                                                  ");
        $hitungKelF = $crud->hitungData($kelasFree);
        if ($hitungKelF == 0) {
          pesanKosong();
        } else {
          foreach ($kelasFree as $free) {
            $idKelas = $free['id_kelas'];
            $namaKel = $free['nama_kelas'];

            echo
            "
                                        <h3 class='headline-heavy title-class title-class'>
                                          $namaKel
                                        </h3>
                                      ";
          }
        }

        if (empty($userId)) {
          $courseSemua = "href='#' data-toggle='modal' class='body-light title-link modal-trigger-daftar'";
        } else {
          $courseSemua = "href='?hal=course' class='body-light title-link'";
        }


        ?>
        <!-- INI MAU PAKE LINK ? -->
        <a <?php echo $courseSemua; ?>>Lihat Semua ></a>
      </div>

      <!-- INI UNTUK CARDNYA -->
      <div class="col col-slick">
        <!--Nested Grid System-->
        <div class="row row-slick slick">
          <?php
          $listFree = $crud->eksekusiSQl("SELECT * FROM `kursus` 
                                                                  INNER JOIN paket_member ON paket_member.id_paket = kursus.id_paket
                                                                  INNER JOIN pilar ON pilar.id_pilar = kursus.id_pilar
                                                                  INNER JOIN kelas ON kelas.id_kelas = pilar.id_kelas
                                                              WHERE paket_member.nama_paket LIKE '%FREE USER%' 
                                                              ORDER BY kursus.nama_kursus
                                                              ");
          $hitungListF = $crud->hitungData($listFree);
          if ($hitungListF == 0) {
            pesanKosong();
          } else {
            foreach ($listFree as $free) {
              $idkel = $free['id_kelas'];
              $namaKursus = $free['nama_kursus'];
              $idkur = $free['id_kursus'];
              $paketFree = $free['id_paket'];
              $pilarFree = $free['id_pilar'];

              $fotoK = $free['foto_kursus'];

              $folKfree = "./foto/kursus/$fotoK";

              if (empty($userId)) {
                //href='#' data-fancybox data-src='#pesanAwal' href='javascript:;'
                //$atrKelas = "href='#' data-toggle='modal' class='btn modal-trigger-daftar'";
                $atrKelas = "href='#' class='btn mt-auto btn-mulai-slick' data-fancybox data-src='#pesanAwal' href='javascript:;'";
              } else {
                $atrKelas = "href='?hal=course-detail&pl=$idkur&k=$idkel&p=$paketFree&pilid=$pilarFree' class='btn mt-auto btn-mulai-slick'";
              }

              echo
              "
                                  <div class='col'>
                                    <div class='card card-slick'>
                                    <img class='card-img-top' src='$folKfree' alt='Image'>
                                      <div class='card-body d-flex flex-column'>
                                          <h5 class='subheader-heavy'>$namaKursus</h5>
                                          <a $atrKelas >Mulai Kelas</a>
                                      </div>
                                    </div>
                                  </div>
      
                                  ";
            }
          }
          ?>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- RESPONSIVE FREE -->
<div class="container container-card-res">
  <div class="d-flex justify-content-between">
    <h1 class="caption-heavy title-class-status">Kelas Gratis </h1>
    <span class="lihat-semua-res"><a href = "">Lihat Semua></a></span>
  </div>
  <div class="row row-cols-1">
    <div class="col">
      <div class="card card-home-res">
        <img src="./img/Logo_Header.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title small-heavy">GEM 00</h5>
          <p class="card-text small-light">This is a short card.</p>
          <a href="#" class="btn btn-pri-normal btn-mulai-res">Mulai Kelas</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-home-res">
        <img src="./img/Logo_Header.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title small-heavy">GEM 01</h5>
          <p class="card-text small-light">This is a short card.</p>
          <a href="#" class="btn btn-pri-normal btn-mulai-res">Mulai Kelas</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- NON RESPONSIVE PREMIUM -->
<div class="container container-home container-card-non-res">
  <h1 class="display-heavy title-class-status">Kelas Premium</h1>
  <div class="container-grid container-grid-premium">
    <!--Pake Grid System-->
    <div class="row">
      <div class="col col-title">
        <img class="title-icon" src="./img/Icon-2.png" alt="icon">
        <?php



        echo
        "
                                    <h3 class='headline-heavy title-class'>
                                      PREMIUM
                                    </h3>
                                  ";




        if (empty($userId)) {
          $coursePrem = "href='#' data-toggle='modal' class='title-link modal-trigger-daftar'";
        } else {


          $statusUser = $crud->eksekusiSQL("SELECT *FROM user_status
                                                            INNER JOIN paket_member ON
                                                            paket_member.id_paket = user_status.id_user
                                                            WHERE user_status.id_user='$userId' AND paket_member.nama_paket NOT IN
                                                            (SELECT nama_paket FROM paket_member WHERE nama_paket LIKE '%Free User%')
                                                            ");
          $hitungStUser = $crud->hitungData($statusUser);

          if ($hitungStUser == 0) {
            $coursePrem = "href='#' class='body-light title-link'";
          } else {
            $coursePrem = "href='?hal=course' class='body-light title-link'";
          }
        }
        ?>
        <a <?php echo $courseSemua; ?>>Lihat Semua ></a>
      </div>
      <div class="col col-slick">
        <!--Nested Grid System-->
        <div class="row row-slick slick">
          <?php
          $listPrem = $crud->eksekusiSQl("SELECT *FROM kursus 
                                                                INNER JOIN paket_member ON paket_member.id_paket = kursus.id_paket 
                                                                INNER JOIN pilar ON pilar.id_pilar = kursus.id_pilar
                                                                INNER JOIN kelas ON kelas.id_kelas = pilar.id_kelas
                                                                WHERE paket_member.nama_paket 
                                                                NOT IN (SELECT nama_paket FROM paket_member 
                                                                  WHERE nama_paket LIKE '%Free User%')
                                                              ");
          $hitungListP = $crud->hitungData($listPrem);
          if ($hitungListP == 0) {
            pesanKosong();
          } else {
            foreach ($listPrem as $prem) {
              $idKursus = $prem['id_kursus'];
              $namaKursus = $prem['nama_kursus'];
              $fotoK = $prem['foto_kursus'];
              $kelas = $prem['id_kelas'];
              $paketPrem = $prem['id_paket'];
              $pilarPrem = $prem['id_pilar'];
              $folKPrem = "./foto/kursus/$fotoK";



              if (empty($userId)) {

                //$atrKelasPrem = "href='#' data-toggle='modal' class='btn modal-trigger-daftar'";
                $atrKelasPrem = "href='#' class='btn mt-auto btn-mulai-slick' data-fancybox data-src='#pesanAwal' href='javascript:;'";
              } else {
                $statusCarian = "SELECT * FROM `user_status` 
                                      INNER JOIN user ON user.id_user = user_status.id_user 
                                      INNER JOIN paket_member ON paket_member.id_paket = user_status.id_paket 
                                      WHERE user_status.id_user = '$userId' 
                                      AND user_status.id_paket = '$paketPrem'
                                      AND paket_member.nama_paket NOT IN 
                                      (SELECT nama_paket FROM paket_member WHERE nama_paket LIKE '%Free User%')
                                    ";



                $cekStatus = $crud->eksekusiSQL($statusCarian);
                $cariStus  = $crud->hitungData($cekStatus);

                if ($cariStus == 0) {
                  $userPreneurAtr = "href='#' class='btn mt-auto btn-mulai-slick' data-fancybox data-src='#pesanUpgrade' href='javascript:;'";
                } else {

                  foreach ($cekStatus as $pak) {
                    $paketStatus = $pak['id_paket'];

                    $statusUp = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket>$paketStatus");
                    //$catusUp  = $crud->hitungData($statusUp);

                    foreach ($statusUp as $up) {
                    }
                  }

                  $userPreneurAtr = "href='?hal=course-detail&pl=$idKursus&k=$kelas&pilid=$pilarPrem&p=$paketPrem' class='btn mt-auto btn-mulai-slick' ";
                }

                $atrKelasPrem = $userPreneurAtr;
              }

              echo
              "
                                  <div class='col'>
                                    <div class='card card-slick'>
                                    <img class='card-img-top' src='$folKPrem' alt='Image'>
                                      <div class='card-body d-flex flex-column'>
                                          <h5 class='card-title'>$namaKursus</h5>
                                          <a $atrKelasPrem >Mulai Kelas</a>
                                      </div>
                                    </div>
                                  </div>
      
                                  ";
            }
          }
          ?>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- RESPONSIVE PREMIUM -->
<div class="container container-card-res">
  <div class="d-flex justify-content-between">
    <h1 class="caption-heavy title-class-status">Kelas Premium</h1>
    <span class="lihat-semua-res"><a href = "">Lihat Semua></a></span>
  </div>
  <div class="row row-cols-1">
    <div class="col">
      <div class="card card-home-res premium">
        <img src="./img/SM_01 1.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title small-heavy">GEM 00</h5>
          <p class="card-text small-light">This is a short card.</p>
          <a href="#" class="btn btn-pri-normal btn-mulai-res">Mulai Kelas</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-home-res premium">
        <img src="./img/SM_01 1.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title small-heavy">GEM 01</h5>
          <p class="card-text small-light">This is a short card.</p>
          <a href="#" class="btn btn-pri-normal btn-mulai-res">Mulai Kelas</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Upcoming event non responsive -->
<div class="container container-home container-card-non-res">
  <div class="d-flex justify-content-between">
    <h1 class="display-heavy title-class-status">Event Mendatang</h1>
    <span class="body-heavy"><a id="lihatSemuaEvent" href="?hal=event">Lihat Semua ></a></span>
  </div>

  <div class="row row-cols-3">
    <?php

    $perintah = $crud->eksekusiSQl("SELECT *FROM event 
                                                 ORDER BY id_event DESC LIMIT 3");
    $hitung   = $crud->hitungData($perintah);

    if ($hitung == 0) {
      pesanKosong();
    } else {


      // $tampilin = $isi->tampilData("user");

      $no = 1;
      foreach ($perintah as $a) {
        $nama = $a['nama_event'];
        $foto = $a['foto_event'];
        $tgl  = $a['tanggal_post'];

        $idev = $a['id_event'];
        $desk = $a['deskripsi'];

        $tanggal = date('d F Y', strtotime($tgl));

        $harga = $a['harga_event'];


        $biaya = "Rp. " . formatRupiah($harga) . ",00";


        if ($foto == "Kosong") {
          $gambar = "'img/nofoto.png'";
        } else {
          $tujuan = "foto/event/$foto";
          $gambar = "$tujuan";
        }





        if (empty($userId)) {
          $eAtr = "href='#' class='btn mt-auto btn-pri-normal btn-daftar-event modal-trigger-daftar'";
        } else {
          $eAtr = "href='?hal=event-info&k=$idev' class='btn mt-auto btn-pri-normal btn-daftar-event'";
        }



        echo
        "
        <div class='col'>
          <div class='card h-500 card-home-event'>
            <img src='$gambar' class='card-img-top' alt='...'>
            <div class='price-event subheader-heavy'>
                $biaya
            </div>
            <div class='card-body d-flex flex-column'>
              <h5 class='card-title subheader-heavy'>$nama</h5>
              <p class='card-text body-heavy'>$tanggal</p>
              
              
              <a $eAtr>Daftar</a>
            </div>
          </div>
        </div>
                        
        ";

        $no++;
      }
    }
    ?>
  </div>

</div>

<!--Upcoming event responsive -->
<div class="container container-card-res">
  <div class="d-flex justify-content-between">
    <h1 class="caption-heavy title-class-status">Event Mendatang</h1>
    <span class="lihat-semua-res"><a href = "">Lihat Semua></a></span>
  </div>
  <div class="row row-cols-1">
    <div class="col">
      <div class="card card-home-res">
        <img src="./img/image 34.png" class="card-img-top" alt="...">
        <div class="price-event-res xs-heavy">IDR 75000</div>
        <div class="card-body">
          <h5 class="card-title small-heavy">Webminar: </h5>
          <p class="card-text small-light">This is a short card.</p>
          <a href="#" class="btn btn-pri-normal btn-mulai-res">Mulai Kelas</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-home-res">
        <img src="./img/image 34.png" class="card-img-top" alt="...">
        <div class="price-event-res xs-heavy">IDR 75000</div>
        <div class="card-body">
          <h5 class="card-title small-heavy">Webminar: </h5>
          <p class="card-text small-light">This is a short card.</p>
          <a href="#" class="btn btn-pri-normal btn-mulai-res">Mulai Kelas</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container container-home container-bottom-banner">
  <h1 class="display-heavy banner-title-res">LEARN HOW TO BECOME ENTREPRENEUR</h1>
  <a href="#" class="btn btn-pri-normal btn-bottom-banner subheader-heavy">Get Started</a>
</div>

<?php
include './fungsional/konfig/footer.php';
?>