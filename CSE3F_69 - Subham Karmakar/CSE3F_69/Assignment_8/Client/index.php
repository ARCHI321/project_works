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
					<h2>SOFTWARE ENGINEERING LAB</h2>
					<h2>ASSIGNMENT 8</h2>
				</div>
			</div>
		</div>

		<div id="page" class="container">
			<div class="title">
				<?php include "./logout.php"; ?>
				<button class="button-primary" onclick="document.location='./view_products.php'">Products</button>
				<button class="button-primary" onclick="document.location='./view_categories.php'">Categories</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>
