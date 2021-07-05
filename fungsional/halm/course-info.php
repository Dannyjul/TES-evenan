<link rel="stylesheet" href="./css/course-info.css">
<?php
include './fungsional/konfig/header.php';

?>

<div class="container course-info-non-res">

    <?php
    include 'course-menuKiri.php';
    ?>

    <div class="course-content content">

        <div class='card'>
            <div class='card-header'>
                <?php echo $nmKel; ?>
            </div>
            <div class='card-body'>
                <br>
                <center>
                    <img src='<?php echo $folderFotoKel; ?>' alt='<?php echo $nmKel; ?>'>
                </center>

                <div class='drop-text-content'>
                    <?php echo $desKel; ?>
                </div>

            </div>
        </div>

        <div class="footer-content-btn">

            <?php
            $kelasPrev = $crud->eksekusiSQL("SELECT *FROM kelas WHERE id_kelas<$kelas ORDER BY id_kelas DESC LIMIT 1");
            $cariPrev  = $crud->hitungData($kelasPrev);

            if ($cariPrev > 0) {
                foreach ($kelasPrev as $PrevClass) {
                    $idKelPrev = $PrevClass['id_kelas'];



                    $linkPrev = "course-info&k=$idKelPrev&p=$paket";

                    $tombolPrev = "<a class='btn btn-prev-content' href='?hal=$linkPrev'>&lt; Sebelumnya</a>";
                }
            } else {
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

            if ($cariNext > 0) {
                foreach ($kelasNext as $nextClass) {
                    $idKelNext = $nextClass['id_kelas'];

                    $paketNext = $crud->eksekusiSQL("SELECT *FROM paket_kelas 
                        
                                        WHERE id_kelas='$idKelNext' ORDER BY id_paketkelas ASC LIMIT 1");

                    foreach ($paketNext as $pn) {
                        $idPakNext = $pn['id_paket'];
                    }

                    if ($idPakNext > $paket) {
                        $atrNext = "href='#' class='btn btn-prev-content' data-fancybox data-src='#pesanUpgrade' href='javascript:;'";
                    } else {
                        $linkNext = "course-info&k=$idKelNext&p=$paket";
                        $atrNext  = "class='btn btn-prev-content' href='?hal=$linkNext'";
                    }




                    $tombolNext = "<a $atrNext>Selanjutnya &gt;</a>";
                }
            } else {
                $tombolNext = "";
            }
            echo $tombolNext;
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

<div class="container course-info-res">
    <div class="progress-box">
        <div class="caption-heavy title-kelas">Kelas 1: Kelas Statis</div>
        <div class="progress-bar-box">
            <div class="d-flex justify-content-between">
                <div class="small-light text">Progress</div>
                <div class="small-light text percentage">0%</div>
            </div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

    <div class="small-light page-history">
            Home > Course > Kelas 1
    </div>

    <div class="course-content-res">
        <div class="card">
            <div class="card-header"> <?php echo $nmKel; ?> </div>
            <div class="card-body">
                <img class="img-content" src='<?php echo $folderFotoKel; ?>' alt='<?php echo $nmKel; ?>'>
                <?php echo $desKel; ?>
            </div>
        </div>
    </div>

    <div class="footer-content-btn d-flex justify-content-between">
        <a class='btn btn-prev-content' href='?hal=$linkPrev'>&lt; Sebelumnya</a>
        <a class='btn btn-prev-content' href='?hal=$linkPrev'>Selanjutnya &gt; </a>
    </div>

    <?php
    include 'course-menuKiri.php';
    ?>
</div>

<?php

include './fungsional/konfig/footer.php';

?>