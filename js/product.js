var artigoID = decodeURIComponent($.urlParam('id'));
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

	// GET /artigo/getclassification/{id do artigo}
	$.get("http://localhost:49314/artigo/getclassification/" + artigoID)
	.done(function(classificacao) {
		// console.log(classificacao);
		// $("#product-classification").
	})
	.fail(function(xhr, textStatus) {
		$("#product-classification").html("<span class=\"glyphicon glyphicon-star-empty\"></span>"
											+ "<span class=\"glyphicon glyphicon-star-empty\"></span>"
											+ "<span class=\"glyphicon glyphicon-star-empty\"></span>"
											+ "<span class=\"glyphicon glyphicon-star-empty\"></span>"
											+ "<span class=\"glyphicon glyphicon-star-empty\"></span>"
											+ "<span> 0.0 stars</span>");
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
		console.log(relacionados);
		var values = $.generateNRandomNumbers(4, relacionados.length);

		for (var i = 0; i < values.length; i++) {
			$("#related").append("<div class=\"col-lg-3 col-md-3 col-sm-6\">"
									+ "<div class=\"thumbnail\">"
									+ "<img src=\"images/test.jpg\" alt=\"Test\">"
									+ "<div class=\"caption\">"
									+ "<h4 style=\"margin: 0\" class=\"pull-right\">" + relacionados[values[i]].Preco + "€</h4>"
									+ "<a href=\"product.html?id=" + relacionados[values[i]].CodArtigo + "\"><h4 style=\"margin: 0\">" + relacionados[values[i]].DescArtigo + "</h4></a>"
									+ "</div>"
									+ "</div>"
									+ "</div>");
		}
	});

	// GET /artigo/getreviews/{id do artigo}
	$.get("http://localhost:49314/artigo/getreviews/" + artigoID)
	.done(function(comentarios) {
		if (comentarios.length == 0) {
			$("#number-reviews").append("0 reviews");
			$("#reviews").append("<div class=\"alert alert-info\" role=\"alert\">Currently this product has no reviews.</div>");
		} else {
			for (var i = 0; i < comentarios.length; i++) {
				$("#reviews").append("<div class=\"well\">"
										+ "<span style=\"display: block\">"
										+ "<span class=\"glyphicon glyphicon-star\"></span>"
										+ "<span class=\"glyphicon glyphicon-star\"></span>"
										+ "<span class=\"glyphicon glyphicon-star\"></span>"
										+ "<span class=\"glyphicon glyphicon-star\"></span>"
										+ "<span class=\"glyphicon glyphicon-star\"></span>"
										+ "<span>" + comentarios[i].Classificacao + " stars</span>"
										+ "<span class=\"pull-right\">10 days ago</span>"
										+ "</span>"
										+ "<span style=\"display: block; margin-bottom: 10px\">"
										+ "<b>By Anonymous on Month Day, Year</b>"
										+ "</span>"
										+ "<span style=\"display: block\">"
										+ comentarios[i].Comentario
										+ "</span>"
										+ "</div>");
			}
		}
	});
})
.fail(function() {
	
});