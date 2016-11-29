<?php

// Functions to access and retrieve information from the database
function getAllCategories() {
	$json = file_get_contents('http://localhost:49314/artigo/getallcategories');
	$categories = json_decode($json);
	return $categories;
}

?>