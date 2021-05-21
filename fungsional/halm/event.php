<link rel="stylesheet" href="./css/event.css">

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
?>


<div class="container container-event">
    <img class="top-banner" src=" <?php echo $tujuanHeader; ?>" />
</div>

<!-- EVENT NON RESPONSIVE -->
<div class="container container-card-non-res">
    <h1 class="display-heavy status-title">Semua Events</h1>

    <div class="row row-cols-3">
        <?php

        $limit = 3;
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $mulai = ($page > 1) ? ($page * $limit) - $limit : 0;
        $result = $crud->eksekusiSQL("SELECT * FROM event WHERE keterangan='POSTING'");
        $total = $crud->hitungData($result);
        $pages = ceil($total / $limit);
        //$query = mysql_query("select * from tb_masjid LIMIT $mulai, $limit")or die(mysql_error);
        $no = $mulai + 1;

        $perintah = $crud->eksekusiSQl("SELECT *FROM event WHERE keterangan='POSTING' 
                                                ORDER BY id_event DESC LIMIT $mulai, $limit");
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

                $now = date('Y-m-d');


                $biaya = "Rp " . formatRupiah($harga) . ",00";

                $waktu = $a['waktu'];


                if ($foto == "Kosong") {
                    $gambar = "'img/nofoto.png'";
                } else {
                    $tujuan = "foto/event/$foto";
                    $gambar = "$tujuan";
                }

                

                if (empty($userId)) {
                    $eAtr = "href='#' data-toggle='modal' class='btn mt-auto btn-daftar-event modal-trigger-daftar'";
                } else {
                    $eAtr = "href='?hal=event-info&k=$idev' class='btn mt-auto btn-daftar-event'";
                }



                if ($now > $waktu) {
                    $atributEvent = "href='#' class='btn mt-auto btn-daftar-event disabled'";
                } else {
                    $atributEvent = "href='?hal=konfirmasi-pembayaran&k=$idev&mau=event' class='btn mt-auto btn-daftar-event'";
                }





                $acara = date('d F Y', strtotime($waktu));

                echo
                "
        
                        
                           
                        
                        <div class='col'>
                            <div class='card h-500 card-event'>
                                    <img class='card-img-top' src='$tujuan' alt='$nama' width='100%'>
                                    <div class='price-tag'>
                                        <p>$biaya</p>
                                    </div>
                                    <div class='card-body d-flex flex-column'>
                                        <h5 class='title-heavy'>$nama</h5>
                                        <p class='body-light'>$acara</p>
                                        
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

<!-- EVENT RESPONSIVE -->

<div class="container container-card-res">
  <div class="d-flex justify-content-between">
    <h1 class="caption-heavy title-class-status">Event Mendatang</h1>
  </div>
  <div class="row row-cols-1">
  <?php

$limit = 3;
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$mulai = ($page > 1) ? ($page * $limit) - $limit : 0;
$result = $crud->eksekusiSQL("SELECT * FROM event WHERE keterangan='POSTING'");
$total = $crud->hitungData($result);
$pages = ceil($total / $limit);
//$query = mysql_query("select * from tb_masjid LIMIT $mulai, $limit")or die(mysql_error);
$no = $mulai + 1;

$perintah = $crud->eksekusiSQl("SELECT *FROM event WHERE keterangan='POSTING' 
                                ORDER BY id_event DESC");
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

        $now = date('Y-m-d');


        $biaya = "Rp " . formatRupiah($harga) . ",00";

        $waktu = $a['waktu'];


        if ($foto == "Kosong") {
            $gambar = "'img/nofoto.png'";
        } else {
            $tujuan = "foto/event/$foto";
            $gambar = "$tujuan";
        }



        if (empty($userId)) {
            $eAtr = "href='#' data-toggle='modal' class='btn btn-pri-normal btn-mulai-res modal-trigger-daftar'";
        } else {
            $eAtr = "href='?hal=event-info&k=$idev' class='btn btn-pri-normal btn-mulai-res'";
        }



        if ($now > $waktu) {
            $atributEvent = "href='#' class='btn disabled'";
        } else {
            $atributEvent = "href='?hal=konfirmasi-pembayaran&k=$idev&mau=event' class='btn'";
        }

        $acara = date('d F Y', strtotime($waktu));

        echo
        "
        <div class='col'>
          <div class='card card-event-res'>
            <img src='$gambar' class='card-img-top' alt='...'>
            <div class='price-event-res xs-heavy'>
                $biaya
            </div>
            <div class='card-body'>
              <h5 class='card-title small-heavy'>$nama</h5>
              <p class='card-text small-light'>$tanggal</p>
              
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

<div class="container page">
    <div class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if ($page == 1) { // Jika page adalah page ke 1, maka disable link PREV

            $link_prev = ($page > 1) ? $page - 1 : 1;
            echo
            "
                    <a href='?hal=event&page=1'>&lt;&lt;</a>
                    <a href='?hal=event&page=$link_prev'>&lt;</a>
                    ";
        } else { // Jika page bukan page ke 1
            $link_prev = ($page > 1) ? $page - 1 : 1;

            echo
            "
                        <!-- LINK FIRST AND PREV -->
                        <a href='?hal=event&page=1'>&lt;&lt;</a>
                        <a href='?hal=event&page=$link_prev'>&lt;</a>
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
        $sql2 = $crud->eksekusiSQL("SELECT COUNT(*) AS jumlah FROM event WHERE keterangan='POSTING'");
        //$sql2->execute(); // Eksekusi querynya
        //$get_jumlah = $crud->hitungData($sql2);
        foreach ($sql2 as $s) {
            $get_jumlah = $s['jumlah'];
        }

        $jumlah_page = ceil($get_jumlah / $limit); // Hitung jumlah halamannya
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

        for ($i = $start_number; $i <= $end_number; $i++) {
            $link_active = ($page == $i) ? ' class="active"' : '';
            echo
            "
                    <a href='?hal=event&page=$i' $link_active>$i</a>
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
        if ($page == $jumlah_page) { // Jika page terakhir

            echo
            "
                <a class='disabled'>&gt;</a>
                <a class='disabled'>&gt;&gt;</a>
                ";
        } else { // Jika Bukan page terakhir
            // $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;

            $link_next = $page + 1;
            echo
            "
                <a href='?hal=event&page=$link_next'>&gt;</a>
                <a href='?hal=event&page=$jumlah_page'>&gt;&gt;</a>
                ";
        }

        ?>
        <!--<a href="#">&gt;</a>
                <a href="#">&gt;&gt;</a>-->
    </div>
</div>






<?php

//include './fungsional/konfig/bottom-banner.php';
include './fungsional/konfig/footer.php';

?>