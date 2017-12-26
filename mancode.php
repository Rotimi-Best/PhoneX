<?php
require('config/config.php');
require('config/db.php');
/*
$title = 'user input';
$body = 'user_input';
 $sql = 'INSERT INTO phones(title, body) VALUES(:title, :body)';
 $stmt->$pdo->prepare($sql);
 $stmt->execute(['title' => $title, 'body' => $body]);
 $items = $stmt->fetchAll();

*/
 // -------------------------------- SEARCH BAR BUTTON --------------------------------------------------------

  if(isset($_POST['enter'])){

  	$input = $_POST['input'];

  	if($input == "all"){
		$mysql = "SELECT * FROM manufacturers ORDER BY id";
		$stmt = $pdo->prepare($mysql);
		$stmt->execute();
		$items = $stmt->fetchAll();
	}
  	else {
  	// $sql = "SELECT * FROM phones WHERE model LIKE '%{$input}%'";
  	$dsql = "SELECT man_name FROM manufacturers WHERE man_name LIKE '%{$input}%'";
	$dstmt = $pdo->prepare($dsql);
	$dstmt->execute();
	$items = $dstmt->fetchAll();

	}

  }
 ?>