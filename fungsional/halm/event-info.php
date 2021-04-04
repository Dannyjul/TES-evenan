<link rel="stylesheet" href="./css/event.css">
<link rel="stylesheet" href="./css/register.css">

<?php
include './fungsional/konfig/header.php';

$event = $crud->eksekusiSQl("SELECT *FROM info WHERE jenis_info='Event' ");
foreach ($event as $ev) 
{

    $foto  = $ev['foto_info'];
    $tujuanHeader = "./foto/$foto";
    $jenis = $ev['jenis_info'];
    $desk = $ev['deskripsi'];
}

$id = $_GET['k'];

$y = $crud->tampilId("event", "id_event", $id);

foreach ($y as $a) {
  $nama = $a['nama_event'];
  $foto = $a['foto_event'];
  $tgl  = $a['tanggal_post'];
  //$autor= $a['nama_user'];
  $desk = $a['deskripsi'];
  //$idev = $a['id_event'];

  $lokasinya = $a['lokasi'];
  $vanue = $a['venue'];
  $waktu = $a['waktu'];
  $kuota = $a['kuota'];
  $harga = $a['harga_event'];

  $tanggal = date('d F Y', strtotime($tgl));


  $biaya = "Rp " . formatRupiah($harga) . ",-";

  if ($foto == "Kosong") {
    $gambar = "<img src='../img/nofoto.png' width='200' height='150'>";
  } else {
    $tujuan = "foto/event/$foto";
    $gambar =
      "   <a class='img-fluid' href='$tujuan' data-fancybox='' data-caption='$nama'>
                    <img src='$tujuan' width='200' height='150'>
                </a>
            ";
  }

  $fotoEnkripsi = base64_decode($foto);
}

?>

<section id="banner">
        <div class="container">
            <img  class="top-banner" src=" <?php echo $tujuanHeader; ?>" />
        </div>
</section>

<section id="registration">

        <div class="container container-registration">
        
            <div class="registration-form-outer">
                <div class="registration-form-inner">

                    <div class="content">
                        <div class="title-event">
                            <h2><?php echo "$nama";?></h2>
                            <h4><?php echo "$tanggal";?></h4>
                        </div>
                        <img class="img-fluid" src="<?php echo $tujuan; ?>" alt="">    

                        <div class="deskripsi">
                            <h4>Deskripsi</h4>
                            <p><?php echo $desk; ?></p>
                        </div>

                        <div class="details">
                          <div class="category">
                                <h5>Lokasi</h5>
                                <div class="detail-info"><?php echo $lokasinya; ?></div>
                            </div>
    
                            <div class="category">
                                <h5>Venue</h5>
                                <div class="detail-info"><?php echo $vanue; ?></div>
                            </div>
    
                            <div class="category"> 
                                <h5>Waktu Pelaksanaan</h5>
                                <div class="detail-info"><?php echo $waktu; ?></div>
                            </div>

                            <div class="category"> 
                                <h5>Kuota Peserta</h5>
                                <div class="detail-info"><?php echo $kuota; ?> Orang</div>
                            </div>

                            <div class="category"> 
                                <h5>Biaya</h5>
                                <div class="detail-info"><?php echo $biaya; ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="share-banner">
                    <?php
                        $isiTrans = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE id_event='$id' AND keterangan='Ok'");
                        $cekHitung = $crud->hitungData($isiTrans);

                        $now = date('Y-m-d');









                        if ($cekHitung == $kuota) {
                          $arahin =
                            "
                                <h2>Maaf, Kuota sudah Penuh</h2>
                              ";

                          $cekTransa = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE id_event='$id' AND id_user='$iduser' AND keterangan='Ok'");
                          $cariTra   = $crud->hitungData($cekTransa);

                          if ($cariTra > 0) {
                            $arahin =
                              "
                                    <h2>Anda sudah terdaftar di Event ini</h2>
                                  ";
                          }
                        } else {
                          if (empty($iduser)) {

                            $arahin =
                              "
                                
                                <p>Untuk mengikuti Event ini, anda harus terdaftar sebagai Member.</p>
                                
                                <a href='#' class='modal-trigger-daftar btn btn-primary btn-lg'>
                                  DAFTAR SEBAGAI MEMBER
                                </a>
                                ";
                          } else {
                            $cekTrans = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE id_event='$id' AND id_user='$iduser' AND keterangan='Ok'");
                            $cariTr   = $crud->hitungData($cekTrans);

                            if ($cariTr > 0) {
                              $arahin =
                                "
                                    <h2>Anda sudah terdaftar di Event ini</h2>
                                  ";
                            } else {
                              $arahin =
                                "
                                  <a href='?hal=konfirmasi-pembayaran&k=$id&mau=event' class='btn'>
                                    DAFTAR EVENT
                                  </a>
                                  ";
                            }
                          }
                        }

                        //$ko = 
                        if ($now > $waktu) {
                          $arahin =
                            "
                            <a href='#' class='btn disabled'>
                              EVENT SUDAH LEWAT
                            </a>
                                ";
                        }


                        //echo "<p>$arahin</p>";
                        ?>
                        <div class="separate part3">
                          <?php echo $arahin; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</section>



<?php
include './fungsional/konfig/footer.php';
?>