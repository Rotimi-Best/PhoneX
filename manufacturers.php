<?php
	require('mancode.php');
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
					<li><a href="orders.php">Orders</a></li>
					<li class="current"><a href="manufacturers.php">Manufacturers</a></li>
					<li><a href="buyers.php">Buyers</a></li>
					<li><a href="history.php">Search History</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section id="showcase">
		<div class="container">
			<h1>Find all Manufacturers in your database</h1>
			<p>The system is built to help you save time. Enjoy</p>
		</div>
	</section>

	<section id="searchbar">
		<div class="container">
			<h3>Search your DataBase</h3>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input name="input" type="text" placeholder="Enter the name of a Manufacturer">
				<button name="enter" type="submit" class="button_1">Find Manufacturers</button>
			</form>
		</div>
	</section>

	<section id="main">
		<div class="container">
			<?php require('sidebar.php'); ?>
			<article id="main-col">
				<h1 class="page-title">Manufacturers Page</h1>
				<hr>
				<?php if(!empty($items)): ?>
				<h2>This is what you are looking for '<?php echo strtoupper($input);  ?>'</h2> 
				<h2>We found '<?php echo count($items);?> result'</h2>
				<hr>
				<div class="allphones">
					<?php foreach($items as $item): ?>
					<div>
					<h2>Manufacturer:	<?php echo $item->man_name;  ?></h2>
					</div>
				<?php endforeach;  ?>
				</div>
			<?php else:?>
				<h1>No Result Found from your search </h1>

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




