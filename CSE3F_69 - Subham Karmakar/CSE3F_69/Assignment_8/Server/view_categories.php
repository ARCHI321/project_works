<!DOCTYPE html>
<html lang="en">

<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	if (isset($_REQUEST["del_id"]))
	{
		$query = "DELETE FROM Categories WHERE C_ID = '".$_REQUEST["del_id"]."';";
		mysqli_query($connection, $query);
		header("location: view_categories.php");
	}

	if (isset($_REQUEST["status"]))
	{
		$query = "UPDATE Categories SET Status = '".$_REQUEST["status"]."' WHERE C_ID = '".$_REQUEST["id"]."';";
		mysqli_query($connection, $query);
		header("location: view_categories.php");
	}

	$query_2 = "SELECT * FROM Categories;";
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
				<h4>View all the Categories</h4>

				<table style="margin: auto;">
					<tr>
						<td>Category ID</td>
						<td>Category Name</td>
						<td>Status</td>
					</tr>
					<?php while ($fetch = mysqli_fetch_object($result)) { ?>
					<tr>
						<td>
							<?php echo $fetch->C_ID; ?>
						</td>
						<td>
							<?php echo $fetch->Name; ?>
						</td>
						<td>
							<?php if ($fetch->Status == "Active") { ?>
							<a href="./view_categories.php?status=Inactive&id=<?php echo $fetch->C_ID; ?>">Active</a>
							<?php }
							else if ($fetch->Status == "Inactive") { ?>
							<a href="./view_categories.php?status=Active&id=<?php echo $fetch->C_ID; ?>">Inactive</a>
							<?php } ?>
						</td>
						<td>
							<a href="./edit_category.php?id=<?php echo $fetch->C_ID; ?>">EDIT</a>
						</td>
						<td>
							<a href="./view_categories.php?del_id=<?php echo $fetch->C_ID; ?>">DELETE</a>
						</td>
					</tr>
					<?php } ?>
				</table>

				<br>
				<button class="button-secondary" onclick="document.location='./add_category.php'">ADD NEW Category</button>

			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>