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

function isInWishList($idArtigo) {
	$db_users = new PDO('sqlite:db_sqlite/sinf.db');
	$stmt = $db_users->prepare('SELECT idArtigo FROM ListaDeDesejos WHERE idCliente = ?');
	$stmt->execute(array($_SESSION['user']));
	
	if (!$stmt->fetch())
		return false;
	else
		return true;
}

function getWishList() {
	$db_users = new PDO('sqlite:db_sqlite/sinf.db');
	$stmt = $db_users->prepare('SELECT idArtigo FROM ListaDeDesejos WHERE idCliente = ?');
	$stmt->execute(array($_SESSION['user']));
	$productIds = $stmt->fetch();

	if ($productIds === false) {
		return NULL;
	}
	
	$products = array();
	for ($i = 0; $i < count($productIds); $i++) {
		array_push($products, getProductById($productIds[$i]));
	}
	
	return $products;
}

function addToWishList($idArtigo) {
	$db_users = new PDO('sqlite:db_sqlite/sinf.db');
	$stmt = $db_users->prepare('INSERT INTO ListaDeDesejos VALUES (:idCliente, :idArtigo);');
	$stmt->bindParam(':idCliente', $_SESSION['user']);
	$stmt->bindParam(':idArtigo', $idArtigo);
	$stmt->execute();
}

function removeFromWishList($idArtigo) {
	$db_users = new PDO('sqlite:db_sqlite/sinf.db');
	$stmt = $db_users->prepare('DELETE FROM ListaDeDesejos WHERE idCliente = :idCliente AND idArtigo = :idArtigo');
	$stmt->bindParam(':idCliente', $_SESSION['user']);
	$stmt->bindParam(':idArtigo', $idArtigo);
	$stmt->execute();
}

function removeAllFromWishList() {
	$db_users = new PDO('sqlite:db_sqlite/sinf.db');
	$stmt = $db_users->prepare('DELETE FROM ListaDeDesejos WHERE idCliente = :idCliente');
	$stmt->bindParam(':idCliente', $_SESSION['user']);
	$stmt->execute();
}

function getShoppingCart() {
	$db_users = new PDO('sqlite:db_sqlite/sinf.db');
	$stmt = $db_users->prepare('SELECT idArtigo, idArmazem, quantidade FROM CarrinhoDeCompras WHERE idCliente = ?');
	$stmt->execute(array($_SESSION['user']));
	$shoppingCartProducts = $stmt->fetch();
	
	$result = array();
	for ($i = 0; $i < count($shoppingCartProducts); $i++) {
		$product = array();
		array_push($product, $shoppingCartProducts[$i]);
		array_push($product, getProductById($shoppingCartProducts[$i]->CodArtigo));
		array_push($result, $product);
	}
	
	return $result;
}

function addToShoppingCart($idArtigo, $idArmazem, $quantidade) {
	$db_users = new PDO('sqlite:db_sqlite/sinf.db');
	$stmt = $db_users->prepare('INSERT INTO CarrinhoDeCompras VALUES (:idCliente, :idArtigo, :quantidade, :idArmazem)');
	$stmt->bindParam(':idCliente', $_SESSION['user']);
	$stmt->bindParam(':idArtigo', $idArtigo);
	$stmt->bindParam(':quantidade', $quantidade);
	$stmt->bindParam(':idArmazem', $idArmazem);
	$stmt->execute();
}

function removeFromShoppingCart($idArtigo) {
	$db_users = new PDO('sqlite:db_sqlite/sinf.db');
	$stmt = $db_users->prepare('DELETE FROM CarrinhoDeCompras WHERE idCliente = :idCliente AND idArtigo = :idArtigo');
	$stmt->bindParam(':idCliente', $_SESSION['user']);
	$stmt->bindParam(':idArtigo', $idArtigo);
	$stmt->execute();
}

?>