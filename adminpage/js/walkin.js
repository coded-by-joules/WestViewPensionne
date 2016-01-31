
$(document).ready(function() {
		$(".walkin").on("click", function(e) {
		$(".walkInForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close").click(function(e) {
		$(".close").parent().fadeOut(500);
		e.preventDefault();
	});


    $(".autoaddon").on("click", function(e) {
	$(".addOnautoForm").fadeIn(500);
	e.preventDefault();
	});
	
	$(".close2").click(function(e) {
	$(".addOnautoForm").fadeOut(500);
	e.preventDefault();
	});

		$(".addon").on("click", function(e) {
		$(".addOnForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close1").click(function(e) {
	$(".addOnForm").fadeOut(500);
		e.preventDefault();
	});


	 $(".transfer").on("click", function(e) {
		$(".transferForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close2").click(function(e) {
		$(".close2").parent().fadeOut(500);
		e.preventDefault();
	});

		$(".action").on("click", function(e) {
			$(".actionForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close3").click(function(e) {
			$(".actionForm").fadeOut(500);

	e.preventDefault();
	});


});
