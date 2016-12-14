<?php

// Functions to access and retrieve information from the database
session_start();

// Print stars
function printStars($stars) {
	$rest = 5 - $stars;

	for ($i = 0; $i < $stars; $i++)
		echo "<span class=\"glyphicon glyphicon-star\"></span>";

	if ($rest > 0) {
		for ($i = 0; $i < $rest; $i++)
			echo "<span class=\"glyphicon glyphicon-star-empty\"></span>";
	}
}

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

// GET /review/getartigoclassification/{id do artigo}
function getProductRating($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/review/getartigoclassification/$id/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/get4randbycategory/{id da categoria}
function getRelatedProducts($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/get4randbycategory/$id");

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

// GET /docvenda/getencomendascliente/{id do cliente}
function getOrdersById($id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/docvenda/getencomendascliente/$id/");

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

// Get brand's ID
function getBrandId($desc, $brands) {
	for ($i = 0; $i < count($brands); $i++) {
		if ($brands[$i]->Descricao === $desc)
			return $brands[$i]->IdMarca;
	}

	return NULL;
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

// Get category's ID
function getCategoryId($desc, $categories) {
	for ($i = 0; $i < count($categories); $i++) {
		if ($categories[$i]->Descricao === $desc)
			return $categories[$i]->IdCategoria;
	}

	return NULL;
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
function getSearchResults($query) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getsearch/$query/");

	$json = curl_exec($ch);
	curl_close($ch);

	return json_decode($json);
}

// GET /artigo/getsearch/{querry de procura}/{id da categoria ou marca}
function getSpecificSearchResults($query, $id) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getsearch/$query/$id/");

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

// WishList management - $list[$i]['productId']
function inWishList($id, $list) {
	for ($i = 0; $i < count($list); $i++) {
		if ($list[$i]['productId'] === $id) {
			return true;
		}
	}

	return false;
}

function getWishList($userID) {
	$db = new PDO('sqlite:sqlite_db/sinf.db') or die('Can not connect to database!');

	$stmt = $db->prepare('SELECT productId FROM WishList WHERE clientId = ?');
	$stmt->execute(array($userID));
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$db = NULL;

	return $result;
}

function addToWishList($userID, $productID) {
	$db = new PDO('sqlite:sqlite_db/sinf.db') or die('Can not connect to database!');

	$stmt = $db->prepare('INSERT INTO WishList (clientId, productId) VALUES (:clientId, :productId)');
	$stmt->bindParam(':clientId', $userID);
	$stmt->bindParam(':productId', $productID);
	$stmt->execute();
	$db = NULL;
}

function deleteFromWishList($userID, $productID) {
	$db = new PDO('sqlite:sqlite_db/sinf.db') or die('Can not connect to database!');

	$stmt = $db->prepare('DELETE FROM WishList WHERE clientId = :clientId AND productId = :productId');
	$stmt->bindParam(':clientId', $userID);
	$stmt->bindParam(':productId', $productID);
	$stmt->execute();
	$db = NULL;
}

// ShoppingCart management - $cart[$i]['productId']
function inShoppingCart($id, $cart) {
	for ($i = 0; $i < count($cart); $i++) {
		if ($cart[$i]['productId'] === $id) {
			return true;
		}
	}

	return false;
}

function getShoppingCart($userID) {
	$db = new PDO('sqlite:sqlite_db/sinf.db') or die('Can not connect to database!');

	$stmt = $db->prepare('SELECT productId, quantity FROM ShoppingCart WHERE clientId = ?');
	$stmt->execute(array($userID));
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$db = NULL;

	return $result;
}

function addToShoppingCart($userID, $productID, $quantity) {
	$db = new PDO('sqlite:sqlite_db/sinf.db') or die('Can not connect to database!');

	$stmt = $db->prepare('INSERT INTO ShoppingCart (clientId, productId, quantity)
											VALUES (:clientId, :productId, :quantity)');
	$stmt->bindParam(':clientId', $userID);
	$stmt->bindParam(':productId', $productID);
	$stmt->bindParam(':quantity', $quantity);
	$stmt->execute();
	$db = NULL;
}

function deleteFromShoppingCart($userID, $productID) {
	$db = new PDO('sqlite:sqlite_db/sinf.db') or die('Can not connect to database!');

	$stmt = $db->prepare('DELETE FROM ShoppingCart WHERE clientId = :clientId AND productId = :productId');
	$stmt->bindParam(':clientId', $userID);
	$stmt->bindParam(':productId', $productID);
	$stmt->execute();
	$db = NULL;
}

?>
