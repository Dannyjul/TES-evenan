<link rel="stylesheet" href="./css/header-login.css">
<?php

$go = @$_GET['hal'];

if ($go == 'event') {
    $event = "text-warning";
    $course = "";
    $forum = "";
    $comunity = "";
    $profile  = "";
} elseif ($go == 'event-info') {
    $event = "text-warning";
    $course = "";
    $forum = "";
    $comunity = "";
    $profile  = "";
} elseif ($go == 'course') {
    $event = "";
    $course = "text-warning";
    $forum = "";
    $comunity = "";
    $profile  = "";
} elseif ($go == 'course-detail') {
    $event = "";
    $course = "text-warning";
    $forum = "";
    $comunity = "";
    $profile  = "";
} elseif ($go == 'course-rating') {
    $event = "";
    $course = "text-warning";
    $forum = "";
    $comunity = "";
    $profile  = "";
} elseif ($go == 'course-info') {
    $event = "";
    $course = "text-warning";
    $forum = "";
    $comunity = "";
    $profile  = "";
} else {
    $event = "";
    $course = "";
    $forum = "";
    $comunity = "";
    $profile  = "";
}


$aktifLink = @$_GET['tuj'];

if ($aktifLink == 'forum') {
    $event = "";
    $course = "";
    $forum = "text-warning";
    $comunity = "";
    $profile  = "";
} elseif ($aktifLink == 'comunity') {
    $event = "";
    $course = "";
    $forum = "";
    $comunity = "text-warning";
    $profile  = "";
} elseif ($aktifLink == 'profile') {
    $event = "";
    $course = "";
    $forum = "";
    $comunity = "";
    $profile  = "style='border:3px solid orange;'";
}


$m = @$_GET['mau'];
if ($go == 'konfirmasi-pembayaran' && $m == 'event') {
    $event = "text-warning";
    $course = "";
    $forum = "";
    $comunity = "";
    $profile  = "";
}

?>

