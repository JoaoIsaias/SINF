<?php

// Functions to access and retrieve information from the database
// GET /artigo/getallcategories
function getAllCategories() {
	$json = file_get_contents("http://localhost:49314/artigo/getallcategories");
	$categories = json_decode($json);
	return $categories;
}

// GET /artigo/getcategorydescription/{id da categoria}
function getCategoryById($id) {
	$category = file_get_contents("http://localhost:49314/artigo/getcategorydescription/$id");
	echo "$id : $category <br>";
	// return $category;
}

?>