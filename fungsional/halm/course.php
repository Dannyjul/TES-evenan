<link rel="stylesheet" href="./css/course.css">

<?php
    include './fungsional/konfig/header.php';
    $kursus = $crud->eksekusiSQl("SELECT *FROM info 
                                        
    WHERE jenis_info='Course'
    ");
    foreach ($kursus as $ev) {

    $foto  = $ev['foto_info'];
    $tujuanHeader = "./foto/$foto";
    $jenis = $ev['jenis_info'];
    $desk = $ev['deskripsi'];


    }

?>
<section id="banner">
  <div class="container">
    <img  class="top-banner" src=" <?php echo $tujuanHeader; ?>" />
  </div>
</section>



<!-- INI COURSE -->
<section id="courses">
  <div class="container">
  <div class="container-card">
    <?php

            $statuser = $crud->eksekusiSQl("SELECT *FROM user_status
                                              INNER JOIN paket_member
                                                ON user_status.id_paket = paket_member.id_paket
                                            WHERE id_user='$userId'");

            foreach ($statuser as $e) 
            {
              $idpaket     = $e['id_paket'];
              $jumlahKelas = $e['jumlah_kelas'];
              $namaPaket   = $e['nama_paket'];
              //$carPak = $crud->eksekusiSQL("SELECT *FROM paket_membership WHERE nama_paket='$namaPaket'");
            }

            echo
            "
              <h1 class='status-member'>$namaPaket</h1>        
            ";

                  
            $perintah = $crud->eksekusiSQl("SELECT *FROM kelas LIMIT $jumlahKelas");
            $hitung   = $crud->hitungData($perintah);

            if ($hitung==0) 
            {
                pesanKosong();
            }
            else
            {
                

              // $tampilin = $crud->tampilData("user");

              $no=1;
              foreach($perintah as $a)
              {
                  $idkel = $a['id_kelas'];
                  $nama  = $a['nama_kelas'];
                  $foto  = $a['foto_kelas'];

                  $desk  = $a['deskripsi'];
                  $pesan = $a['pesan'];

                  $kondisi = $a['kondisi'];

                  if ($pesan==NULL) 
                  {
                    $pesanF = $desk;
                  } 
                  else 
                  {
                    $pesanF = $pesan;
                  }
                  
                  
                  
                  $pel = $crud->eksekusiSQl("SELECT *FROM kursus 
                                              INNER JOIN pilar ON
                                              pilar.id_pilar = kursus.id_pilar
                                              INNER JOIN kelas ON
                                              kelas.id_kelas = pilar.id_kelas
                                              WHERE 
                                              pilar.id_kelas='$idkel'");
                  $hit = $crud->hitungData($pel);

                  if ($foto=="Kosong") 
                  {
                      $gambar = "<img src='img/nofoto.png'>";
                  } 
                  else 
                  {
                      $tujuan = "foto/$foto";
                      $gambar = 
                      "   
                        <img src='$tujuan'>
                        
                      ";
                  }

                  if ($kondisi=='DRAFT') 
                  {
                      $warna ="gainsboro";
                  }
                  else
                  {
                      $warna = "white";
                  }


                  if($hit>0)
                  {
                      $kursus = "<a href='?hal=kursus-kelas&idk=$idkel'>$hit Pelajaran</a>";
                  }
                  else
                  {
                      $kursus = "Belum ada";
                  }

                 
                  

                  echo
                  "
                  <div class='card-course'>
                    <div class='row-1'>
                        $gambar
                        <a class='btn btn-mulai' href='?hal=course-info&k=$idkel&p=$idpaket' >Mulai Kelas</a>
                    </div>
                    <div class='card-body row-2'>
                        <h2 class='card-title'>$nama</h2>
                        <p class='subcourse'>$hit Pelajaran</p>
                        <h3 class='desc-course'>Description</h3>
                        $desk
                    </div>
                  </div>

                  ";
                  $no++;
                
              }
              

            }

    ?>

            <!-- INI UNTUK LOCKED COURSE, 
                KALAU MAU PAKE DISPLAY:BLOCK, 
                KALAU GAK MAU DIPAKAI DISPLAY: NONE 
                (SILAHKAN UBAH DI CSS (di .locked-courses)). 
                DEFAULT DISPLAY NONE-->
            <div class="locked-courses">
                <img src="Lock.png" alt="">
                <h3>THIS CLASS IS LOCKED FOR YOUR MEMBER LEVEL</h3> 
                <a class="btn btn-locked" href="">UPGRADE</a>
            </div>
        </div>

    </div>
  </div>
 
</section>
<?php

include './fungsional/konfig/footer.php';

?>

