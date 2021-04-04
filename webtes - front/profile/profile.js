$( document ).ready(function() {
    $("#bisnis").click(function(e){
        e.preventDefault();
        $("#bisnis").addClass("active");
        $("#profil").removeClass("active");

        $('.akun-profil').css('display', 'none');
        $('.akun-bisnis-list').css('display', 'inline-block');
        $('.sidebar').css('height', '1410px');
    });

    $(".btn-card").click(function(e){
        e.preventDefault();
        $('.akun-bisnis-list').css('display', 'none');
        $('.akun-bisnis').css('display', 'inline-block');
        $('.non-edit').css('display', 'inline-block');
        $('.editing').css('display', 'none');


        $('.sidebar').css('height', '1456px')
    });

    $(".back-to-list").click(function(e){
        e.preventDefault();
        $('.akun-bisnis-list').css('display', 'inline-block');
        $('.akun-bisnis').css('display', 'none');
    });

    $(".back-to-list").click(function(e){
        e.preventDefault();
        $('.akun-bisnis-list').css('display', 'inline-block');
        $('.akun-bisnis').css('display', 'none');
    });

    $(".btn-edit").click(function(e){
        e.preventDefault();
        $('.non-edit').css('display', 'none');
        $('.editing').css('display', 'inline-block');
    });

    $(".akun-bisnis-list .btn-edit").click(function(e){
        e.preventDefault();
        $('.akun-bisnis-list').css('display', 'none');
        $('.akun-bisnis').css('display', 'inline-block');
        $('.non-edit').css('display', 'none');
        $('.editing').css('display', 'inline-block');
    });

    $(".btn-simpan").click(function(e){
        e.preventDefault();
        $('.non-edit').css('display', 'inline-block');
        $('.editing').css('display', 'none');
        
    });

 });