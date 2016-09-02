<?
session_start();

require_once 'linkModel.php';

$link = new linkModel();


if(isset($_GET['action'])){
	if($_GET['action'] == 'create') {
		$url = $_POST['url'];
		$title = $_POST['urlTitle'];
		$link->create($url, $title);
		$link->read();
		include 'linkView.php';
	}else if($_GET['action'] == 'read'){
		$link->read();
		//call the view
		include 'linkView.php';
	}else if($_GET['action'] == 'update'){
		$_SESSION['id'] = $_GET['id'];
		$link->readOne($_SESSION['id']);
		//call updateview
		include 'updateView.php';
	}else if($_GET['action'] == 'saveUpdate'){
		//get id
		$_SESSION['id'] = $_POST['hidId'];
		$_SESSION['title'] = $_POST['update'];
		$link->saveUpdate($_SESSION['id'],$_SESSION['title']);
		$link->read();
		//call the view
		include 'linkView.php';
	}else if($_GET['action'] == 'delete'){
		//get id
		$_SESSION['id'] = $_GET['id'];
		$link->delete($_SESSION['id']);
		$link->read();
		//call the view
		include 'linkView.php';
	}
}else{
	$link->read();
	include 'linkView.php';
}
?>