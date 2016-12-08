<?php

// Functions to access and retrieve information from the database
// GET /artigo/getallcategories
function getAllCategories() {
	/*$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://localhost:49314/artigo/getallcategories");
	$json = curl_exec($ch);
	curl_close($ch);*/
	
	$context = stream_context_create(array('http' => array('header' => "Connection: close\r\n")));
	$json = file_get_contents("http://localhost:49314/artigo/getallcategories", false, $context);
	$categories = json_decode($json);
	return $categories;
}

?>