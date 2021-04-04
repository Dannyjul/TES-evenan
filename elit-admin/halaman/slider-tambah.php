<form action="?hal=slider-respon&mau=tambah" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slider</h1>

        </div>


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-md-3">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Opsi Simpan</h6>

                    </div>


                    <div class="card-body">

                        <center>
                            <input type="submit" value="POSTING" class="btn btn-primary" name="simpan">
                        </center>

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Gambar Thumbnail</h6>

                    </div>


                    <div class="card-body">

                        <div class="custom-file">
                            <input id="gambarAmbil" type="file" name="foto" class="custom-file-input" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Upload Foto</label>
                        </div>

                        <br><br>

                        <p>
                            <input class="form-control" type="text" name="alt" placeholder="Masukkan Teks Alternatif" required>
                        </p>
                    </div>
                </div>

               
            </div>

            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Slider</h6>
                    </div>


                    <div class="card-body">


                        <center>
                            <p>
                                <img id="gambarTampil" src="../img/nofoto.png" alt="Test" width="100%" height="300">
                            </p>


                            
                        </center>
                        <br><br>

                        





                       



                    </div>
                </div>
            </div>




        </div>
        <!-- /.container-fluid -->
</form>