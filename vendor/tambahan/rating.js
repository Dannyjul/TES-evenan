$(document).ready(function () 
{
    $(".bintang1").click(function (e) 
    { 
        $('.bintang1 img').attr("src", "./img/Star_2.png");
        $('.bintang2 img').attr("src", "./img/Star_1.png");
        $('.bintang3 img').attr("src", "./img/Star_1.png");
        $('.bintang4 img').attr("src", "./img/Star_1.png");
        $('.bintang5 img').attr("src", "./img/Star_1.png");
        $('.bintang').val('1');
    });   
    $(".bintang2").click(function (e) 
    { 
        $('.bintang1 img').attr("src", "./img/Star_2.png");
        $('.bintang2 img').attr("src", "./img/Star_2.png");
        $('.bintang3 img').attr("src", "./img/Star_1.png");
        $('.bintang4 img').attr("src", "./img/Star_1.png");
        $('.bintang5 img').attr("src", "./img/Star_1.png");
        $('.bintang').val('2');
    }); 
    $(".bintang3").click(function (e) 
    { 
        $('.bintang1 img').attr("src", "./img/Star_2.png");
        $('.bintang2 img').attr("src", "./img/Star_2.png");
        $('.bintang3 img').attr("src", "./img/Star_2.png");
        $('.bintang4 img').attr("src", "./img/Star_1.png");
        $('.bintang5 img').attr("src", "./img/Star_1.png");
        $('.bintang').val('3');
    });    
    $(".bintang4").click(function (e) 
    { 
        $('.bintang1 img').attr("src", "./img/Star_2.png");
        $('.bintang2 img').attr("src", "./img/Star_2.png");
        $('.bintang3 img').attr("src", "./img/Star_2.png");
        $('.bintang4 img').attr("src", "./img/Star_2.png");
        $('.bintang5 img').attr("src", "./img/Star_1.png");
        $('.bintang').val('4');
    }); 
    $(".bintang5").click(function (e) 
    { 
        $('.bintang1 img').attr("src", "./img/Star_2.png");
        $('.bintang2 img').attr("src", "./img/Star_2.png");
        $('.bintang3 img').attr("src", "./img/Star_2.png");
        $('.bintang4 img').attr("src", "./img/Star_2.png");
        $('.bintang5 img').attr("src", "./img/Star_2.png");
        $('.bintang').val('5');
    }); 
});