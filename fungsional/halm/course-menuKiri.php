<style>
    .drop-item:hover
    {
        background-color: dimgray;
        transition: 1s;
    }

    .disabled {
        color: dimgray;
    }

    .disabled:hover {
        transition: 1s;
        color: grey;
    }
</style>
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

        $pilarWarna = @$_GET['pilid'];

        if (empty($pilarWarna)) 
        {
            $bgPilar = "";
        } 
        else 
        {
            if ($pilarWarna==$idPilar) 
            {
                $bgPilar = "border border-warning";
            } 
            else 
            {
                $bgPilar = "";
            }
            
        }


        $pilarDetail = @$_GET['pilSus'];

        if (empty($pilarDetail)) 
        {
            $detailPilar = "";
        } 
        else 
        {
            if ($pilarDetail==$idPilar) 
            {
                $detailPilar = "bg-warning";
            } 
            else 
            {
                $detailPilar = "";
            }
            
        }
        




        echo
        "
            <div class='pilar-dropdown'>
                <a class='btn btn-dropdown turunin$idPilar $bgPilar' href='#' id='pilar$idPilar' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    $nmPilar <img class='gambar imeg$idPilar' src='./img/Collapse Arrow Down.png'>
                </a>
                <div class='drop-menu tampil$idPilar' aria-labelledby='#pilar$idPilar'>
        ";

       




        echo
        "
                        
                            
                <a id='gem$idPilar' class='drop-item $detailPilar' href='?hal=course-pilar&pilid=$idPilar&k=$kelas&p=$paket&pilSus=$idPilar'>
                    <img src='./img/Circled Play.png'>
                    <div class='drop-text'>
                        <p class='drop-item-title'>$nmPilar</p>
                        <p class='drop-item-desc'>Intro</p>
                    </div>

                </a>
                    
                
            ";

        $sqlPel = "SELECT * FROM `kursus` WHERE kursus.id_pilar='$idPilar'";

        $pelajaran = $crud->eksekusiSQL($sqlPel);

        foreach ($pelajaran as $pel) {
            $idKursus = $pel['id_kursus'];
            $nmKursus = $pel['nama_kursus'];
            $kepilar = $pel['id_pilar'];
            $paketan = $pel['id_paket'];

            $kursusId = @$_GET['pl'];

            if (empty($kursusId)) 
            {
                $bgKursus = "";
            }

            if ($kursusId==$idKursus) 
            {
                $bgKursus = "bg-warning";
            }
            else
            {
                $bgKursus = "";
            }


            $paketKel = "SELECT * FROM `paket_kelas` 
                                INNER JOIN paket_member ON paket_member.id_paket = paket_kelas.id_paket
                                INNER JOIN kursus ON kursus.id_paket = paket_member.id_paket
                                INNER JOIN kelas ON kelas.id_kelas = paket_kelas.id_kelas
                                WHERE paket_kelas.id_kelas='$kelas' 
                                AND paket_kelas.id_paket>$paket ORDER BY paket_kelas.id_paket ASC LIMIT 1
                        ";

            $cekSetatus = $crud->eksekusiSQL($paketKel);

            $hitungCS   = $crud->hitungData($cekSetatus);

            if ($hitungCS > 0) {
                foreach ($cekSetatus as $c) {
                    $idPkt = $c['id_paket'];
                    // $pilr  = $c['id_pilar'];
                    //$kurss = $c['id_kursus'];

                    if ($idPkt == $paketan) {
                        $dis = "disabled";
                        $logoMenu = "./img/Lock.png";
                        $atrLogo = "width='48' height='48'";
                        $spanUp = "<span class='badge badge-warning'>Upgrade</span>";
                        $link = "href='#' class='btn' data-fancybox data-src='#pesanUpgrade' href='javascript:;'";
                    } else {
                        $dis = "";
                        $logoMenu="./img/Circled Play.png";
                        $atrLogo="";
                        $spanUp = "";
                        $link = "?hal=course-detail&pl=$idKursus&k=$kelas&p=$paket&pilid=$idPilar";
                    }
                }
            } else {
                $dis = "";
                $logoMenu="./img/Circled Play.png";
                $atrLogo="";
                $spanUp = "";
                $link = "?hal=course-detail&pl=$idKursus&k=$kelas&p=$paket&pilid=$idPilar";
            }



            echo
            "        
                <a id='gem$idPilar' class='drop-item $dis $bgKursus' href='$link'>
                    <img src='$logoMenu' $atrLogo>
                    <div class='drop-text'>
                        <p class='drop-item-title'>$nmPilar $spanUp</p>
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