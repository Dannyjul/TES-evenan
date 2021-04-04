 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Rating</h1>
         
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Rating</h6>
                 </div>

                 <div class="card-body">
                     
                    <a class='btn btn-primary' href='?hal=event-tambah'>Tambah</a>
                    <br><br>
                     <?php
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM rating_kelas 
                                        INNER JOIN 
                                        user ON user.id_user = rating_kelas.id_user
                                        INNER JOIN 
                                        kelas ON kelas.id_kelas = rating_kelas.id_kelas
                                        ORDER BY rating_kelas.id_rating DESC");
                        $hitung   = $isi->hitungData($perintah);

                        if ($hitung==0) 
                        {
                            pesanKosong();
                        }
                        else
                        {
                           echo
                           "
                           <div class='table-responsive table-hover'>
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Member</th>
                                            <th>Kelas</th>
                                            <th>Rating</th>
                                            <th>Komentar</th>
                                            <th>Tanggal Input</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class='table-striped'>
                            ";

                           // $tampilin = $isi->tampilData("user");

                            $no=1;
                            foreach($perintah as $a)
                            {
                                $kelas = $a['nama_kelas'];
                                $foto = $a['foto'];
                                $tgl  = $a['tgl_komen'];
                                $komentor= $a['nama_user'];
                                $fokel = $a['foto_kelas'];
                                $level = $a['level_rating'];
                                $komentar= $a['komentar'];
                                $idrat = $a['id_rating'];
                                $ket = $a['ket_rating'];

                                if ($ket=='Belum dibaca') 
                                {
                                   $span = "<span class='badge badge-warning'>$ket</span>";
                                } else {
                                    $span = "<span class='badge badge-success'>$ket</span>";
                                }
                                

                                //$idev = $a['id_event'];
                                
                                $wakKomen = tglBalik($tgl);

                                if ($fokel=="Kosong") 
                                {
                                    $gambarKel = "<img src='../img/nofoto.png' width='50' height='50'>";
                                } 
                                else 
                                {
                                    $tujuanKel = "../foto/$fokel";
                                    $gambarKel = 
                                    "   <a data-fancybox='' href='$tujuanKel' data-caption='$kelas'>
                                            <img src='$tujuanKel' width='50' height='50'>
                                        </a>
                                    ";
                                }

                                if ($foto=="Kosong") 
                                {
                                    $gambarUser = "<img src='../img/nofoto.png' width='50' height='50'>";
                                } 
                                else 
                                {
                                    $tujuanUser = "../foto/user/$foto";
                                    $gambarUser = 
                                    "   <a data-fancybox='' href='$tujuanUser' data-caption='$komentor'>
                                            <img src='$tujuanUser' width='50' height='50'>
                                        </a>
                                    ";
                                }


       

                                
                 
                                
                                echo
                                "
                                   
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                <center>
                                                    $gambarUser
                                                    <br><br>
                                                    <small>$komentor</small>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    $gambarKel
                                                <br><br>
                                                    <small>$kelas</small>
                                            </center>
                                            </td>
                                            

                                            <td>
                                                <center>
                                                   $level
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                   $komentar
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                   $wakKomen
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                   $span
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <div class='btn-group' role='group'>
                                                    <button id='aksi' type='button' class='btn btn-secondary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Aksi
                                                    </button>
                                                    <div class='dropdown-menu bg-warning' aria-labelledby='aksi'>
                                                        <a class='dropdown-item' href='?hal=rating-respon&idrat=$idrat&mau=baca'>Tandai sudah dibaca</a>
                                                        <a class='dropdown-item' href='?hal=rating-respon&idrat=$idrat&mau=hapus'>Hapus</a>
                                                    </div>
                                                </div>
                                                </center>
                                            </td>
                                        </tr>
                                ";
                                $no++;
                            }
                            
                            

                            echo
                            "
                                    </tbody>
                                </table>
                            </div>
                           "; 
                        }

                    ?>
                 </div>
             </div>



         </div>


     </div>


 </div>
 <!-- /.container-fluid -->
