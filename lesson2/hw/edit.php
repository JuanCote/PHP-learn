<?php

	include_once('functions.php');

  addLog(getCurrentURL());

  $id = (int)($_GET['id'] ?? '');
	$isSend = false;
	$err = '';

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$title = trim($_POST['title']);
		$content = trim($_POST['content']);
		
		if($title === '' || $content === ''){
			$err = 'Заполните все поля!';
		}
		else if(mb_strlen($title, 'UTF8') < 2){
			$err = 'Имя не короче 2 символов!';
		}
		else{
			$isSend = true;
			editArticle($id, $title, $content);
		}
	}
	else{
    $articles = getArticles();
    foreach ($articles as $article) {
      if ($article['id'] == $id){
        $title = $article['title'];
		    $content = $article['content'];
      };
    } 
	}

?>
<div class="form">
	<? if($isSend): ?>
		<p>Your app is edited!</p>
	<? else: ?>
		<form method="post">
			Title:<br>
			<input type="text" name="title" value="<?=$title?>"><br>
			Content:<br>
			<input type="text" name="content" value="<?=$content?>"><br>
			<button>Send</button>
			<p><?=$err?></p>
		</form>
	<? endif; ?>
</div>

Form or message here
<hr>
<a href="index.php">Move to main page</a>