<?php

    $go = @$_GET['hal'];

    if ($go=='event') 
    {
        $event = "text-warning";
        $course= "";
        $forum = "";
        $comunity = "";
        $profile  = "";
    }

    elseif ($go=='event-info') 
    {
        $event = "text-warning";
        $course= "";
        $forum = "";
        $comunity = "";
        $profile  = "";
    }
    elseif ($go=='course') 
    {
        $event = "";
        $course= "text-warning";
        $forum = "";
        $comunity = "";
        $profile  = "";
    }

    elseif ($go=='course-detail') 
    {
        $event = "";
        $course= "text-warning";
        $forum = "";
        $comunity = "";
        $profile  = "";
    }
    elseif ($go=='course-rating') 
    {
        $event = "";
        $course= "text-warning";
        $forum = "";
        $comunity = "";
        $profile  = "";
    }
    elseif ($go=='course-info') 
    {
        $event = "";
        $course= "text-warning";
        $forum = "";
        $comunity = "";
        $profile  = "";
    }
    else
    {
        $event = "";
        $course= "";
        $forum = "";
        $comunity = "";
        $profile  = "";
    }


    $aktifLink = @$_GET['tuj'];

    if ($aktifLink=='forum') 
    {
        $event = "";
        $course= "";
        $forum = "text-warning";
        $comunity = "";
        $profile  = "";
    }
    elseif ($aktifLink=='comunity') 
    {
        $event = "";
        $course= "";
        $forum = "";
        $comunity = "text-warning";
        $profile  = "";
    }
    elseif ($aktifLink=='profile') 
    {
        $event = "";
        $course= "";
        $forum = "";
        $comunity = "";
        $profile  = "style='border:3px solid orange;'";
    }
    

    $m = @$_GET['mau'];
    if ($go=='konfirmasi-pembayaran' && $m=='event') 
    {
        $event = "text-warning";
        $course= "";
        $forum = "";
        $comunity = "";
        $profile  = "";
    }
    

?>


<section id="navigation-bar">
        <div class="container-navbar">
            <nav class="navbar">
                <a class="logo" href="index.php">
                    <img src="./img/logoElites.png" alt="logo">
                </a>
                <div class = "nav-list">
                    <a class="btn active <?php echo $event; ?>" href="?hal=event">Event</a>
                    <a class="btn active <?php echo $course; ?>" href="?hal=course">Course</a>
                    <a class="btn active <?php echo $forum; ?>" href="?hal=cooming-soon&tuj=forum">Forum</a>
                    <a class="btn active <?php echo $comunity; ?>" href="?hal=cooming-soon&tuj=comunity">Community</a>

                    <a class="btn profile-pict" href="?hal=akun-profile&tuj=profile">
                        <img <?php echo $profile; ?> title="<?php echo $namauser; ?>" src="<?php echo $gambar; ?>" />
                    </a>

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

                                    if ($hitungTransaksi>0) 
                                    {
                                        foreach($notifTransaksi as $k)
                                        {
                                            $keter = $k['keterangan'];
                                            $idev  = $k['id_event'];
                                            $ipak  = $k['id_paket'];
                                            $idt   = $k['id_transaksi'];

                                            if ($keter='Sedang diproses') 
                                            {
                                                if ($idev==NULL) 
                                                {
                                                    $p = "Transaksi Paket";
                                                } 
                                                else 
                                                {
                                                    $p = "Transaksi Event";
                                                }
                                                
                                                $katanya = "$p Sedang diproses";
                                                
                                            } 
                                            else 
                                            {
                                                if ($idev==NULL) 
                                                {
                                                    $p = "Transaksi Paket";
                                                } 
                                                else 
                                                {
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
                                        
                                    }
                                    else
                                    {
                                        $pesanTransaksi = "Belum ada Transaksi";
                                        $angkaTransaksi ="";
                                        $linkTrans = "#";


                                    }

                                    if ($hitungUdah>0) 
                                    {
                                        foreach($transUdah as $z)
                                        {
                                            $keter = $z['keterangan'];
                                            $idev  = $z['id_event'];
                                            $ipak  = $z['id_paket'];
                                            $idt   = $z['id_transaksi'];

                                            if ($keter='Sedang diproses') 
                                            {
                                                if ($idev==NULL) 
                                                {
                                                    $p = "Transaksi Paket";
                                                } 
                                                else 
                                                {
                                                    $p = "Transaksi Event";
                                                }
                                                
                                                $katanya = "$p Sedang diproses";
                                                
                                            } 
                                            else 
                                            {
                                                if ($idev==NULL) 
                                                {
                                                    $p = "Transaksi Paket";
                                                } 
                                                else 
                                                {
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

                                        
                                    }
                                    else
                                    {
                                        $pesanTransaksi = "Belum ada Transaksi";
                                        $angkaTransaksi ="";
                                        $linkTrans = "#";

                                        
                                    }

                                    if ($hitungAbis>0) 
                                    {
                                        foreach($transAbis as $z)
                                        {
                                            $keter = $z['keterangan'];
                                            $idev  = $z['id_event'];
                                            $ipak  = $z['id_paket'];
                                            $idt   = $z['id_transaksi'];

                                        
                                                if ($idev==NULL) 
                                                {
                                                    $pak = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket ='$ipak'");
                                                    foreach ($pak as $ket) 
                                                    {
                                                        $namaPak = $ket['nama_paket'];
                                                        $p = "$namaPak sudah habis";
                                                    }

                                                    
                                                } 
                                                else
                                                {
                                                    $ev = $crud->eksekusiSQL("SELECT *FROM event WHERE id_event='$idev'");
                                                    foreach ($ev as $en) 
                                                    {
                                                        $eventNama = $en['nama_event'];
                                                        $p="$eventNama sudah berlalu";
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

                                        
                                    }
                                    else
                                    {
                                        $pesanTransaksi = "Belum ada Transaksi";
                                        $angkaTransaksi ="";
                                        $linkTrans = "#";

                                        
                                    }


                                    if ($TotalTrans==0) 
                                    {
                                        echo
                                        "
                                            <a class='dropdown-item' href='#'>Belum ada Transaksi</a>
                                        ";
                                    } 
                                
                            ?>
                    </div>
                   
                    <a class="btn logout"href="?hal=logout">Logout</a>

                </div>
            </nav>
        </div>
</section>


