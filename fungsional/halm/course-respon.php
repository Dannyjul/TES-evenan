<?php

    $idkelas= $_GET['k'];
    $idpaket= $_GET['p'];

    $komen   = $_POST['komentar'];

    $bintang = $_POST['bintang'];


    $angkaRating = $bintang;


    $tglKomen = date('Y-m-d');

    $ket = "Belum dibaca";

    if (empty($bintang)) 
    {
        echo
        "
        <script src='./vendor/swal/swal.js'></script>
        <script>
            swal('Maaf!', 'Anda harus memberikan Rating terlebih dahulu', 'warning')
            .then((value)=> {
                window.location='?hal=course-info&k=$idkelas&p=$idpaket';
                //window.history.back();
            })
            //window.location='index.php';
        </script>
        ";
    } 
    else 
    {
        $isiData = "NULL, '$idkelas', '$angkaRating', '$komen', '$userId', '$tglKomen', '$ket'";

        $perintah = $crud->tambahData("rating_kelas", $isiData);
        $eksekusi = $crud->cekQuery($perintah);

        if ($eksekusi==1) 
        {
    
            echo
            "
            <script src='./vendor/swal/swal.js'></script>
            <script>
                swal('Sukses!', 'Terima Kasih', 'success')
                .then((value)=> {
                    window.location='?hal=course-info&k=$idkelas&p=$idpaket';
                    //window.history.back();
                })
                //window.location='index.php';
            </script>
            ";
                
            
        }
        else
        {
            pesanAlert("Gagal");
            echo
            "
                <script>
                    window.location='index.php';
                </script>
            ";
        }
    }
    


?>