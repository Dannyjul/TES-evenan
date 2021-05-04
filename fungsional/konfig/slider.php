<?php

$slider = $crud->eksekusiSQL("SELECT *FROM slider");

?>

<div class="container container-home">
    <!--Carousel-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!--Carousel Indicators-->
        <ol class="carousel-indicators">
            <?php
            $a = 0;
            foreach ($slider as $s) {
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $a . '"';
                if ($a == 0) {
                    echo 'class="active"';
                }
                echo '></li>';
                $a++;
            }
            ?>
        </ol>
        <!--Carousel Banner-->
        <div class="carousel-inner">
            <?php
            $n = 0;
            foreach ($slider as $gambarBanyak) {
                $fotoan = $gambarBanyak['foto_slider'];
                $folderSlide = "./foto/slider/$fotoan";
                if ($n == 0) {
                    $aktifan = "active";
                } else {
                    $aktifan = "";
                }

                echo
                "
                            <div class='carousel-item $aktifan'>
                                <img class='banner-img' src='$folderSlide'/>
                            </div>

                            ";
                $n++;
            }
            ?>
        </div>
    </div>

</div>