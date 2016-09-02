<?php

class linkModel{

	public function create($url,$title){
		//insert
		$db = new PDO('mysql:host=localhost;dbname=ssl_part2;port=8870', 'root', 'root');

		$stmt = $db->prepare("INSERT INTO bookmarks(url, title) VALUES (:url, :title)");

		$url = mysql_real_escape_string($url);
		$title = mysql_real_escape_string($title);



		$stmt->bindParam(':url', htmlspecialchars($url));
		$stmt->bindParam(':title', htmlspecialchars($title));
		
		//execute
		$stmt->execute();
	}

	public function read(){
		
		$db = new PDO('mysql:host=localhost;dbname=ssl_part2;port=8870', 'root', 'root');
		//select *
		$stmt = $db->prepare("SELECT * from bookmarks order by id desc");

		$stmt->execute();

		$urlListA = [];
		$titleListA = [];
		$idListA = [];
		
	    foreach($stmt as $row){
	    	$urlList = "<li>".$row['url']."</li>";
	    	array_push($urlListA, $urlList);

	    	$titleList = $row['title'];
	    	array_push($titleListA, $titleList);

	    	$idList = $row['ID'];
	    	array_push($idListA, $idList);
	    }

	    $_SESSION['urls']=$urlListA;

	    $_SESSION['titles']=$titleListA;

	    $_SESSION['ids']=$idListA;
	}

	public function readOne($curId){
		$db = new PDO('mysql:host=localhost;dbname=ssl_part2;port=8870', 'root', 'root');
		
		//select one
		$stmt = $db->prepare("SELECT * from bookmarks where id = $curId ");

		$stmt->execute();

		$titleListA = [];
		
	    foreach($stmt as $row){
	    	$titleList = $row['title'];
	    	array_push($titleListA, $titleList);
	    }
	    $_SESSION['titles']=$titleListA;
	    $_SESSION['curId']=$curId;

	}

	public function saveUpdate($curId, $title){
		$db = new PDO('mysql:host=localhost;dbname=ssl_part2;port=8870', 'root', 'root');

		// new data
		$titlet = mysql_real_escape_string($title);
		$id = mysql_real_escape_string($curId);
		// query
		$sql = "UPDATE bookmarks 
		        SET title=?
				WHERE id=?";
		$q = $db->prepare($sql);
		$q->execute(array(htmlspecialchars($titlet),htmlspecialchars($id)));
	}

	public function delete($curId){
		$db = new PDO('mysql:host=localhost;dbname=ssl_part2;port=8870', 'root', 'root');

		// query
		$sql = "DELETE FROM bookmarks WHERE id = $curId";
		$q = $db->prepare($sql);
		$q->execute();
	}
}
?>