urlParam = function(name) {
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (results != null)
		return results[1] || null;
	else
		return null;
}

member = function(array, value) {
	for (var i = 0; i < array.length; i++) {
		if (array[i] === value)
			return true;
	}
	return false;
}

generateNRandomNumbers = function(n, max) {
	var arr = [];

	while(arr.length < n) {
		var randomnumber = Math.floor(Math.random() * max) + 1;
		if (arr.indexOf(randomnumber) > -1)
			continue;
		arr[arr.length] = randomnumber;
	}

	return arr;
}

var artigoID = urlParam('id');
if (artigoID == null)
	console.log("404 NOT FOUND");

// GET /artigo/getbyid/{id do artigo}
$.get("http://localhost:49314/artigo/getbyid/" + artigoID)
.done(function(artigo) {
	// GET /artigo/getbranddescription/{id da marca}
	$.get("http://localhost:49314/artigo/getbranddescription/" + artigo.Marca)
	.done(function(marca) {
		// GET /artigo/getcategorydescription/{id da categoria}
		$.get("http://localhost:49314/artigo/getcategorydescription/" + artigo.Familia)
		.done(function(categoria) {
			$("#product-name").html(artigo.DescArtigo
									+ "<small> by <a href=\"#\">" + marca + "</a></small>"
									+ "<span class=\"pull-right\">" + artigo.Preco + "€</span>");
			$("#product-category").html("in <a href=\"#\">" + categoria + "</a> Category");
		});
	});

	// GET /artigo/getstock/{id do artigo}
	$.get("http://localhost:49314/artigo/getstock/" + artigoID)
	.done(function(armazens) {
		for (var i = 0; i < armazens.length; i++) {
			$("#storages").append("<li class=\"list-group-item\">"
								+ "<span>" + armazens[i].Descricao + " <span class=\"badge\">" + armazens[i].Stock + "</span></span>"
								+ "<input type=\"number\" min=\"1\" max=\"" + armazens[i].Stock + "\" class=\"pull-right\" style=\"width: 50px\">"
								+ "</li>");
		}
	});

	// GET /artigo/getbycategory/{id da categoria}
	$.get("http://localhost:49314/artigo/getbycategory/" + artigo.Familia)
	.done(function(relacionados) {
		// console.log(relacionados);
		var values = generateNRandomNumbers(4, relacionados.length);
		// console.log(values);
		for (var i = 0; i < values.length; i++) {
			// console.log(relacionados[values[i]]);
			$("#related").append("<div class=\"col-lg-3 col-md-3 col-sm-6\">"
									+ "<div class=\"thumbnail\">"
									+ "<img src=\"images/test.jpg\" alt=\"Test\">"
									+ "<div class=\"caption\">"
									+ "<h4 style=\"margin: 0\" class=\"pull-right\">" + relacionados[values[i]].Preco + "€</h4>"
									+ "<a href=\"product.html\"><h4 style=\"margin: 0\">" + relacionados[values[i]].DescArtigo + "</h4></a>"
									+ "</div>"
									+ "<div class=\"caption\" style=\"padding-top: 0\">"
									+ "<span class=\"pull-right\">"
									+ "<a href=\"#reviews\">69 reviews</a>"
									+ "</span>"
									+ "<span>"
									+ "<span class=\"glyphicon glyphicon-star\"></span>"
									+ "<span class=\"glyphicon glyphicon-star\"></span>"
									+ "<span class=\"glyphicon glyphicon-star\"></span>"
									+ "<span class=\"glyphicon glyphicon-star\"></span>"
									+ "<span class=\"glyphicon glyphicon-star\"></span>"
									+ "</span>"
									+ "</div>"
									+ "</div>"
									+ "</div>");
		}
	});
})
.fail(function() {
	// artigo not found
	console.error("Erro foda-se!");
});