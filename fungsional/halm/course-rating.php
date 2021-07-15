<link rel="stylesheet" href="./css/course-info.css">

<style>
  
    .star img {
        width: 100%;
    }

    .komen {
        width: 100%;
        box-sizing: border-box;
    }
</style>


<?php
include './fungsional/konfig/header.php';


?>

<div class="container course-info-non-res">

    <?php
    include 'course-menuKiri.php';
    ?>

    <div class="course-content content">

        <!-- MATERI CONTENT-->
        <?php

        echo
        "
            <center>
                <div class='modal-rating'>
                    <a class='close-modal-rating' href=''><img src='Cancel.png' alt=''></a>
                    <h1>Beri Rating Kelas</h1>
                    <form action='?hal=course-respon&k=$kelas&p=$paket' method='post'>
                    <div class='star'>
                        
                        <button class='bintang1'><img src='./img/Star_1.png' alt=''></button>
                        <button class='bintang2'><img src='./img/Star_1.png' alt=''></button>
                        <button class='bintang3'><img src='./img/Star_1.png' alt=''></button>
                        <button class='bintang4'><img src='./img/Star_1.png' alt=''></button>
                        <button class='bintang5'><img src='./img/Star_1.png' alt=''></button>

                        <input type='hidden' name='bintang' class='bintang'>
                    </div>
                    <!--<h3 class='status-bintang'>Buruk/Kurang Baik/Cukup Baik/Baik/Sangat Baik</h3>-->
                    
                        <label for=''>Berikan Komentar</label>
                        <textarea class='komen form-control' name='komentar' required></textarea>
                        <input type='submit' class='btn-form-rating' value='Kirim Rating dan Komentar'>
                    </form>
                </div>
            </center>
     
        ";

        ?>

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

    <?php

    echo
    "
    <div class='course-content-res'>
        <div class='modal-rating'>
            <a class='close-modal-rating' href=''><img src='Cancel.png' alt=''></a>
            <h1>Beri Rating Kelas</h1>
            <form action='?hal=course-respon&k=$kelas&p=$paket' method='post'>
            <div class='star'>
                
                <button class='bintang1'><img src='./img/Star_1.png' alt=''></button>
                <button class='bintang2'><img src='./img/Star_1.png' alt=''></button>
                <button class='bintang3'><img src='./img/Star_1.png' alt=''></button>
                <button class='bintang4'><img src='./img/Star_1.png' alt=''></button>
                <button class='bintang5'><img src='./img/Star_1.png' alt=''></button>

                <input type='hidden' name='bintang' class='bintang'>
            </div>
            <!--<h3 class='status-bintang'>Buruk/Kurang Baik/Cukup Baik/Baik/Sangat Baik</h3>-->
            
                <label for=''>Berikan Komentar</label>
                <textarea class='komen form-control' name='komentar' required></textarea>
                <input type='submit' class='btn-form-rating' value='Kirim Rating dan Komentar'>
            </form>
        </div>
    </div>

    ";

    ?>
</div>

<?php

include './fungsional/konfig/footer.php';

?>