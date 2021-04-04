<?php
$statuser = $crud->eksekusiSQl("SELECT *FROM user_status
                                                INNER JOIN paket_member
                                                ON user_status.id_paket = paket_member.id_paket
                                            WHERE id_user='$userId'");

foreach ($statuser as $e) {
    $idpaket     = $e['id_paket'];
    $jumlahKelas = $e['jumlah_kelas'];
    $namaPaket   = $e['nama_paket'];
    //$carPak = $crud->eksekusiSQL("SELECT *FROM paket_membership WHERE nama_paket='$namaPaket'");
}

$kelas = @$_GET['k'];
$paket = @$_GET['p'];

$kelasCari = $crud->eksekusiSQl("SELECT *FROM kelas WHERE id_kelas='$kelas'");


foreach ($kelasCari as $kel) {
    $nmKel = $kel['nama_kelas'];
    $desKel = $kel['deskripsi'];
    $fotKel = $kel['foto_kelas'];

    $folderFotoKel = "./foto/$fotKel";
}
?>

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

        foreach ($pilarKelas as $pil) {
            $idPilar = $pil['id_pilar'];
            $nmPilar = $pil['nama_pilar'];


            


            echo
            "
                <div class='pilar-dropdown'>
                    <a class='btn btn-dropdown turunin$idPilar' href='#' id='pilar$idPilar' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        $nmPilar <img src='./img/Collapse Arrow Down.png'>
                    </a>
                    <div class='drop-menu' aria-labelledby='#pilar$idPilar'>
                ";

            
            

            echo
            "
                        
                            
                <a id='gem$idPilar' class='drop-item tampil$idPilar' href='?hal=course-pilar&pil=$idPilar&k=$kelas'>
                    <img src='./img/Circled Play.png'>
                    <div class='drop-text'>
                        <p class='drop-item-title'>$nmPilar</p>
                        <p class='drop-item-desc'>Intro</p>
                    </div>

                </a>
                    
                
            ";

            $sqlPel = "SELECT * FROM `kursus` 
                                    
                                    
                                WHERE kursus.id_pilar='$idPilar'";

            $pelajaran = $crud->eksekusiSQL($sqlPel);

            foreach ($pelajaran as $pel) {
                $idKursus = $pel['id_kursus'];
                $nmKursus = $pel['nama_kursus'];
                $kepilar = $pel['id_pilar'];
                $paketan = $pel['id_paket'];


                $cekSetatus = $crud->eksekusiSQL("SELECT *FROM user_status WHERE 
                                        id_paket 
                                    NOT IN
                                    (SELECT id_paket FROM user_status WHERE id_paket='$idpaket')");
                $hitungCS   = $crud->hitungData($cekSetatus);

                if ($hitungCS>0) 
                {
                    foreach ($cekSetatus as $c) 
                    {
                        $idPkt = $c['id_paket'];
                        
                        if ($idPkt==$paketan) 
                        {
                            $dis = "disable";
                            $link = "#";
                        } 
                        else 
                        {
                            $dis ="";
                            $link = "?hal=course-detail&pl=$idKursus&k=$kelas";
                        }
                        
                    }
                } 
                else 
                {
                    $dis="";
                    $link = "?hal=course-detail&pl=$idKursus&k=$kelas";
                }


                echo
                "
                            
                                
                    <a id='gem$idPilar' class='drop-item $dis tampil$idPilar' href='$link'>
                        <img src='./img/Circled Play.png'>
                        <div class='drop-text'>
                            <p class='drop-item-title'>$nmPilar</p>
                            <p class='drop-item-desc'>$nmKursus</p>
                        </div>

                    </a>
                        
                    
                ";
            }


            echo "
                    </div>
                    </div>
                   ";
        }

        //include './fungsional/konfig/jq-sidebar-course.php';
        //untuk cari pilar ===============================

        $linkRating = "?hal=course-rating&k=$kelas&p=$paket";

        ?>



        <div class="rating">
            <a class="btn tombol-rating" href="<?php echo $linkRating; ?>">Rating dan Komentar</a>
        </div>
    </div>