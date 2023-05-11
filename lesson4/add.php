<?php

include_once('model/articles.php');
include_once('model/categories.php');

$cats = getCats();
$fields = ['title' => '', 'content' => ''];
$err = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$fields['title'] = trim($_POST['title']);
	$fields['content'] = trim($_POST['content']);
	$cat_title = $_POST['myList'];
	foreach ($cats as $cat) {
    if ($cat['title'] == $cat_title) {
        $cat_id = $cat['id_cat'];
        break; // Optional: If you want to exit the loop after finding the matching category
    }
	}
	$fields['id_cat'] = $cat_id;
	if($fields['title'] === '' || $fields['content'] === ''){
		$err = 'Заполните все поля!';
	}
	else{
		articlesAdd($fields);
		header('Location: index.php');
		exit();
	}
}

?>
<div class="form">
	<form method="post">
		Title:<br>
		<input type="text" name="title" value="<?=$fields['title']?>"><br>
		Content:<br>
		<textarea name="content"><?=$fields['content']?></textarea><br>
		<label for="myList">Выберите категорию:</label>
  	<select id="myList" name="myList">
    	<? foreach($cats as $cat): ?>
				<option data-id=<?=$cat['id_cat']?>><?=$cat['title']?></option>
			<? endforeach; ?>			
  	</select>
		<button>Send</button>
		<p><?=$err?></p>
	</form>
</div>