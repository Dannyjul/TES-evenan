<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='baca') 
    {
        $id = $_GET['idrat'];
        $isian = "ket_rating='Sudah dibaca'";
       
        
        $perintah = $isi->ubahData("rating_kelas", $isian, "id_rating", $id);
        $eksekusi = $isi->cekQuery($perintah);

     

        if ($eksekusi==1) 
        {
           pesanALert("Ditandai sudah dibaca");
           pindahHal('?hal=rating-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=event-tambah');
        }
        
    }
   
    else 
    {
        $ide = @$_GET['idrat'];
      

        $perintah = $isi->hapusData("rating_kelas", "id_rating", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           //unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=rating-data');
        } 
        else 
        {
            pesanALert("Gagal terhapus");
            //pindahHal('?hal=event-tambah');
        }
    }
  



?>