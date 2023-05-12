<?php

include_once('model/articles.php');

$articles = articlesAll();
$isTable = ($_GET['view'] ?? '') === 'table'; // index.php?view=table
$template = $isTable ? 'v_index_table' : 'v_index';

include("views/$template.php");