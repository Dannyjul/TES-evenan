$( document ).ready(function() {
    $(".btn-transaksi").click(function(e){
        e.preventDefault();
        $(".modal-background").css('display', 'block');
        $(".envelope img").attr("src", "Open Envelope.png");
        $(".red-round").css("display", "none")
    });

    $(".btn-modal-close").click(function(e){
        e.preventDefault();
        $(".modal-background").css('display', 'none');
    });
 });