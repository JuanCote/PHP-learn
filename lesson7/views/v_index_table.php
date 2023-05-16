<h1>Chat</h1>
<a href="index.php">View as list</a>
<hr>
<table>
<? foreach($articles as $article): ?>
	<tr>
		<td><?=$article['title']?></td>
		<td><?=$article['dt_add']?></td>
		<td>1?0</td>
	</tr>
<? endforeach; ?>
</table>