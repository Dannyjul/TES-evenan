

<link rel="stylesheet" href="./css/course-info.css">

<?php
include './fungsional/konfig/header.php';

?>

<div class="container container-course-info">
    
    <?php
        include 'course-menuKiri.php';
    ?>




    <div class="course-content content">

        <!-- MATERI CONTENT-->
        <?php
        $pl = @$_GET['pl'];
        $pilar = @$_GET['pilar'];
        if (!empty($pilar)) 
        {
           $x = "SELECT *FROM kursus
                            INNER JOIN pilar ON pilar.id_pilar = kursus.id_pilar
                          WHERE kursus.id_kursus='$pl' AND kursus.id_pilar='$pilar'";
           
           $next = " SELECT *FROM kursus     
            WHERE
            id_kelas='$kelas' AND
            id_kursus>$pl 
            ORDER BY id_kursus ASC LIMIT 1
            ;";
        } 
        else 
        {
           $x = "SELECT *FROM kursus
                            INNER JOIN pilar ON pilar.id_pilar = kursus.id_pilar
                          WHERE kursus.id_kursus='$pl'";
            $next = " SELECT *FROM kursus 
            WHERE
            id_kelas='$kelas' AND
            id_pilar='$pilar' AND
            id_kursus>$pl 
            ORDER BY id_kursus ASC LIMIT 1
            ;";
        }
        
        
        $peljrn = $crud->eksekusiSQL($x);

        foreach ($peljrn as $pil) {
            $idPilar = $pil['id_pilar'];
            $nmPilar = $pil['nama_pilar'];

            $nmPel   = $pil['nama_kursus'];

            $fotKurs = $pil['foto_kursus'];

            $folderFK   = "./foto/kursus/$fotKurs";

            $deskKursus = $pil['deskripsi'];

            echo
            "
            <div class='card'>
                <div class='card-header'>
                    $nmPilar
                </div>
                <div class='card-body'>
                    
                    <h2 align='center'>$nmPel</h2>
                    <br>
                    <center>
                        <img src='$folderFK' alt='$nmKursus' width='55%'>
                    </center>
                   
                    <div class='drop-text-content'>
                        $deskKursus
                    </div>
                        
                </div>
            </div>       
            ";
        }
        ?>

       

        <!-- MATERI ATTACHMENT -->
        <!-- <div class="card">
            <div class="card-header">
                Attachment
            </div>
            <div class="card-body">
                <a class="btn-attachment" href="#">
                    Materi Konten 1 <img src="./img/Download.png">
                </a>
                <a class="btn-attachment" href="#">
                    Materi Konten 2 <img src="./img/Download.png">
                </a>
                <a class="btn-attachment" href="#">
                    Materi Konten 3 <img src="./img/Download.png">
                </a>
            </div>
        </div> -->

        <div class="footer-content-btn">
            <a class="btn btn-next-content bg-warning" href="">&lt; Sebelumnya</a>
            <?php

                
                $nextPel = $crud->eksekusiSQL($next);
                $cekNext = $crud->hitungData($nextPel);
                
                if ($cekNext>0) 
                {
                    foreach ($nextPel as $ljt) 
                    {
                        $idK = $ljt['id_kursus'];

                        $linkN = "?hal=course-detail&pl=$idK&k=$kelas&pilar=$pilar";
                        $btn="<a class='btn btn-prev-content bg-warning' href='$linkN'>Selanjutnya &gt;</a>";
                        echo
                        "
                            $btn
                        ";
                    }
                }
                

            ?>
            
        </div>
    
    </div>

   

</div>
<!--
<div class="content modal-rating-content">
    <div class="modal-rating">
        <a class="close-modal-rating" href=""><img src="./img/Cancel_Icon.png" alt=""></a>
        <h1>Beri Rating Kelas</h1>
        <div class="star">
            <img src="Star_1.png" alt="">
            <img src="Star_1.png" alt="">
            <img src="Star_1.png" alt="">
            <img src="Star_1.png" alt="">
            <img src="Star_1.png" alt="">
        </div>
        <h3 class="status-bintang">Buruk/Kurang Baik/Cukup Baik/Baik/Sangat Baik</h3>
        <form action="">
            <label for="">Berikan Komentar</label>
            <textarea name="" id=""></textarea>
            <a class="btn-form-rating" href="">Kirim Rating dan Komentar</a>
        </form>
    </div>
</div>-->

<div class="content modal-rated-content">
    <div class="modal-rating">
        <a class="close-modal-rating" href=""><img src="Cancel.png" alt=""></a>
        <h1>Rating Sudah Dikirim</h1>
        <img src="Ok (1).png" alt="">
        <a class="btn-form-rated" href="">Kirim Rating dan Komentar</a>
        <a class="back-to-menu" href="">Kembali Ke Menu</a>
    </div>
</div>


</div>