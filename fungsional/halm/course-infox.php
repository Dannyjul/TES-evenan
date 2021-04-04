<link rel="stylesheet" href="./css/course-info.css">
<?php
    include './fungsional/konfig/header.php';

    $statuser = $crud->eksekusiSQl("SELECT *FROM user_status
                                            INNER JOIN paket_member
                                              ON user_status.id_paket = paket_member.id_paket
                                           WHERE id_user='$userId'");

    foreach ($statuser as $e) 
    {
    $idpaket     = $e['id_paket'];
    $jumlahKelas = $e['jumlah_kelas'];
    $namaPaket   = $e['nama_paket'];
    //$carPak = $crud->eksekusiSQL("SELECT *FROM paket_membership WHERE nama_paket='$namaPaket'");
    }

    $kelas = @$_GET['k'];

    $kelasCari = $crud->eksekusiSQl("SELECT *FROM kelas WHERE id_kelas='$kelas'");
    

    foreach ($kelasCari as $kel) 
    {
        $nmKel = $kel['nama_kelas'];
        $desKel= $kel['deskripsi'];
        $fotKel= $kel['foto_kelas'];

        $folderFotoKel = "./foto/$fotKel";


    }
?>

<div class="container container-course-info">
        <div class="sidebar">
            <div class="class-title">
                <!--<h2>Class #Nomor: Nama Kelasnya</h2>-->
                <h2><?php echo $nmKel; ?></h2>
            </div>

            <div class="content-title">
                <h2>Konten Kelas #Nomor</h2>
            </div>

            <?php
                //untuk cari pilar ===============================
                $pilarKelas = $crud->tampilId("pilar", "id_kelas", $kelas);

                foreach ($pilarKelas as $pil) 
                {
                   $idPilar = $pil['id_pilar'];
                   $nmPilar = $pil['nama_pilar'];


                   echo
                   "
                   <div class='pilar-dropdown'>
                        <a class='btn btn-dropdown' href='#' id='pilar$idPilar' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            $nmPilar <img src='./img/Collapse Arrow Down.png'>
                        </a>
                        <div class='drop-menu' aria-labelledby='#pilar$idPilar'>
                    ";

                    $sqlPel = "SELECT * FROM `kursus` 
                                    
                                    
                                WHERE kursus.id_pilar='$idPilar'";

                    $pelajaran = $crud->eksekusiSQL($sqlPel);

                    foreach ($pelajaran as $pel) 
                    {
                        $idKursus = $pel['id_kursus'];
                        $nmKursus = $pel['nama_kursus'];

                        

                      

                        echo
                        "
                            
                                
                                <a id='gem1#' class='drop-item' href='?hal=course-detail&pl=$idKursus&k=$kelas'>
                                    <img src='./img/Circled Play.png'>
                                    <div class='drop-text'>
                                        <p class='drop-item-title'>$nmPilar</p>
                                        <p class='drop-item-desc'>$nmKursus</p>
                                    </div>
            
                                </a>
                                
                            
                        ";
                    }

                    
                    echo"
                    </div>
                    </div>
                   ";
                }
                //untuk cari pilar ===============================
            ?>

            

            <div class="rating">
                <a class="btn btn-rating">Rating dan Komentar</a>
            </div>
        </div>


        <div class="course-banner content">
            <img src="<?php echo $folderFotoKel; ?>" alt="<?php echo $nmKel; ?>">
            
        </div>

        <div id="content-unduh-trigger" class="unduh-content content">
            <div class="isi-unduh">
                <h1>Coming Soon</h1>
                <a class="btn btn-next" href="">Selanjutnya &gt;</a>
            </div>
        </div>

        <div class="course-content content" style="background-color: yellow;">

            <!-- MATERI CONTENT-->

            <div class="container-fluid" style="background-color: red;">
                <?php
                    $pilarKelas = $crud->tampilId("pilar", "id_kelas", $kelas);

                    foreach ($pilarKelas as $pil) 
                    {
                       $idPilar = $pil['id_pilar'];
                       $nmPilar = $pil['nama_pilar'];

                       echo
                       "
                       <div class='card' style='background-color: white; width:100%;'>
                            <div class='card-header'>
                                Pilar 1: Great Entrepreneurship Mindset - Intro
                            </div>
                            <div class='card-body'>
                                <a id='konten1' class='btn btn-dropdown-content' href='#'>
                                    Materi Konten 1 <img src='./img/Collapse Arrow Down.png'>
                                </a>
        
                                <div class='drop-menu-content'>
                                    
        
                                </div>
        
                               
                            </div>
                        </div>
                       ";
                    }
                ?>
                <div class="card" style="background-color: white; width:100%;">
                    <div class="card-header">
                        Pilar 1: Great Entrepreneurship Mindset - Intro
                    </div>
                    <div class="card-body">
                        <a id="konten1" class="btn btn-dropdown-content" href="#">
                            Materi Konten 1 <img src="./img/Collapse Arrow Down.png">
                        </a>

                        <div class="drop-menu-content">
                            <div class="drop-text-content">
                                <p>
                                    Siapa yang tidak setuju bahwa semuanya dimulai dari pikiran yang kita miliki, apabila
                                    kita memiliki sebuah keinginan kuat untuk berhasil, dan keberanian untuk mengambil
                                    tindakan untuk mencapainya, maka setidaknya, seperti peribahasa ‘Aim for the moon, and
                                    you’ll land among the stars’, miliki impian setinggi bulan, setidaknya anda akan
                                    mencapai bintang-bintang.<br><br>
                                    Semuanya dimulai dari Mindset atau pikiran anda. Apakah pada saat anda mengalami
                                    halangan dan kesulitan pertama, anda akan menyerah?
                                </p>
                            </div>

                            <iframe width="843" height="461" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                            </iframe>

                        </div>

                        <a class="btn btn-dropdown-content" href="#">
                            Materi Konten 2 <img src="./img/Collapse Arrow Down.png">
                        </a>
                        <a class="btn btn-dropdown-content" href="#">
                            Materi Konten 3 <img src="./img/Collapse Arrow Down.png">
                        </a>
                    </div>
                </div>

                <!-- MATERI ATTACHMENT -->
                <div class="card">
                    <div class="card-header">
                        Attachment
                    </div>
                    <div class="card-body">
                        <a class="btn btn-attachment" href="#">
                            Materi Konten 1 <img src="./img/Download.png">
                        </a>

                        <a class="btn btn-attachment" href="#">
                            Materi Konten 2 <img src="./img/Download.png">
                        </a>
                        <a class="btn btn-attachment" href="#">
                            Materi Konten 3 <img src="./img/Download.png">
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-content-btn">
                <a class="btn btn-next-content" href="">&lt; Sebelumnya</a>
                <a class="btn btn-prev-content" href="">Selanjutnya &gt;</a>
            </div>

        </div>

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
        </div>

        
    </div>

  