<?php

	function usersById(string $id) : ?array{
		$sql = "SELECT user_id,login FROM users WHERE user_id=:id";
		$query = dbQuery($sql, ['id' => $id]);
		$user = $query->fetch();
		return $user === false ? null : $user;
	}

	function usersOne(string $login) : ?array{
		$sql = "SELECT user_id,password FROM users WHERE login=:login";
		$query = dbQuery($sql, ['login' => $login]);
		$user = $query->fetch();
		return $user === false ? null : $user;
	}