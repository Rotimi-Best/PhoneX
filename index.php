<?php
require('indexcode.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=" width-device-width, initial-scale-1.0">
	<meta content="ie-edge" http-equiv="X-UA-Compatible">
	<title>Phone-X</title>
	<link rel="stylesheet" type="text/css" href="style/style.css?version1">
</head>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<h1>Rain-<span class="logo">TX</span></h1>
			</div>
			<nav>
				<ul>
					<li class="current"><a href="index.php">Home</a></li>
					<li><a href="index.php">Phones</a></li>
					<li><a href="orders.php">Orders</a></li>
					<li><a href="manufacturers.php">Manufacturers</a></li>
					<li><a href="buyers.php">Buyers</a></li>
					<li><a href="history.php">Search History</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section id="showcase">
		<div class="container">
			<h1>Find all SmartPhones in your database</h1>
			<p>The system is built to help you save time. Enjoy</p>
		</div>
	</section>

	<section id="searchbar">
		<div class="container">
			<h3>Search your DataBase</h3>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input name="search" type="text" placeholder="Search..." id="searchInput">
				<button name="enter" type="submit" class="button_1">Find Phones</button>
			</form>
		</div>
	</section>

	<section id="main">
		<div class="container">
			<aside id="sidebar">
				<!--             SIDE BAR                               -->
			<h2 class="sidebar-header text-center">All Categories</h2>
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<h3 >Manufacturers</h3>
				<p><input type="checkbox" name="man[]" value="1">Samsung</p>
				<p><input type="checkbox" name="man[]" value="2">Google</p>
				<p><input type="checkbox" name="man[]" value="3">LG</p>
				<p><input type="checkbox" name="man[]" value="4">Lenovo</p>
				<p><input type="checkbox" name="man[]" value="5">HTC</p>
				<p><input type="checkbox" name="man[]" value="6">Apple</p>
				<p><input type="checkbox" name="man[]" value="7">Meizu</p>
				<p><input type="checkbox" name="man[]" value="8">Nokia</p>
				<p><input type="checkbox" name="man[]" value="9">Black Berry</p>
				<p><input type="checkbox" name="man[]" value="10">Phonex</p>

				<h3>Ram</h3>
				<p><input type="checkbox" name="ram[]" value="1">512 MB</p>
				<p><input type="checkbox" name="ram[]" value="2">1GB</p>
				<p><input type="checkbox" name="ram[]" value="3">2GB</p>
				<p><input type="checkbox" name="ram[]" value="4">3GB</p>
				<p><input type="checkbox" name="ram[]" value="5">4GB</p>
				<p><input type="checkbox" name="ram[]" value="6">8GB</p>

				<h3>Screen Diagonal</h3>
				<p><input type="checkbox" name="screen_d[]" value="1">4.50</p>
				<p><input type="checkbox" name="screen_d[]" value="2">4.70</p>
				<p><input type="checkbox" name="screen_d[]" value="3">4.95</p>
				<p><input type="checkbox" name="screen_d[]" value="4">5</p>
				<p><input type="checkbox" name="screen_d[]" value="5">5.20</p>
				<p><input type="checkbox" name="screen_d[]" value="6">5.70</p>

				<h3>Price</h3>
				<p>From: <input type="text" name="price1"></p>
				<p>To: <input type="text" name="price2"></p>

				<h3>Sim 2 Support</h3>
				<p><input type="radio" name="sim" value="1">Yes</p>
				<p><input type="radio" name="sim" value="0">No</p>
				

				<h3>MicroSd support</h3>
				<p><input type="radio" name="sd" value="1">Yes</p>
				<p><input type="radio" name="sd" value="0">No</p>

				<h3>Screen Resolution</h3>
				<p><input type="checkbox" name="screen_r[]" value="1">Q HD</p>
				<p><input type="checkbox" name="screen_r[]" value="2">HD</p>
				<p><input type="checkbox" name="screen_r[]" value="3">Full HD</p>
				<p><input type="checkbox" name="screen_r[]" value="4">Quad HD</p>
				<p><input type="checkbox" name="screen_r[]" value="5">Wide Quad HD</p>
				<p><input type="checkbox" name="screen_r[]" value="6">Ultra HD</p>

				<h3>Camera Resolution</h3>
				<p><input type="checkbox" name="camera_r[]" value="1">4</p>
				<p><input type="checkbox" name="camera_r[]" value="2">8</p>
				<p><input type="checkbox" name="camera_r[]" value="3">12.30</p>
				<p><input type="checkbox" name="camera_r[]" value="4">13</p>
				<p><input type="checkbox" name="camera_r[]" value="5">16</p>

				<button name="find" type="submit" class="button_1 btn-center">Find Phones</button><br>
			</form>
				
					
			</aside>

			<!--   ===========MAIN PAGE==========================   -->

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
							<h2>Model:	<?php echo $item->model;  ?></h2>
							<h3>Manufacturer: <?php echo $item->man_name;  ?></h3>
							<p>Micro Sd Support: 
								<?php if(($item->microsd_support) == "1"){
								echo "Yes"; } else{ echo "No"; }
								?>
							</p>
							<p>Price: <?php echo $item->price;  ?></p>
							<p>Sim Support:
								<?php if(($item->sim2_support) == "1"){
								echo "Yes"; } else{ echo "No"; }
								?>
							</p>
							<p>Resolution: <?php echo $item->resolution;  ?></p>
							<p>Ram Size: <?php echo $item->ram_name;  ?></p>
							<p>Screen Diagonal: <?php echo $item->diagonal;  ?></p>
							<p>Screen Resolution: <?php echo $item->name;  ?></p>

							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<input type="hidden" name="id" value="<?php echo $item->id;  ?>">
								<button name="delete" type="submit" class="button_1 btn-center">Delete Phone</button>
							</form>
						</div>
					
				<?php endforeach;  ?>
				</div>
				<?php elseif (!empty($sideitems)) : ?>
					<h2>We found '<?php echo count($sideitems);?> result'</h2>
					<hr>
					<div class="allphones">
					<?php foreach($sideitems as $item): ?>
						<div>
							<h2>Model:	<?php echo $item->model;  ?></h2>
						<h3>Manufacturer: <?php echo $item->man_name;  ?></h3>
						<p>Micro Sd Support: 
							<?php if(($item->microsd_support) == "1"){
							echo "Yes"; } else{ echo "No"; }
							?>
						</p>
						<p>Price: <?php echo $item->price;  ?></p>
						<p>Sim Support:
							<?php if(($item->sim2_support) == "1"){
							echo "Yes"; } else{ echo "No"; }
							?>
						</p>
						<p>Resolution: <?php echo $item->resolution;  ?></p>
						<p>Ram Size: <?php echo $item->ram_name;  ?></p>
						<p>Screen Diagonal: <?php echo $item->diagonal;  ?></p>
						<p>Screen Resolution: <?php echo $item->name;  ?></p>

						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<input type="hidden" name="id" value="<?php echo $item->id;  ?>">
							<button name="delete" type="submit" class="button_1 btn-center">Delete Phone</button>
						</form>
						</div>
					<?php endforeach;  ?>
					</div>
				
			<?php else :  ?>
				<h1>No Result Found from your search  </h1>
				<h2 class="text-center">Enter 'ALL' in the search box to see all phones</h2>
				<h2 class="text-center">Enter 'Apple' in the search box to see all Apple phones</h2>
				
			<?php endif;  ?>
			</article>	
		</div>
	</section>




	<footer>
		<p>Written and Created By Rotimi Ibitoye Best</p>
		<p>Rain Technologies, Copyright &copy; 2017</p>
	</footer>
	

<script src="javascript/main.js"></script>
	
</body>
</html>