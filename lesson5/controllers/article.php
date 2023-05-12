<?php

include_once('model/articles.php');

// checkID
$strId = $_GET['id'] ?? '';
$id = (int)$strId;

$article = articlesOne($id);
$hasArt = $article !== false; // $article !== null;

if($hasArt){
	include('views/v_article.php');
}
else{
	header('HTTP/1.1 404 Not Found');
	include('views/errors/v_404.php');
}

