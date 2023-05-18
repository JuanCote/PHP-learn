<?php

	include_once('core/db.php');

	function articlesAll() : array{
		$sql = "SELECT articles.*, categories.title AS cat_title FROM articles JOIN categories ON articles.id_cat = categories.id_cat ORDER BY articles.id_article DESC";
		$query = dbQuery($sql);
		return $query->fetchAll();
	}

	function articlesOne(int $id){
		$sql = "SELECT articles.*, categories.title AS cat_title FROM articles JOIN categories ON articles.id_cat = categories.id_cat WHERE id_article=:id";
		$query = dbQuery($sql, ['id' => $id]);
		return $query->fetch();
	}

	function articlesAdd(array $fields) : bool{
		$sql = "INSERT articles (title, content, id_cat) VALUES (:title, :content, :id_cat)";
		dbQuery($sql, $fields);
		return true;
	}

	function articlesEdit(array $fields) : bool{
		$sql = "UPDATE articles SET title = :title, content = :content, id_cat = :id_cat WHERE id_article = :id_article";
		dbQuery($sql, $fields);
		return true;
	}

	function articlesValidate(array &$fields) : array{
		$errors = [];
		$textLen = mb_strlen($fields['content'], 'UTF-8');

		if(mb_strlen($fields['title'], 'UTF-8') < 2){
			$errors[] = 'Название не короче 2 символов!';
		}

		if($textLen < 10 || $textLen > 140){
			$errors[] = 'Текст от 10 до 140 символов!';
		}

		$fields['title'] = htmlspecialchars($fields['title']);
		$fields['content'] = htmlspecialchars($fields['content']);

		return $errors;
	}