$(function () { /* Tooltip */
	$('[data-toggle="tooltip"]').tooltip();
	$(".icon1").mouseenter(function () {
		$(".icon1").animate({
			left: '250px',
			opacity: '1',
			height: '150px',
			width: '150px'
		});

	}); /* Effet noir et blanc*/
	$(".carousel").hover(function () {
		$(".w-100").removeClass("bw");
	}, function () {
		$(".w-100").addClass("bw");
	});
		/* Effet scroll */
	$(".navbar a, footer a").on("click", function (event) {
		event.preventDefault();
		var hash = this.hash;
		$('body,html').animate({
			scrollTop: $(hash).offset().top - 100
		}, 900, function () {
			window.location.hash = hash;
		})
	});
});