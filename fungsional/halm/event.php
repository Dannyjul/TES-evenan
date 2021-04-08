<link rel="stylesheet" href="./css/event.css">

<?php
    include './fungsional/konfig/header.php';
    $event = $crud->eksekusiSQl("SELECT *FROM info 
                                        
                                        WHERE jenis_info='Event'
                                        ");
    foreach ($event as $ev) 
    {
    
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


<section id="all-events">
        <div class="container">
            <h1 class="status-title">Semua Events</h1>

            <div class="row row-cols-3">

            <?php

                $halaman = 10;
                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                $result = $crud->eksekusiSQL("SELECT * FROM event");
                $total = $crud->hitungData($result);
                $pages = ceil($total/$halaman);            
                //$query = mysql_query("select * from tb_masjid LIMIT $mulai, $halaman")or die(mysql_error);
                $no =$mulai+1;
                                
                $perintah = $crud->eksekusiSQl("SELECT *FROM event 
                                                ORDER BY id_event DESC LIMIT $mulai, $halaman");
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

                        $now = date('Y-m-d');
        
        
                        $biaya= "Rp ".formatRupiah($harga).",-";

                        $waktu = $a['waktu'];
                        
        
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
                            $eAtr = "href='#' data-toggle='modal' class='btn modal-trigger-daftar'";
                        } 
                        else 
                        {
                            $eAtr = "href='?hal=event-info&k=$idev' class='btn'";
                        }



                        if ($now > $waktu) 
                        {    
                            $atributEvent = "href='#' class='btn disabled'";
                        }

                        else
                        {
                            $atributEvent ="href='?hal=konfirmasi-pembayaran&k=$idev&mau=event' class='btn'";
                        }


                        
                        
                        
                        $acara = date('d F Y', strtotime($waktu));
        
                        echo
                        "
        
                        
                           
                        
                        <div class='col'>
                            <div class='card card-all-event'>
                                <div class='inner-card'>
                                    <img src='$tujuan' alt='$nama' width='100%'>
                                    <div class='price-tag'>
                                        <p>$biaya</p>
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$nama</h5>
                                        <p class='card-text hari'>$acara</p>
                                        
                                        
                                        <a $eAtr>Daftar</a>
                                        <a class='details' href='?hal=event-info&k=$idev'>See Details</a>
                                    </div>
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
<ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        /*
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a href="index.php?page=1">First</a></li>
          <li><a href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }*/
        ?>
        
        <!-- LINK NUMBER -->
        <?php
        /*
        // Buat query untuk menghitung semua jumlah data
        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM siswa");
        $sql2->execute(); // Eksekusi querynya
        $get_jumlah = $sql2->fetch();
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        /*
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($page == $jumlah_page){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a href="index.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="index.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        */
        ?>
      </ul>

<section id="page-num">
        <div class="container page">
        
            <div class="pagination">
            <?php
                if($page == 1)
                { // Jika page adalah page ke 1, maka disable link PREV
                
                    echo
                    "
                    <a class='disabled' href='#'>&lt;&lt;</a>
                    <a class='disabled' href='#'>&lt;</a>
                    ";
                
                }
                else
                { // Jika page bukan page ke 1
                    $link_prev = ($page > 1)? $page - 1 : 1;

                    echo
                    "
                        <!-- LINK FIRST AND PREV -->
                        <a href='?hal=event&halaman=1'>hshjahsja&gt;</a>
                        <a href='?hal=event&halaman=$link_prev'>&gt;&gt;</a>
                    ";
                    
                    /*<li><a href="index.php?page=1">First</a></li>
                    <li><a href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                    */
                    
                }
            ?>
                <!--<a href="#">&lt;&lt;</a>
                <a href="#">&lt;</a>-->
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">&gt;</a>
                <a href="#">&gt;&gt;</a>
              </div>  
           
        </div>    
    </section>


<?php
    
    //include './fungsional/konfig/bottom-banner.php';
    include './fungsional/konfig/footer.php';

?>