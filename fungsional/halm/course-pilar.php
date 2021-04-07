<link rel="stylesheet" href="./css/course-info.css">
<?php
include './fungsional/konfig/header.php';

    $pilid = @$_GET['pilid'];

    $pilarData = $crud->eksekusiSQL("SELECT *FROM pilar WHERE id_pilar='$pilid'");

    foreach ($pilarData as $pd) 
    {
        $nmPilar  = $pd['nama_pilar'];
        $deskPilar = $pd['desk_pilar'];
    }

?>

<div class="container container-course-info">
    
    <?php
        include 'course-menuKiri.php';
    ?>

    <div class="course-content content">

        <!-- MATERI CONTENT-->
       



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

        <div class='card'>
            <div class='card-header'>
                <?php echo $nmPilar; ?>
            </div>
            <div class='card-body'>


                

                <div class='drop-text-content'>
                    <?php echo $deskPilar; ?>
                </div>

            </div>
        </div>

        <div class="footer-content-btn">
            <!--<a class="btn btn-next-content" href="">&lt; Sebelumnya</a>-->
            <?php
            /*
                $kelasPrev = $crud->eksekusiSQL("SELECT *FROM kelas WHERE id_kelas<$kelas ORDER BY id_kelas DESC LIMIT 1");
                $cariPrev  = $crud->hitungData($kelasPrev);

                if ($cariPrev>0) 
                {
                    foreach ($kelasPrev as $PrevClass) 
                    {
                        $idKelPrev = $PrevClass['id_kelas'];

                        

                        $linkPrev = "course-info&k=$idKelPrev&p=$paket";

                        $tombolPrev = "<a class='btn btn-prev-content' href='?hal=$linkPrev'>&lt; Sebelumnya</a>";
                    }
                }
                else
                {
                    $tombolPrev = "";
                }
                echo $tombolPrev;

            ?>

            <!--
                **************Buat Next Class****************
            -->
            <?php
                $kelasNext = $crud->eksekusiSQL("SELECT *FROM kelas WHERE id_kelas>$kelas ORDER BY id_kelas ASC LIMIT 1");
                $cariNext  = $crud->hitungData($kelasNext);

                if ($cariNext>0) 
                {
                    foreach ($kelasNext as $nextClass) 
                    {
                        $idKelNext = $nextClass['id_kelas'];

                        

                        $linkNext = "course-info&k=$idKelNext&p=$paket";

                        $tombolNext = "<a class='btn btn-prev-content' href='?hal=$linkNext'>Selanjutnya &gt;</a>";
                    }
                }
                else
                {
                    $tombolNext = "";
                }
                echo $tombolNext;
            */
            ?>
            
        </div>
    </div>

    <div id="content-unduh-trigger" class="unduh-content content">
        <div class="isi-unduh">
            <h1>Coming Soon</h1>
            <a class="btn btn-next" href="">Selanjutnya &gt;</a>
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
</div>

<div class="content modal-rated-content">
    <div class="modal-rating">
        <a class="close-modal-rating" href=""><img src="Cancel.png" alt=""></a>
        <h1>Rating Sudah Dikirim</h1>
        <img src="Ok (1).png" alt="">
        <a class="btn-form-rated" href="">Kirim Rating dan Komentar</a>
        <a class="back-to-menu" href="">Kembali Ke Menu</a>
    </div>
</div>-->


</div>