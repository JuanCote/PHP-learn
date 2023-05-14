<?php

// checkID
$strId = $_GET['id'] ?? '';
$id = (int)$strId;

$article = articlesOne($id);
$hasArt = $article !== false; // $article !== null;

if($hasArt){
	$pageContent = template('v_article', [
		'article' => $article
	]);
}
else{
	header('HTTP/1.1 404 Not Found');
	include('views/errors/v_404.php');
}