<div class='container header-login'>
    <nav class='navbar navbar-expand-md navbar-custom'>
        <a href="index.php">
            <img class="header-logo" src="./img/LogoPutih.png" alt="logo">
        </a>
        <div>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item nav-item-non-res'>
                    <a class='btn subheader-heavy btn-login <?php echo $event; ?>' href="?hal=event">Event</a>
                </li>
                <li class='nav-item nav-item-non-res'>
                    <a class='btn subheader-heavy btn-daftar <?php echo $course; ?>' href="?hal=course">Course</a>
                </li>
                <li class='nav-item nav-item-non-res'>
                    <a class='btn subheader-heavy btn-daftar <?php echo $forum; ?>' href="?hal=cooming-soon&tuj=forum">Forum</a>
                </li>
                <li class='nav-item nav-item-non-res'>
                    <a class='btn subheader-heavy btn-daftar <?php echo $comunity; ?>' href="?hal=cooming-soon&tuj=comunity">Community</a>
                </li>
                <li class='nav-item nav-item-non-res'>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <?php
                        $notifTransaksi = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE 
                id_user='$userId' AND baca_member='Belum dibaca' AND keterangan='Sedang diproses' ORDER BY id_transaksi DESC");



                        $transUdah = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE 
                id_user='$userId' AND baca_member='Belum dibaca' AND keterangan='Ok' ORDER BY id_transaksi DESC");

                        $transAbis = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE 
                id_user='$userId' AND baca_member='Belum dibaca' AND keterangan='Expired' ORDER BY id_transaksi DESC");

                        $hitungTransaksi = $crud->hitungData($notifTransaksi);
                        $hitungUdah = $crud->hitungData($transUdah);
                        $hitungAbis = $crud->hitungData($transAbis);


                        $TotalTrans = $hitungTransaksi + $hitungUdah + $hitungAbis;
                        $angkaNotif = notifikasi($TotalTrans);
                        ?>

                        <?php echo $angkaNotif; ?>

                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php

                        if ($hitungTransaksi > 0) {
                            foreach ($notifTransaksi as $k) {
                                $keter = $k['keterangan'];
                                $idev  = $k['id_event'];
                                $ipak  = $k['id_paket'];
                                $idt   = $k['id_transaksi'];

                                if ($keter = 'Sedang diproses') {
                                    if ($idev == NULL) {
                                        $p = "Transaksi Paket";
                                    } else {
                                        $p = "Transaksi Event";
                                    }

                                    $katanya = "$p Sedang diproses";
                                } else {
                                    if ($idev == NULL) {
                                        $p = "Transaksi Paket";
                                    } else {
                                        $p = "Transaksi Event";
                                    }

                                    $katanya = "$p Sudah diproses";
                                }

                                $pesanTransaksi = $katanya;
                                $angkaTransaksi = $hitungTransaksi;
                                $linkTrans = "?hal=akun-respon&mode=dibaca&t=$idt";
                                echo
                                "
                            <a class='dropdown-item' href='$linkTrans'>$pesanTransaksi</a>
                            ";
                            }
                        } else {
                            $pesanTransaksi = "Belum ada Transaksi";
                            $angkaTransaksi = "";
                            $linkTrans = "#";
                        }

                        if ($hitungUdah > 0) {
                            foreach ($transUdah as $z) {
                                $keter = $z['keterangan'];
                                $idev  = $z['id_event'];
                                $ipak  = $z['id_paket'];
                                $idt   = $z['id_transaksi'];

                                if ($keter = 'Sedang diproses') {
                                    if ($idev == NULL) {
                                        $p = "Transaksi Paket";
                                    } else {
                                        $p = "Transaksi Event";
                                    }

                                    $katanya = "$p Sedang diproses";
                                } else {
                                    if ($idev == NULL) {
                                        $p = "Transaksi Paket";
                                    } else {
                                        $p = "Transaksi Event";
                                    }

                                    $katanya = "$p Sudah diproses";
                                }

                                $pesanUdah = $katanya;
                                $angkaUdah = $hitungUdah;
                                $linkUdah = "?hal=akun-respon&mode=dibaca&t=$idt";
                                echo
                                "
                            <a class='dropdown-item' href='$linkUdah'>$pesanUdah</a>
                            ";
                            }
                        } else {
                            $pesanTransaksi = "Belum ada Transaksi";
                            $angkaTransaksi = "";
                            $linkTrans = "#";
                        }

                        if ($hitungAbis > 0) {
                            foreach ($transAbis as $z) {
                                $keter = $z['keterangan'];
                                $idev  = $z['id_event'];
                                $ipak  = $z['id_paket'];
                                $idt   = $z['id_transaksi'];


                                if ($idev == NULL) {
                                    $pak = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket ='$ipak'");
                                    foreach ($pak as $ket) {
                                        $namaPak = $ket['nama_paket'];
                                        $p = "$namaPak sudah habis";
                                    }
                                } else {
                                    $ev = $crud->eksekusiSQL("SELECT *FROM event WHERE id_event='$idev'");
                                    foreach ($ev as $en) {
                                        $eventNama = $en['nama_event'];
                                        $p = "$eventNama sudah berlalu";
                                    }
                                }

                                //  $katanya = "$p Sedang diproses";




                                $pesanAbis = $p;
                                $angkaUdah = $hitungUdah;
                                $linkUdah = "?hal=akun-respon&mode=dibaca&t=$idt";
                                echo
                                "
                            <a class='dropdown-item' href='$linkUdah'>$pesanAbis</a>
                            ";
                            }
                        } else {
                            $pesanTransaksi = "Belum ada Transaksi";
                            $angkaTransaksi = "";
                            $linkTrans = "#";
                        }


                        if ($TotalTrans == 0) {
                            echo
                            "
                            <a class='dropdown-item' href='#'>Belum ada Transaksi</a>
                        ";
                        }

                        ?>
                    </div>
                </li>
                <li class='nav-item nav-item-non-res'>
                    <a class="btn profile-pict" href="?hal=akun-profile&tuj=profile">
                        <img <?php echo $profile; ?> title="<?php echo $namauser; ?>" src="<?php echo $gambar; ?>" />
                    </a>
                </li>
                <li class='nav-item nav-item-non-res'>
                    <a class='btn subheader-heavy btn-daftar ' href="?hal=logout">Logout</a>
                </li>
                <li class='nav-item nav-item-res'>
                    <a class="btn profile-pict" href="?hal=akun-profile&tuj=profile">
                        <img <?php echo $profile; ?> title="<?php echo $namauser; ?>" src="<?php echo $gambar; ?>" />
                    </a>
                </li>
                <li class='nav-item nav-item-res' id="hamMenu"'>
                    <a class=' btn ham-menu' href='#'><img src="./img/Menu.png"></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="ham-menu-modal float-right text-right">
        <a class="nav-item nav-link body-heavy" href="index.php">Home</a>
        <a class="nav-item nav-link body-heavy" href="#">Contact</a>
        <a class="nav-item nav-link body-heavy" href="#">Privacy</a>
        <hr>
        <a class="nav-item nav-link body-heavy" href="?hal=event">Event</a>
        <a class="nav-item nav-link body-heavy" href="?hal=course">Course</a>
        <a class="nav-item nav-link body-heavy" href="?hal=cooming-soon&tuj=forum">Forum</a>
        <a class="nav-item nav-link body-heavy" href="?hal=cooming-soon&tuj=comunity">Community</a>
        <a class="nav-item nav-link body-heavy" href="?hal=akun-profile&tuj=profile">Profile</a>
        <a class="nav-item nav-link body-heavy" href="?hal=akun-transaksi&tuj=profile">Transaksi</a>
        <a class="nav-item nav-link body-heavy" href="?hal=akun-membership&tuj=profile">Membership</a>
        <hr>
        <a class="nav-item nav-link body-heavy" href="?hal=logout">Logout</a>
    </div>

</div>



<script src="./vendor/jquery/jquery.min.js"></script>
<script>
    $('.ham-menu-modal').hide();
    $('#hamMenu').on('click', function(e) {
        $(".ham-menu-modal").toggle();
    });
</script>