<!DOCTYPE html>
<html lang="en">

<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	$query = "SELECT * FROM Categories WHERE C_ID = '".$_REQUEST["id"]."';";
	$result = mysqli_query($connection, $query);
	$fetch = mysqli_fetch_object($result);

	if (isset($_POST["update"]))
	{
		$query = "UPDATE Categories SET Name ='".$_POST["Name"]."' WHERE C_ID = '".$_REQUEST["id"]."';";
		mysqli_query($connection, $query);
		header("location: view_categories.php");
	}
?>

<body>

	<div id="wrapper">

		<div id="banner">
			<div class="container">
				<div class="title">
					<h2>SOFTWARE ENGINEERING LABORATORY</h2>
					<h2>ASSIGNMENT 8</h2>
				</div>
			</div>
		</div>

		<div id="page" class="container">
			<div class="title">
				<h4>Edit Category</h4>

				<form style="margin: auto;" method="POST">

					<table style="margin: auto;">
						<tr>
							<td>Name: </td>
							<td><input type="text" name="Name" value="<?php echo $fetch->Name ?>" /></td>
						</tr>
					</table>

					<input class="button-secondary" type="submit" name="update" value="UPDATE" />

				</form>

			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>