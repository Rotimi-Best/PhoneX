<?php
require('orderscode.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=" width-device-width, initial-scale-1.0">
	<meta content="ie-edge" http-equiv="X-UA-Compatible">
	<title>Phone-X</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<h1>Rain-<span class="logo">TX</span></h1>
			</div>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php">Phones</a></li>
					<li class="current"><a href="orders.php">Orders</a></li>
					<li><a href="manufacturers.php">Manufacturers</a></li>
					<li><a href="buyers.php">Buyers</a></li>
					<li><a href="history.php">Search History</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section id="ordershowcase">
		<div class="container">
			<h1>Find all Orders in your database</h1>
			<p>The system is built to help you save time. Enjoy</p>
		</div>
	</section>

	<section id="searchbar">
		<div class="container">
			<h3>Search your DataBase</h3>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  <input name="input" type="text" placeholder="Enter Waiting or Processed or Prepared or Sent or Delivered or Received">
			  <button name="enter" type="submit" class="button_1">Find Orders</button>
			</form>
		</div>
	</section>

	<section id="main">
		<div class="container">
			<?php require('sidebar.php'); ?>
			<article id="main-col">
				<h1 class="page-title">All Smartphones</h1>
				<hr>
				<?php if(!empty($items)): ?>
				<h2>This is what you are looking for '<?php echo strtoupper($input);  ?>'</h2> 
				<h2>We found '<?php echo count($items);?> result'</h2>
				<hr>
				<div class="allphones">
					<?php foreach($items as $item): ?>
					<div>
					<h2>Buyer:	<?php echo $item->buyer;  ?></h2>
					<h3>Status: <?php echo $item->status;  ?></h3>
					<p>Order Type: <?php echo $item->order_type;  ?></p>
					<p>Order Address: <?php echo $item->address;  ?></p>
					<p>Comment: <?php echo $item->comment;  ?></p>
					<p>Warehouse Address: <?php echo $item->address;  ?></p>
					<p>Time: <?php echo $item->created_at;  ?></p>
					</div>
				<?php endforeach;  ?>
				</div>
			<?php else:?>
				<h1>No Result Found from your search </h1>
				
				<!-- <h2 class="text-center">Here are all the your orders in your database</h2>
				 <div class="allphones">
				<?php foreach($phones as $item): ?>
					<div>
					<h2>Buyer:	<?php echo $item->buyer;  ?></h2>
					<h3>Status: <?php echo $item->status;  ?></h3>
					<p>Order Type: <?php echo $item->order_type;  ?></p>
					<p>Order Address: <?php echo $item->address;  ?></p>
					<p>Comment: <?php echo $item->comment;  ?></p>
					<p>Warehouse Address: <?php echo $item->address;  ?></p>
					<p>Time: <?php echo $item->created_at;  ?></p>
					</div>
				<?php endforeach;  ?>
				</div>
-->

			<?php endif;  ?>
			</article>	
		</div>
	</section>




	<footer>
		<p>Written and Created By Rotimi Ibitoye Best</p>
		<p>Rain Technologies, Copyright &copy; 2017</p>
	</footer>
	


	
</body>
</html>