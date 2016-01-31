
/*$(document).ready(function() {
    $(".btn-login").click(function(e) {
        //$("body").append('<div class="overlay"></div>');
        $(".popup, .overlay").fadeIn("slow");
        
        $(".overlay").click(function(e) {
            $(".popup, .overlay").fadeOut("slow");
        });
        $(document).on('keydown',function(e) {
        	if (e.keyCode===27) {
        		$(".popup, .overlay").fadeOut("slow");
        	};
        }); 
    });
});*/

$(document).ready(function(){
    $(".cancel-verify").click(function(e){
        $(".popup-verify").fadeOut("slow");
        $(".navbar-fixed-top").css({ 'top': '0px' });
    });
    $(document).on('keydown',function(e) {
        if (e.keyCode===27) {
            $(".popup-verify").fadeOut("slow");
            $(".navbar-fixed-top").css({ 'top': '0px' });
        };
    });
});

$(document).ready(function(){
    $("#repass").keyup(validate);
});
function validate() {
    var pass1 = $("#pass").val();
    var pass2 = $("#repass").val();
    if (!(pass2 == '' || pass1== '')) {
        if (pass1.length>8) {
            if (pass1==pass2) {
                $("#check").addClass("fa-check");
                $("#check").removeClass("fa-times");
                $("#validate-status").text(" Password Match");
                $("#validate-status").css({ 'color': 'green', 'font-size': '14px' });
                $('#createaccount').attr('disabled', false);
            } else {
                $("#check").removeClass("fa-check");
                $("#check").addClass("fa-times");
                $("#validate-status").text(" Password do not match!");
                $("#validate-status").css({ 'color': 'red', 'font-size': '14px' });
                $('#createaccount').attr('disabled', true);
            }
        } else {
            $("#check").removeClass("fa-check");
            $("#check").addClass("fa-times");
            $("#validate-status").text(" Password must have 8 characters or above!");
            $("#validate-status").css({ 'color': 'red', 'font-size': '14px' });
            $('#createaccount').attr('disabled', true);
        }
    } else {
        $("#check").removeClass("fa-check");
        $("#check").removeClass("fa-times");
        $("#validate-status").text(" ");
        $('#createaccount').attr('disabled', true);
    }
}