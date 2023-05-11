<?php

	include_once('model/db.php');

	function articlesAll() : array{
		$sql = "SELECT articles.*, categories.title AS cat_title FROM articles JOIN categories ON categories.id_cat = articles.id_cat ORDER BY id_article DESC";
		$query = dbQuery($sql);
		return $query->fetchAll();
	}

	function articlesAdd(array $fields) : bool{
		$sql = "INSERT articles (title, content, id_cat) VALUES (:title, :content, :id_cat)";
		dbQuery($sql, $fields);
		return true;
	}

	function articlesGet(int $id) : array{
		$sql = "SELECT * FROM articles WHERE id_article = $id";
		$query = dbQuery($sql);
		return $query->fetch();
	}

	function articlesEdit(array $fields) : bool{
		$sql = "UPDATE articles SET title = :title, content = :content, id_cat = :id_cat WHERE id_article = :id";
		dbQuery($sql, $fields);
		return true;
	}