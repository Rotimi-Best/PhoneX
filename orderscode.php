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
		$mysql = "SELECT o.created_at, o.`status`, o.order_type, o.address, o.`comment`, w.address, CONCAT(b.name, ' ', 		b.surname) as buyer
					FROM orders o JOIN warehouses w ON w.id = o.warehouse_id
					JOIN buyers b ON b.id = o.buyer_id";
		$stmt = $pdo->prepare($mysql);
		$stmt->execute();
		$items = $stmt->fetchAll();
	}
  	else {
  	// $sql = "SELECT * FROM phones WHERE model LIKE '%{$input}%'";
  	$sql = "SELECT o.created_at, o.`status`, o.order_type, o.address, o.`comment`, w.address, CONCAT(b.name, ' ', 			b.surname) as buyer
			FROM orders o JOIN warehouses w ON w.id = o.warehouse_id
			JOIN buyers b ON b.id = o.buyer_id 
			WHERE o.`status` LIKE '%{$input}%'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$items = $stmt->fetchAll();

	}

  }

  /* ---------------------------------------SIDE BAR BUTTON-----------------------------------

  if(isset($_POST['click'])){

  	if($_POST['man'] == '' || $_POST['ram'] == '' || $_POST['screen_d'] == '' || $_POST['sim'] == '' || $_POST['sd'] == '' || $_POST['screen_r'] == '' || $_POST['camera_r'] == '' || $_POST['price1'] == '' || $_POST['price2'] == ''){
  			echo "<script type='text/javascript'>alert('Fill all fields'); </script>";
  			header("refresher:2; url:http://localhost/phpsandbox/phonex ");
  			return;
  	}

  	$manid = $_POST['man']; //var_dump($manid);5
  	$ramid = $_POST['ram'];//var_dump($ramid);3
  	$screen_d = $_POST['screen_d']; //var_dump($screen_d);2
  	$sim = $_POST['sim']; //var_dump($sim);0
  	$sd = $_POST['sd']; //var_dump($sd);0
  	$screen_r = $_POST['screen_r']; //var_dump($screen_r);3
  	$camera_r = $_POST['camera_r']; //var_dump($camera_r);1
  	$price1 = $_POST['price1']; //var_dump($price1);1000
  	$price2 = $_POST['price2']; //var_dump($price2);2000
  	
  	// $sql = "SELECT * FROM phones WHERE model LIKE '%{$input}%'";
  	$sql = "SELECT p.model, p.price, p.microsd_support, p.sim2_support, m.name, cr.resolution, r.name, r.size, sd.diagonal, 
  			sr.name FROM phones p JOIN manufacturers m ON m.id = p.manufacturer_id
			JOIN camera_resolutions cr ON cr.id = p.camera_resolution_id
			JOIN ram r ON r.id = p.ram_id
			JOIN screen_diagonals sd ON sd.id = p.screen_diagonal_id
			JOIN screen_resolutions sr ON sr.id = p.screen_resolution_id
			WHERE p.manufacturer_id = $manid AND p.ram_id = $ramid AND p.screen_diagonal_id = $screen_d AND p.sim2_support = $sim AND p.microsd_support = $sd AND p.screen_resolution_id = $screen_r AND p.camera_resolution_id = $camera_r AND (p.price >= $price1 AND p.price <= $price2)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$sideitems = $stmt->fetchAll();

  } 

	// --------------------------------- IF THERE IS NO SEARCH (ALL PHONES)---------------------------------

	  	$mysql = "SELECT o.created_at, o.`status`, o.order_type, o.address, o.`comment`, w.address, CONCAT(b.name, ' ', 		b.surname) as buyer
					FROM orders o JOIN warehouses w ON w.id = o.warehouse_id
					JOIN buyers b ON b.id = o.buyer_id";
					$mystmt = $pdo->prepare($mysql);
					$mystmt->execute();
					$phones = $mystmt->fetchAll();
*/
?>