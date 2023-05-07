<?php

	// your functions may be here

	function getCurrentURL() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    
    $url = $protocol . $host . $uri;
    
    return $url;
	}

	function addLog(string $url){
		$date = date('Y-m-d', strtotime('now'));
		$time = date('H-i-s');
		$filePath = 'logs/' . $date . '.txt';
		$ip = $_SERVER['REMOTE_ADDR'];
		$data = "$url; $time; $ip\n";
		file_put_contents($filePath, $data, FILE_APPEND);
	}

	/* start --- black box */
	function getArticles() : array{
		return json_decode(file_get_contents('db/articles.json'), true);
	}

	function addArticle(string $title, string $content) : bool{
		$articles = getArticles();

		$lastId = end($articles)['id'];
		$id = $lastId + 1;

		$articles[$id] = [
			'id' => $id,
			'title' => $title,
			'content' => $content
		];

		saveArticles($articles);
		return true;
	}

	function editArticle(int $id, string $title, string $content) : bool{
		$articles = getArticles();
		if(isset($articles[$id])){
			$articles[$id] = [
				'id' => $id,
				'title' => $title,
				'content' => $content
			];
			saveArticles($articles);
			return true;
		}
	}

	function removeArticle(int $id) : bool{
		$articles = getArticles();

		if(isset($articles[$id])){
			unset($articles[$id]);
			saveArticles($articles);
			return true;
		}
		
		return false;
	}

	function saveArticles(array $articles) : bool{
		file_put_contents('db/articles.json', json_encode($articles));
		return true;
	}
	/* end --- black box */