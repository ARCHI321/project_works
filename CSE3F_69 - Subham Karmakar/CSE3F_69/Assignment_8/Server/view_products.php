<!DOCTYPE html>
<html lang="en">

<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	if (isset($_REQUEST["del_id"]))
	{
		$query = "DELETE FROM Products WHERE P_ID = '".$_REQUEST["del_id"]."';";
		mysqli_query($connection, $query);
		header("location: view_products.php");
	}

	$query_2 = "SELECT * FROM Products;";
	$result = mysqli_query($connection, $query_2);
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
				<h4>View all the Employees</h4>

				<table style="margin: auto;">
					<tr>
						<td>Product ID</td>
						<td>Name</td>
						<td>Price</td>
						<td>Category</td>
						<td>Picture</td>
					</tr>
					<?php while ($fetch = mysqli_fetch_object($result)) { ?>
					<tr>
						<td>
							<?php echo $fetch->P_ID; ?>
						</td>
						<td>
							<?php echo $fetch->Name; ?>
						</td>
						<td>
							<?php echo $fetch->Price; ?>
						</td>
						<td>
							<?php
								$query_3 = "SELECT Name FROM Categories WHERE C_ID = $fetch->C_ID;";
								$result_2 = mysqli_query($connection, $query_3);
								$fetch_2 = mysqli_fetch_object($result_2);
								echo $fetch_2->Name;
							?>
						</td>
						<td>
						<img src="Product_Images/<?php echo $fetch->Image; ?>" alt="Image" style="max-width: 50px; max-height: 50px;" />
						</td>
						<td>
							<a href="./edit_product.php?id=<?php echo $fetch->P_ID; ?>">EDIT</a>
						</td>
						<td>
							<a href="./view_products.php?del_id=<?php echo $fetch->P_ID; ?>">DELETE</a>
						</td>
					</tr>
					<?php } ?>
				</table>

				<br>
				<button class="button-secondary" onclick="document.location='./add_product.php'">ADD NEW Product</button>

			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>