<?php  
	define("TITLE", "Menu | Franklin's Find Dining");
	include('includes/header.php');

	if(isset($_GET['item'])) {
		$menuItem = $_GET['item'];
		$dish = $menuItems[$menuItem];
	}

	function suggestedTip($price, $tip) {
		$totalTip = $price * $tip;
		echo money_format('%.2n', $totalTip);
	}
?>
	
	<div id="dish">
	
		<h1><?php echo $dish["title"]; ?> <span class="price"><sup>$</sup><?php echo $dish["price"]; ?></span></h1>
		<p><?php echo $dish["blurb"]; ?></p>
		<p><strong>Suggested beverage: <?php echo $dish["drink"]; ?></strong></p>
		<p><em>Suggested tip: <sup>$</sup><?php suggestedTip($dish["price"], 0.20); ?></em></p>
		
	</div><!-- dish -->
	
	<hr>
	
	<a href="menu.php" class="button">&laquo; Back to Menu</a>

<?php include('includes/footer.php'); ?>