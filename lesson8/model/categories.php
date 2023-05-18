<?php

function getCats() : array{
  $sql = "SELECT * FROM categories";
	$query = dbQuery($sql);
	return $query->fetchAll();
}