<?php

	include_once('functions.php');		

	$id = (int)($_GET['id'] ?? '');
	removeArticle($id)
?>
The post has been deleted.
<hr>
<a href="index.php">Move to main page</a>