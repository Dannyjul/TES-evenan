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

            $filterKelasPaket = "SELECT * FROM paket_kelas
                                  INNER JOIN kelas On kelas.id_kelas = paket_kelas.id_kelas
                                  WHERE paket_kelas.id_paket='$idpaket'";
            $limit = 3;
            $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
            $mulai = ($page>1) ? ($page * $limit) - $limit : 0;
            $result = $crud->eksekusiSQL("SELECT * FROM paket_kelas
                              INNER JOIN kelas On kelas.id_kelas = paket_kelas.id_kelas
                              WHERE paket_kelas.id_paket='$idpaket'
                              LIMIT $mulai, $limit");
            $total = $crud->hitungData($result);
            $pages = ceil($total/$limit);            
            //$query = mysql_query("select * from tb_masjid LIMIT $mulai, $limit")or die(mysql_error);
            $no =$mulai+1;

                  
            /*$perintah = $crud->eksekusiSQl("SELECT *FROM paket_kelas 
                                            INNER JOIN kelas ON kelas.id_kelas = paket_kelas.id_kelas
                                            WHERE paket_kelas.id_paket = '$idpaket'
                                            ");
            */
            $hitung   = $crud->hitungData($result);

            if ($hitung==0) 
            {
                pesanKosong();
            }
            else
            {
                

              // $tampilin = $crud->tampilData("user");

              $no=1;
              foreach($result as $a)
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

  <div class="container page">
        
    <div class="pagination">
    <!-- LINK FIRST AND PREV -->
    <?php
        if($page == 1)
        { // Jika page adalah page ke 1, maka disable link PREV
        
            $link_prev = ($page > 1)? $page - 1 : 1;
            echo
            "
            <a href='?hal=course&page=1'>&lt;&lt;</a>
            <a href='?hal=course&page=$link_prev'>&lt;</a>
            ";
        
        }
        else
        { // Jika page bukan page ke 1
            $link_prev = ($page > 1)? $page - 1 : 1;

            echo
            "
                <!-- LINK FIRST AND PREV -->
                <a href='?hal=course&page=1'>&lt;&lt;</a>
                <a href='?hal=course&page=$link_prev'>&lt;</a>
            ";
            
            /*<li><a href="index.php?page=1">First</a></li>
            <li><a href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
            */
            
        }
    ?>
        <!--<a href="#">&lt;&lt;</a>
        <a href="#">&lt;</a>-->
    <!-- LINK NUMBER -->
    <?php

    // Buat query untuk menghitung semua jumlah data
        $sql2 = $crud->eksekusiSQL("SELECT COUNT(*) AS jumlah FROM paket_kelas
                                    INNER JOIN kelas On kelas.id_kelas = paket_kelas.id_kelas
                                    WHERE paket_kelas.id_paket='$idpaket'
                                  ");
        //$sql2->execute(); // Eksekusi querynya
        //$get_jumlah = $crud->hitungData($sql2);
        foreach ($sql2 as $s) 
        {
            $get_jumlah = $s['jumlah'];

            
        }
        
        $jumlah_page = ceil($get_jumlah / $limit); // Hitung jumlah halamannya
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++)
        {
            $link_active = ($page == $i)? ' class="active"' : '';
            echo
            "
            <a href='?hal=course&page=$i' $link_active>$i</a>
            ";
        }
    ?>
        
    
        <!--<a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>-->

    <!-- LINK NEXT AND LAST -->
    <?php
    
    // Jika page sama dengan jumlah page, maka disable link NEXT nya
    // Artinya page tersebut adalah page terakhir 
    if($page == $jumlah_page)
    { // Jika page terakhir
    
        echo
        "
        <a class='disabled'>&gt;</a>
        <a class='disabled'>&gt;&gt;</a>
        ";
    
    }
    else
    { // Jika Bukan page terakhir
        // $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
    
        $link_next = $page + 1;
        echo
        "
        <a href='?hal=course&page=$link_next'>&gt;</a>
        <a href='?hal=course&page=$jumlah_page'>&gt;&gt;</a>
        ";
    
    }
    
    ?>
        <!--<a href="#">&gt;</a>
        <a href="#">&gt;&gt;</a>-->
    </div>  


    
    
</div>  
 
</section>
<?php

include './fungsional/konfig/footer.php';

?>

