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
		$mysql = "SELECT bs.id, name, surname, phone_number, address, cs.bonus_points FROM buyers bs LEFT JOIN bonus_cards cs ON bs.bonus_card_id = cs.id ORDER BY id DESC";
		$stmt = $pdo->prepare($mysql);
		$stmt->execute();
		$buyers = $stmt->fetchAll();
	}
  	else {
  	// $sql = "SELECT * FROM phones WHERE model LIKE '%{$input}%'";
  	$sql = "SELECT bs.id, name, surname, phone_number, address, cs.bonus_points FROM buyers bs LEFT JOIN bonus_cards cs ON bs.bonus_card_id = cs.id WHERE name LIKE '%{$input}%' OR surname LIKE '%{$input}%'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$buyers = $stmt->fetchAll();

	}

  }
    //--------------------------------------DELETE BUTTON -------------------------------
   if(isset($_POST['delete'])){

   		$id = $_POST['id'];

   		$sql = "DELETE FROM buyers  WHERE id = :id";
   		$stmt = $pdo->prepare($sql);
   		$stmt->execute(['id' => $id]);


   }

  //* ---------------------------------------SIDE BAR BUTTON-----------------------------------

  if(isset($_POST['addbuyer'])){

  	$name = $_POST['name']; //var_dump($name);
  	$surname = $_POST['surname'];//var_dump($surname);
  	$address = $_POST['address']; //var_dump($address);
  	$phone = $_POST['phone']; //var_dump($phone);
  	  	
  	// $sql = "SELECT * FROM phones WHERE model LIKE '%{$input}%'";
  	$sql = "INSERT INTO buyers(name, surname, phone_number, address, bonus_card_id) VALUES(:name, :surname, :phone, :address, '2')";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['name' => $name, 'surname' => $surname, 'phone' => $phone, 'address' => $address]);
	echo "<script type='text/javascript'>alert('Buyer Added to the DataBase'); </script>";
  }


?>