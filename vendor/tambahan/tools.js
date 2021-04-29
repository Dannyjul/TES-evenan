function uploadFoto(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#gambarTampil').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#gambarAmbil").change(function () {
  uploadFoto(this).fadeIn();
});


function uploadUsaha(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#gambarUsaha').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#gambarAmbUsaha").change(function () {
  uploadUsaha(this).fadeIn();
});


$(document).ready(function () {
  // //var cek = $('#tampilPassword').val();
  // $('.tampilPassword').click(function() {
  //   if ($(this).is(':checked')) {
  //     $('.tampilinPass').attr('type', 'text');
  //   } else {
  //     $('.tampilinPass').attr('type', 'password');
  //   }
  // });

  // $(".passTaksama").hide();

  // $('#pass2').keyup(function (e) 
  // { 
  //   var pass1 = $(".tampilinPass").val();
  //   var pass2 = $("#pass2").val();

  //   if (pass1=="" && pass2=="") 
  //   {
  //     $("#pass2").removeClass("merahAlert"); 
  //     $("#tampilinPass").removeClass("merahAlert"); 
  //     $(".passTaksama").hide();
  //   } 
  //   else 
  //   {
  //     if (pass2!=pass1) 
  //     {
  //       $("#pass2").addClass("merahAlert"); 
  //       $(".tampilinPass").addClass("merahAlert"); 
  //       $(".passTaksama").fadeIn(1000);
  //       //return false; 
  //     } 
  //     else 
  //     {
  //       $("#pass2").removeClass("merahAlert"); 
  //       $(".tampilinPass").removeClass("merahAlert"); 
  //       $("#pass2").addClass("hijauAlert"); 
  //       $(".tampilinPass").addClass("hijauAlert"); 
  //       $(".passTaksama").fadeOut(1000);
  //       //return true; 
  //     }
  //   }

  //   $(".regist").click(function (e) 
  //   { 
  //     var pass1 = $(".tampilinPass").val();
  //     var pass2 = $("#pass2").val();
  //     if (pass2==pass1) 
  //     {
  //       return true;
  //      // submi


  //     } 
  //     else 
  //     {
  //       return false;
  //     }

  //   });


  // });


  $('.slick').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1
  });


  $(".modal-trigger-login").on('click', function () {
    $(".modal-login").css("display", "flex");
  });

  $(".modal-trigger-daftar").on('click', function () {
    $(".modal-login").css("display", "none");
    $(".modal-daftar").css("display", "flex");
  });

  $(".modal-trigger-btn").on('click', function () {
    $(".modal-daftar").css("display", "flex");
  });

  $(".close").on('click', function () {
    $(".modal").css("display", "none");
  });

  $("#tombolAwal").click(function (e) {
    $.fancybox.close();

    //$(".modal-daftar").fadeIn();
    $(".modal-daftar").css("display", "flex");
    //$(".modal-daftar").fadeIn();
  });

  $("#tombolUpg").click(function (e) {
    $.fancybox.close();

    //$(".modal-daftar").fadeIn();
    //$(".modal-daftar").css("display", "flex");
    //$(".modal-daftar").fadeIn();
  });



});

