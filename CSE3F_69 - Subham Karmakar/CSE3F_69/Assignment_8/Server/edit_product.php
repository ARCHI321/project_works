<!DOCTYPE html>
<html lang="en">

<?php 
	include "./Components/Shared/header.php";
	include "./Components/db_connection.php";

	$query = "SELECT * FROM Products WHERE P_ID = '".$_REQUEST["id"]."';";
	$result = mysqli_query($connection, $query);
	$fetch = mysqli_fetch_object($result);

	$query_2 = "SELECT * FROM Categories WHERE Status = 'Active';";
	$result_2 = mysqli_query($connection, $query_2);

	if (isset($_POST["update"]))
	{
		$file_name = "";

		if (isset($_FILES["Image"])) 
		{
			unlink("Product_Images/" . $fetch->Image);
			
			$folder = "Product_Images/";
			$file_exts = array("jpg", "jpeg", "bmp", "gif", "png", "doc", "docx", "pdf");
			$value = explode(".", $_FILES["Image"]["name"]);
			$uploaded_exts = end($value);

			if ((($_FILES["Image"]["type"] == "image/gif")
			|| ($_FILES["Image"]["type"] == "image/jpeg")
			|| ($_FILES["Image"]["type"] == "image/jpg")
			|| ($_FILES["Image"]["type"] == "image/png")
			|| ($_FILES["Image"]["type"] == "application/doc")
			|| ($_FILES["Image"]["type"] == "application/docx")
			|| ($_FILES["Image"]["type"] == "application/pdf"))
			&& ($_FILES["Image"]["size"] < 2000000000)
			&& in_array($uploaded_exts, $file_exts))
			{
				if ($_FILES["Image"]["error"] > 0)
				{
				}
				else
				{
					if (file_exists("$folder/" . $_FILES["Image"]["name"]))
					{
						echo "<div class='error'>" . "{" . $_FILES["Image"]["name"] . "}" . "already exists." . "</div>";
					}
					else
					{
						$ran = md5(time().rand());
						$file_name = $ran . "." . $uploaded_exts;
						move_uploaded_file($_FILES["Image"]["tmp_name"], $folder . $file_name);
					}
				}
			}
		}

		$query = "UPDATE Products SET Name ='".$_POST["Name"]."', C_ID ='".$_POST["C_ID"]."', Price = '".$_POST["Price"]."', Image = '".$file_name."' WHERE P_ID = '".$_REQUEST["id"]."';";
		mysqli_query($connection, $query);
		header("location: view_products.php");
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
				<h4>Edit Data of Product</h4>
				<form style="margin: auto;" method="POST" enctype="multipart/form-data">
					<table style="margin: auto;">
						<tr>
							<td>Name: </td>
							<td><input type="text" name="Name" value="<?php echo $fetch->Name ?>" /></td>
						</tr>
						<tr>
							<td>Price: </td>
							<td><input type="number" name="Price" value="<?php echo $fetch->Price ?>" /></td>
						</tr>
						<tr>
							<td>Category: </td>
							<td>
								<select name="C_ID">
								<?php while ($fetch_2 = mysqli_fetch_object($result_2)) { ?>
									<option value="<?php echo $fetch_2->C_ID; ?>" <?php if ($fetch->C_ID == $fetch_2->C_ID) { ?> selected <?php } ?> ><?php echo $fetch_2->Name; ?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Image: </td>
							<td><input type="file" name="Image" /></td>
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