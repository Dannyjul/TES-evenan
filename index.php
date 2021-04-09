<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ELITES</title>

  <link rel="shortcut icon" href="img/LogoHitam.png">

  <!-- Bootstrap V4.6 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

  <!--fancybox-->
  <link rel="stylesheet" href="vendor/fancybox/jquery.fancybox.min.css">

  <!--Slick CSS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" />

  <!-- <link rel="stylesheet" href="css/danny-design.css">
  <link rel="stylesheet" href="css/tampilan.css"> -->
  <link rel="stylesheet" href="css/ev-design.css">


</head>

<body>

  <?php

  //wao banget

    include './fungsional/data/fungsional.php';
    include './fungsional/data/konfigurasi.php';
    include './fungsional/data/isiData.php';

    $crud = new isiData();
    $iduser = @$_COOKIE['userEmail'];

    //include './fungsional/data/login-cookie.php';
    
    include './fungsional/data/data-user.php';
    include './fungsional/data/notifikasi.php';
    include './fungsional/konfig/pindahHal.php'; 
    include './fungsional/data/modal.php';

  ?>

  <!--Bootstrap JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

  <!--Slick JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
  
  <!--fancybox-->
  <script src="./vendor/fancybox/jquery.fancybox.min.js"></script>
  <!--<script src="./vendor/tambahan/perKelasan.js"></script>-->
  <script src="./vendor/tambahan/tools.js"></script>
  <script>
    $(document).ready(function () 
    {
        <?php

            if (!$pilarKelas) 
            {
              $nowey="";
            } 
            else 
            {
              foreach ($pilarKelas as $pil) 
              {
                $idPilar = $pil['id_pilar'];
                $nmPilar = $pil['nama_pilar'];

                echo
                "
                $('.turunin$idPilar').click(function(e){
                  e.preventDefault();
                  if($('.tampil$idPilar').css('display') == 'none')
                  {
                    $('.drop-menu').css('display', 'none');
                    //$('.btn-dropdown img').attr('src', './img/Collapse Arrow Up.png');
                    $('.gambar').attr('src', 'img/Collapse Arrow Down.png');

                     $('.tampil$idPilar').css('display', 'block');
                    
                      $('.turunin$idPilar .imeg$idPilar').attr('src', 'img/Collapse Arrow Up.png');
                  }
                  else
                  {
                      $('.tampil$idPilar').css('display', 'none');
                      $('.turunin$idPilar .imeg$idPilar').attr('src', 'img/Collapse Arrow Down.png');
                  }
                });
                ";
              }
            }
            

            
        ?>

        //$(selector).slideDown();
        
    });
  </script>
 

</body>

</html>