//FORM VALIDATION
//CREATED BY EVA 13-04-2021
$(document).ready(function(){
  //CREATED BY DANNY LONG TIME AGO
  //var cek = $('#tampilPassword').val();
      $('.tampilPassword').click(function() {
        if ($(this).is(':checked')) {
          $('.tampilinPass').attr('type', 'text');
        } else {
          $('.tampilinPass').attr('type', 'password');
        }
      });

      $(".passTaksama").hide();

  //CREATED BY EVA 13-04-2021

  function validateName(){
    var nama = $("#nama").val();
    var stringPattern = /^[a-zA-Z ]*$/;

    if(nama == ""){
      $('#errNama').css("display", "block");
      $('#errNama').html("*Please input your name.");
      return false;
    }else if (stringPattern.test(nama) == false){
      $('#errNama').css("display", "block");
      $('#errNama').html("*Your name contains number.");
      return false;
    }else{
      $('#errNama').css("display", "none");
      return true;
    }
  }

  function validateAlamat(){
    var alamat = $("#alamat").val();

    if(alamat == ""){
      $('#errAlamat').css("display", "block");
      $('#errAlamat').html("*Please input your address.");
      return false;
    }else{
      $('#errAlamat').css("display", "none");
      return true;
    }
  }

  function validatePhone(){
    var phone = $("#no-hp").val();
    var phonePattern = /^08[0-9]*$/;

    if(phone == ""){
      $('#errPhone').css("display", "block");
      $('#errPhone').html("*Please input your phone number.");
      return false;
    }else if(phonePattern.test(phone) == false || phone.length > 13){
      $('#errPhone').css("display", "block");
      $('#errPhone').html("*Wrong phone number.");
      return false;
    }else{
      $('#errPhone').css("display", "none");
      return true;
    }
  }

  function validateEmail(){
    var email = $("#email").val();
    var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(email == ""){
      $('#errEmail').css("display", "block");
      $('#errEmail').html("*Please input your email.");
      return false;
    }else if(emailPattern.test(email) == false){
      $('#errEmail').css("display", "block");
      $('#errEmail').html("*Wrong email.");
      return false;
    }else{
      $('#errEmail').css("display", "none");
      return true;
    }
  }

  function validatePass(){
    var pass = $("#pass").val();

    if(pass == ""){
      $('#errPass').css("display", "block");
      $('#errPass').html("*Please input your Password.");
      return false;
    }else{
      $('#errPass').css("display", "none");
      return true;
    }
  }

  function validateCPass(){
    var confirm_pass = $("#confirm-pass").val();
    var pass = $("#pass").val();

    if(confirm_pass == ""){
      $('#errPassConf').css("display", "block");
      $('#errPassConf').html("*Please reinput the password.");
      return false;
    }else if(pass != confirm_pass){
      $('#errPassCon').css("display", "block");
      $('#errPassConf').html("*Password didn't match.");
      return false;
    }else{
      $('#errPassConf').css("display", "none");
      return true;
    }
  }

  // function validateBirth(){
  //   var birth = $('#tgl-lahir input[name="tglahir"]').val();
  //   if(birth == "dd/mm/yyyy"){
  //     console.log(birth);
  //     $('#errTgl').css("display", "block");
  //     $('#errTgl').html("*Please select your birthdate.");
  //   }else{
  //     $('#errTgl').css("display", "none");
  //   }
  // }

  // function validateGender(){
  //   var gender = $('#gender').val();
  //   if(gender == ""){
  //     console.log(gender);
  //     $('#errGender').css("display", "block");
  //     $('#errGender').html("*Please select your gender.");
  //   }else{
  //     $('#errGender').css("display", "none");
  //   }
  // }

  $('#nama').on('keyup', function (e) { 
    validateName();
  });

  $('#alamat').on('keyup', function (e) { 
    validateAlamat();
  });

  $('#no-hp').on('keyup', function (e) { 
    validatePhone();
  });

  $('#email').on('keyup', function (e) { 
    validateEmail();
  });

  $('#pass').on('keyup', function (e) { 
    validatePass();
  });

  $('#confirm-pass').on('keyup', function (e) { 
    validateCPass();
  });

  $('#tlg-lahir').on('click', function (e) { 
    validateBirth();
  });

  $('#gender').on('click', function (e) { 
    validateGender();
  });

  

  $('#btn-modal-daftar').prop('disabled', true);
  $('input').on('keyup', function(){
    var nama = $("#nama").val();
    var stringPattern = /^[a-zA-Z ]*$/;
    var alamat = $("#alamat").val();
    var phone = $("#no-hp").val();
    var phonePattern = /^08[0-9]*$/;
    var email = $("#email").val();
    var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var confirm_pass = $("#confirm-pass").val();
    var gender = $('#gender').val();
  var pass = $("#pass").val();
    if(nama != "" && stringPattern.test(nama) == true && 
    alamat != "" && phone != "" && (phonePattern.test(phone) == true || phone.length < 13) &&
    email != "" && emailPattern.test(email) == true && pass != "" && 
    confirm_pass != "" && pass == confirm_pass)
    {
      $('#btn-modal-daftar').prop('disabled', false);
    }
    else
    {
      $('#btn-modal-daftar').prop('disabled', true);
    }
  });


});
