<?php

    $id = $_POST['k'];
    $mau= $_POST['mau'];

    $norek = $_POST['norek'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $trans = $_POST['transaksi'];
    $bank  = $_POST['bank'];


    $namafoto= $_FILES['foto']['name'];
    $lokfoto = $_FILES['foto']['tmp_name'];

    $tgl = date("Y-m-d");


    $waktu = date("Y-m-d h:i:s", time()+60*60*7);

    if ($mau=='paket') 
    {
        $nmaFoto = uploadStruk("paketMember", $lokfoto);
        $isi = "NULL,'$trans', '$norek', '$bank', '$nama', '$waktu', '$id', NULL, '$userId', '$harga', 'Sedang diproses', 'Belum dibaca', 'Belum dibaca', '$nmaFoto', '$tgl'";
        $simpan = $crud->tambahData("transaksi", $isi);
    }
    else
    {
        $nmaFoto = uploadStruk("event", $lokfoto);
        $isi = "NULL, '$trans', '$norek', '$bank', '$nama', '$waktu', NULL, '$id', '$userId', '$harga', 'Sedang diproses', 'Belum dibaca', 'Belum dibaca', '$nmaFoto', '$tgl'"; 
        $simpan = $crud->tambahData("transaksi", $isi);
    }

    $cekLagi = $crud->cekQuery($simpan);

    if ($cekLagi==1) 
    {
        //pesanALert("Transaksi Anda sedang diproses");
        //pindahHalaman("akun-transaksi");
        echo
        "
        <script src='./vendor/swal/swal.js'></script>
        <script>
            swal('Sukses!', 'Transaksi anda sedang diproses', 'success')
            .then((value)=> {
                window.location='?hal=akun-transaksi&tuj=profile';
            })
            //window.location='index.php';
        </script>
        ";
    } 
    else 
    {
        pesanALert("Gagal");
        echo
        "
            $norek $nama $waktu, $id, $harga <br>
            $isi
        ";
    }
    

?>