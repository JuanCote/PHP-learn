<div class="form">
	<form method="post">
		Title:<br>
		<input type="text" name="title" value="<?=$fields['title']?>"><br>
		Content:<br>
		<textarea name="content"><?=$fields['content']?></textarea><br>
		<label for="id_cat">Выберите категорию:</label>
  	<select id="id_cat" name="id_cat">
    	<? foreach($cats as $cat): ?>
				<option data-id=<?=$cat['id_cat']?>><?=$cat['title']?></option>
			<? endforeach; ?>			
  	</select>
		<button>Send</button>
		<div class="error-list">
		<? foreach($validateErrors as $error): ?>
			<p><?=$error?></p>
		<? endforeach; ?>
		</div>
		
	</form>
</div>