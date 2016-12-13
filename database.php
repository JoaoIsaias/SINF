<?php

// Functions to access and retrieve information from the database
session_start();

// GET /artigo/getbyid/{id do artigo}
function getProductById($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getbyid/$id/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/getbranddescription/{id da marca}
function getBrandById($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getbranddescription/$id/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /review/getallartigoreviews/{id do artigo}
function getReviewsById($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/review/getallartigoreviews/$id/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/getstock/{id do artigo}
function getStockById($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getstock/$id/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/getallbrands
function getAllBrands() {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getallbrands");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/getallcategories
function getAllCategories() {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getallcategories");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/getcategorydescription/{id da categoria}
function getCategoryById($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getcategorydescription/$id/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/getbycategory/{id da categoria}
function getByCategory($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getbycategory/$id/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /cliente/getbyuser/{user do cliente}
function getUser($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/cliente/getbyuser/$id/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/getsearch/{querry de procura}
function getSearchByTerm($term) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getsearch/$term/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

function generateNRandomNumbers($n, $max) {
	$var = 0;
	$arr = array();

	while (count($arr) < $n) {
		$var = rand(0, $max);

		if (!in_array($var, $arr))
			array_push($arr, $var);
	}

	return $arr;
}

?>