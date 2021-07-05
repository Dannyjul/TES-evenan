<link rel="stylesheet" href="./css/course-info.css">
<?php
include './fungsional/konfig/header.php';

$pilid = @$_GET['pilid'];

?>

<div class="container course-info-non-res">

    <?php
    include 'course-menuKiri.php';
    ?>

    <div class="course-content content">

        <?php
        $pilarData = $crud->eksekusiSQL("SELECT *FROM pilar WHERE id_pilar='$pilid'");

        foreach ($pilarData as $pd) {
            $nmPilar  = $pd['nama_pilar'];
            $deskPilar = $pd['desk_pilar'];
        }
        ?>

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
        <?php
        $pilarData = $crud->eksekusiSQL("SELECT *FROM pilar WHERE id_pilar='$pilid'");

        foreach ($pilarData as $pd) {
            $nmPilar  = $pd['nama_pilar'];
            $deskPilar = $pd['desk_pilar'];
        }
        ?>
        <div class="card">
            <div class="card-header"> <?php echo $nmPilar; ?> </div>
            <div class="card-body">
                <img class="img-content" src=''>
                <?php echo $deskPilar; ?>
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