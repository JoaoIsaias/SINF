$(document).ready(function() {
	function search() {
		var type, option, term;

		type = $("#dropdown").text().split("|")[1];
		option = $("#dropdown").text().split("|")[0];
		term = $("#search-box").val();

		if (term.length == 0)
			return;

		window.location.replace("search_results.php?type=" + type + "&option=" + option + "&term=" + term);
	}

	$(".dropdown-menu > li a").click(function() {
		var type = $(this).attr("class");
		$("#dropdown").text($(this).text()).append("<span class=\"text-hide\">|" + type + "</span><span style=\"margin-left: 5px\" class=\"caret\"></span>");
	});

	$("#search-box").keypress(function(e) {
		if (e.which === 13) {
			search();
		}
	});

	$("#submit").click(function() {
		search();
	});
});