$(document).ready(function() {

 $(".Login").click(function(e) {
 $(".LoginForm").fadeIn(500);
 e.preventDefault();
 });
   $(".close").click(function(e) {
  $(".close").parent().fadeOut(500);
    e.preventDefault();
  });


 $(".reservepromo").click(function(e) {
 $(".reservepromoForm").fadeIn(500);
 e.preventDefault();
 });
    $(".close5").click(function(e) {
  $(".close5").parent().fadeOut(500);
    e.preventDefault();
  });

  $(".signUp").click(function(e) {
        $(".LoginForm").fadeOut(500);
        $(".signUpForm").fadeIn(500);
        e.preventDefault();
    });        
        $(".close2").click(function(e) {
        $(".signUpForm").fadeOut(500);
        $(".LoginForm").fadeIn(500);
        e.preventDefault();
    });

  $(".signUppromo").click(function(e) {
        $(".LoginPromoForm").fadeOut(500);
        $(".signUpFormPromo").fadeIn(500);
        e.preventDefault();
    });        
        $(".close6").click(function(e) {
        $(".signUpFormPromo").fadeOut(500);
        $(".LoginPromoForm").fadeIn(500);
        e.preventDefault();
    });

        $(".close3").click(function(e) {
        $(".ReserveForm").fadeOut(500);
        $(".LoginForm").fadeIn(500);
        e.preventDefault();
    });
        $(".close4").click(function(e) {
        $(".LoginPromoForm").fadeOut(500);
        e.preventDefault();
    });
        $(".close7").click(function(e) {
        $(".PromoForm").fadeOut(500);
        e.preventDefault();
    });

  });