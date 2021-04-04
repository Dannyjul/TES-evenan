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

        echo
        "
            <center>
                <div class='modal-rating'>
                    <a class='close-modal-rating' href=''><img src='Cancel.png' alt=''></a>
                    <h1>Beri Rating Kelas</h1>
                    <form action='?hal=course-respon&k=$kelas&p=$paket' method='post'>
                    <div class='star'>
                        <img src='./img/star.png' alt=''>
                        <img src='./img/star.png' alt=''>
                        <img src='./img/star.png' alt=''>
                        <img src='./img/star.png' alt=''>
                        <img src='./img/star.png' alt=''>
                    </div>
                    <!--<h3 class='status-bintang'>Buruk/Kurang Baik/Cukup Baik/Baik/Sangat Baik</h3>-->
                    
                        <label for=''>Berikan Komentar</label>
                        <textarea name='komentar' required></textarea>
                        <input type='submit' class='btn btn-warning btn-lg text-white' value='Kirim Rating dan Komentar'>
                    </form>
                </div>
            </center>
     
        ";

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

    </div>

</div>