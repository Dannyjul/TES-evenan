 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Slider</h1>
         
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Slider</h6>
                 </div>

                 <div class="card-body">
                     
                    <a class='btn btn-primary btn-sm' href='?hal=slider-tambah'>Tambah</a>
                    <br><br>
                     <?php
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM slider");
                        $hitung   = $isi->hitungData($perintah);

                        if ($hitung==0) 
                        {
                            pesanKosong();
                        }
                        else
                        {
                           echo
                           "
                           <div class='table-responsive'>
                                <table class='table table-bordered table-hover table-striped' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto Slider</th>
                                            
                                            <th>Teks Alternatif</th>
                                            
                                
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            ";

                           // $tampilin = $isi->tampilData("user");

                            $no=1;
                            foreach($perintah as $a)
                            {
                                $idslide = $a['id_slider'];
                                
                                $foto  = $a['foto_slider'];
                                $alt   = $a['alt'];
                                
                                $folder= "../foto/slider/$foto";
                                
                                

                                $gambar = "
                                
                                <center>
                                    <a data-caption='$alt' data-fancybox='Slide' href='$folder'>
                                        <img src='$folder' width='100' height='70'>
                                    </a>
                                </center>
                                
                                ";

                               
                                
                                
                                
                                echo
                                "
                                    
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                
                                                    $gambar
                                                
                                                
                                            </td>
                                           
                                            <td>
                                                <center>
                                                    $alt
                                                </center>
                                            </td>
                                            
                                            <td>
                                                <center>
                                                
                                                    <a class='btn btn-danger btn-sm' onclick='return hapus()' href='?hal=slider-respon&ids=$idslide&mau=hapus&f=$foto'>Hapus</a>
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