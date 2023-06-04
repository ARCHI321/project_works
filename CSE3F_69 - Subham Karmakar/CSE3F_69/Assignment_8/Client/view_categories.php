<!DOCTYPE html>
<html lang="en">

<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";
	
	$query_2 = "SELECT * FROM Categories WHERE Status = 'Active';";
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
				<h4>View all the Categories</h4>

				<table style="margin: auto;">
					<tr>
						<td>Category ID</td>
						<td>Category Name</td>
					</tr>
					<?php while ($fetch = mysqli_fetch_object($result)) { ?>
					<tr>
						<td>
							<?php echo $fetch->C_ID; ?>
						</td>
						<td>
							<?php echo $fetch->Name; ?>
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