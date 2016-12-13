$(document).ready(function() {
	$(".dropdown-menu > li a").click(function() {
		$("#dropdown").text($(this).text()).append(" <span class=\"caret\"></span>");
	});

	$("#submit").click(function() {
		console.log($("#dropdown").text());
		console.log($("#term").text());
		/*$.get("../search_results.php?category=" + $("#dropdown").text() + "&term=" + $("#term").text(), function() {

		});*/
	});
});