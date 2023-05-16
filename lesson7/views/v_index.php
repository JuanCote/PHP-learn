<? foreach($articles as $article): ?>
	<div>
		<strong><?=$article['title']?></strong>
		<em><?=$article['dt_add']?></em>
		<div>
			<?=$article['content']?>
		</div>
		<div>
			<p>Category: <?=$article['cat_title']?></p>
		</div>
		<div>
			<a href="<?=BASE_URL?>edit/<?=$article['id_article']?>">
				Edit
			</a>
		</div>
		<a href="<?=BASE_URL?>article/<?=$article['id_article']?>">
			Read more
		</a>
		<hr>
	</div>
<? endforeach; ?>
</div>