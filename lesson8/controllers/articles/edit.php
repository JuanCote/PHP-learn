<?php

include_once('model/articles.php');
include_once('model/categories.php');
include_once('core/arr.php');

$cats = getCats();
$id = URL_PARAMS['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$fields = extractFields($_POST, ['title', 'content', 'id_cat']);
  $fields['id_article'] = $id;
	$validateErrors = articlesValidate($fields);	
	if(empty($validateErrors)){
		foreach ($cats as $cat) {
			if ($cat['title'] == $fields['id_cat']) {
					$fields['id_cat'] = $cat['id_cat'];
					break; 
			}
		}
		articlesEdit($fields);
		header('Location: ' . BASE_URL);
		exit();
	}
}
else{
  $fields = articlesOne($id);
  $validateErrors = [];
}
$pageTitle = 'Edit article';
$hasArt = $fields !== false; // $article !== null;
if($hasArt){
  $pageContent = template('v_add', [
		'fields' => $fields,
		'validateErrors' => $validateErrors,
		'cats' => $cats
	]);
}
else{
  header('HTTP/1.1 404 Not Found');
  include('views/errors/v_404.php');
}
