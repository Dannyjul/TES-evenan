<!--
    untuk halaman course aja
-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>



<script>
    $(document).ready(function () 
    {
        <?php
            foreach ($pilarKelas as $pil) 
            {
               $idPilar = $pil['id_pilar'];
               $nmPilar = $pil['nama_pilar'];

               echo
               "
               $('#pilar$idPilar').click(function(e)
               {
                   e.preventDefault();
                   $('#gem$idPilar').addClass('active');
                   $('.last-click').removeClass('active');
                   $('#unduh').addClass('last-click');
                   $('.course-content').css('display', 'inline-block');
       
               });
               ";
            }
        ?>

        $('.btn-dropdown', '#turun').click(function(e){
        e.preventDefault();
        if($('.drop-menu').css('display') == 'none')
        {
            $('.drop-menu').css('display', 'block');
            $('.btn-dropdown img').attr("src", "Collapse Arrow Up.png");
        }else{
            $('.drop-menu').css('display', 'none');
            $('.btn-dropdown img').attr("src", "Collapse Arrow Down.png");
        }
        });
        
    });
</script>

