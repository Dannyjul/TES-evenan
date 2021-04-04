<?php
    include './fungsional/konfig/header.php';
    
  $event = $crud->eksekusiSQl("SELECT *FROM info 
                                        
                                        WHERE jenis_info='Event'
                                        ");
  foreach ($event as $ev) {
    
    $foto  = $ev['foto_info'];
      $tujuanHeader = "./foto/$foto";
      $jenis = $ev['jenis_info'];
      $desk = $ev['deskripsi'];
     
    }


    echo
    "
    <style>
      .gambar-bg
        {
            background-image: url('$tujuanHeader');
        }
    </style>
    ";
  
   
?>

  <header class="masthead gambar-bg text-center text-white ">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0"><?php echo $jenis;?></h1>
        <!--<h5 class="masthead-subheading mb-0">Isinya Event</h5>-->
        <h5><?php echo $desk;?></h5>
       
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section id="upcoming-event">
        <div class="container">
            <h1 class="status-title">Event Mendatang</h1>
            <div class="card-deck event">
    
    <?php
                
        $perintah = $crud->eksekusiSQl("SELECT *FROM event 
                                        ORDER BY id_event DESC");
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

                if($no%2==0) 
                {
                  $floating1="order-lg-1";
                  $floating2="order-lg-2";
                } 
                else 
                {
                  $floating1="";
                  $floating2="";
                }


                if (empty($userId)) 
                {
                  $eAtr = "href='#' data-toggle='modal' data-target='#Daftar'";
                } 
                else 
                {
                  $eAtr = "href='?hal=event-info&k=$idev'";
                }
                

                
                

                echo
                "

               
                  <div class='card card-all-event'>
                    <div class='inner-card'>
                        <img src='$gambar' class='card-img-top' alt='$nama'>
                        <div class='price-tag'>
                            <p>$biaya</p>
                        </div>
                        <div class='card-body'>
                          <h5 class='card-title'>$nama</h5>
                          <p class='card-text hari'>$tanggal</p>
                          
                          
                          <a href='#' class='btn modal-trigger-btn'>Daftar</a>
                          <a class='details' href='?hal=event-info&k=$idev'>Selengkapnya</a>
                        </div>
                    </div>
                  </div>
                
                
                

                
                  <div class='card card-all-event'>
                    <div class='inner-card'>
                        <img src='$gambar' class='card-img-top' alt='$nama'>
                        <div class='price-tag'>
                            <p>$biaya</p>
                        </div>
                        <div class='card-body'>
                          <h5 class='card-title'>$nama</h5>
                          <p class='card-text hari'>$tanggal</p>
                          
                          
                          <a href='#' class='btn modal-trigger-btn'>Daftar</a>
                          <a class='details' href='?hal=event-info&k=$idev'>Selengkapnya</a>
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

  


  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>