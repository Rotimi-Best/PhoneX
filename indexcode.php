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

 echo "<script type='text/javascript'>alert('Fill all fields'); </script>";
  			header("refresher:2; url:http://localhost/phpsandbox/phonex/index.php ");
  			return;

*/
 // -------------------------------- SEARCH BAR BUTTON --------------------------------------------------------

  if(isset($_POST['enter'])){

  	$input = $_POST['search'];

    if($input == 'all'){
      $sql = "SELECT p.id, p.model, m.man_name, p.price, p.microsd_support, p.sim2_support,  cr.resolution, r.ram_name, sd.diagonal, sr.name FROM phones p JOIN manufacturers m ON m.id = p.manufacturer_id
          JOIN camera_resolutions cr ON cr.id = p.camera_resolution_id
          JOIN ram r ON r.id = p.ram_id
          JOIN screen_diagonals sd ON sd.id = p.screen_diagonal_id
          JOIN screen_resolutions sr ON sr.id = p.screen_resolution_id ORDER BY p.id DESC";
      $stmt = $pdo->prepare($sql); 
      $stmt->execute();
      $items = $stmt->fetchAll();
    } else{
  	
      	// $sql = "SELECT * FROM phones WHERE model LIKE '%{$input}%'";
      	$sql = "SELECT p.id, p.model, m.man_name, p.price, p.microsd_support, p.sim2_support,  cr.resolution, r.ram_name, sd.diagonal, sr.name FROM phones p JOIN manufacturers m ON m.id = p.manufacturer_id
    			JOIN camera_resolutions cr ON cr.id = p.camera_resolution_id
    			JOIN ram r ON r.id = p.ram_id
    			JOIN screen_diagonals sd ON sd.id = p.screen_diagonal_id
    			JOIN screen_resolutions sr ON sr.id = p.screen_resolution_id
    			WHERE p.model LIKE '%{$input}%' OR m.man_name LIKE '%{$input}%'"; 
    	$stmt = $pdo->prepare($sql); 
    	$stmt->execute();
    	$items = $stmt->fetchAll();
    }
  }

  //* ---------------------------------------SIDE BAR BUTTON-----------------------------------
  // Check if button was clicked
  if(isset($_POST['find'])){
 // { This is check if the user selected an option in the checkbox
   $conditions = array();

    if (isset($_POST['man'])) {
     array_push($conditions, "p.manufacturer_id IN (" . implode(',', $_POST['man']).")");
    }
   

    if (isset($_POST['ram'])) {
      array_push($conditions, "p.ram_id IN (" . implode(',', $_POST['ram']).")");
    }

    if(isset($_POST['screen_d'])){
      array_push($conditions, "p.screen_diagonal_id IN (" . implode(',', $_POST['screen_d']).")");
    }

    if(isset($_POST['screen_r'])){
      array_push($conditions, "p.screen_resolution_id IN (" . implode(',', $_POST['screen_r']).")");
    } 

    if(isset($_POST['camera_r'])){
      array_push($conditions, "p.camera_resolution_id IN (" . implode(',', $_POST['camera_r']).")");
    } 

    if(isset($_POST['sd'])){
      array_push($conditions, "p.microsd_support IN (" .$_POST['sd'].")");
    } 

    if(isset($_POST['sim'])){
      array_push($conditions, "p.sim2_support IN (".$_POST['sim'].")");
    }

    if(isset($_POST['price1'])){
      if($_POST['price1'] != null){
         array_push($conditions, "price >= " . $_POST['price1']);
      }
    }

    if(isset($_POST['price2'])){
      if($_POST['price2'] != null){
         array_push($conditions, "price <= " . $_POST['price2']);
      }
    }
//  This is the end of the check. Now let's get to the sql }

  	// $sql = "SELECT * FROM phones WHERE model LIKE '%{$input}%'";
    //Sql Query
  	$sql = "SELECT p.id, m.man_name, p.model, p.price, p.microsd_support, p.sim2_support, cr.resolution,r.id, r.ram_name, r.size, sd.diagonal, sr.name FROM phones p JOIN manufacturers m ON m.id = p.manufacturer_id
			JOIN camera_resolutions cr ON cr.id = p.camera_resolution_id
			JOIN ram r ON r.id = p.ram_id
			JOIN screen_diagonals sd ON sd.id = p.screen_diagonal_id
			JOIN screen_resolutions sr ON sr.id = p.screen_resolution_id";

      if (count($conditions) > 0) {
        $sql = $sql . " WHERE " . implode(" AND ", $conditions);
      }

	$stmt = $pdo->prepare($sql);  
	$stmt->execute();
	$sideitems = $stmt->fetchAll();

	
  }


  //--------------------------------------DELETE BUTTON -------------------------------
   if(isset($_POST['delete'])){

   		$id = $_POST['id'];

   		$sql = "DELETE FROM phones  WHERE id = :id";
   		$stmt = $pdo->prepare($sql);
   		$stmt->execute(['id' => $id]);


   }

	// --------------------------------- IF THERE IS NO SEARCH (ALL PHONES)---------------------------------

  	$mysql = "SELECT p.id, p.model, p.price, p.microsd_support, p.sim2_support, m.man_name, cr.resolution, r.ram_name, r.size, sd.diagonal, 
  			sr.name FROM phones p JOIN manufacturers m ON m.id = p.manufacturer_id
			JOIN camera_resolutions cr ON cr.id = p.camera_resolution_id
			JOIN ram r ON r.id = p.ram_id
			JOIN screen_diagonals sd ON sd.id = p.screen_diagonal_id
			JOIN screen_resolutions sr ON sr.id = p.screen_resolution_id";
	$mystmt = $pdo->prepare($mysql);
	$mystmt->execute();
	$phones = $mystmt->fetchAll();

?>