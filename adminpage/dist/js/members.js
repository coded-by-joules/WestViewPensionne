$(document).ready(function() {
		$(".signUp").on("click", function(e) {
		$(".signUpForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close2").click(function(e) {
		$(".close2").parent().fadeOut(500);
		e.preventDefault();
	});

		$(".addroom").on("click", function(e) {
			$(".addRoomForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close").click(function(e) {
			$(".addRoomForm").fadeOut(500);

		e.preventDefault();
	});
		$(".addcategory").on("click", function(e) {
			$(".addCategoryForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close3").click(function(e) {
			$(".addCategoryForm").fadeOut(500);

		e.preventDefault();
	});
		$(".addon").on("click", function(e) {
			$(".addOnForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close7").click(function(e) {
			$(".addOnForm").fadeOut(500);

	e.preventDefault();
	});
		$(".editroom").on("click", function(e) {
			$(".editRoomForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close5").click(function(e) {
			$(".editRoomForm").fadeOut(500);

	e.preventDefault();
	});
		$(".editcategory").on("click", function(e) {
			$(".editCategoryForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close6").click(function(e) {
			$(".editCategoryForm").fadeOut(500);

	e.preventDefault();
	});
		$(".editpromo").on("click", function(e) {
			$(".editPromoForm").fadeIn(500);
		e.preventDefault();
	});
	
	$(".close7").click(function(e) {
			$(".editPromoForm").fadeOut(500);

	e.preventDefault();
	});
});