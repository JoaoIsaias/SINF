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
		var randomnumber = Math.floor(Math.random() * max) + 1;
		if (arr.indexOf(randomnumber) > -1)
			continue;
		arr[arr.length] = randomnumber;
	}

	return arr;
}