$.urlParam = function(name) {
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (results != null)
		return results[1] || null;
	else
		return null;
}

$.generateNRandomNumbers = function(n, max) {
	var arr = [];

	while(arr.length < n) {
		var randomnumber = Math.floor(Math.random() * max - 1) + 1;
		if (arr.indexOf(randomnumber) > -1)
			continue;
		arr[arr.length] = randomnumber;
	}

	return arr;
}

$.generateClassification = function(stars) {
	var span = "";
	var emptyStars = 5 - stars;

	for (var i = 0; i < stars; i++)
		span += "<span class=\"glyphicon glyphicon-star\"></span>";

	for (var j = 0; j < emptyStars; j++)
		span += "<span class=\"glyphicon glyphicon-star-empty\"></span>";

	span += "<span> " + stars + " stars</span>"
	return span;
}