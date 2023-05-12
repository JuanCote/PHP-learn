<?php

include_once('model/articles.php');
include_once('model/categories.php');
include_once('core/arr.php');

$cats = getCats();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$fields = extractFields($_POST, ['title', 'content', 'id_cat']);
	$validateErrors = articlesValidate($fields);	
	if(empty($validateErrors)){
		foreach ($cats as $cat) {
			if ($cat['title'] == $fields['id_cat']) {
					$fields['id_cat'] = $cat['id_cat'];
					break; 
			}
		}
		articlesAdd($fields);
		header('Location: index.php');
		exit();
	}
}
else{
	$fields = ['title' => '', 'content' => ''];
	$validateErrors = [];
}

include("views/v_add.php");