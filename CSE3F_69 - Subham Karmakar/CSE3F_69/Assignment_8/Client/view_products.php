<!DOCTYPE html>
<html lang="en">

<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	$query_2 = "SELECT * FROM Products;";
	$result = mysqli_query($connection, $query_2);
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
				<h4>View all the Products</h4>

				<table style="margin: auto;">
					<tr>
						<td>Product ID</td>
						<td>Name</td>
						<td>Category</td>
						<td>Price</td>
						<td>Image</td>
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
							<?php
								$query_3 = "SELECT Name FROM Categories WHERE C_ID = $fetch->C_ID;";
								$result_2 = mysqli_query($connection, $query_3);
								$fetch_2 = mysqli_fetch_object($result_2);
								echo $fetch_2->Name;
							?>
						</td>
						<td>
							<?php echo $fetch->Price; ?>
						</td>
						<td>
						<img src="../Server/Product_Images/<?php echo $fetch->Image; ?>" alt="Profile Picture" style="max-width: 50px; max-height: 50px;" />
						</td>
					</tr>
					<?php } ?>
				</table>

			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>