<?php

include_once('model/articles.php');
$articles = articlesAll();

?>
<h1>Articles</h1>
<a href="add.php">add</a>
<div>
<? foreach($articles as $article): ?>
	<div>
		<strong><?=$article['title']?></strong>
		<em><?=$article['dt_add']?></em>
		<div>
			<?=$article['content']?>
		</div>
		<p>Category:<?=$article['cat_title']?></p>
		<a href="edit.php?id=<?=$article['id_article']?>">edit</a>
		<hr>
	</div>
<? endforeach; ?>

</div>