$(document).ready(function() {
	if ($(window).width() < 768) {
		$("#firstRow").css("display", "none");
		$("#smallForm").css("display", "block");
	}

	$(window).resize(function() {
		if ($(window).width() < 768) {
			$("#firstRow").css("display", "none");
			$("#smallForm").css("display", "block");
		} else {
			$("#firstRow").css("display", "block");
			$("#smallForm").css("display", "none");
		}
	});
});