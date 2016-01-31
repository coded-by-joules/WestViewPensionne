$(document).ready(function() {
	$(".signIn").on("click", function(e) {
		$(".signInForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close").click(function(e) {
		$(".close").parent().fadeOut(500);
		e.preventDefault();
	});
	$(".login").on("click", function(e) {
		$(".signInForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close5").click(function(e) {
		$(".close5").parent().fadeOut(500);
		e.preventDefault();
	});

		$(".signUp").on("click", function(e) {
		$(".signUpForm").fadeIn(500);
		$(".signInForm").fadeOut(500);
		e.preventDefault();
	});
	
	$(".close2").click(function(e) {
		$(".signUpForm").fadeOut(500);
		$(".signInForm").fadeIn(500);
		e.preventDefault();
	});
		$(".reset").on("click", function(e) {
			$(".signInForm").fadeOut(500);

		$(".changePasswordForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close3").click(function(e) {
			$(".changePasswordForm").fadeOut(500);
		$(".signInForm").fadeIn(500);

		e.preventDefault();
	});
		$(".reservepromo").on("click", function(e) {
			$(".reservepromoForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close4").click(function(e) {
			$(".reservepromoForm").fadeOut(500);

		e.preventDefault();
	});
	
});