<?php

$articles = articlesAll();
$isTable = ($_GET['view'] ?? '') === 'table'; // index.php?view=table
$template = $isTable ? 'v_index_table' : 'v_index';

$pageTitle = 'All articles';
$pageContent = template("$template", [
	'articles' => $articles
]);