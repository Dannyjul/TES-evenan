
<?php

    $slider = $crud->eksekusiSQL("SELECT *FROM slider");

?>
<section id="banner">
        <div class="container">

            <!--Carousel-->
            
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            
                <!--Carousel Indicators-->
            
                <ol class='carousel-indicators'>
                    <?php
                        $a=0;
                        foreach ($slider as $s) 
                        {
                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$a.'"'; 
                            if($a==0)
                            { 
                                echo 'class="active"'; 
                            } 
                            echo '></li>';
                            $a++;
                        }
                    ?>
                    <!--<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                    <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
                    <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
                    <li data-target='#carouselExampleIndicators' data-slide-to='3'></li>-->
                </ol>
        
                <!--Carousel Banner-->
            
                <div class="carousel-inner">
                    <?php
                        $n=0;
                        foreach ($slider as $gambarBanyak) 
                        {
                            $fotoan = $gambarBanyak['foto_slider'];
                            $folderSlide = "./foto/slider/$fotoan";
                            if ($n==0) 
                            {
                                $aktifan = "active";
                            }
                            else
                            {
                                $aktifan ="";
                            }

                            echo
                            "
                            <div class='carousel-item $aktifan'>
                                <img src='$folderSlide'/>
                            </div>

                            ";
                            $n++;
                        }
                    ?>
                    <!--
                    <div class='carousel-item active'>
                      <img  src=' <?php //echo $tujuanHeader; ?>' />
                    </div>
                    <div class="carousel-item">
                      <img  src=" <?php //echo $tujuanHeader; ?>" />
                    </div>
                    <div class="carousel-item">
                      <img  src=" <?php //echo $tujuanHeader; ?>" />
                    </div>
                    <div class="carousel-item">
                      <img  src=" <?php //echo $tujuanHeader; ?>" />
                    </div>
                    -->
                </div>
            
            </div>

        </div>
</section>