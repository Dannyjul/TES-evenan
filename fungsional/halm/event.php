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


<?php
    
    //include './fungsional/konfig/bottom-banner.php';
    include './fungsional/konfig/footer.php';

?>