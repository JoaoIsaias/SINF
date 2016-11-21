$(document).ready(function() {
	$("#firstCol").height($("#secondCol").height());
	var fc = $("#firstCol").height();
	var mc = $("#myCarousel").height();
	$("#myCarousel").css("padding-top", (fc / 2) - (mc / 2));
	$("#myCarousel").css("padding-bottom", (fc / 2) - (mc / 2));

	$(window).resize(function() {
		if ($(window).width() <= 768) {
			$("#firstCol").height(reset);
			$("#myCarousel").css("padding", 0);
		} else {
			$("#firstCol").height($("#secondCol").height());
			var fc = $("#firstCol").height();
			var mc = $("#myCarousel").height();
			$("#myCarousel").css("padding-top", (fc / 2) - (mc / 2));
			$("#myCarousel").css("padding-bottom", (fc / 2) - (mc / 2));
		}
	});
});