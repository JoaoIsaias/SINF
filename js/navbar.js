$(document).ready(function() {
	$(".dropdown-menu > li a").click(function() {
		$("#dropdown").text($(this).text()).append("<span style=\"margin-left: 5px\" class=\"caret\"></span>");
	});

	$("#submit").click(function() {
		window.location.replace("../search_results.php?category=" + $("#dropdown").text() + "&term=" + $("#term").val());
	});
});