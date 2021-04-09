<?php
include './fungsional/konfig/header.php';

$event = $crud->eksekusiSQl("SELECT *FROM info 
                                        
                                        WHERE jenis_info='EliTES Membership'
                                        ");
foreach ($event as $ev) {

  $foto  = $ev['foto_info'];
  $tujuanHeader = "./foto/$foto";
  $jenis = $ev['jenis_info'];
  $desk = $ev['deskripsi'];

}

  include './fungsional/konfig/slider.php';

?>
<!--
<section id="banner">
        <div class="container">
-->
            <!--Carousel-->
            <!--
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            -->
                <!--Carousel Indicators-->
            <!--
                <ol class='carousel-indicators'>
                    <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                    <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
                    <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
                    <li data-target='#carouselExampleIndicators' data-slide-to='3'></li>
                </ol>
            -->
                <!--Carousel Banner-->
            <!--
                <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img  src=" <?php //echo $tujuanHeader; ?>" />
                    </div>
                    <div class="carousel-item">
                      <img  src=" <?php //echo $tujuanHeader; ?>" />
                    </div>
                    <div class="carousel-item">
                      <img  src=" <?php //echo $tujuanHeader; ?>" />
                    </div>
                    <div class="carousel-item">
                      <img  src=" <?php //echo $tujuanHeader; ?>" />
                    </div>
                </div>
            
            </div>

        </div>
</section>-->

    <section id="content">
    <div class="container">
            <h1 class="title-status">Kelas Gratis</h1>
            <div class="container-grid container-grid-free">
                <!--Pake Grid System-->
                <div class="row">
                <!-- INI UNTUK TITLE -->
                    <div class="col col-title">
                        <img class="title-icon"
                            src="./img/Icon.png"
                            alt="icon">
                            <?php
                                  $kelasFree = $crud->eksekusiSQl("SELECT * FROM `kursus` 
                                                                      INNER JOIN paket_member ON paket_member.id_paket = kursus.id_paket
                                                                      INNER JOIN pilar ON pilar.id_pilar = kursus.id_pilar
                                                                      INNER JOIN kelas ON kelas.id_kelas = pilar.id_kelas
                                                                  WHERE paket_member.nama_paket LIKE '%FREE USER%' 
                                                                  ORDER BY kelas.id_kelas LIMIT 1
                                                                  ");
                                  $hitungKelF = $crud->hitungData($kelasFree);
                                  if ($hitungKelF==0) 
                                  {
                                    pesanKosong();
                                  }
                                  else
                                  {
                                    foreach ($kelasFree as $free) 
                                    {
                                      $idKelas = $free['id_kelas'];
                                      $namaKel = $free['nama_kelas'];

                                      echo
                                      "
                                        <h3 class='title-class'>
                                          $namaKel
                                        </h3>
                                      ";
                                    }
                                  }

                                  if (empty($userId)) 
                                  {
                                    $courseSemua = "href='#' data-toggle='modal' class='title-link modal-trigger-daftar'";
                                  }
                                  else 
                                  {
                                    $courseSemua = "href='?hal=course' class='title-link'";
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
                              if ($hitungListF==0) 
                              {
                                pesanKosong();
                              }
                              else
                              {
                                foreach ($listFree as $free) 
                                {
                                  $idkel = $free['id_kelas'];
                                  $namaKursus = $free['nama_kursus'];
                                  $idkur = $free['id_kursus'];
                                  $paketFree = $free['id_paket'];
                                  $pilarFree = $free['id_pilar'];

                                  $fotoK = $free['foto_kursus'];

                                  $folKfree = "./foto/kursus/$fotoK";

                                  if (empty($userId)) 
                                  {
                                    //href='#' data-fancybox data-src='#pesanAwal' href='javascript:;'
                                    //$atrKelas = "href='#' data-toggle='modal' class='btn modal-trigger-daftar'";
                                    $atrKelas ="href='#' class='btn' data-fancybox data-src='#pesanAwal' href='javascript:;'";
                                  }
                                  else 
                                  {
                                    $atrKelas = "href='?hal=course-detail&pl=$idkur&k=$idkel&p=$paketFree&pilid=$pilarFree' class='btn'";
                                  }
                    
                                  echo
                                  "
                                  <div class='col'>
                                    <div class='card'>
                                    <img class='card-img-top' src='$folKfree' alt='Image'>
                                      <div class='card-body'>
                                          <h5 class='card-title'>$namaKursus</h5>
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

        <div class="container">
            <h1 class="title-status">Kelas Premium</h1>
            <div class="container-grid container-grid-premium">
                <!--Pake Grid System-->
                <div class="row">
                    <div class="col col-title">
                        <img class="title-icon"
                            src="./img/Icon-2.png"
                            alt="icon">
                            <?php
                                 
                                    

                                  echo
                                  "
                                    <h3 class='title-class'>
                                      PREMIUM
                                    </h3>
                                  ";
                                    
                                  


                                  if (empty($userId)) 
                                  {
                                    $coursePrem = "href='#' data-toggle='modal' class='title-link modal-trigger-daftar'";
                                  }
                                  else 
                                  {
                                    

                                    $statusUser = $crud->eksekusiSQL("SELECT *FROM user_status
                                                            INNER JOIN paket_member ON
                                                            paket_member.id_paket = user_status.id_user
                                                            WHERE user_status.id_user='$userId' AND paket_member.nama_paket NOT IN
                                                            (SELECT nama_paket FROM paket_member WHERE nama_paket LIKE '%Free User%')
                                                            ");
                                    $hitungStUser = $crud->hitungData($statusUser);

                                    if ($hitungStUser==0) 
                                    {
                                      $coursePrem = "href='#' class='title-link'";
                                    } 
                                    else 
                                    {
                                      $coursePrem = "href='?hal=course' class='title-link'";
                                    }
                                    
                                  }
                              ?>
                        <a <?php echo $coursePrem; ?> >Lihat Semua ></a>
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
                              if ($hitungListP==0) 
                              {
                                pesanKosong();
                              }
                              else
                              {
                                foreach ($listPrem as $prem) 
                                {
                                  $idKursus = $prem['id_kursus'];
                                  $namaKursus = $prem['nama_kursus'];
                                  $fotoK = $prem['foto_kursus'];
                                  $kelas = $prem['id_kelas'];
                                  $paketPrem = $prem['id_paket'];
                                  $pilarPrem = $prem['id_pilar'];
                                  $folKPrem = "./foto/kursus/$fotoK";

                                  

                                  if (empty($userId)) 
                                  {
                                    
                                    //$atrKelasPrem = "href='#' data-toggle='modal' class='btn modal-trigger-daftar'";
                                    $atrKelasPrem = "href='#' class='btn' data-fancybox data-src='#pesanAwal' href='javascript:;'";
                                  }
                                  else 
                                  {
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

                                    if ($cariStus==0) 
                                    {
                                      $userPreneurAtr = "href='#' class='btn' data-fancybox data-src='#pesanUpgrade' href='javascript:;'";
                                    } 
                                    else 
                                    {
                                      /*foreach ($cekStatus as $pak) 
                                      {
                                        $paketStatus = $pak['id_paket'];
                                        
                                        $statusUp = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket>$paketStatus");
                                        $catusUp  = $crud->hitungData($statusUp);

                                        if ($catusUp==0) 
                                        {
                                          $userPreneurAtr = "href='?hal=course-detail&pl=$idKursus&k=$kelas' class='btn'";
                                        } 
                                        else 
                                        {
                                          $userPreneurAtr = "href='#' class='btn' data-fancybox data-src='#pesanUpgrade' href='javascript:;'";
                                        }
                                        

                                      

                                        
                                        
                                      }*/

                                      foreach ($cekStatus as $pak) 
                                      {
                                        $paketStatus = $pak['id_paket'];
                                        
                                        $statusUp = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket>$paketStatus");
                                        //$catusUp  = $crud->hitungData($statusUp);

                                        foreach ($statusUp as $up) 
                                        {
                                          
                                        }
                                        

                                      }

                                      $userPreneurAtr = "href='?hal=course-detail&pl=$idKursus&k=$kelas&pilid=$pilarPrem&p=$paketPrem' class='btn'";
                                      
                                    }
                                    
                                    $atrKelasPrem = $userPreneurAtr;
                                  }
                    
                                  echo
                                  "
                                  <div class='col'>
                                    <div class='card'>
                                    <img class='card-img-top' src='$folKPrem' alt='Image'>
                                      <div class='card-body'>
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

        <!--Upcoming Event-->
        <!--Ini pake Card Deck Bootstrap-->
        <div class="container">
            <h1 class="title-status">Event Mendatang<span class="event-link"><a href="?hal=event">Lihat Semua ></a></span></h1>
            <div class="card-deck event">
            <?php
                
                $perintah = $crud->eksekusiSQl("SELECT *FROM event 
                                                 ORDER BY id_event DESC LIMIT 3");
                $hitung   = $crud->hitungData($perintah);
          
                if ($hitung==0) 
                {
                    pesanKosong();
                }
                else
                {
                    
          
                    // $tampilin = $isi->tampilData("user");
          
                    $no=1;
                    foreach($perintah as $a)
                    {
                        $nama = $a['nama_event'];
                        $foto = $a['foto_event'];
                        $tgl  = $a['tanggal_post'];
                        
                        $idev = $a['id_event'];
                        $desk = $a['deskripsi'];
                        
                        $tanggal = date('d F Y', strtotime($tgl));
          
                        $harga = $a['harga_event'];
          
          
                        $biaya= "Rp ".formatRupiah($harga).",-";
                        
          
                        if ($foto=="Kosong") 
                        {
                            $gambar = "'img/nofoto.png'";
                        } 
                        else 
                        {
                            $tujuan = "foto/event/$foto";
                            $gambar = "$tujuan";
                        }
          
                        
                        
          
          
                        if (empty($userId)) 
                        {
                          $eAtr = "href='#' class='btn modal-trigger-btn modal-trigger-daftar'";
                        } 
                        else 
                        {
                          $eAtr = "href='?hal=event-info&k=$idev' class='btn'";
                        }
                        
          
                        
                        echo
                        "
                        
                        <div class='card'>
                          <div class='inner-card'>
                              <img src='$gambar' class='card-img-top' alt='...'>
                              <div class='price-tag'>
                                  <p>$biaya</p>
                              </div>
                              <div class='card-body'>
                                <h5 class='card-title'>$nama</h5>
                                <p class='card-text hari'>$tanggal</p>
                                
                                
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
    </section>
    
<?php
  //include './fungsional/konfig/bottom-banner.php';
?>

<?php
  include './fungsional/konfig/footer.php';
?>
