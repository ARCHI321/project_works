<!DOCTYPE html>
<html lang="en">

<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";
?>

<body>

	<div id="wrapper">

		<div id="banner">
			<div class="container">
				<div class="title">
					<h2>SOFTWARE ENGINEERING LABORATORY</h2>
					<h2>ASSIGNMENT 8</h2>
					<br><br>
					<p>Logged in as <?php echo $_SESSION["NAME"] ?> (<?php echo $_SESSION["Email"] ?>)</p>
					<?php include "./logout.php"; ?>
				</div>
			</div>
		</div>

		<div id="page" class="container">
			<div class="title">
				<button class="button-primary" onclick="document.location='./view_products.php'">Products</button>
				<button class="button-primary" onclick="document.location='./view_categories.php'">Categories</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>
