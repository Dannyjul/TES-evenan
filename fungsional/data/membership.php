<?php
$pos = @$_GET['hal'];
if ($hal == "akun-profile") {
  $profil = "title-heavy active";
  $member = "title-heavy";
  $trans  = "title-heavy";
} elseif ($hal == "akun-profil-edit") {
  $profil = "title-heavy active";
  $member = "title-heavy";
  $trans  = "title-heavy";
} elseif ($hal == "akun-membership") {
  $profil = "title-heavy";
  $member = "title-heavy active";
  $trans  = "title-heavy";
} else {
  $profil = "title-heavy";
  $member = "title-heavy";
  $trans  = "title-heavy active";
}

?>

<div class="sidebar">
  <a class="<?php echo $profil; ?>" href="?hal=akun-profile&tuj=profile">Profile</a>
  <a class="<?php echo $member; ?>" href="?hal=akun-membership&tuj=profile">Membership</a>
  <a class="<?php echo $trans; ?>" href="?hal=akun-transaksi&tuj=profile">Transaksi</a>
</div>


<!-- Fancybox -->
<div id="fotoan" style="display: none; width:500px; height:500px; background-color: #333333; color:white;">

  <form action="?hal=akun-respon&mode=upload&isi=<?php echo $foto; ?>" method="post" enctype="multipart/form-data">

    <center>
      <img id="gambarTampil" src="<?php echo $gambar; ?>" width="50%" height="200" alt="<?php echo "$namauser"; ?>">
      <p style="margin-top: 15px;">
        <font color="gray">Gambar tampil disini</font>
      </p>
      <input type="file" name="foto" id="gambarAmbil" onchange="return uploadFoto(this)" required />

      <p style="margin-top: 15px;">
        <button type="submit" class="btn btn-primary btn-lg">
          SIMPAN
        </button>
      </p>
    </center>

  </form>

</div>