$(document).ready(function() {
	$("#quantity").on("input", function() {
		$("input[name=\"quantity\"]").val($(this).val());
	});
});